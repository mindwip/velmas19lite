@extends('layouts.app')

@section('content')

@if($errors->any())
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
@endif

<section id="slider" class="slider-element full-screen slider-parallax">
    <div class="slider-parallax-inner" style="background: url('demos/app-landing/images/hero/hero.jpg') center center no-repeat; background-size: auto;">
        <div class="vertical-middle" style="z-index: 2;">
            <div class="container dark clearfix">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-8">
                        <div class="emphasis-title">
                            <h1 class="font-body">Contratos redactados por abogados <br>a un solo click.
                            </h1>
                        </div>
                        <a href="#" data-scrollto="#section-pricing" data-easing="easeInOutExpo"
                            data-speed="1250" data-offset="160"
                            class="button button-large button-white button-light capitalize"
                            style="border-radius: 23px;">Contratar</a>
                        <!--<a href="https://www.youtube.com/watch?v=N_r349riLEE" class="hero-action-link"
                            data-lightbox="iframe"><i class="icon-play-sign"></i> Watch the Video</a>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="video-wrap" style="position: absolute; height: 100%; z-index: 1;">
            <div class="video-overlay" style="background: rgba(0,0,0,0.2);"></div>
        </div>
    </div>
</section>

<!-- Content
============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container clearfix">
            <div id="que-es" class="page-section">
                <h2 class="center font-body bottommargin-lg titulos">¿Qué es Velmas19 Lite?</h2>
                <div class="row topmargin-sm clearfix">
                    <div class="col-lg-12 col-md-12 bottommargin-sm">
                        <p class="lead center">En <strong>Velmas19 Lite</strong> encontrarás contratos jurídicos y documentos legales profesionales para adaptarlos a tus necesidades. Puedes personalizar nuestros modelos de contrato de forma sencilla, tan solo respondiendo una serie de preguntas. Para ello, <strong>Velmas19 Lite</strong> pone a tu disposición una selección de los contratos y cláusulas jurídicas de los ámbitos civil, mercantil y laboral, más frecuentes en tu vida personal y profesional.<br>
                        <strong>Velmas19 Lite</strong> pone a tu alcance las normas jurídicas y ofrece una solución accesible a tus necesidades de información jurídica de calidad. Por fin, un respaldo ágil y profesional en la redacción de tus documentos legales.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear bottommargin"></div>

        <div class="container clearfix">
            <div class="page-section">
                <h2 class="center font-body bottommargin-lg titulos">¿Cómo funciona?</h2>
                <div class="row topmargin-sm clearfix">
                    <div class="col-lg-12 col-md-12 bottommargin-sm">
                        <ul class="process-steps process-5 clearfix">
                            <li>
                                <a href="#" class="i-bordered i-circled divcenter icon-select"></a>
                                <h5>Selecciona tu contrato</h5>
                            </li>
                            <li>
                                <a href="#" class="i-bordered i-circled divcenter icon-cart"></a>
                                <h5>Formaliza el pago</h5>
                            </li>
                            <li>
                                <a href="#" class="i-bordered i-circled divcenter icon-pencil2"></a>
                                <h5>Rellena el formulario</h5>
                            </li>
                            <li class="active">
                                <a href="#" class="i-circled i-alt divcenter bgcolor icon-like"></a>
                                <h5>Entra en tu área de cliente</h5>
                            </li>
                            <li>
                                <a href="#" class="i-bordered i-circled divcenter icon-ok"></a>
                                <h5>Descárgate el formulario</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--<div id="section-nextgen" class="page-section bottommargin-lg">
                <h2 class="center font-body bottommargin-lg titulos">¿Cómo funciona?</h2>
                <div class="row clearfix">
                    <div class="col-lg-7 center">
                        <a href="#ptab1" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor active"
                            role="presentation" tabindex="-1" id="ui-id-1" data-animate="fadeInRight"
                            style="font-size: 200px;">1</a>
                    </div>
                    <div class="col-lg-5">
                        <div class="emphasis-title bottommargin-sm">
                            <h2 style="font-size: 42px;" class="font-body ls1 t400">Selecciona Contrato</h2>
                        </div>
                        <p style="color: #777;" class="lead">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Praesentium, vel! Eius pariatur nemo expedita.</p>
                        <!--<a href="#" class="section-more-link">Learn More <i
                                class="icon-angle-right"></i></a>-->
            <!--</div>
                </div>
            </div>
            <div class="line"></div>
            <div class="clear"></div>
            <div id="section-nextgen" class="page-section topmargin bottommargin-lg">
                <div class="row clearfix">
                    <div class="col-lg-5">
                        <div class="emphasis-title bottommargin-sm">
                            <h2 style="font-size: 42px;" class="font-body ls1 t400">Personaliza tu contrato
                            </h2>
                        </div>
                        <p style="color: #777;" class="lead">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Praesentium, vel! Eius pariatur nemo expedita.</p>
                    </div>
                    <div class="col-lg-7 center">
                        <a href="#ptab1" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor active"
                            role="presentation" tabindex="-1" id="ui-id-1" data-animate="fadeInRight"
                            style="font-size: 200px;">2</a>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="clear"></div>
            <div id="section-stunning-graphics" class="page-section bottommargin-lg">
                <div class="row clearfix">
                    <div class="col-lg-7 center">
                        <a href="#ptab1" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor active"
                            role="presentation" tabindex="-1" id="ui-id-1" data-animate="fadeInRight"
                            style="font-size: 200px;">3</a>
                    </div>
                    <div class="col-lg-5">
                        <div class="topmargin-lg d-none d-lg-block"></div>
                        <div class="emphasis-title bottommargin-sm">
                            <h2 style="font-size: 42px;" class="font-body ls1 t400">NextGen Framework</h2>
                        </div>
                        <p style="color: #777;" class="lead">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Praesentium, vel! Eius pariatur nemo expedita.</p>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="clear"></div>
            <div id="section-nextgen" class="page-section topmargin bottommargin-lg">
                <div class="row clearfix">

                    <div class="col-lg-5">
                        <div class="emphasis-title bottommargin-sm">
                            <h2 style="font-size: 42px;" class="font-body ls1 t400">Personaliza tu contrato
                            </h2>
                        </div>
                        <p style="color: #777;" class="lead">Lorem ipsum dolor sit amet, consectetur
                            adipisicing elit. Praesentium, vel! Eius pariatur nemo expedita.</p>
                    </div>

                    <div class="col-lg-7 center">
                        <a href="#ptab1" class="i-circled i-bordered i-alt divcenter ui-tabs-anchor active"
                            role="presentation" tabindex="-1" id="ui-id-1" data-animate="fadeInRight"
                            style="font-size: 200px;">4</a>
                    </div>
                </div>
            </div>-->
        </div>
        <div class="clear bottommargin"></div>

        <div class="container clearfix">
            <h2 class="center font-body bottommargin-lg titulos">Selecciona tu contrato</h2>
            <div class="row grid-container" data-layout="masonry" style="overflow: visible">
                
                @foreach($contracts as $contract)
                    <div class="col-lg-3 mb-3">
                        <div class="flip-card top-to-bottom">
                            <div class="flip-card-front bg-info dark" data-height-xl="200">
                                <div class="flip-card-inner">
                                    <div class="card nobg noborder text-center">
                                        <div class="card-body">
                                            <i class="icon-select h1"></i>
                                            <h3 class="card-title">{{ $contract->name }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flip-card-back" data-height-xl="200">
                                <div class="flip-card-inner">
                                    <p class="mb-2 text-white">{{ $contract->description }}</p>
                                    <button type="button" class="btn btn-outline-light mt-2">
                                        <a href="{{ route('formulario', $contract->slug) }}">Contratar</a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
            </div>
            <div class="clear bottommargin"></div>

            <div class="container clearfix">
                <div class="clear"></div>
                <div id="section-faqs" class="page-section nopadding nomargin">
                    <h2 class="center font-body bottommargin-lg titulos">Preguntas Frecuentes</h2>
                    <div class="row topmargin-sm clearfix">
                        <div class="col-lg-5 offset-lg-1 col-md-6 bottommargin-sm">
                            <h4 class="font-body" style="margin-bottom:15px;">How do I become an author?
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, dolorum,
                                vero ipsum molestiae minima odio quo voluptate illum excepturi quam cum
                                voluptates doloribus quae nisi.</p>
                        </div>
                        <div class="col-lg-5 col-md-6 bottommargin-sm">
                            <h4 class="font-body" style="margin-bottom:15px;">Helpful Resources for Authors
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, placeat,
                                architecto rem dolorem dignissimos repellat veritatis in et eos doloribus
                                magnam
                                aliquam ipsa alias assumenda officiis quasi sapiente suscipit.</p>
                        </div>
                        <div class="col-lg-5 offset-lg-1 col-md-6 bottommargin-sm">
                            <h4 class="font-body" style="margin-bottom:15px;">How much money can I make?
                            </h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, fugiat
                                iste
                                nisi tempore nesciunt nemo fuga? Nesciunt, delectus laboriosam nisi
                                repudiandae
                                nam fuga saepe animi recusandae.</p>
                        </div>
                        <div class="col-lg-5 col-md-6 bottommargin-sm">
                            <h4 class="font-body" style="margin-bottom:15px;">Can I offer my items for free
                                on a
                                promotional basis?</h4>
                            <p>Laboriosam iusto quia nulla ad voluptatibus iste beatae voluptas corrupti
                                facilis
                                accusamus recusandae sequi debitis reprehenderit quibusdam. Facilis eligendi
                                a
                                exercitationem nisi et placeat excepturi velit!</p>
                        </div>
                        <div class="col-lg-5 offset-lg-1 col-md-6 bottommargin-sm">
                            <h4 class="font-body" style="margin-bottom:15px;">An Introduction to the
                                Marketplaces for Authors</h4>
                            <p>Quisquam atque vero delectus corrupti! Quo, maiores, dolorem, hic commodi
                                nulla
                                ratione accusamus doloribus fuga magnam id temporibus dignissimos deleniti
                                quidem ipsam corporis sapiente nam expedita saepe quas ab? Vero, assumenda.
                            </p>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <h4 class="font-body" style="margin-bottom:15px;">How does the Tuts+ Premium
                                affiliate program work?</h4>
                            <p class="nobottommargin">Reprehenderit similique nemo voluptate ullam natus
                                illum
                                magnam alias nobis doloremque delectus ipsa dicta repellat maxime
                                dignissimos
                                eveniet quae debitis ratione assumenda tempore officiis fugiat dolor.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

            <div class="section"
                style="padding: 30px 0; color: #999; background-color: #F8FAFB; border-top: 1px solid #E5E5E5; border-bottom: 1px solid #E5E5E5;">
                <div class="container clearfix">
                    <div class="row topmargin-lg clearfix">
                        <div class="col-lg-4 bottommargin">
                            <i class="i-plain i-large icon-et-browser inline-block"
                                style="margin-bottom: 30px; color: #999;"></i>
                            <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                <h4 style="font-size: 16px;">Cross Browser</h4>
                            </div>
                            <p class="" style="line-height: 26px;">Canvas 4 Loads Faster &amp; Smoother than
                                the
                                Previous Versions providing an Optimal Experience for your Users.</p>
                        </div>
                        <div class="col-lg-4 bottommargin">
                            <i class="i-plain i-large icon-et-adjustments inline-block"
                                style="margin-bottom: 30px; color: #999;"></i>
                            <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                <h4 style="font-size: 16px;">Flexible Options</h4>
                            </div>
                            <p class="" style="line-height: 26px;">Unleash the Power of Mega Menus by adding
                                Widgets &amp; Mixed Columns powered by the Bootstrap Grid.</p>
                        </div>
                        <div class="col-lg-4 bottommargin">
                            <i class="i-plain i-large icon-et-calendar inline-block"
                                style="margin-bottom: 30px; color: #999;"></i>
                            <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                <h4 style="font-size: 16px;">Scheduled Backups</h4>
                            </div>
                            <p class="" style="line-height: 26px;">Amazing set of New Components giving you
                                Opportunity to Create an Interactive Website for your Business.</p>
                        </div>
                        <div class="col-lg-4 bottommargin">
                            <i class="i-plain i-large icon-et-desktop inline-block"
                                style="margin-bottom: 30px; color: #999;"></i>
                            <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                <h4 style="font-size: 16px;">Responsive Ready</h4>
                            </div>
                            <p class="" style="line-height: 26px;">Convert any Grid to an Isotope Grid
                                easily
                                with Filterable Options making it extremely flexible and powerful.</p>
                        </div>
                        <div class="col-lg-4 bottommargin">
                            <i class="i-plain i-large icon-et-bargraph inline-block"
                                style="margin-bottom: 30px; color: #999;"></i>
                            <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                <h4 style="font-size: 16px;">Increased Conversions</h4>
                            </div>
                            <p class="" style="line-height: 26px;">Display an Alternate Lighter Menu on
                                Responsive Devices with the same Markup Code as before. Awesomely Useful.
                            </p>
                        </div>
                        <div class="col-lg-4 bottommargin">
                            <i class="i-plain i-large icon-et-cloud inline-block"
                                style="margin-bottom: 30px; color: #999;"></i>
                            <div class="heading-block nobottomborder" style="margin-bottom: 15px;">
                                <h4 style="font-size: 16px;">Cloud Sharing</h4>
                            </div>
                            <p class="" style="line-height: 26px;">Added SPAM Protection for your Precious
                                Forms
                                so that you receive Emails only from Authentic Real Users.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="section center nobottommargin nobg">
                <div class="container clearfix">
                    <h3 class="ls1 t400" style="font-size: 32px;">Experiencia &amp; Utilizado por
                        <span>16,000+</span> usuarios</h3>
                    <a href="#modal-login" data-lightbox="inline"
                        class="button button-large button-black capitalize"
                        style="border-radius: 23px;">Login
                    </a>
                    <a href="#modal-registro" data-scrollto="#section-pricing" data-easing="easeInOutExpo"
                        data-speed="1250" data-offset="160" class="button button-large capitalize"
                        style="border-radius: 23px;">Registrarse</a>
                    <div class="clear bottommargin"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- #content end -->

@endsection
