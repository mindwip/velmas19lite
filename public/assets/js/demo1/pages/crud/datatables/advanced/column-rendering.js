"use strict";
var KTDatatablesAdvancedColumnRenderingUsuarios = function() {

	var initTable1 = function() {
		var table = $('#kt_table_1');
		var tokenDT = $('meta[name="csrf-token"]').attr('content');

		// begin first table
		table.DataTable({
			"serverSide": false,
            /*"processing": true,*/
            "ajax": {
                "type": "GET",
                "url": "/api/admin/users/1",
                "error": function(reason){
                    console.log(reason);
                }
            },
			responsive: true,
			paging: true,
			"columns": [
                {data: 'name'},
                {data: 'email'},
                {data: 'role'},
                {data: 'state'},
                {data: 'id', className: 'text-right'}
            ],
			columnDefs: [
				{
					targets: 0,
					title: 'Usuario',
					render: function(data, type, full, meta){
						var number = KTUtil.getRandomInt(1, 14);
						var user_img = '100_' + number + '.jpg';

						var output;
						if (number > 8) {
							output = '<div class="kt-user-card-v2">';
								/*output += '<div class="kt-user-card-v2__pic">';
									output += '<img src="https://keenthemes.com/metronic/preview/assets/media/users/'+ user_img+'" class="m-img-rounded kt-marginless" alt="photo">';  
								output += '</div>';*/
								output += '<div class="kt-user-card-v2__details">';
									output += '<span class="kt-user-card-v2__name">'+full['name']+' '+full['surname']+'</span>';
									output += '<a href="#" class="kt-user-card-v2__email kt-link">'+full['email']+'</a>';
								output += '</div>';
							output += '</div>';
						}else{
							var stateNo = KTUtil.getRandomInt(0, 7);
							var states = [
								'activo',
								'Desactivado'];
							var state = states[stateNo];

							output = '<div class="kt-user-card-v2">';
                                output += '<div class="kt-user-card-v2__pic">';
                                	/*output += '<div class="kt-badge kt-badge--xl kt-badge--'+state+'"><span>'+full['name']+' '+full['surname']+'</div></div>';
                                    output += '<div class="kt-user-card-v2__details">';*/
                                        output += '<span class="kt-user-card-v2__name">'+full['name']+'</span><br>';
                                        output += '<a href="#" class="kt-user-card-v2__email kt-link">'+full['email']+'</a>';
                            output += '</div></div>';
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
					render: function(data, type, full, meta){
						//Editar: 
						var edit = '<a href="/admin/users/'+full['id']+'/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos"><i class="la la-edit"></i></a>';

						//Eliminar:
						/*var eliminar = '<form method="POST" action="users/'+full['id']+'" class="frm-inline" role="form" accept-charset="UTF-8">';
                            eliminar += '<input name="_method" type="hidden" value="DELETE">';
                            eliminar += '<input type="hidden" name="_token" value="'+tokenDT+'">';
                            eliminar += '<button type="submit" class="btn btn-sm btn-clean btn-icon btn-icon-md frm-confirm" rel="tooltip" title="Eliminar" data-msg="¿Estás seguro de eliminar este usuario?"><i class="fa fa-trash"></i></button>';
                        eliminar += '</form>';*/
						var eliminar = '<a href="users/'+full['id']+'/delete" class="btn btn-sm btn-clean btn-icon btn-icon-md btn-confirm" title="Eliminar Usuario" data-msg="¿Estás seguro de eliminar este usuario?"><i class="la la-trash"></i></a>';

						return edit+' '+eliminar;
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
						var status = {
							1: {'title': 'Activo', 'class': ' kt-badge--success'},
							0: {'title': 'Bloqueado', 'class': ' kt-badge--danger'},							
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				}				
			]
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
		var tokenDT = $('meta[name="csrf-token"]').attr('content');

		// begin first table
		table.DataTable({
			"serverSide": false,
            /*"processing": true,*/
            "ajax": {
                "type": "GET",
                "url": "/api/admin/users/0",
                "error": function(reason){
                    console.log(reason);
                }
            },
			responsive: true,
			paging: true,
			"columns": [
                {data: 'name'},
                {data: 'email'},
                {data: 'state'},
                {data: 'id', className: 'text-right'}
            ],
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
                                    
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name">` + full['name'] + ` ` +full['surname']+ `</span>
                                        <a href="#" class="kt-user-card-v2__email kt-link">` + full['email'] + `</a>
                                    </div>
                                </div>`;

                                /*<div class="kt-user-card-v2__pic">
                                        <img src="https://keenthemes.com/metronic/preview/assets/media/users/` + user_img + `" class="m-img-rounded kt-marginless" alt="photo">
                                    </div> */
						}else{
							var stateNo = KTUtil.getRandomInt(0, 7);
							var states = [
								'activo',
								'Desactivado'];
							var state = states[stateNo];

							output = `
                                <div class="kt-user-card-v2">
                                    <div class="kt-user-card-v2__details">
                                        <span class="kt-user-card-v2__name">` + full['name'] + ` `+full['surname']+`</span>
                                        <a href="#" class="kt-user-card-v2__email kt-link">` + full['email'] + `</a>
                                    </div>
                                </div>`;

                                /* <div class="kt-user-card-v2__pic">
                                        <div class="kt-badge kt-badge--xl kt-badge--` + state + `"><span>` + full['name']+' '+full['surname']+ `</div>
                                    </div> */
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
					render: function(data, type, full, meta){
						//Editar: 
						var edit = '<a href="/admin/users/'+full['id']+'/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos"><i class="la la-edit"></i></a>';

						var eliminar = '<a href="users/'+full['id']+'/delete" class="btn btn-sm btn-clean btn-icon btn-icon-md btn-confirm" title="Eliminar Cliente" data-msg="¿Estás seguro de eliminar este cliente?"><i class="la la-trash"></i></a>';

						return edit+' '+eliminar;

						/*return `
                        <a href="editar-clientes.html" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos">
                          <i class="la la-edit"></i>
                        </a>
						 <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Eliminar Cliente">
                          <i class="la la-trash"></i>
                        </a>`; */
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						var status = {
							1: {'title': 'Activo', 'class': ' kt-badge--success'},
							0: {'title': 'Bloqueado', 'class': ' kt-badge--danger'},							
						};
						if (typeof status[data] === 'undefined') {
							return data;
						}
						return '<span class="kt-badge ' + status[data].class + ' kt-badge--inline kt-badge--pill">' + status[data].title + '</span>';
					},
				}			
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
			"serverSide": false,
            /*"processing": true,*/
            "ajax": {
                "type": "GET",
                "url": "/api/admin/contracts",
                "error": function(reason){
                    console.log(reason);
                }
            },
			responsive: true,
			paging: true,
			"columns": [
                {data: 'id'},
                {data: 'name'},
                {data: 'author_id'},
                {data: 'alta'},
                {data: 'state'},
                {data: 'id', className: 'text-right'}
            ],
			columnDefs: [				
				{
					targets: -1,
					title: 'Acciones',
					orderable: false,
					render: function(data, type, full, meta){
						//Editar: 
						var edit = '<a href="/admin/contracts/'+full['id']+'/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos"><i class="la la-edit"></i></a>';

						//Eliminar:
						var eliminar = '<a href="contracts/'+full['id']+'/delete" class="btn btn-sm btn-clean btn-icon btn-icon-md btn-confirm" title="Eliminar Contrato" data-msg="¿Estás seguro de eliminar este contrato?"><i class="la la-trash"></i></a>';

						//Vista previa:
						var preview = '<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Vista previa"><i class="la la-file-pdf-o"></i></a>';

						return edit+' '+eliminar+' '+preview;


						/*return `
                        <a href="" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos">
                          <i class="la la-edit"></i>
                        </a>
						 <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Eliminar Formulario">
                          <i class="la la-trash"></i>
						</a>
						<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Vista previa">
						<i class="la la-file-pdf-o"></i>
                        </a>`;*/
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						return full['Nombre']+' '+full['surname'];
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
			"serverSide": false,
            /*"processing": true,*/
            "ajax": {
                "type": "GET",
                "url": "/api/admin/payments",
                "error": function(reason){
                    console.log(reason);
                }
            },
			responsive: true,
			paging: true,
			"columns": [
                {data: 'id'},
                {data: 'name'},
                {data: 'Nombre'},
                {data: 'payment_date'},
                {data: 'payment_method'},
                {data: 'state'},
                {data: 'id', className: 'text-right'}
            ],
			columnDefs: [
				{
					targets: -1,
					title: 'Acciones',
					orderable: false,
					render: function(data, type, full, meta) {
						//Editar: 
						var edit = '<a href="/admin/user_contracts/'+full['id']+'/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos"><i class="la la-edit"></i></a>';

						//Eliminar:
						var eliminar = '<a href="user_contracts/'+full['id']+'/delete" class="btn btn-sm btn-clean btn-icon btn-icon-md btn-confirm" title="Eliminar Contrato" data-msg="¿Estás seguro de eliminar este contrato?"><i class="la la-trash"></i></a>';

						return edit+' '+eliminar

						/*return `
                        <a href="editar-pagos.html" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos">
                          <i class="la la-edit"></i>
                        </a>
						 <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Eliminar Pago">
                          <i class="la la-trash"></i>
                        </a>`;*/
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						return full['Nombre']+' '+full['surname'];
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
			"serverSide": false,
            /*"processing": true,*/
            "ajax": {
                "type": "GET",
                "url": "/api/admin/revisiones",
                "error": function(reason){
                    console.log(reason);
                }
            },
			responsive: true,
			paging: true,
			"columns": [
                {data: 'id'},
                {data: 'name'},
                {data: 'Nombre'},
                {data: 'alta'},
                {data: 'state'},
                {data: 'id', className: 'text-right'}
            ],
			columnDefs: [				
				{
					targets: -1,
					title: 'Acciones',
					orderable: false,
					render: function(data, type, full, meta){
						//Editar: 
						var edit = '<a href="/admin/user_contracts/'+full['id']+'/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos"><i class="la la-edit"></i></a>';

						//Eliminar:
						var eliminar = '<a href="user_contracts/'+full['id']+'/delete" class="btn btn-sm btn-clean btn-icon btn-icon-md btn-confirm" title="Eliminar Contrato" data-msg="¿Estás seguro de eliminar este contrato?"><i class="la la-trash"></i></a>';

						//Vista previa:
						var preview = '<a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Vista previa"><i class="la la-file-pdf-o"></i></a>';

						return edit+' '+eliminar+' '+preview

						/*return `
                        <a href="editar-bloques-form.html" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Formulario">
                          <i class="la la-edit"></i>
                        </a>
						 <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Eliminar Formulario">
                          <i class="la la-trash"></i>
						</a>`; */
					},
				},
				{
					targets: 2,
					render: function(data, type, full, meta) {
						return full['Nombre']+' '+full['surname'];
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
			]
		});
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable5();
		}
	};
}();

var KTDatatablesAdvancedColumnRenderingCategorias = function() {
	var initTable6 = function() {
		var table = $('#kt_table_6');

		table.DataTable({
			"serverSide": false,
            /*"processing": true,*/
            "ajax": {
                "type": "GET",
                "url": "/api/admin/categories",
                "error": function(reason){
                    console.log(reason);
                }
            },
            responsive: true,
			paging: true,
			"columns": [
                {data: 'name'},
                {data: 'id', className: 'text-right'}
            ],
            columnDefs: [
            	{
					targets: -1,
					title: 'Acciones',
					orderable: false,
					render: function(data, type, full, meta){
						//Editar: 
						var edit = '<a href="/admin/categories/'+full['id']+'/edit" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Editar Datos"><i class="la la-edit"></i></a>';

						//Eliminar:
						var eliminar = '<a href="/admin/categories/'+full['id']+'/destroy" class="btn btn-sm btn-clean btn-icon btn-icon-md btn-confirm" title="Eliminar Categoría" data-msg="¿Estás seguro de eliminar esta categoría?"><i class="la la-trash"></i></a>';

						return edit+' '+eliminar
					}
				}

            ]
        });
	};

	return {

		//main function to initiate the module
		init: function() {
			initTable6();
		}
	};
}();

jQuery(document).ready(function() {
	KTDatatablesAdvancedColumnRenderingUsuarios.init();
	KTDatatablesAdvancedColumnRenderingFormularios.init();
	KTDatatablesAdvancedColumnRenderingPagos.init();
	KTDatatablesAdvancedColumnRenderingClientes.init();
	KTDatatablesAdvancedColumnRenderingFormulariosCreados.init();
	KTDatatablesAdvancedColumnRenderingCategorias.init();
});