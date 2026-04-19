@section('title', "Nossa História - ACMBV")
@extends('layouts.site.site')

@section('content')
@php
    $defaults = \App\Models\SobreNos::defaults();
    $galeria = $sobreNos->galeriaParaExibicao();
    $integrantes = $sobreNos->relationLoaded('integrantes') ? $sobreNos->integrantes : collect();
    $titulo = $sobreNos->titulo ?: $defaults['titulo'];
    $descricaoHtml = $sobreNos->descricao ?: $defaults['descricao'];
    $missao = $sobreNos->missao ?: $defaults['missao'];
    $visao = $sobreNos->visao ?: $defaults['visao'];
    $valores = $sobreNos->valores ?: $defaults['valores'];
@endphp

<section class="page-header"
    style="background: linear-gradient(rgba(40, 47, 16, 0.75), rgba(40, 47, 16, 0.75)),
           url('{{ asset('/site/img/bg-22.jpeg') }}') no-repeat center center;
           background-size: cover;
           min-height: 250px;
           display: flex;
           align-items: center;
           /* Técnica para forçar largura total e colar no topo */
           width: 100vw;
           position: relative;
           left: 50%;
           right: 50%;
           margin-left: -50vw;
           margin-right: -50vw;
            margin-top: -1.5rem !important;
           padding: 0;">

    <div class="container text-center">
        <h1 class="display-3 fw-bold text-white mb-3">Sobre nós</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center bg-transparent p-0 mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-white opacity-75 text-decoration-none">Início</a></li>
                <li class="breadcrumb-item active text-white fw-bold" aria-current="page">Sobre Nós</li>
            </ol>
        </nav>
    </div>
</section>

<section class="sobre-pagina-apresentacao py-5">
    <div class="container py-lg-4">
        <div class="sobre-pagina-shell">
            <div class="row align-items-stretch">
                <div class="col-lg-6 mb-5 mb-lg-0 d-flex">
                    <div class="sobre-pagina-galeria">
                        <div class="sobre-pagina-ornamento"></div>

                        @if(!empty($sobreNos->selo))
                            <div class="sobre-pagina-selo">
                                {!! nl2br(e($sobreNos->selo)) !!}
                            </div>
                        @endif

                        <div id="sobreNosCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
                            @if($galeria->count() > 1)
                                <ol class="carousel-indicators sobre-pagina-indicadores">
                                    @foreach($galeria as $index => $slide)
                                        <li data-target="#sobreNosCarousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                                    @endforeach
                                </ol>
                            @endif

                            <div class="carousel-inner sobre-pagina-carousel-inner">
                                @foreach($galeria as $index => $slide)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        <div class="sobre-pagina-imagem-wrap">
                                            <img src="{{ $slide->src }}" alt="{{ $slide->alt }}" class="d-block w-100 sobre-pagina-imagem">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @if($galeria->count() > 1)
                                <a class="carousel-control-prev sobre-pagina-control" href="#sobreNosCarousel" role="button" data-slide="prev" style="color: #334018">
                                    <span aria-hidden="true">‹</span>
                                    <span class="sr-only">Anterior</span>
                                </a>
                                <a class="carousel-control-next sobre-pagina-control" href="#sobreNosCarousel" role="button" data-slide="next" style="color: #334018">
                                    <span aria-hidden="true">›</span>
                                    <span class="sr-only">Próxima</span>
                                </a>
                            @endif
                        </div>


                    </div>
                </div>

                <div class="col-lg-6 pl-lg-5">
                    <span class="sobre-pagina-kicker">SOBRE NÓS</span>
                    <h2 class="sobre-pagina-titulo">{{ $titulo }}</h2>
                    <div class="sobre-pagina-texto">
                        {!! $descricaoHtml !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="sobre-pagina-pilares py-5">
    <div class="container py-lg-5">
        <div class="row">
            <div class="col-lg-4">
                <div class="sobre-pagina-pilar sobre-pagina-pilar-verde">
                    <div class="sobre-pagina-pilar-topo">
                        <span class="sobre-pagina-pilar-tag">Essência</span>
                    </div>
                    <div class="sobre-pagina-icon" style="background: rgba(105, 123, 43, 0.12);">
                        <i class="fa fa-leaf"></i>
                    </div>
                    <h3>Missão</h3>
                    <p>{{ $missao }}</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sobre-pagina-pilar sobre-pagina-pilar-laranja sobre-pagina-pilar-destaque">
                    <div class="sobre-pagina-pilar-topo">
                        <span class="sobre-pagina-pilar-tag">Direção</span>
                    </div>
                    <div class="sobre-pagina-icon" style="background: rgba(226, 78, 20, 0.12);">
                        <i class="fa fa-eye"></i>
                    </div>
                    <h3>Visão</h3>
                    <p>{{ $visao }}</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sobre-pagina-pilar sobre-pagina-pilar-verde">
                    <div class="sobre-pagina-pilar-topo">
                        <span class="sobre-pagina-pilar-tag">Base</span>
                    </div>
                    <div class="sobre-pagina-icon" style="background: rgba(105, 123, 43, 0.12);">
                        <i class="fa fa-users"></i>
                    </div>
                    <h3>Valores</h3>
                    <div class="sobre-pagina-valores">
                        {!! nl2br(e($valores)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($integrantes->isNotEmpty())
<section class="sobre-pagina-integrantes py-5">
    <div class="container py-lg-4">
        <div class="sobre-pagina-integrantes-topo text-center">
            <span class="sobre-pagina-integrantes-kicker">Integrantes</span>
            <h2 class="sobre-pagina-integrantes-titulo">Quem constrói essa história</h2>
        </div>

        <div class="row justify-content-center">
            @foreach($integrantes as $integrante)
                <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                    <article class="sobre-integrante-card w-100">
                        <div class="sobre-integrante-foto-wrap">
                            <div class="sobre-integrante-trama"></div>
                            <img src="{{ $integrante->fotoUrl() }}" alt="{{ $integrante->nome }}" class="sobre-integrante-foto">
                        </div>
                        <div class="sobre-integrante-conteudo">
                            <h3>{{ $integrante->nome }}</h3>
                            <p>{{ $integrante->cargo }}</p>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<style>
    /*.sobre-pagina-apresentacao {*/
    /*    background:*/
    /*        radial-gradient(circle at top left, rgba(226, 78, 20, 0.10), transparent 34%),*/
    /*        linear-gradient(135deg, #f9f6ee 0%, #ffffff 48%, #f2f5e8 100%);*/
    /*}*/

    .sobre-pagina-shell {
        position: relative;
        padding: 42px;
        border-radius: 32px;
        background: rgba(255, 255, 255, 0.90);
        border: 1px solid rgba(105, 123, 43, 0.12);
        box-shadow: 0 24px 58px rgba(70, 83, 29, 0.13);
    }

    .sobre-pagina-galeria {
        position: relative;
        width: 100%;
        min-height: 100%;
        padding: 20px;
        border-radius: 28px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.96) 0%, rgba(243, 246, 234, 0.94) 100%);
        box-shadow: inset 0 0 0 1px rgba(105, 123, 43, 0.10);
    }

    .sobre-pagina-ornamento {
        position: absolute;
        top: -16px;
        left: -16px;
        width: 110px;
        height: 110px;
        border-radius: 26px;
        background: linear-gradient(135deg, rgba(226, 78, 20, 0.92), rgba(242, 133, 35, 0.35));
    }

    .sobre-pagina-selo {
        position: absolute;
        top: 18px;
        right: 14px;
        z-index: 3;
        max-width: 180px;
        padding: 12px 18px;
        border-radius: 18px;
        background: #e24e14;
        color: #fff;
        font-size: 0.88rem;
        font-weight: 700;
        line-height: 1.35;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        box-shadow: 0 16px 28px rgba(226, 78, 20, 0.22);
    }

    #sobreNosCarousel,
    #sobreNosCarousel .carousel-inner,
    #sobreNosCarousel .carousel-item {
        height: 100%;
    }

    .sobre-pagina-carousel-inner {
        overflow: hidden;
        border-radius: 28px;
        height: 100%;
        box-shadow: 0 22px 42px rgba(32, 36, 15, 0.20);
    }

    .sobre-pagina-imagem-wrap {
        height: 100%;
        min-height: 500px;
        background: #ebeee2;
    }

    .sobre-pagina-imagem {
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .sobre-pagina-indicadores {
        right: auto;
        bottom: 18px;
        left: 24px;
        justify-content: flex-start;
        margin: 0;
    }

    .sobre-pagina-indicadores li {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        border: none;
        background: rgba(255, 255, 255, 0.6);
    }

    .sobre-pagina-indicadores .active {
        background: #e24e14;
    }

    .sobre-pagina-control {
        top: auto;
        bottom: 24px;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.92);
        color: #334018;
        opacity: 1;
        box-shadow: 0 10px 18px rgba(0, 0, 0, 0.12);
    }

    .sobre-pagina-control span {
        font-size: 1.9rem;
        line-height: 1;
    }

    .sobre-pagina-control.carousel-control-prev {
        left: auto;
        right: 80px;
    }

    .sobre-pagina-control.carousel-control-next {
        right: 22px;
    }

    .sobre-pagina-kicker {
        display: inline-flex;
        align-items: center;
        margin-bottom: 18px;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.24em;
        color: #697b2b;
    }

    .sobre-pagina-kicker::before {
        content: "";
        width: 44px;
        height: 1px;
        margin-right: 12px;
        background: rgba(105, 123, 43, 0.5);
    }

    .sobre-pagina-titulo {
        margin-bottom: 22px;
        font-size: 2.7rem;
        line-height: 1.1;
        font-weight: 700;
        color: #2f3514;
    }

    .sobre-pagina-texto,
    .sobre-pagina-texto p,
    .sobre-pagina-texto li {
        color: #54603a;
        font-size: 1rem;
        line-height: 1.9;
    }

    .sobre-pagina-texto p:last-child {
        margin-bottom: 0;
    }

    .sobre-pagina-pilares {
        position: relative;
        overflow: hidden;
        /*background:*/
        /*    radial-gradient(circle at top right, rgba(226, 78, 20, 0.08), transparent 28%),*/
        /*    linear-gradient(180deg, #f4f5f0 0%, #eef2e2 100%);*/
    }

    .sobre-pagina-pilar {
        position: relative;
        height: 100%;
        margin-bottom: 24px;
        padding: 28px 30px 34px;
        border-radius: 30px;
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.99) 0%, rgba(249, 250, 244, 0.98) 100%);
        box-shadow: 0 20px 38px rgba(68, 76, 33, 0.10);
        text-align: left;
        overflow: hidden;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .sobre-pagina-pilar::before {
        content: "";
        position: absolute;
        inset: 0;
        border-radius: 30px;
        border: 1px solid rgba(105, 123, 43, 0.10);
        pointer-events: none;
    }

    .sobre-pagina-pilar::after {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        width: 120px;
        height: 120px;
        background: radial-gradient(circle, rgba(226, 78, 20, 0.10) 0%, transparent 70%);
        pointer-events: none;
    }

    .sobre-pagina-pilar:hover {
        transform: translateY(-8px);
        box-shadow: 0 26px 46px rgba(68, 76, 33, 0.14);
    }

    .sobre-pagina-pilar-topo {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 18px;
    }

    .sobre-pagina-pilar-tag {
        display: inline-flex;
        align-items: center;
        padding: 7px 12px;
        border-radius: 999px;
        background: rgba(105, 123, 43, 0.08);
        color: #697b2b;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
    }

    .sobre-pagina-pilar-verde {
        border-top: 4px solid #697b2b;
    }

    .sobre-pagina-pilar-laranja {
        border-top: 4px solid #e24e14;
    }

    .sobre-pagina-pilar-laranja .sobre-pagina-pilar-tag {
        background: rgba(226, 78, 20, 0.10);
        color: #e24e14;
    }

    .sobre-pagina-pilar-destaque {
        background: linear-gradient(180deg, rgba(255, 255, 255, 0.99) 0%, rgba(255, 247, 241, 0.98) 100%);
    }

    .sobre-pagina-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 76px;
        height: 76px;
        margin-bottom: 22px;
        border-radius: 22px;
        font-size: 1.65rem;
        color: #697b2b;
        box-shadow: inset 0 0 0 1px rgba(105, 123, 43, 0.10);
    }

    .sobre-pagina-pilar-laranja .sobre-pagina-icon {
        color: #e24e14;
        box-shadow: inset 0 0 0 1px rgba(226, 78, 20, 0.12);
    }

    .sobre-pagina-pilar h3 {
        margin-bottom: 14px;
        font-size: 1.6rem;
        font-weight: 700;
        color: #2f3514;
        letter-spacing: -0.02em;
    }

    .sobre-pagina-pilar p,
    .sobre-pagina-valores {
        margin-bottom: 0;
        color: #63704b;
        font-size: 1rem;
        line-height: 1.9;
    }

    /*.sobre-pagina-integrantes {*/
    /*    background:*/
    /*        radial-gradient(circle at bottom left, rgba(105, 123, 43, 0.08), transparent 26%),*/
    /*        linear-gradient(180deg, #fffdf8 0%, #f5f2e8 100%);*/
    /*}*/

    .sobre-pagina-integrantes-topo {
        max-width: 620px;
        margin: 0 auto 42px;
    }

    .sobre-pagina-integrantes-kicker {
        display: inline-block;
        margin-bottom: 14px;
        padding: 8px 14px;
        border-radius: 999px;
        background: rgba(226, 78, 20, 0.10);
        color: #e24e14;
        font-size: 0.75rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .sobre-pagina-integrantes-titulo {
        font-size: 2.2rem;
        font-weight: 700;
        color: #2f3514;
    }

    .sobre-integrante-card {
        margin-bottom: 26px;
        padding: 18px 18px 24px;
        border-radius: 28px;
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 20px 34px rgba(66, 75, 30, 0.10);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .sobre-integrante-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 26px 42px rgba(66, 75, 30, 0.14);
    }

    .sobre-integrante-foto-wrap {
        position: relative;
        padding: 12px;
        border-radius: 24px;
        background: linear-gradient(135deg, rgba(105, 123, 43, 0.18), rgba(226, 78, 20, 0.12));
        overflow: hidden;
    }

    .sobre-integrante-trama {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(45deg, rgba(255, 255, 255, 0.16) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.16) 50%, rgba(255, 255, 255, 0.16) 75%, transparent 75%, transparent),
            linear-gradient(-45deg, rgba(105, 123, 43, 0.08) 25%, transparent 25%, transparent 50%, rgba(105, 123, 43, 0.08) 50%, rgba(105, 123, 43, 0.08) 75%, transparent 75%, transparent);
        background-size: 22px 22px;
        opacity: 0.55;
        pointer-events: none;
    }

    .sobre-integrante-foto {
        position: relative;
        width: 100%;
        height: 280px;
        border-radius: 18px;
        object-fit: cover;
        display: block;
        box-shadow: 0 14px 24px rgba(34, 39, 14, 0.16);
    }

    .sobre-integrante-conteudo {
        padding: 20px 8px 0;
        text-align: center;
    }

    .sobre-integrante-conteudo h3 {
        margin-bottom: 8px;
        font-size: 1.25rem;
        font-weight: 700;
        color: #2f3514;
    }

    .sobre-integrante-conteudo p {
        margin-bottom: 0;
        color: #69745a;
        font-weight: 500;
        line-height: 1.6;
    }

    @media (max-width: 1199.98px) {
        .sobre-pagina-imagem-wrap {
            height: 450px;
        }

        .sobre-pagina-titulo {
            font-size: 2.35rem;
        }
    }

    @media (max-width: 991.98px) {
        .sobre-pagina-shell {
            padding: 30px 22px;
        }

        .sobre-pagina-galeria {
            min-height: 420px;
        }
    }

    @media (max-width: 767.98px) {
        .sobre-pagina-titulo {
            font-size: 2rem;
        }

        .sobre-pagina-imagem-wrap {
            height: 340px;
        }

        .sobre-pagina-selo {
            top: 12px;
            right: 12px;
            max-width: 145px;
            padding: 10px 12px;
            font-size: 0.75rem;
        }

        .sobre-pagina-control.carousel-control-prev {
            right: 68px;
        }

        .sobre-pagina-control {
            width: 42px;
            height: 42px;
        }

        .sobre-pagina-pilar {
            padding: 24px 22px 28px;
            border-radius: 24px;
        }

        .sobre-pagina-pilar::before {
            border-radius: 24px;
        }

        .sobre-pagina-icon {
            width: 68px;
            height: 68px;
            margin-bottom: 18px;
            border-radius: 18px;
            font-size: 1.45rem;
        }

        .sobre-pagina-pilar h3 {
            font-size: 1.4rem;
        }

        .sobre-pagina-integrantes-titulo {
            font-size: 1.85rem;
        }

        .sobre-integrante-foto {
            height: 240px;
        }
    }
</style>
@endsection
