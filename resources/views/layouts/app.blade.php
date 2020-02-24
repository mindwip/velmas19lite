<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="SemiColonWeb" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Velmas19 Lite | Creador de Contratos Online') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Raleway:300,400,500,600,700|Crete+Round:400i" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('style.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/dark.css') }}" type="text/css" />

    <!-- Media Agency Demo Specific Stylesheet -->
    <link rel="stylesheet" href="{{ asset('demos/app-landing/app-landing.css') }}" type="text/css" />
    <!-- / -->
    <link rel="stylesheet" href="{{ asset('css/font-icons.css" type="text/css') }}" />
    <link rel="stylesheet" href="{{ asset('one-page/css/et-line.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/animate.css" type="text/css') }}" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('demos/app-landing/css/fonts.css') }}" type="text/css" />
    <!-- Bootstrap Switch CSS -->
    <link rel="stylesheet" href="{{ asset('css/components/bs-switches.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('demos/app-landing/css/colors.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('custom.css" type="text/css') }}" />

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>

<body class="stretched">
    <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">
        <!-- Header
    ============================================= -->
        <header id="header" class="split-menu" data-sticky-class="not-dark" data-responsive-class="not-dark">
            <div id="header-wrap">
                <div class="container clearfix">
                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="/" class="standard-logo" data-dark-logo="{!! asset('media/logos/logo-light.png') !!}">
                            <img src="{!! asset('media/logos/logo-light.png') !!}" alt="Canvas Logo">
                        </a>
                        
                        <a href="/" class="retina-logo" data-dark-logo="{!! asset('media/logos/logo-light.png') !!}">
                            <img src="{!! asset('media/logos/logo-light.png') !!}" alt="Canvas Logo">
                        </a>
                    </div>
                    <!-- #logo end -->

                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" class="with-arrows clearfix not-dark">
                        <ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="160">
                            <li><a href="#" data-href="#wrapper">
                                    <div>Inicio</div>
                                </a></li>
                            <li><a href="#" data-href="#que-es">
                                    <div>¿Qué es Velmas19 Lite?</div>
                                </a></li>
                            <li><a href="#" data-href="#section-nextgen">
                                    <div>Cómo Funciona</div>
                                </a>
                                <ul>
                                    <li><a href="#" data-href="#section-nextgen">
                                            <div>Selecciona Modelo</div>
                                        </a></li>
                                    <li><a href="#" data-href="#section-stunning-graphics">
                                            <div>Personaliza</div>
                                        </a></li>
                                    <li><a href="#" data-href="#section-stunning-graphics">
                                            <div>Realiza el pago</div>
                                        </a></li>
                                    <li><a href="#" data-href="#section-secured-solutions">
                                            <div>Recíbelo automáticamente</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="one-page-menu" data-easing="easeInOutExpo" data-speed="1250" data-offset="160">
                            <li><a href="#" data-href="#section-faqs">
                                    <div>FAQs</div>
                                </a></li>
                            <li><a href="#" data-href="#section-gallery">
                                    <div>Contacta con nosotros</div>
                                </a></li>
                            <li class="menu-item-emphasis"><a href="#modal-registro" data-lightbox="inline">
                                    <div>Registrarse</div>
                                </a></li>
                            <li class="menu-item-emphasis"><a href="#modal-login" data-lightbox="inline">
                                    <div>Login</div>
                                </a></li>
                        </ul>
                    </nav>
                    <!-- #primary-menu end -->
                </div>
            </div>
        </header>











        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Velmas19 Lite | Creador de Contratos Online') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer
        ============================================= -->
        <footer id="footer">
            <div class="container">
                <!-- Footer Widgets
            ============================================= -->
                <div class="footer-widgets-wrap clearfix">
                    <div class="row clearfix">
                        <div class="col-lg-5">
                            <div class="widget clearfix">
                                <div class="row clearfix">
                                    <div class="col-lg-8 bottommargin-sm clearfix">
                                        <img src="/admin/assets/media/logos/logo-light.png" alt="Velmas Logo"
                                            style="display: block;" class="bottommargin-sm">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio,
                                            consequatur facere molestiae iusto atque.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="row clearfix">
                                <div class="col-lg-4 bottommargin-sm">
                                    <div class="widget widget_links app_landing_widget_link clearfix">
                                        <h4>In News</h4>
                                        <ul>
                                            <li><a href="#">Documentation</a></li>
                                            <li><a href="#">Feedback</a>
                                            </li>
                                            <li><a href="#">Plugins</a></li>
                                            <li><a href="#">Support Forums</a></li>
                                            <li><a href="#">Themes</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 bottommargin-sm">
                                    <div class="widget widget_links app_landing_widget_link clearfix">
                                        <h4>About Us</h4>
                                        <ul>
                                            <li><a href="#">Documentation</a></li>
                                            <li><a href="#">Feedback</a>
                                            </li>
                                            <li><a href="#">Plugins</a></li>
                                            <li><a href="#">Support Forums</a></li>
                                            <li><a href="#">Themes</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 bottommargin-sm">
                                    <div class="widget widget_links app_landing_widget_link clearfix">
                                        <h4>Support</h4>
                                        <ul>
                                            <li><a href="#">Documentation</a></li>
                                            <li><a href="#">Feedback</a>
                                            </li>
                                            <li><a href="#">Plugins</a></li>
                                            <li><a href="#">Support Forums</a></li>
                                            <li><a href="#">Themes</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Copyrights
            ============================================= -->
            <div id="copyrights" class="notoppadding nobottompadding">
                <div class="container clearfix copys">
                    <div class="col-lg-6 col-xs-12">
                        Copyrights &copy; 2019 All Rights Reserved by Velmas.<br>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <div class="copyright-links"><a href="/condiciones-uso.html">Condiciones de uso</a> / <a
                                href="/politicas-privacidad.html">Políticas de
                                Privacidad</a> / <a href="/politicas-cookies.html">Políticas de Cookies</a>
                        </div>
                    </div>
                </div>
            </div><!-- #copyrights end -->
        </footer><!-- #footer end -->
    </div>
    <!-- #wrapper end -->
    
    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- External JavaScripts
    ============================================= -->
    <!-- <script src="{{ asset('js/jquery.js') }}"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    
    <!-- Footer Scripts
    ============================================= -->
    <script src="{{ asset('js/functions.js') }}"></script>
    <script>
    jQuery(document).ready(function ($){

        function pricingSwitcher(elementCheck, elementParent, elementPricing) {
            elementParent.find('.pts-left,.pts-right').removeClass('pts-switch-active');
            elementPricing.find('.pts-switch-content-left,.pts-switch-content-right').addClass('hidden');

            if (elementCheck.filter(':checked').length > 0) {
                elementParent.find('.pts-right').addClass('pts-switch-active');
                elementPricing.find('.pts-switch-content-right').removeClass('hidden');
            } else {
                elementParent.find('.pts-left').addClass('pts-switch-active');
                elementPricing.find('.pts-switch-content-left').removeClass('hidden');
            }
        }

        $('.pts-switcher').each(function () {
            var element = $(this),
                elementCheck = element.find(':checkbox'),
                elementParent = $(this).parents('.pricing-tenure-switcher'),
                elementPricing = $(elementParent.attr('data-container'));

            pricingSwitcher(elementCheck, elementParent, elementPricing);

            elementCheck.on('change', function () {
                pricingSwitcher(elementCheck, elementParent, elementPricing);
            });
        });

        // Get Started From Validation
        var getStartedForm = $('#get-started-form'),
            getStartedFormAlert = getStartedForm.attr('data-alert-type'),
            getStartedFormLoader = getStartedForm.attr('data-loader'),
            getStartedFormResult = getStartedForm.find('.contact-form-result'),
            getStartedFormRedirect = getStartedForm.attr('data-redirect');

        getStartedForm.validate({
            submitHandler: function (form) {

                getStartedFormResult.hide();

                if (getStartedFormLoader == 'button') {
                    var defButton = $(form).find('button'),
                        defButtonText = defButton.html();

                    defButton.html('<i class="icon-line-loader icon-spin nomargin"></i>');
                } else {
                    $(form).find('.form-process').fadeIn();
                }

                $(form).ajaxSubmit({
                    target: getStartedFormResult,
                    dataType: 'json',
                    resetForm: true,
                    success: function (data) {
                        if (getStartedFormLoader == 'button') {
                            defButton.html(defButtonText);
                        } else {
                            $(form).find('.form-process').fadeOut();
                        }
                        if (data.alert != 'error' && getStartedFormRedirect) {
                            window.location.replace(getStartedFormRedirect);
                            return true;
                        }
                        if (getStartedFormAlert == 'inline') {
                            if (data.alert == 'error') {
                                var alertType = 'alert-danger';
                            } else {
                                var alertType = 'alert-success';
                            }

                            getStartedFormResult.addClass('alert ' + alertType).html(data.message).slideDown(400);
                        } else {
                            getStartedFormResult.attr('data-notify-type', data.alert).attr('data-notify-msg', data.message).html('');
                            SEMICOLON.widget.notifications(getStartedFormResult);
                        }
                    }
                });
            }
        });

        $('[data-pricing-plan]').click(function () {
            getStartedForm.find('#get-started-form-package').val($(this).attr('data-pricing-plan'));
            getStartedForm.find('#modal-get-started-package').html($(this).attr('data-pricing-plan'));
        });
    });
    </script>

</body>
</html>
