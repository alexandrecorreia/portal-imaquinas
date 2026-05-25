@extends('layouts.marketing')

@section('title', 'Soluções e Equipamentos - IMAH')
@section('meta_description', 'Catálogo estático de soluções e equipamentos IMAH para aplicações industriais.')

@php
    $catalogProducts = array_fill(0, 16, [
        'title' => 'impressora INDEC CM',
        'image' => asset('img/produtos-relacionados01.png'),
        'code' => 'NT10-105',
        'href' => url('/produto'),
        'description' => 'Desenvolvida especificamente para a impressão serigráfica de alta qualidade onde os controles do processo devem ser monitorados.',
    ]);
@endphp

@section('content')
    <section class="catalog-page">
        <div class="catalog-hero container">
            <h1>Catálogo de Soluções & Equipamentos</h1>
            <p>De máquinas para chinelos à linhas de vidro automotivo. Utilize os filtros abaixo para buscar por aplicação ou categoria técnica.</p>
            @include('partials.marketing.catalog-filters', ['action' => url('/solucoes-e-equipamentos')])
        </div>

        @include('partials.marketing.catalog-grid', ['catalogProducts' => $catalogProducts])

        <button class="load-more" type="button">Carregar mais <span aria-hidden="true">↗</span></button>
    </section>

    @include('partials.marketing.cta')
@endsection
