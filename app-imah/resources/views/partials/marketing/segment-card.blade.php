<a class="segment-card" href="{{ $href ?? url('/solucoes-e-equipamentos') }}" @isset($image) style="--segment-image: url('{{ $image }}')" @endisset>
    <img src="{{ $icon }}" alt="" loading="lazy">
    <h3>{{ $title }}</h3>
    <span>Ver máquinas</span>
</a>
