@extends('layouts.marketing')

@section('title', 'Termos de Uso - IMAH')
@section('meta_description', 'Termos de uso do site da IMAH Indústria de Máquinas.')

@section('content')
    @include('partials.marketing.legal-content', [
        'title' => 'Termos de Uso',
        'intro' => 'Esta página modelo define condições gerais de uso do site institucional e catálogo estático da IMAH.',
        'sections' => [
            ['title' => 'Uso das informações', 'body' => 'Conteúdos, imagens e especificações publicados no site têm finalidade informativa e podem ser ajustados sem aviso prévio.'],
            ['title' => 'Orçamentos e disponibilidade', 'body' => 'Produtos, projetos especiais e seminovos dependem de confirmação comercial, técnica e disponibilidade no momento da consulta.'],
            ['title' => 'Propriedade intelectual', 'body' => 'Marcas, textos, imagens e materiais da IMAH devem ser usados apenas mediante autorização ou conforme permitido pela legislação aplicável.'],
        ],
    ])
@endsection
