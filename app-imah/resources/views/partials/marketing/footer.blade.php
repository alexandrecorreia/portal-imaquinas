<footer class="site-footer">
    <div class="footer-grid">
        <section class="footer-brand">
            <img src="{{ asset('img/logo-imah-white01.svg') }}" alt="IMAH Indústria de Máquinas">
            <address>Av. Professor Alberto Piekarz, 1937 - Colônia Vila Prado, Almirante Tamandaré - PR, CEP 83504-595, Brasil</address>
            <div class="social-links" aria-label="Redes sociais">
                <a href="https://www.facebook.com/IMAHOficial" target="_blank" rel="noopener" aria-label="Facebook">f</a>
                <a href="https://www.instagram.com/imah_oficial/" target="_blank" rel="noopener" aria-label="Instagram">ig</a>
                <a href="https://www.linkedin.com/company/imah-oficial/" target="_blank" rel="noopener" aria-label="LinkedIn">in</a>
                <a href="https://www.youtube.com/@IMAHOfficial" target="_blank" rel="noopener" aria-label="YouTube">yt</a>
            </div>
        </section>
        <section>
            <h2>Equipamentos</h2>
            <a href="{{ url('/solucoes-e-equipamentos') }}">Acessórios</a>
            <a href="{{ url('/solucoes-e-equipamentos') }}">Impressoras</a>
            <a href="{{ url('/solucoes-e-equipamentos') }}">Envernizadoras</a>
            <a href="{{ url('/solucoes-e-equipamentos') }}">Laboratórios</a>
            <a href="{{ url('/solucoes-e-equipamentos') }}">Laminadoras</a>
            <a href="{{ url('/solucoes-e-equipamentos') }}">Secagem</a>
            <a class="footer-more" href="{{ url('/solucoes-e-equipamentos') }}">Ver todos</a>
        </section>
        <section>
            <h2>Segmentos</h2>
            <a href="{{ url('/solucoes-e-equipamentos?segmento=grafico') }}">Gráfico</a>
            <a href="{{ url('/solucoes-e-equipamentos?segmento=vidro') }}">Vidro</a>
            <a href="{{ url('/solucoes-e-equipamentos?segmento=transfer') }}">Transfer e decalque</a>
            <a href="{{ url('/solucoes-e-equipamentos?segmento=brindes') }}">Brindes</a>
            <a href="{{ url('/solucoes-e-equipamentos?segmento=industria') }}">Indústria</a>
            <a href="{{ url('/solucoes-e-equipamentos?segmento=calcadista') }}">Calçadista</a>
            <a href="{{ url('/solucoes-e-equipamentos?segmento=textil') }}">Têxtil</a>
            <a class="footer-more" href="{{ url('/solucoes-e-equipamentos') }}">Ver todos</a>
        </section>
        <section>
            <h2>Mapa do site</h2>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/solucoes-e-equipamentos') }}">Soluções</a>
            <a href="{{ url('/solucoes-e-equipamentos') }}">Equipamentos</a>
            <a href="{{ url('/seminovos') }}">Seminovos</a>
            <a href="{{ url('/projetos-especiais') }}">Projetos Especiais</a>
            <a href="{{ url('/sobre') }}">A Imah</a>
            <a href="{{ url('/contato') }}">Orçamento</a>
        </section>
    </div>
    <div class="footer-bottom">
        <span>IMAH Indústria de Máquinas © 2026 - Todos os direitos reservados</span>
        <nav aria-label="Links legais">
            <a href="{{ url('/politica-de-privacidade') }}">Política de Privacidade</a>
            <a href="{{ url('/politica-de-cookies') }}">Política de Cookies</a>
            <a href="{{ url('/termos-de-uso') }}">Termos de Uso</a>
        </nav>
        <a href="https://wa.me/554135576008" target="_blank" rel="noopener">+55 (41) 3557-6008</a>
    </div>
</footer>
