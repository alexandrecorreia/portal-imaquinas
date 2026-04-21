@extends('layouts.app')

@section('title', 'Contato - Indústria de Máquinas IMAH')

@section('content')
    <section class="contact-section">
        <div class="container">
            <h1>Fale Conosco</h1>
            <p class="section-subtitle">Preencha o formulário abaixo para tirar dúvidas, solicitar orçamentos ou enviar sugestões. Nossa equipe responderá o mais rápido possível.</p>

            <!-- Mensagem de sucesso -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif

            <!-- Mensagem de erro -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
            @endif

            <form class="contact-form" id="contactForm" action="{{ url('/submit-contact') }}" method="POST" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nome *</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required placeholder="Digite seu nome completo" value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email *</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required placeholder="Digite seu email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefone</label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" pattern="[0-9]{10,11}" placeholder="Ex.: (41) 99999-9999" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Assunto *</label>
                    <select class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" required>
                        <option value="" disabled {{ old('subject') ? '' : 'selected' }}>Selecione um assunto</option>
                        <option value="Dúvida" {{ old('subject') == 'Dúvida' ? 'selected' : '' }}>Dúvida</option>
                        <option value="Orçamento" {{ old('subject') == 'Orçamento' ? 'selected' : '' }}>Orçamento</option>
                        <option value="Suporte Técnico" {{ old('subject') == 'Suporte Técnico' ? 'selected' : '' }}>Suporte Técnico</option>
                        <option value="Outro" {{ old('subject') == 'Outro' ? 'selected' : '' }}>Outro</option>
                    </select>
                    @error('subject')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Mensagem *</label>
                    <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required placeholder="Escreva sua mensagem">{{ old('message') }}</textarea>
                    @error('message')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <!-- Campo h@neyp@t -->
                <div style="display: none;">
                    <label for="website">Deixe este campo vazio</label>
                    <input type="text" name="website" id="website" value="">
                </div>
                <button type="submit" class="btn btn-primary">Enviar Mensagem</button>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        // Validação do formulário
        const form = document.getElementById('contactForm');
        form.addEventListener('submit', (e) => {
            form.classList.add('was-validated');
        });

        // Limpando as mensagens
        document.addEventListener('DOMContentLoaded', () => {
            const alerts = document.querySelectorAll('.alert-danger, .alert-error, .alert-success');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.display = 'none';
                }, 3000);
            });
        });
    </script>
@endsection