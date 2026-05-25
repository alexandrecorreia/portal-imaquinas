@extends('layouts.marketing')

@section('title', 'Política de Cookies - IMAH')
@section('meta_description', 'Política de cookies da IMAH Indústria de Máquinas.')

@section('content')
    @include('partials.marketing.legal-content', [
        'title' => 'Política de Cookies',
        'intro' => 'Esta página modelo apresenta como cookies e tecnologias semelhantes podem ser usados para funcionamento, medição e melhoria da experiência.',
        'sections' => [
            ['title' => 'Cookies essenciais', 'body' => 'São usados para manter recursos básicos do site, como navegação, segurança e preferências necessárias ao funcionamento.'],
            ['title' => 'Cookies de análise', 'body' => 'Podem ajudar a entender páginas acessadas e desempenho do site. A ativação real dependerá da configuração final do backend.'],
            ['title' => 'Gerenciamento', 'body' => 'O usuário pode aceitar o aviso de cookies ou ajustar permissões pelo navegador. Futuramente esta página pode receber controles granulares.'],
        ],
    ])
@endsection
