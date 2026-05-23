<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'IMAH Indústria de Máquinas - soluções industriais para serigrafia, impressão e aplicações técnicas.')">
    <meta property="og:title" content="@yield('title', 'IMAH Indústria de Máquinas')">
    <meta property="og:description" content="@yield('meta_description', 'Soluções industriais robustas, precisas e feitas para durar.')">
    <meta property="og:image" content="@yield('og_image', asset('img/logo-imah02.png'))">
    <meta property="og:type" content="website">
    <title>@yield('title', 'IMAH Indústria de Máquinas')</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/imah-design.css') }}" rel="stylesheet">
</head>
<body class="@yield('body_class', '')">
    <header class="site-header">
        <a class="brand" href="{{ url('/') }}" aria-label="Ir para a página inicial">
            <img src="{{ asset('img/logo-imah02.svg') }}" alt="IMAH Indústria de Máquinas">
        </a>
        <button class="menu-toggle" type="button" aria-label="Abrir menu" aria-controls="main-menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
        <nav class="main-nav" id="main-menu" aria-label="Navegação principal">
            <a href="{{ url('/solucoes-e-equipamentos') }}">Soluções</a>
            <a href="{{ url('/solucoes-e-equipamentos') }}">Equipamentos</a>
            <a href="{{ url('/seminovos') }}">Seminovos</a>
            <a href="{{ url('/projetos-especiais') }}">Projetos Especiais</a>
            <a href="{{ url('/sobre') }}">A Imah</a>
        </nav>
        <a class="btn-imah btn-imah--primary quote-link" href="{{ url('/contato') }}">Orçamento <span aria-hidden="true">↗</span></a>
    </header>

    <main>
        @yield('content')
    </main>

    @include('partials.marketing.footer')

    <a class="whatsapp-float" href="https://wa.me/554135576008" target="_blank" rel="noopener" aria-label="Falar com a IMAH pelo WhatsApp">
        <img src="{{ asset('img/whatsapp.svg') }}" alt="">
    </a>
    <button class="back-top" type="button" aria-label="Voltar ao topo">↑</button>
    <aside class="cookie-notice" data-cookie-notice hidden>
        <p>Usamos cookies para melhorar sua experiência e manter recursos essenciais do site.</p>
        <div>
            <a href="{{ url('/politica-de-cookies') }}">Configurar</a>
            <button type="button" data-cookie-accept>Aceitar</button>
        </div>
    </aside>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        const toggle = document.querySelector('.menu-toggle');
        const nav = document.querySelector('.main-nav');
        if (toggle && nav) {
            toggle.addEventListener('click', () => {
                const isOpen = nav.classList.toggle('is-open');
                toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            });
        }

        const backTop = document.querySelector('.back-top');
        if (backTop) {
            window.addEventListener('scroll', () => {
                backTop.classList.toggle('is-visible', window.scrollY > 500);
            }, { passive: true });
            backTop.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
        }

        document.querySelectorAll('[data-scroll-controls]').forEach((controls) => {
            const scroller = document.querySelector(controls.dataset.scrollControls);
            if (!scroller) return;

            controls.addEventListener('click', (event) => {
                const button = event.target.closest('[data-scroll-direction]');
                if (!button) return;

                const direction = button.dataset.scrollDirection === 'prev' ? -1 : 1;
                const card = scroller.firstElementChild;
                const fallback = scroller.clientWidth * .8;
                const distance = card ? card.getBoundingClientRect().width + 18 : fallback;
                scroller.scrollBy({ left: direction * distance, behavior: 'smooth' });
            });
        });

        const counters = document.querySelectorAll('[data-count-to]');
        const countObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting || entry.target.dataset.counted) return;
                entry.target.dataset.counted = 'true';
                const target = Number(entry.target.dataset.countTo);
                const prefix = entry.target.dataset.prefix || '';
                const suffix = entry.target.dataset.suffix || '';
                const format = entry.target.dataset.format || 'plain';
                const duration = window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 1 : 1400;
                const start = performance.now();
                const render = (now) => {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    const value = Math.round(target * eased);
                    entry.target.textContent = `${prefix}${format === 'thousands' ? value.toLocaleString('pt-BR') : value}${suffix}`;
                    if (progress < 1) requestAnimationFrame(render);
                };
                requestAnimationFrame(render);
            });
        }, { threshold: 0.35 });
        counters.forEach((counter) => countObserver.observe(counter));

        const cookieNotice = document.querySelector('[data-cookie-notice]');
        const cookieAccept = document.querySelector('[data-cookie-accept]');
        if (cookieNotice && !localStorage.getItem('imah_cookie_notice_ok')) {
            cookieNotice.hidden = false;
        }
        if (cookieAccept) {
            cookieAccept.addEventListener('click', () => {
                localStorage.setItem('imah_cookie_notice_ok', 'true');
                cookieNotice.hidden = true;
            });
        }
    </script>
    @yield('scripts')
</body>
</html>
