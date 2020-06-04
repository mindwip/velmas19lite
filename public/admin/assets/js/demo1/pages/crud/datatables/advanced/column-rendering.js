"use strict";
var KTDatatablesAdvancedColumnRenderingUsuarios = function() {

	var initTable1 = function() {
		var table = $('#kt_table_1');

		// begin first table
		table.DataTable({
			responsive: true,
			paging: true,
			columnDefs: [
				{
					targets: 0,
					title: 'Usuario',
					render: function(data, type, full, meta) {
						var number = KTUtil.getRandomInt(1, 14);
						var user_img = '100_' + number + '.jpg';

						var output;
						if (number > 8) {
							output = `
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__pic">
                                        <img src="https://keenthemes.com/metronic/preview/assets/media/users/` + user_img + `" class="m-img-rounded kt-marginless" alt="photo">
                                    </div>
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name">` + full[0] + `</span>
                                        <a href="#" class="kt-user-card-v2__email kt-link">` + full[1] + `</a>
                                    </div>
                                </div>`;
						}else{
							var stateNo = KTUtil.getRandomInt(0, 7);
							var states = [
								'activo',
								'Desactivado'];
							var state = states[stateNo];

							output = `
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__pic">
                                        <div class="kt-badge kt-badge--xl kt-badge--` + state + `"><span>` + full[0].substring(0, 1) + `</div>
                                    </div>
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name">` + full[0] + `</span>
                                        <a href="#" class="kt-user-card-v2__email kt-link">` + full[1] + `</a>
                                    </div>
                                </div>`;
						}

						return output;
					},
				},
				{
					targets: 1,
					render: function(data, type, full, meta) {
						return '<a class="kt-link" href="mailto:' + data + '">' + data + '</a>';
					},
				},
				{
					targets: -1,
					title: 'Acciones',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <a href="editar-usuarios.html" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos">
                          <i class="la la-edit"></i>
                        </a>
						 <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Eliminar Distribuidor">
                          <i class="la la-trash"></i>
                        </a>`;
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Administrador', 'class': ' kt-badge--success'},
							2: {'title': 'Abogado', 'class': ' kt-badge--warning'},							
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},	
				{
					targets: 3,
					render: function(data, type, full, meta) {
						/*var status = {
							1: {'title': 'Activo', 'class': ' kt-badge--success'},
							0: {'title': 'Bloqueado', 'class': ' kt-badge--danger'},							
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>'; */
					},
				},				
			],
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable1();
		}
	};
}();

var KTDatatablesAdvancedColumnRenderingClientes = function() {

	var initTable4 = function() {
		var table = $('#kt_table_4');

		// begin first table
		table.DataTable({
			responsive: true,
			paging: true,
			columnDefs: [
				{
					targets: 0,
					title: 'Cliente',
					render: function(data, type, full, meta) {
						var number = KTUtil.getRandomInt(1, 14);
						var user_img = '100_' + number + '.jpg';

						var output;
						if (number > 8) {
							output = `
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__pic">
                                        <img src="https://keenthemes.com/metronic/preview/assets/media/users/` + user_img + `" class="m-img-rounded kt-marginless" alt="photo">
                                    </div>
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name">` + full[0] + `</span>
                                        <a href="#" class="kt-user-card-v2__email kt-link">` + full[1] + `</a>
                                    </div>
                                </div>`;
						}
						else {
							var stateNo = KTUtil.getRandomInt(0, 7);
							var states = [
								'activo',
								'Desactivado'];
							var state = states[stateNo];

							output = `
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__pic">
                                        <div class="kt-badge kt-badge--xl kt-badge--` + state + `"><span>` + full[0].substring(0, 1) + `</div>
                                    </div>
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name">` + full[0] + `</span>
                                        <a href="#" class="kt-user-card-v2__email kt-link">` + full[1] + `</a>
                                    </div>
                                </div>`;
						}

						return output;
					},
				},
				{
					targets: 1,
					render: function(data, type, full, meta) {
						return '<a class="kt-link" href="mailto:' + data + '">' + data + '</a>';
					},
				},
				{
					targets: -1,
					title: 'Acciones',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <a href="editar-clientes.html" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos">
                          <i class="la la-edit"></i>
                        </a>
						 <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Eliminar Cliente">
                          <i class="la la-trash"></i>
                        </a>`;
					},
				},
				{
					targets: 4,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Activo', 'class': ' kt-badge--success'},
							2: {'title': 'Bloqueado', 'class': ' kt-badge--danger'},							
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},				
			],
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable4();
		}
	};
}();

var KTDatatablesAdvancedColumnRenderingFormularios = function() {

	var initTable2 = function() {
		var table = $('#kt_table_2');

		// begin first table
		table.DataTable({
			responsive: true,
			paging: true,
			columnDefs: [				
				{
					targets: -1,
					title: 'Acciones',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <a href="editar-bloques-form.html" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos">
                          <i class="la la-edit"></i>
                        </a>
						 <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Eliminar Formulario">
                          <i class="la la-trash"></i>
						</a>
						<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Vista previa">
						<i class="la la-file-pdf-o"></i>
                        </a>`;
					},
				},
				{
					targets: 4,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Activo', 'class': ' kt-badge--success'},
							2: {'title': 'Inactivo', 'class': ' kt-badge--danger'},							
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},				
			],
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable2();
		}
	};
}();

var KTDatatablesAdvancedColumnRenderingPagos = function() {

	var initTable3 = function() {
		var table = $('#kt_table_3');

		// begin first table
		table.DataTable({
			responsive: true,
			paging: true,
			columnDefs: [
				{
					targets: -1,
					title: 'Acciones',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <a href="editar-pagos.html" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos">
                          <i class="la la-edit"></i>
                        </a>
						 <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Eliminar Pago">
                          <i class="la la-trash"></i>
                        </a>`;
					},
				},
				{
					targets: 5,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Pagado', 'class': ' kt-badge--success'},
							2: {'title': 'Error Pago', 'class': ' kt-badge--danger'},
							3: {'title': 'Pendiente', 'class': ' kt-badge--warning'},							
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},				
			],
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable3();
		}
	};
}();

var KTDatatablesAdvancedColumnRenderingFormulariosCreados = function() {

	var initTable5 = function() {
		var table = $('#kt_table_5');

		// begin first table
		table.DataTable({
			responsive: true,
			paging: true,
			columnDefs: [				
				{
					targets: -1,
					title: 'Acciones',
					orderable: false,
					render: function(data, type, full, meta) {
						return `
                        <a href="editar-bloques-form.html" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Formulario">
                          <i class="la la-edit"></i>
                        </a>
						 <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Eliminar Formulario">
                          <i class="la la-trash"></i>
						</a>`;
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Activo', 'class': ' kt-badge--success'},
							2: {'title': 'Inactivo', 'class': ' kt-badge--danger'},							
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				},				
			],
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable5();
		}
	};
}();



jQuery(document).ready(function() {
	KTDatatablesAdvancedColumnRenderingUsuarios.init();
	KTDatatablesAdvancedColumnRenderingFormularios.init();
	KTDatatablesAdvancedColumnRenderingPagos.init();
	KTDatatablesAdvancedColumnRenderingClientes.init();
	KTDatatablesAdvancedColumnRenderingFormulariosCreados.init();
	
});