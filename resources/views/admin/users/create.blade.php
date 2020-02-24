@extends ('admin.partials.layout')

@section('content')

<div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
	<!--Begin::Dashboard 1-->
	<!--Begin::Row-->
	<div class="row">
		<!--begin::Portlet-->
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title-pages">
						@if($profile == 'admin')
							Crear Usuario
						@else
							Crear Cliente
						@endif						
					</h3>
				</div>
			</div>

			<!--begin::Form-->
			<form class="kt-form" method="post" action="{{ route('users.store') }}" accept-charset="utf-8" role="form">
				{{ csrf_field() }}
				<input type="hidden" name="profile" value="{{ $profile }}">

				<div class="kt-portlet__body">
					<div class="kt-section kt-section--first">
						<h3 class="kt-section__title">
							@if($profile == 'admin')
								Datos del Usuario:
							@else
								Datos del Cliente:
							@endif
						</h3>
						
						<div class="kt-section__body">
							<div class="form-group row">
								<label for="name" class="col-lg-3 col-form-label">Nombre: *</label>
								<div class="col-lg-6">
									<input type="text" name="name" class="form-control"	placeholder="Nombre" maxlength="191" value="{{ old('name') }}" required>

									@if($errors->has('name'))
		                                <span class="invalid-feedback" role="alert">
		                                  <strong>{{ $errors->first('name') }}</strong>
		                                </span>
		                            @endif
								</div>
							</div>

							<div class="form-group row">
								<label for="surname" class="col-lg-3 col-form-label">Apellidos:</label>
								<div class="col-lg-6">
									<input type="text" name="surname" class="form-control" placeholder="Apellidos" maxlength="191" value="{{ old('name') }}">

									@if($errors->has('surname'))
		                                <span class="invalid-feedback" role="alert">
		                                  <strong>{{ $errors->first('surname') }}</strong>
		                                </span>
		                            @endif
								</div>
							</div>

							<div class="form-group row">
								<label for="email" class="col-lg-3 col-form-label">Correo electrónico: *</label>
								<div class="col-lg-6">
									<input type="text" name="email" class="form-control" maxlength="255" value="{{ old('email') }}" required>

									@if($errors->has('email'))
		                                <span class="invalid-feedback" role="alert">
		                                  	<strong>{{ $errors->first('email') }}</strong>
		                                </span>
		                            @endif
								</div>
							</div>

							<div class="form-group row">
								<label for="password" class="col-lg-3 col-form-label">Contraseña: *</label>
								<div class="col-lg-6">
									<input type="password" name="password" class="form-control" maxlength="12" required>

									@if($errors->has('password'))
		                                <span class="invalid-feedback" role="alert">
		                                  	<strong>{{ $errors->first('password') }}</strong>
		                                </span>
		                            @endif
								</div>
							</div>

							<div class="form-group row">
								<label for="password_repeat" class="col-lg-3 col-form-label">Repetir Contraseña: *</label>
								<div class="col-lg-6">
									<input type="password" name="password_confirmation" class="form-control" maxlength="12" required>

									@if($errors->has('password_confirmation'))
                                		<span class="invalid-feedback" role="alert">
                                  			<strong>{{ $errors->first('password_confirmation') }}</strong>
                                		</span>
                            		@endif
								</div>
							</div>

							@if($profile == 'admin')
								<div class="form-group row">
									<label for="role" class="col-form-label col-lg-3 col-sm-12">Rol Usuario:</label>
									<div class="col-lg-6 col-md-6 col-sm-12">
										<select name="role" class="form-control" id="exampleSelect1">
											<option value="">Selecciona rol</option>
											<option value="1">Administrador</option>
											<option value="2">Abogado</option>
										</select>
									</div>
								</div>
							@endif

							<div class="form-group row">
								<label for="state" class="col-form-label col-lg-3 col-sm-12">Estado:</label>
								<div class="col-lg-9 col-md-9 col-sm-12">
									<input name="state" data-switch="true" type="checkbox" checked="checked" data-on-text="Activo" data-handle-width="70" data-off-text="Inactivo" data-on-color="primary">
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
						<div class="row">
							<div class="col-lg-3"></div>
							<div class="col-lg-6">
								<input type="submit" name="submit_save" class="btn btn-success" value="Guardar">
								<button type="reset" class="btn btn-danger">Cancelar</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->
	</div>
	<!--End::Row-->
	<!--End::Dashboard 1-->
</div>

@endsection