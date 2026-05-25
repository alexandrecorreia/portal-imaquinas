<section class="legal-page">
    <div class="container">
        <p class="legal-kicker">IMAH Indústria de Máquinas</p>
        <h1>{{ $title }}</h1>
        <p class="legal-intro">{{ $intro }}</p>

        <div class="legal-blocks">
            @foreach ($sections as $section)
                <article>
                    <h2>{{ $section['title'] }}</h2>
                    <p>{{ $section['body'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
