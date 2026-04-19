@php
    $defaults = \App\Models\SobreNos::defaults();
    $galeria = $sobreNos->galeriaParaExibicao();
    $titulo = $sobreNos->titulo ?: $defaults['titulo'];
    $descricaoBase = preg_replace('/\s+/u', ' ', trim(strip_tags($sobreNos->descricao ?: $defaults['descricao'])));
@endphp

<section class="sobre-home-destaque">
    <div class="container">
        <div class="sobre-home-shell">
            <div class="row align-items-stretch">
                <div class="col-lg-6 mb-5 mb-lg-0 d-flex flex-column">
                    <span class="sobre-home-kicker">SOBRE NÓS</span>
                    <h2 class="sobre-home-titulo">{{ $titulo }}</h2>

                    <p class="sobre-home-texto">
                        {!!  \Illuminate\Support\Str::limit($descricaoBase, 360) !!}
                    </p>

                    @if(!empty($sobreNos->selo))
                        <div class="sobre-home-selo-inline">
                            {!! nl2br(e($sobreNos->selo)) !!}
                        </div>
                    @endif

                    <div class="sobre-home-actions">
                        <a href="{{ route('sobre-nos') }}" class="btn sobre-home-btn">
                           Ver mais
                            <i class="fa fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 d-flex">
                    <div class="sobre-home-visual">
                        <div id="sobreHomeCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
                            @if($galeria->count() > 1)
                                <ol class="carousel-indicators sobre-home-indicadores">
                                    @foreach($galeria as $index => $slide)
                                        <li data-target="#sobreHomeCarousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                            @endif

                            <div class="carousel-inner sobre-home-carousel-inner">
                                @foreach($galeria as $index => $slide)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <div class="sobre-home-imagem-wrap">
                                            <img src="{{ $slide->src }}" alt="{{ $slide->alt }}" class="d-block w-100 sobre-home-imagem">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if($galeria->count() > 1)
                                <a class="carousel-control-prev sobre-home-control" href="#sobreHomeCarousel" role="button" data-slide="prev">
                                    <span aria-hidden="true">‹</span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                                <a class="carousel-control-next sobre-home-control" href="#sobreHomeCarousel" role="button" data-slide="next">
                                    <span aria-hidden="true">›</span>
                                    <span class="sr-only">Próxima</span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .sobre-home-destaque {
        position: relative;
        padding: 72px 0;
        overflow: hidden;
    /*    background:*/
    /*        radial-gradient(circle at top left, rgba(226, 78, 20, 0.10), transparent 34%),*/
    /*        linear-gradient(135deg, #fbf7ef 0%, #ffffff 52%, #f3f5ea 100%);*/
    /*}*/

    .sobre-home-shell {
        position: relative;
        padding: 48px 42px;
        border-radius: 32px;
        border: 1px solid rgba(105, 123, 43, 0.12);
        background: rgba(255, 255, 255, 0.88);
        box-shadow: 0 24px 60px rgba(76, 88, 28, 0.14);
    }

    .sobre-home-kicker {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 18px;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.24em;
        color: #697b2b;
    }

    .sobre-home-kicker::before {
        content: "";
        width: 44px;
        height: 1px;
        background: rgba(105, 123, 43, 0.5);
    }

    .sobre-home-titulo {
        max-width: 540px;
        margin-bottom: 20px;
        font-size: 2.75rem;
        line-height: 1.1;
        font-weight: 700;
        color: #2e3413;
    }

    .sobre-home-texto {
        max-width: 520px;
        margin-bottom: 30px;
        font-size: 1rem;
        line-height: 1.85;
        color: #54603a;
    }

    .sobre-home-selo-inline {
        display: inline-flex;
        align-items: center;
        align-self: flex-start;
        margin-bottom: 22px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(226, 78, 20, 0.10);
        color: #e24e14;
        font-size: 0.76rem;
        font-weight: 700;
        letter-spacing: 0.1em;
        text-transform: uppercase;
    }

    .sobre-home-actions {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 16px;
        margin-top: auto;
    }

    .sobre-home-btn {
        padding: 14px 28px;
        border-radius: 999px;
        background: linear-gradient(135deg, #697b2b 0%, #809336 100%);
        color: #fff;
        font-weight: 600;
        box-shadow: 0 14px 24px rgba(105, 123, 43, 0.25);
    }

    .sobre-home-btn:hover,
    .sobre-home-btn:focus {
        color: #fff;
        background: linear-gradient(135deg, #5d6f24 0%, #697b2b 100%);
    }

    .sobre-home-visual {
        position: relative;
        width: 100%;
        min-height: 100%;
        padding: 0;
        overflow: hidden;
        border-radius: 32px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.95) 0%, rgba(245, 247, 238, 0.94) 100%);
        box-shadow: inset 0 0 0 1px rgba(105, 123, 43, 0.10);
    }

    #sobreHomeCarousel,
    #sobreHomeCarousel .carousel-inner,
    #sobreHomeCarousel .carousel-item {
        height: 100%;
    }

    .sobre-home-carousel-inner {
        overflow: hidden;
        height: 100%;
    }

    .sobre-home-imagem-wrap {
        height: 100%;
        min-height: 100%;
        background: #e9ece0;
    }

    .sobre-home-imagem {
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .sobre-home-indicadores {
        right: auto;
        bottom: 20px;
        left: 22px;
        justify-content: flex-start;
        margin: 0;
    }

    .sobre-home-indicadores li {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: none;
        background: rgba(255, 255, 255, 0.55);
    }

    .sobre-home-indicadores .active {
        background: #e24e14;
    }

    .sobre-home-control {
        top: auto;
        bottom: 20px;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.92);
        color: #344019;
        opacity: 1;
        box-shadow: 0 10px 18px rgba(0, 0, 0, 0.12);
    }

    .sobre-home-control span {
        font-size: 1.7rem;
        line-height: 1;
    }

    .sobre-home-control.carousel-control-prev {
        left: auto;
        right: 72px;
    }

    .sobre-home-control.carousel-control-next {
        right: 22px;
    }

    @media (max-width: 1199.98px) {
        .sobre-home-titulo {
            font-size: 2.35rem;
        }

        .sobre-home-shell {
            padding: 40px 32px;
        }
    }

    @media (max-width: 991.98px) {
        .sobre-home-destaque {
            padding: 56px 0;
        }

        .sobre-home-shell {
            padding: 34px 24px;
            border-radius: 26px;
        }

        .sobre-home-visual {
            min-height: 420px;
        }
    }

    @media (max-width: 767.98px) {
        .sobre-home-titulo {
            font-size: 2rem;
        }

        .sobre-home-texto {
            font-size: 0.96rem;
        }

        .sobre-home-selo-inline {
            margin-bottom: 20px;
            font-size: 0.76rem;
        }

        .sobre-home-visual {
            min-height: 320px;
        }

        .sobre-home-control.carousel-control-prev {
            right: 62px;
        }

        .sobre-home-control {
            width: 40px;
            height: 40px;
        }
    }
</style>
