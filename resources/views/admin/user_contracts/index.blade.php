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
                           Revisión de contratos
                        </h3>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable"
                        id="kt_table_5">
                        <thead>
                            <tr>
                                <th>ID.Form</th>
                                <th>Descripción</th>
                                <th>Cliente</th>
                                <th>Fecha Creación</th>  
                                <th>Estado</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <tr>
                                <td>1234</td>
                                <td>Cláusulas Suelo</td>
                                <td>Manuel</td>
                                <td>19/12/2018</td>
                                <td>1</td>                                                       
                                <td nowrap></td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
    <!-- end:: Content -->
</div>

@endsection