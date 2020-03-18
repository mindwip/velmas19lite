<div id="kt_repeater_1">
	<div class="form-group form-group-last row" id="kt_repeater_1">
		<label class="col-lg-2 col-form-label">Bloques:</label>
		<div data-repeater-list="block_item" class="col-lg-10">
			<div data-repeater-item class="form-group row align-items-center">
				<div class="col-md-3">
					<div class="kt-form__group--inline">
						<div class="kt-form__label">
							<label>Alias:</label>
						</div>
						<div class="kt-form__control">
							<input name="block_item[1][alias]" type="text" class="form-control" placeholder="Enter full name" required>
						</div>
					</div>
					<div class="d-md-none kt-margin-b-10"></div>
				</div>

				<div class="col-md-1">
					<div class="kt-form__group--inline">
						<div class="kt-form__label">
							<label class="kt-label m-label--single">Posición:</label>
						</div>
						<div class="kt-form__control">
							<input name="block_item[1][position]" type="number" class="form-control" placeholder="Ej: 1" value="1" required>
						</div>
					</div>
					<div class="d-md-none kt-margin-b-10"></div>
				</div>
				<div class="col-md-4">
					<label for="exampleSelect1">Bloque Padre
					</label>
					<select name="block_item[1][father]" class="form-control" required>
						<option>No</option>
						<option>Presentación</option>
						<option>Cabecera</option>
						<option>Pie</option>
						<option>Clausulas</option>
					</select>
				</div>

				<div class="col-md-4">
					<div style="margin-bottom: 6px;">&nbsp;</div>
					<a href="javascript:;" data-repeater-delete=""
						class="btn-sm btn btn-label-danger btn-bold">
						<i class="la la-trash-o"></i>
						Eliminar Bloque
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group form-group-last row">
		<label class="col-lg-2 col-form-label"></label>
		<div class="col-lg-4">
			<a href="javascript:;" data-repeater-create=""
				class="btn btn-bold btn-sm btn-label-brand">
				<i class="la la-plus"></i> Añadir Bloque
			</a>
		</div>
	</div>
</div>



