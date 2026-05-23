@extends('layouts.marketing')

@section('title', 'Política de Privacidade - IMAH')
@section('meta_description', 'Política de privacidade da IMAH Indústria de Máquinas.')

@section('content')
    @include('partials.marketing.legal-content', [
        'title' => 'Política de Privacidade',
        'intro' => 'Esta página modelo resume como a IMAH pode tratar dados pessoais em canais digitais, formulários e atendimentos comerciais.',
        'sections' => [
            ['title' => 'Dados coletados', 'body' => 'Podemos receber nome, empresa, telefone, e-mail e informações sobre necessidades técnicas enviadas voluntariamente em formulários ou canais de contato.'],
            ['title' => 'Finalidade', 'body' => 'Os dados são usados para responder solicitações, preparar orçamentos, apoiar atendimento comercial e melhorar nossos canais digitais.'],
            ['title' => 'Compartilhamento', 'body' => 'Informações podem ser compartilhadas com prestadores essenciais ao atendimento, sempre observando finalidades legítimas e medidas de proteção.'],
            ['title' => 'Direitos do titular', 'body' => 'O usuário pode solicitar acesso, correção ou exclusão de dados pessoais pelos canais de contato informados no site.'],
        ],
    ])
@endsection
