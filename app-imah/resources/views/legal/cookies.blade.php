@extends('layouts.marketing')

@section('title', 'Politica de Cookies - IMAH')
@section('meta_description', 'Politica de cookies da IMAH Industria de Maquinas.')

@section('content')
    @include('partials.marketing.legal-content', [
        'title' => 'Politica de Cookies',
        'intro' => 'Esta pagina modelo apresenta como cookies e tecnologias semelhantes podem ser usados para funcionamento, medicao e melhoria da experiencia.',
        'sections' => [
            ['title' => 'Cookies essenciais', 'body' => 'Sao usados para manter recursos basicos do site, como navegacao, seguranca e preferencias necessarias ao funcionamento.'],
            ['title' => 'Cookies de analise', 'body' => 'Podem ajudar a entender paginas acessadas e desempenho do site. A ativacao real dependera da configuracao final do backend.'],
            ['title' => 'Gerenciamento', 'body' => 'O usuario pode aceitar o aviso de cookies ou ajustar permissoes pelo navegador. Futuramente esta pagina pode receber controles granulares.'],
        ],
    ])
@endsection
