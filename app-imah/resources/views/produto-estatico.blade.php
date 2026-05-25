@extends('layouts.marketing')

@section('title', 'Impressora INDEC CM - IMAH')
@section('meta_description', 'Impressora INDEC CM da IMAH: produtividade, precisão e repetibilidade para produção serigráfica industrial.')
@section('og_image', asset('img/prod-impressora-index-cm01.png'))

@php
    $heroImages = [
        ['src' => asset('img/prod-impressora-index-cm01.png'), 'alt' => 'Impressora INDEC CM'],
        ['src' => asset('img/prod-impressora-index-cm02.png'), 'alt' => 'Detalhe técnico da impressora INDEC CM'],
        ['src' => asset('img/worker.jpg'), 'alt' => 'Aplicação técnica em acabamento industrial'],
    ];
@endphp

@section('content')
    <section class="product-hero product-hero--carousel" aria-labelledby="product-title" data-product-carousel>
        <div class="hero-gallery hero-gallery--wide" aria-label="Galeria do produto">
            <div class="product-carousel-track" data-product-track>
                @foreach ($heroImages as $image)
                    <figure class="product-carousel-slide">
                        <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}">
                    </figure>
                @endforeach
            </div>
            <button class="hero-arrow hero-arrow--prev" type="button" aria-label="Imagem anterior" data-product-prev>‹</button>
            <button class="hero-arrow hero-arrow--next" type="button" aria-label="Próxima imagem" data-product-next>›</button>
            <button class="zoom-button" type="button" aria-label="Ampliar imagem" data-product-zoom>+</button>
        </div>

        <div class="hero-detail hero-detail--overlay">
            <article class="product-card product-card--floating">
                <div class="eyebrows">
                    <span>IMH CM</span>
                    <span>Tecn. Cadpress</span>
                </div>
                <p class="category">Impressora</p>
                <h1 id="product-title">INDEC CM</h1>
                <p>Foi desenvolvida para impressão serigráfica de alta qualidade, onde os controles do processo são monitorados com rigor absoluto. Sua estrutura robusta e estável garante resultados consistentes e repetíveis, atendendo aos mais exigentes padrões de qualidade com excelente produtividade.</p>
                <div class="hero-actions">
                    <a href="https://wa.me/554135576008?text=Olá,%20gostaria%20de%20saber%20mais%20sobre%20a%20Impressora%20INDEC%20CM" target="_blank" rel="noopener">Falar com um consultor <span aria-hidden="true">↗</span></a>
                    <a href="{{ url('/contato') }}">Comprar agora <span aria-hidden="true">↗</span></a>
                </div>
            </article>
        </div>
    </section>

    <dialog class="image-modal" data-product-modal aria-label="Imagem ampliada">
        <button type="button" data-product-modal-close aria-label="Fechar imagem ampliada">×</button>
        <img src="{{ $heroImages[0]['src'] }}" alt="{{ $heroImages[0]['alt'] }}" data-product-modal-image>
    </dialog>

    <nav class="anchor-nav container" aria-label="Seções do produto">
        <a href="#descricao">Descrição <span aria-hidden="true">↗</span></a>
        <a href="#diferenciais">Diferenciais <span aria-hidden="true">↗</span></a>
        <a href="#especificacoes">Especificações <span aria-hidden="true">↗</span></a>
    </nav>

    <section class="intro-band" id="descricao">
        <div class="container">
            <div class="intro-copy">
                <p>Com painel touch screen intuitivo, rodo flutuante e registro micrométrico absoluto, garante repetibilidade perfeita em toda produção. Sua estrutura robusta e acionamentos de alta eficiência entregam até 1.000 IPH com consumo mínimo de energia.</p>
                <a class="dark-button" href="{{ url('/downloads') }}">Baixar catálogo <span aria-hidden="true">↗</span></a>
            </div>

            <div class="applications-panel">
                <span class="panel-mark">+</span>
                <h2>Aplicações</h2>
                <p>Um equipamento confiável, com mais de 15 anos de vida útil e qualidade comprovada para aplicações técnicas exigentes.</p>
                <dl>
                    <div>
                        <dt>Tecl. Calçados & Transfers</dt>
                        <dd>Calçados, transfers sublimáticos e posicionamento preciso para etiquetas e tags.</dd>
                    </div>
                    <div>
                        <dt>Gráfica & Promocional</dt>
                        <dd>Adesivos, banners, posters, caixas de pizza, sacolas e placas de sinalização.</dd>
                    </div>
                    <div>
                        <dt>Eletrônica & Peças Técnicas</dt>
                        <dd>Circuitos impressos, placas fotovoltaicas, teclados de membrana e aplicações técnicas.</dd>
                    </div>
                    <div>
                        <dt>Vidro & Sublimação Rígida</dt>
                        <dd>Vidros temperados, painéis e chapas rígidas, com excelente uniformidade.</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="video-band video-band--product" aria-label="Vídeo do produto">
        <video
            class="product-video"
            poster="{{ asset('img/prod-impressora-index-cm02.png') }}"
            playsinline
            controls
            preload="none"
            data-product-video
            data-video-src="{{ asset('video/index_cm_2-optimized.mp4') }}"
        ></video>
        <button class="play-button" type="button" data-product-video-play>
            <span aria-hidden="true">▶</span> Assistir o Vídeo
        </button>
    </section>

    <section class="features-section" id="diferenciais">
        <div class="container">
            <h2>Diferenciais</h2>
            <div class="feature-grid">
                <article>
                    <img src="{{ asset('img/prod-impressora-index-cm04.png') }}" alt="Rodo flutuante da impressora">
                    <h3>Rodo Flutuante</h3>
                    <p>Assegura pressão uniforme em toda a área impressa, garantindo camada de tinta com espessura constante e qualidade superior.</p>
                </article>
                <article>
                    <img src="{{ asset('img/prod-impressora-index-cm05.png') }}" alt="Mesa de impressão com registro absoluto">
                    <h3>Registro Absoluto</h3>
                    <p>Ajuste micrométrico preciso nos eixos transversal, longitudinal e rotação, com folga mínima mesmo após anos de uso intenso.</p>
                </article>
                <article>
                    <img src="{{ asset('img/prod-impressora-index-cm06.png') }}" alt="Cabeçote móvel de precisão">
                    <h3>Cabeçote Móvel de Precisão</h3>
                    <p>Desliza sobre guias lineares de alta precisão, oferecendo repetibilidade perfeita durante toda a vida útil da máquina.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="specs-section" id="especificacoes">
        <div class="container">
            <h2>Especificações</h2>
            <details open>
                <summary>Especificações de Controle</summary>
                <ul>
                    <li>Sistema com rodo flutuante que garante pressão uniforme em toda a área impressa.</li>
                    <li>Pressão controlada por manômetros independentes, velocidade regulável eletronicamente e controle basculante.</li>
                    <li>Controle de produção por painel HMI touch screen com contagem, diagnóstico e ajuste fino de parâmetros.</li>
                </ul>
            </details>
            <details open>
                <summary>Ficha Técnica</summary>
                <ul>
                    <li>Área útil de impressão: 35 x 50 cm</li>
                    <li>Dimensões máximas do matriz: 50 x 70 cm</li>
                    <li>Altura máxima de impressão: 150 mm</li>
                    <li>Produtividade máxima: 1.000 IPH</li>
                    <li>Voltagem: 0,5 kW / 0,5 a 4,0 bar</li>
                    <li>Peso aproximado: 460 kg</li>
                </ul>
            </details>
            <details open>
                <summary>Opcionais</summary>
                <ul>
                    <li>Tira folhas automático</li>
                    <li>Pinça de registro retrátil</li>
                    <li>Tampo retro-iluminado em LED</li>
                    <li>Carenagem completa de proteção</li>
                </ul>
            </details>
        </div>
    </section>

    <section class="related-section">
        <div class="container">
            <div class="section-heading">
                <h2>Produtos <span>relacionados</span></h2>
                <div class="section-controls" aria-hidden="true">
                    <button type="button">‹</button>
                    <button type="button">›</button>
                </div>
            </div>
            <div class="related-grid">
                @foreach (['INDECORR INDEC CM', 'Impressora INDEC CM', 'Impressora INDEC CM', 'Impressora INDEC CM'] as $product)
                    @include('partials.marketing.product-card', [
                        'title' => $product,
                        'image' => asset('img/produtos-relacionados01.png'),
                        'code' => 'IMH CM',
                        'href' => url('/produto'),
                    ])
                @endforeach
            </div>
            <a class="all-products" href="{{ url('/solucoes-e-equipamentos') }}">Conheça todas as máquinas <span aria-hidden="true">↗</span></a>
        </div>
    </section>

    @include('partials.marketing.cta')
@endsection

@section('scripts')
    <script>
        (() => {
            const carousel = document.querySelector('[data-product-carousel]');
            if (!carousel) return;

            const track = carousel.querySelector('[data-product-track]');
            const modal = document.querySelector('[data-product-modal]');
            const modalImage = document.querySelector('[data-product-modal-image]');
            let isAnimating = false;

            const resetTrack = () => {
                track.classList.remove('is-sliding');
                track.style.transform = 'translateX(0)';
            };

            carousel.querySelector('[data-product-prev]').addEventListener('click', () => {
                if (isAnimating) return;
                isAnimating = true;
                track.classList.remove('is-sliding');
                track.insertBefore(track.lastElementChild, track.firstElementChild);
                track.style.transform = 'translateX(-50%)';
                requestAnimationFrame(() => {
                    track.classList.add('is-sliding');
                    track.style.transform = 'translateX(0)';
                });
            });

            carousel.querySelector('[data-product-next]').addEventListener('click', () => {
                if (isAnimating) return;
                isAnimating = true;
                track.classList.add('is-sliding');
                track.style.transform = 'translateX(-50%)';
            });

            track.addEventListener('transitionend', () => {
                if (track.style.transform === 'translateX(-50%)') {
                    track.appendChild(track.firstElementChild);
                }
                resetTrack();
                isAnimating = false;
            });

            carousel.querySelector('[data-product-zoom]').addEventListener('click', () => {
                const image = track.firstElementChild.querySelector('img');
                modalImage.src = image.src;
                modalImage.alt = image.alt;
                modal.showModal();
            });

            document.querySelector('[data-product-modal-close]').addEventListener('click', () => modal.close());
            modal.addEventListener('click', (event) => {
                if (event.target === modal) modal.close();
            });

            const productVideo = document.querySelector('[data-product-video]');
            const productVideoPlay = document.querySelector('[data-product-video-play]');
            const loadProductVideo = () => {
                if (!productVideo || productVideo.querySelector('source')) return;
                const source = document.createElement('source');
                source.src = productVideo.dataset.videoSrc;
                source.type = 'video/mp4';
                productVideo.appendChild(source);
                productVideo.load();
            };

            if (productVideo && productVideoPlay) {
                productVideoPlay.addEventListener('click', async () => {
                    loadProductVideo();
                    try {
                        await productVideo.play();
                        productVideoPlay.hidden = true;
                    } catch (error) {
                        productVideoPlay.hidden = false;
                    }
                });
            }
        })();
    </script>
@endsection
