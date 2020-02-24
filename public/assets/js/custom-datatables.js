/* DATATABLES: */

$(document).ready(function(){
	//Configuración general datatables:
    $.extend(true, $.fn.dataTable.defaults, {
        dom: "Blfrtip",
        buttons: [
            'excel', 'print', 'pdf'
        ],
        "language" : {
            "url": "/plugins/datatables/lang/es.json"
        },
        initComplete: function(){
            //Búsqueda automática al clicar sobre el td.filtro:
            var api = this.api();
            api.$('td.filtro').click(function(){
                api.search(this.innerHTML).draw();
            });
        }
    });

	$('.dTable').DataTable({
        stateSave: true,    //Guarda página al refrescar. 
    });

    //Tabla users:
    if($('#tblUsers').length > 0){
        var user = $('#sessionUser').val();
        var tokenDT = $('meta[name="csrf-token"]').attr('content');
        
        $('#tblUsers').DataTable({
            "serverSide": false,
            /*"processing": true,*/
            "ajax": {
                "type": "GET",
                "url": "/api/admin/users/"+user,
                "error": function(reason){
                    console.log(reason);
                }
            },
            "columns": [
                {data: 'id'},
                {data: 'id', className: 'text-right'},
                {data: 'email'},
                {data: 'Role'},
                {data: 'id', className: 'text-center'},
                {data: 'id', className: 'text-right'}
            ],
            "columnDefs": [
                {"targets": 0,
                "render": function(data, type, row){
                    return row['name']+' '+row['surname'];
                }
                },
                {"targets": 1,
                "render": function(data, type, row){
                    return row['alta'];
                }
                },
                {"targets": 3,
                "render": function(data, type, row){
                    if(row['Role']){
                        return row['Role'];    
                    }else{
                        return '';
                    }                    
                }
                },
                {"targets": 4,
                "render": function(data, type, row){
                    if(row['Image'] ){
                        return '<img src="/img/users/'+row['Image']+'" width="50">';      
                    }else{
                        return '<i class="fa fa-user-circle icono"></i>';    
                    }                   
                }
                },
                {"targets": 5,
                "render": function(data, type, row){
                    //Estado:
                    if(row['editar']){
                        var checked = (row['state'] == 1)? 'checked':'';
                        var estado = '<label class="custom-chk-rdb" rel="tooltip" title="'+txtUsuarioOnOff+'">';
                            estado += '<input type="checkbox" name="state" '+checked+' ><span class="chk" data-id="'+row['id']+'" data-ctrl="users/state"></span>';
                        estado += '</label>';
                    }else{
                        var estado = '';
                    }

                    //Ver usuario:
                    if(row['ver']){
                        var ver = '<a href="/admin/users/'+row['id']+'" class="btn btn-primary btn-sm" rel="tooltip" title="'+txtVer+'"><i class="fa fa-eye"></i></a>';
                    }else{
                        var ver = '';
                    }

                    //Editar:
                    if(row['editar']){
                        var editar = '<a href="/admin/users/'+row['id']+'/edit" class="btn btn-sm btn-info btn-module" rel="tooltip" title="'+txtEditar+'"><i class="fa fa-edit"></i></a>';
                    }else{
                        var editar = '';
                    }

                    // Notificar:
                    var notif = '<a href="#" class="btn btn-warning btn-sm btn-notif" rel="tooltip" title="'+txtNotificar+'" data-toggle="modal" data-target="#modal-new-notification" data-id="'+row['id']+'" data-user="'+row['name']+' '+row['surname']+'"><i class="fa fa-bell"></i></a>';

                    //Eliminar:
                    if(row['eliminar']){
                        var eliminar = '<form method="POST" action="users/'+row['id']+'" class="frm-inline" role="form" accept-charset="UTF-8">';
                            eliminar += '<input name="_method" type="hidden" value="DELETE">';
                            eliminar += '<input type="hidden" name="_token" value="'+tokenDT+'">';
                            eliminar += '<button type="submit" class="btn btn-sm btn-danger frm-confirm" rel="tooltip" title="'+txtUsuarioEliminar+'" data-msg="'+txtUsuarioConfirmEliminar+'"><i class="fa fa-trash"></i></button>';
                        eliminar += '</form>';
                    }else{
                        var eliminar = '';
                    }

                    return estado+' '+ver+' '+editar+' '+notif+' '+eliminar;
                }
                }
            ]
        });
    }

});