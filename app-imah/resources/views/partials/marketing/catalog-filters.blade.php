<form class="catalog-filters" action="{{ $action ?? url('/solucoes-e-equipamentos') }}" method="get" aria-label="Filtros de catalogo">
    <label>
        <span>Qual seu segmento?</span>
        <select name="segmento">
            <option value="">Qual seu segmento?</option>
            <option value="grafico">Grafico & Promocional</option>
            <option value="textil">Textil & Calcados</option>
            <option value="vidro">Vidros & Automotivo</option>
            <option value="industria">Industria & Tecnico</option>
        </select>
    </label>
    <label>
        <span>O que voce produz?</span>
        <select name="aplicacao">
            <option value="">O que voce produz?</option>
            <option value="brindes">Brindes</option>
            <option value="teclados">Teclados de membrana</option>
            <option value="calçados">Calcados</option>
            <option value="placas">Placas tecnicas</option>
        </select>
    </label>
    <label>
        <span>Tipo de Equipamento</span>
        <select name="tipo">
            <option value="">Tipo de Equipamento</option>
            <option value="impressora">Impressora</option>
            <option value="envernizadora">Envernizadora</option>
            <option value="secagem">Secagem</option>
            <option value="acessorio">Acessorio</option>
        </select>
    </label>
</form>
