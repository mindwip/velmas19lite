@extends ('admin.partials.layout')

@section('content')

<div class="kt-container kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="kt-portlet" id="kt_portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon-pages">
                            <i class="flaticon-calendar"></i>
                        </span>
                        <h3 class="kt-portlet__head-title-pages">
                           Formularios Tipo
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('contracts.create') }}" class="btn btn-primary btn-elevate">
                            <i class="la la-plus"></i>
                            Crear Formulario
                        </a>
                    </div>
                </div>
                
                <div class="kt-portlet__body">
                	<!--begin: Datatable -->
                    <table
                        class="table table-striped- table-bordered table-hover table-checkable"
                        id="kt_table_2">
                        <thead>
                            <tr>
								<th>ID.Form</th>
                                <th>Descripción</th>
                                <th>Creado por</th>
                                <th>Fecha Creación</th>                                                        
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
	