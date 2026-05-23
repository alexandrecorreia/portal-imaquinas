@extends('layouts.marketing')

@section('title', 'Seminovos - IMAH')
@section('meta_description', 'Equipamentos seminovos IMAH revisados e prontos para operacao.')

@php
    $catalogProducts = array_fill(0, 16, [
        'title' => 'impressora INDEC CM',
        'image' => asset('img/produtos-relacionados01.png'),
        'code' => 'NT10-105',
        'href' => url('/seminovos/produto'),
        'description' => 'Equipamento revisado, com disponibilidade imediata e excelente custo-beneficio para producao industrial.',
    ]);
@endphp

@section('content')
    <section class="catalog-page">
        <div class="catalog-hero container">
            <h1>Seminovos</h1>
            <p>A robustez IMAH que voce ja conhece, com disponibilidade imediata e excelente custo-beneficio. Equipamentos revisados e prontos para operar.</p>
            @include('partials.marketing.catalog-filters', ['action' => url('/seminovos')])
        </div>

        @include('partials.marketing.catalog-grid', ['catalogProducts' => $catalogProducts])

        <button class="load-more" type="button">Carregar mais <span aria-hidden="true">↗</span></button>
    </section>

    @include('partials.marketing.cta')
@endsection
