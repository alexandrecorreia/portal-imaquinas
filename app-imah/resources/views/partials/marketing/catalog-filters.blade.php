<form class="catalog-filters" action="{{ $action ?? url('/solucoes-e-equipamentos') }}" method="get" aria-label="Filtros de catálogo">
    <label>
        <span>Qual seu segmento?</span>
        <select name="segmento">
            <option value="">Qual seu segmento?</option>
            <option value="grafico">Gráfico & Promocional</option>
            <option value="textil">Têxtil & Calçados</option>
            <option value="vidro">Vidros & Automotivo</option>
            <option value="industria">Indústria & Técnico</option>
        </select>
    </label>
    <label>
        <span>O que você produz?</span>
        <select name="aplicacao">
            <option value="">O que você produz?</option>
            <option value="brindes">Brindes</option>
            <option value="teclados">Teclados de membrana</option>
            <option value="calçados">Calçados</option>
            <option value="placas">Placas técnicas</option>
        </select>
    </label>
    <label>
        <span>Tipo de Equipamento</span>
        <select name="tipo">
            <option value="">Tipo de Equipamento</option>
            <option value="impressora">Impressora</option>
            <option value="envernizadora">Envernizadora</option>
            <option value="secagem">Secagem</option>
            <option value="acessorio">Acessório</option>
        </select>
    </label>
</form>
