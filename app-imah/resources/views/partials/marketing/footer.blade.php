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
            <a href="{{ url('/equipamentos') }}">Acessórios</a>
            <a href="{{ url('/equipamentos') }}">Impressoras</a>
            <a href="{{ url('/equipamentos') }}">Envernizadoras</a>
            <a href="{{ url('/equipamentos') }}">Laboratórios</a>
            <a href="{{ url('/equipamentos') }}">Laminadoras</a>
            <a href="{{ url('/equipamentos') }}">Secagem</a>
            <a class="footer-more" href="{{ url('/equipamentos') }}">Ver todos</a>
        </section>
        <section>
            <h2>Segmentos</h2>
            <a href="#">Gráfico</a>
            <a href="#">Vidro</a>
            <a href="#">Transfer e decalque</a>
            <a href="#">Brindes</a>
            <a href="#">Indústria</a>
            <a href="#">Calçadista</a>
            <a href="#">Têxtil</a>
            <a class="footer-more" href="#">Ver todos</a>
        </section>
        <section>
            <h2>Mapa do site</h2>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/equipamentos') }}">Soluções</a>
            <a href="{{ url('/equipamentos') }}">Equipamentos</a>
            <a href="#">Máquinas Usadas</a>
            <a href="#">Projetos Especiais</a>
            <a href="{{ url('/') }}#sobre">A Imah</a>
            <a href="{{ url('/contato') }}">Orçamento</a>
        </section>
    </div>
    <div class="footer-bottom">
        <a href="mailto:imah@imah.com.br">imah@imah.com.br</a>
        <a href="https://wa.me/554135576008" target="_blank" rel="noopener">+55 (41) 3557-6008</a>
    </div>
</footer>
