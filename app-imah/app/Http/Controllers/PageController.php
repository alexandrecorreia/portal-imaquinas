<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Equipament;
use Illuminate\Http\Request;

use Parsedown;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Page::query();
    
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('equipment', 'like', "%{$search}%");
            });
        }
    
        $pages = $query->get();
        return view('admin.pages.index', compact('pages', 'search'));
    }

    public function create()
    {
        $defaultTemplate = <<<EOD
[images]: img1.jpg, img2.jpg, img3.jpg
[video]: video.mp4
[pdf]: catalogo.pdf

# Descrição
A **Maquina Ipsum** é o topo da impressão retrô-mod. Une estilo 50s com tech moderna: precisa, durável, ideal p/ tecidos, plásticos e metais.

- **XXX:** 2x1x1m  
- **YYY:** Até 500 impressões/hora
- **TTT:** 350 kg
- **WWW:** Aço reforçado com acabamento anticorrosivo

# Usabilidade
Fácil, rápida, versátil. Painel simples, secagem turbo.

- Camisetas
- Embalagens
- Arte em geral

Pouca manutenção e máxima performance.
EOD;
        $equipaments = Equipament::orderBy('name')->get();

        return view('admin.pages.create', compact('defaultTemplate', 'equipaments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug',
            'content' => 'required|string',
            'equipament_id' => 'nullable|string|max:255',
        ]);

        $page = Page::create($request->all());
        
        $page->parseContent();

        return redirect()->route('admin.pages.index')->with('success', 'Página criada com sucesso!');
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $page->parseContent();
        return view('equipamento.show', compact('page'));    
    }

    public function edit(Page $page)
    {
        $equipaments = Equipament::orderBy('name')->get();

        return view('admin.pages.edit', compact('page', 'equipaments'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'content' => 'required|string',
            'equipment_id' => 'nullable|string|max:255',
        ]);

        $page->update($request->all());

        $page->parseContent();

        return redirect()->route('admin.pages.index')->with('success', 'Página atualizada com sucesso!');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')->with('success', 'Página excluída com sucesso!');
    }

    public function preview(Request $request)
    {
        // Cria uma instância do modelo Page
        $page = new Page();
        $page->title = $request->input('title');
        $page->slug = $request->input('slug');
        $page->content = $request->input('content');
        $page->equipment = $request->input('equipment');
        $page->images = array_filter(array_map('trim', explode(',', $request->input('images', ''))));
        $page->video = $request->input('video');
        $page->pdf = $request->input('pdf');

        // Chama o parseContent pra preencher content_html
        $page->parseContent();

        return view('admin.pages.preview', compact('page'));     
    }

    public function dashboard()
    {
        $totalPages = Page::count();
        
        // Contar arquivos nas pastas de uploads
        $totalImages = count(glob(storage_path('app/public/uploads/imagem/*')));
        $totalVideos = count(glob(storage_path('app/public/uploads/video/*')));
        $totalPdfs = count(glob(storage_path('app/public/uploads/pdf/*')));
        $totalEquipaments = Equipament::count();
    
        return view('admin.dashboard', compact('totalPages', 'totalImages', 'totalVideos', 'totalPdfs', 'totalEquipaments'));
    }    

    public function equipments()
    {
        // Mapeamento pra grafia correta
        $displayNames = [
            'impressoras' => 'Impressoras',
            'envernizadoras' => 'Envernizadoras',
            'secagem' => 'Secagem',
            'laboratorios' => 'Laboratórios',
            'laminadoras' => 'Laminadoras',
            'acessorios' => 'Acessórios',
        ];
    
        // Lista todas as categorias únicas do campo equipment
        $categories = Page::select('equipment')
            ->distinct()
            ->whereNotNull('equipment')
            ->where('equipment', '!=', '')
            ->pluck('equipment')
            ->map(function ($category) use ($displayNames) {
                $key = strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'ç'], ['a', 'e', 'i', 'o', 'u', 'a', 'o', 'c'], $category));
                return $displayNames[$key] ?? $category;
            });
    
        // Busca os equipamentos de cada categoria
        $equipmentData = [];
        foreach ($categories as $category) {
            $key = array_search($category, $displayNames);
            if ($key === false) {
                $key = strtolower(str_replace(['á', 'é', 'í', 'ó', 'ú', 'ã', 'õ', 'ç'], ['a', 'e', 'i', 'o', 'u', 'a', 'o', 'c'], $category));
            }
            $pages = Page::where('equipment', $key)->get();
            foreach ($pages as $page) {
                $page->parseContent(); // Carrega as imagens do Markdown
            }
            $equipmentData[$category] = $pages;
        }
    
        return view('equipamentos.index', compact('categories', 'equipmentData', 'displayNames'));
    }
}