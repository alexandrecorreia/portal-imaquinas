@extends('layouts.marketing')

@section('title', 'Termos de Uso - IMAH')
@section('meta_description', 'Termos de uso do site da IMAH Industria de Maquinas.')

@section('content')
    @include('partials.marketing.legal-content', [
        'title' => 'Termos de Uso',
        'intro' => 'Esta pagina modelo define condicoes gerais de uso do site institucional e catalogo estatico da IMAH.',
        'sections' => [
            ['title' => 'Uso das informacoes', 'body' => 'Conteudos, imagens e especificacoes publicados no site tem finalidade informativa e podem ser ajustados sem aviso previo.'],
            ['title' => 'Orcamentos e disponibilidade', 'body' => 'Produtos, projetos especiais e seminovos dependem de confirmacao comercial, tecnica e disponibilidade no momento da consulta.'],
            ['title' => 'Propriedade intelectual', 'body' => 'Marcas, textos, imagens e materiais da IMAH devem ser usados apenas mediante autorizacao ou conforme permitido pela legislacao aplicavel.'],
        ],
    ])
@endsection
