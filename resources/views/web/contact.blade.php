@extends('layouts.app')

@section('content')

<section id="content" style="margin-bottom: 0px;">
	<div class="strip">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2>
						CONTACTO
						<span>
							<a href="/">Home</a> / Contacto
						</span>
					</h2>
				</div>
			</div>
		</div>
	</div>

    <div class="content-wrap">
        <div class="container clearfix">
            <div class="postcontent nobottommargin">
                <!-- Warnings: -->
                @if(session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                    <br>
                @endif
                @if(session('alert'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('alert') }}
                    </div>
                    <br>
                @endif

                <h3>Contacto con nosotros si necesitas más información</h3>
                <div class="form-widget">
                    <div class="form-result"></div>
                    <form class="nobottommargin" action="{{ route('contacto') }}" method="post" role="form" id="frmContact">
                        {{ csrf_field() }}

                        <div class="form-process"></div>
                        <div class="col_one_third">
                            <label for="template-contactform-name">Nombre <small>*</small></label>
                            <!-- <input type="text" id="template-contactform-name" name="name" value="{{ old('name') }}" class="sm-form-control required" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;" maxlength="100"> -->
                            <input type="text" id="template-contactform-name" name="name" value="{{ old('name') }}" class="sm-form-control" maxlength="100" autocomplete="off" required>

                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col_one_third">
                            <label for="template-contactform-email">Email <small>*</small></label>
                            <input type="email" id="template-contactform-email" name="email" value="{{ old('email') }}" class="email sm-form-control" maxlength="150" required>

                            @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col_one_third col_last">
                            <label for="template-contactform-phone">Teléfono</label>
                            <input type="text" id="template-contactform-phone" name="phone" value="{{ old('phone') }}" class="sm-form-control" maxlength="15">

                            @if($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="clear"></div>
                        <div class="col_two_third">
                            <label for="template-contactform-subject">Asunto <small>*</small></label>
                            <input type="text" id="template-contactform-subject" name="subject" value="{{ old('subject') }}" class="sm-form-control" maxlength="250" required>

                            @if($errors->has('subject'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('subject') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col_one_third col_last">
                            <label for="template-contactform-service">Servicios</label>
                            <select id="template-contactform-service" name="service" class="sm-form-control">
								<option value="">-- Selecciona uno --</option>
								<option value="Wordpress">Contacto General</option>
								<option value="PHP / MySQL">Facturación</option>
								<option value="HTML5 / CSS3">Tipos de contrato</option>
							</select>
                        </div>
                        <div class="clear"></div>
                        <div class="col_full">
                            <label for="message">Mensaje <small>*</small></label>
                            <textarea class="sm-form-control" id="message" name="message" rows="6" cols="30" required>{{ old('message') }}</textarea>

                            @if($errors->has('message'))
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('message') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col_full hidden">
                            <input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control">
                        </div>
                        <div class="col_full">
                            <!-- <input class="button button-3d nomargin" type="submit" value="Contactar"> -->

                            <button type="submit" class="button button-3d nomargin">Contactar</button>
                        </div>
                        <input type="hidden" name="prefix" value="template-contactform-">
                    </form>
                </div>
            </div>

            <div class="sidebar col_last nobottommargin">
                <address>
					<strong>Dirección:</strong><br>
					​Centro Empresarial PRADO OFFICE CENTER<br>
					Cr. 54 N° 68-196 Of. 423<br>
					Barranquilla, Atlántico.<br>
					San Francisco, CA 94107<br>
				</address>
                <abbr title="Phone Number"><strong>Tel.:</strong></abbr> (+57) (5) 3144870<br>
                <abbr title="Fax"><strong>Celular (WSP):</strong></abbr> (+57) 300 571 3138<br>
                <abbr title="Email Address"><strong>Email:</strong></abbr>clienteanerol@hotmail.com

                <!--<div class="widget noborder notoppadding">
                    <a href="#" class="social-icon si-small si-dark si-facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>
                    <a href="#" class="social-icon si-small si-dark si-twitter">
                        <i class="icon-twitter"></i>
                        <i class="icon-twitter"></i>
                    </a>
                    <a href="#" class="social-icon si-small si-dark si-dribbble">
                        <i class="icon-dribbble"></i>
                        <i class="icon-dribbble"></i>
                    </a>
                    <a href="#" class="social-icon si-small si-dark si-forrst">
                        <i class="icon-forrst"></i>
                        <i class="icon-forrst"></i>
                    </a>
                    <a href="#" class="social-icon si-small si-dark si-pinterest">
                        <i class="icon-pinterest"></i>
                        <i class="icon-pinterest"></i>
                    </a>
                    <a href="#" class="social-icon si-small si-dark si-gplus">
                        <i class="icon-gplus"></i>
                        <i class="icon-gplus"></i>
                    </a>
                </div>-->
            </div>
        </div>
    </div>
</section>

@endsection