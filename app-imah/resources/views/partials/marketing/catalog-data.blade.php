@php
    $catalogProducts = $catalogProducts ?? array_fill(0, 16, [
        'title' => 'impressora INDEC CM',
        'image' => asset('img/produtos-relacionados01.png'),
        'code' => 'NT10-105',
        'href' => url('/produto'),
        'description' => 'Desenvolvida especificamente para a impressao serigrafica de alta qualidade onde os controles do processo devem ser monitorados.',
    ]);
@endphp
