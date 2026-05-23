@extends('layouts.marketing')

@section('title', 'Politica de Privacidade - IMAH')
@section('meta_description', 'Politica de privacidade da IMAH Industria de Maquinas.')

@section('content')
    @include('partials.marketing.legal-content', [
        'title' => 'Politica de Privacidade',
        'intro' => 'Esta pagina modelo resume como a IMAH pode tratar dados pessoais em canais digitais, formularios e atendimentos comerciais.',
        'sections' => [
            ['title' => 'Dados coletados', 'body' => 'Podemos receber nome, empresa, telefone, e-mail e informacoes sobre necessidades tecnicas enviadas voluntariamente em formularios ou canais de contato.'],
            ['title' => 'Finalidade', 'body' => 'Os dados sao usados para responder solicitacoes, preparar orcamentos, apoiar atendimento comercial e melhorar nossos canais digitais.'],
            ['title' => 'Compartilhamento', 'body' => 'Informacoes podem ser compartilhadas com prestadores essenciais ao atendimento, sempre observando finalidades legitimas e medidas de protecao.'],
            ['title' => 'Direitos do titular', 'body' => 'O usuario pode solicitar acesso, correcao ou exclusao de dados pessoais pelos canais de contato informados no site.'],
        ],
    ])
@endsection
