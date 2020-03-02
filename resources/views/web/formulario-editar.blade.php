@extends('layouts.app')

@section('content')

<!-- Content
============================================= -->
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">
            <div class="col_half">
                <h2>Rellenar Formulario</h2>

                <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Nombre <b>(1)</b></label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="Nombre">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Apellidos <b>(2)</b></label>
                                        <input type="password" class="form-control" id="inputPassword4" placeholder="Apellidos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Fecha <b>(3)</b></label>
                                    <input type="date" class="form-control" id="inputAddress" placeholder="">
                                </div>                                           
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Dirección <b>(4)</b></label>
                                        <input type="text" class="form-control" id="inputCity">
                                    </div>                                               
                                    <div class="form-group col-md-4">
                                        <label for="inputZip">Fecha Compra <b>(5)</b></label>
                                        <input type="date" class="form-control" id="inputZip">
                                    </div>
                                    <div class="form-group col-md-2">
                                            <label for="inputState">Hijos <b>(6)</b></label>
                                            <select id="inputState" class="form-control">
                                                <option selected>Elegir...</option>
                                                <option>0</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>

                                            </select>
                                        </div>
                                </div>                                           
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                    </div>

                    <div class="col_half col_last">
                        <h2>Contrato Divorcio</h2>
                        <p class="lead">Donec sed odio dui. Nulla vitae elit libero, <b>(1)Nombre</b> a pharetra augue. Nullam id dolor id nibh ultricies <b>(2)Apellidos</b> vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. <b>(3)Fecha</b> mollis, est non commodo luctus.</p>
                        <p class="lead">Donec sed odio dui. Nulla vitae elit libero, <b>(4)Dirección</b> a pharetra augue. Nullam id dolor id nibh ultricies <b>(5)Fecha compra</b> vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. <b>(6)Numero de Hijos</b> mollis, est non commodo luctus.</p>
                    </div>
		</div>
	</div>
</section>
<!-- #content end -->

@endsection