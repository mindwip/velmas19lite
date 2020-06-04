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
                           Categorías
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-elevate">
                            <i class="la la-plus"></i>
                            Crear categoría
                        </a>
                    </div>
                </div>
                
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table
                        class="table table-striped- table-bordered table-hover table-checkable"
                        id="kt_table_6">
                        <thead>
                            <tr>
                                <th>Categoría</th>
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

@push('scripts')
<script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo1/pages/crud/datatables/advanced/column-rendering.js') }}" type="text/javascript"></script>
@endpush

@endsection