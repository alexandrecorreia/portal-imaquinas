<article class="machine-card">
    <a href="{{ $href ?? url('/produto') }}" aria-label="Ver {{ $title ?? 'produto IMAH' }}">
        <img src="{{ $image ?? asset('img/produtos-relacionados01.png') }}" alt="{{ $title ?? 'Produto IMAH' }}" loading="lazy">
        <span>{{ $code ?? 'NTHO-105' }}</span>
        <h3>{{ $title ?? 'Impressora INDEC CM' }}</h3>
        <p>{{ $description ?? 'Desenvolvida especificamente para a impressão serigráfica de alta qualidade onde os controles do processo devem ser monitorados.' }}</p>
    </a>
</article>
