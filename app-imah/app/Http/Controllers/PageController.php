<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Equipament;
use App\Models\Segment;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $defaultTemplate = view('admin.pages.default-template')->render();

        $equipaments = Equipament::orderBy('name')->get();
        $segments    = Segment::orderBy('name')->get();

        // Carregar arquivos existentes
        $existingImages = Upload::where('type', 'image')->orderBy('created_at', 'desc')->get();
        $existingVideos = Upload::where('type', 'video')->orderBy('created_at', 'desc')->get();
        $existingPdfs   = Upload::where('type', 'pdf')->orderBy('created_at', 'desc')->get();

        return view('admin.pages.create', compact(
            'defaultTemplate', 
            'equipaments', 
            'segments',
            'existingImages',
            'existingVideos',
            'existingPdfs'
        ));        
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'required|string|max:255|unique:pages,slug',
            'content'       => 'required|string',
            'equipament_id' => 'nullable|string|max:255',
            'segments'      => 'nullable|array',
            'segments.*'    => 'exists:segments,id',
            'is_active'     => 'boolean',
            'condition'     => 'in:novo,usado'            
        ]);

        $page = Page::create($request->only(['title', 'slug', 'content', 'equipament_id','is_active','condition']));

        if ($request->has('segments')) {
            $page->segments()->sync($request->segments);
        }        

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
        $segments    = Segment::orderBy('name')->get();

        return view('admin.pages.edit', compact('page', 'equipaments','segments'));
    }

    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'required|string|max:255|unique:pages,slug,' . $page->id,
            'content'       => 'required|string',
            'equipment_id'  => 'nullable|string|max:255',
            'segments'      => 'nullable|array',
            'segments.*'    => 'exists:segments,id',
            'is_active'     => 'boolean',
            'condition'     => 'in:novo,usado',            
        ]);

        $page->update($request->only(['title', 'slug', 'content', 'equipament_id','is_active','condition']));

        if ($request->has('segments')) {
            $page->segments()->sync($request->segments);
        } else {
            $page->segments()->detach(); // remove todos se nenhum for enviado
        }

        return redirect()->route('admin.pages.index')
                        ->with('success', 'Página atualizada com sucesso!');
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
        $page->equipament = ( !empty( $request->input('equipament_id') ) ) 
                            ? Equipament::find($request->input('equipament_id'))->name
                            : '';

        $page->slide = $this->parseFilesBlock( $page->content,'SLIDES', 'image' );
        $page->introduction = $this->parseTextBlock( $page->content, 'INTRODUCAO' );
        $page->description = $this->parseTextBlock( $page->content, 'DESCRICAO');
        $page->pdf = $this->parseFilesBlock( $page->content,'PDF', 'pdf' );
        $page->video = $this->parseFilesBlock( $page->content,'VIDEO', 'video' );

        $segmentsIds = $request->input('segments', []);
                
        $page->segments = (!empty($segmentsIds)) 
            ? Segment::whereIn('id', $segmentsIds)
                    ->orderBy('description')
                    ->get() 
            : collect();

        Log::info($page->pdf);

        return view('admin.pages.preview', compact('page'));     
    }

    private function parseTextBlock($content, $block)
    {
        $pattern = '/\[BLOCO:' . preg_quote($block, '/') . '\](.*?)\[\/BLOCO:' . preg_quote($block, '/') . '\]/is';
        
        preg_match( $pattern, $content, $matches);

        if (empty($matches[1])) return '';

        $text = $matches[1];

        // Remove a linha de comentário
        $text = preg_replace('/<!--.*?-->/s', '', $text);

        // Remove linhas em branco extras no início e fim
        $text = trim($text);

        return $text;        
    }

    private function parseFilesBlock($content, $block, $typeFile )
    {
        $pattern = '/\[BLOCO:' . preg_quote(trim($block), '/') . '\](.*?)\[\/BLOCO:' . preg_quote(trim($block), '/') . '\]/is';    

        preg_match($pattern, $content, $matches);
        
        $slidesBlock = $matches[1];

        if( $typeFile == "image")
            preg_match_all('/\[IMAGEM\]\s*(.+?)(?=\n|\[|$)/is', $slidesBlock, $matches);

        if( $typeFile == "video")
            preg_match_all('/\[VIDEO\]\s*(.+?)(?=\n|\[|$)/is', $slidesBlock, $matches);

        if( $typeFile == "pdf")
            preg_match_all('/\[PDF\]\s*(.+?)(?=\n|\[|$)/is', $slidesBlock, $matches);
        
        $fileNames = array_map('trim', $matches[1]);

        // Busca as imagens no banco
        $uploads = Upload::whereIn('generated_name', $fileNames)
                     ->where('type', $typeFile)
                     ->get()
                     ->keyBy('generated_name');

        $filesUrls = [];

        foreach( $fileNames as $name ){
            if ($upload = $uploads->get($name)) {
                $filesUrls[] = asset('storage/' . $upload->path);
            } else {
                // Imagem não encontrada → placeholder
                $filesUrls[] = 'https://placehold.in/300x200@2x.png/dark';
            }
        }
        
        return $filesUrls;
    }

    public function dashboard()
    {
        $totalPages      = Page::count();
        $totalEquipaments = Equipament::count();
        $totalSegments   = Segment::count();

        // Contagem via Model Upload (novo sistema)
        $totalImages = Upload::where('type', 'image')->count();
        $totalVideos = Upload::where('type', 'video')->count();
        $totalPdfs   = Upload::where('type', 'pdf')->count();

        return view('admin.dashboard', compact(
            'totalPages',
            'totalImages',
            'totalVideos',
            'totalPdfs',
            'totalEquipaments',
            'totalSegments'
        ));
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