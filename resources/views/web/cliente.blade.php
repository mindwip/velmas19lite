@extends('layouts.app')

@section('content')

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
			<div class="row clearfix">
				<div class="col-md-12">
					<!-- <img src="images/icons/avatar.jpg" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 84px;"> -->

					<div class="heading-block noborder">
						<h3>{{ Auth::user()->name }} {{ Auth::user()->surname }}</h3>
						<span>Área de Usuario</span>
					</div>

					<div class="clear"></div>

					<div class="row clearfix">

						<div class="col-lg-12">

							<div class="tabs tabs-alt clearfix" id="tabs-profile">

								<ul class="tab-nav clearfix">
									<li><a href="#tab-feeds"><i class="icon-rss2"></i> Contratos</a></li>
									<li><a href="#tab-posts"><i class="icon-pencil2"></i> Datos de Usuario</a></li>
									<li><a href="#tab-password"><i class="icon-lock"></i> Contraseña</a></li>
								</ul>
								<div class="tab-container">
									<div class="tab-content clearfix" id="tab-feeds">
										<p class="">Lorem ipsum dolor sit amet, consectetur adipisicing
											elit. Laudantium harum ea quo! Nulla fugiat earum, sed corporis
											amet iste non, id facilis dolorum, suscipit, deleniti ea. Nobis,
											temporibus magnam doloribus. Reprehenderit necessitatibus esse
											dolor tempora ea unde, itaque odit. Quos.</p>
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>Fecha</th>
													<th>Contrato</th>
													<th>Tipo de Contrato</th>
													<th>Acciones</th>
												</tr>
											</thead>
											<tbody>
									
												@foreach($contracts as $row)
													<tr>
														<td>
															<code>19/3/2019</code>
														</td>
														<td>
															<a href="{{ route('formulario', $row->slug) }}">
																{{ $row->name }}
															</a>
															&nbsp;&nbsp;
															<a href="#"> 
																<i class="icon-edit" title="Editar Nombre Documento"></i>
															</a>
														</td>
														<td>
															{{ $row->name }}
														</td>
														<td>
															<a href="{{ route('contratar', $row->slug) }}" class="button button-mini button-circle button-red">
																<i class="icon-legal"></i>Revisar
															</a>&nbsp;

															<a href="vista-formulario.html" class="button button-mini button-circle button-blue">
																<i class="icon-play"></i>Iniciar Contrato
															</a>&nbsp;

															<a href="#" class="button button-mini button-circle button-green">
																<i class="icon-file-pdf1"></i>Descargar
															</a>
														</td>
													</tr>
												@endforeach

											</tbody>
										</table>
									</div>

									<div class="tab-content clearfix" id="tab-posts">
										<div class="row topmargin-sm clearfix">
											<div class="col-12 bottommargin-sm">
												<div class="col-lg-12">
													<h3>Editar datos de Acceso</h3>
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing
														elit. Unde, vel odio non dicta provident sint ex
														autem mollitia dolorem illum repellat ipsum aliquid
														illo similique sapiente fugiat minus ratione.</p>
													<form id="billing-form" name="billing-form" class="nobottommargin" action="#" method="post">
														@csrf

														<div class="col_half">
															<label for="name">Nombre:</label>
															<input type="text" id="billing-form-name" name="name" value="{{ old('name', Auth::user()->name) }}" class="sm-form-control" />

															@error('name')
								                                <span class="invalid-feedback" role="alert">
								                                    <strong>{{ $message }}</strong>
								                                </span>
								                            @enderror
														</div>

														<div class="col_half col_last">
															<label for="surname">Apellidos:</label>
															<input type="text" id="billing-form-lname" name="surname" value="{{ old('surname', Auth::user()->surname) }}" class="sm-form-control" />

															@error('surname')
								                                <span class="invalid-feedback" role="alert">
								                                    <strong>{{ $message }}</strong>
								                                </span>
								                            @enderror
														</div>
														<div class="clear"></div>

														<div class="col_half">
															<label for="email">Email:</label>
															<input type="email" id="billing-form-email" name="billing-form-email" value="{{ old('email', Auth::user()->email) }}" class="sm-form-control" />

															@error('email')
								                                <span class="invalid-feedback" role="alert">
								                                    <strong>{{ $message }}</strong>
								                                </span>
								                            @enderror
														</div>

														<div class="col_half col_last">
															<label for="city">Ciudad</label>
															<input type="text" id="billing-form-city" name="city" value="{{ old('city', Auth::user()->city) }}" class="sm-form-control" />

															@error('city')
								                                <span class="invalid-feedback" role="alert">
								                                    <strong>{{ $message }}</strong>
								                                </span>
								                            @enderror
														</div>
														
														<div class="col_full nobottommargin">
															<button class="button button-rounded nomargin"
																id="login-form-modal-submit"
																name="login-form-modal-submit"
																value="login">Guardar</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>

									<div class="tab-content clearfix" id="tab-password">
										<div class="row topmargin-sm clearfix">
											<div class="col-12 bottommargin-sm">
												<div class="col-lg-12">
													<h3>Cambiar contraseña</h3>
			
													<form id="billing-form" name="billing-form" class="nobottommargin" action="#" method="post">
														@csrf

														<div class="col_half">
															<label
																for="billing-form-phone">Password:</label>
															<input type="password" id="billing-form-phone"
																name="billing-form-phone" value=""
																class="sm-form-control" />
														</div>
														<div class="col_half col_last">
															<label for="billing-form-phone">Repetir
																Password:</label>
															<input type="password" id="billing-form-phone"
																name="billing-form-phone" value=""
																class="sm-form-control" />
														</div>

														<div class="col_full nobottommargin">
															<button class="button button-rounded nomargin"
																id="login-form-modal-submit"
																name="login-form-modal-submit"
																value="login">Guardar</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- #content end -->

@endsection