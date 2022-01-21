@extends('layouts.master')
@section('titulo','VENTAS') 
@section('contenido')
<div id='apiVenta'> <!--INICIO-->
	<div class="container"><!--INICIO DE CONTAINER-->
		<div class="row"><!--INICIO DE ROW-->
			<div class="col-md-4"><!--INICIO DE COL TABLA-->
				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="Escriba el codigo del producto"  aria-describedby="basic-addon2" v-model="sku">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button">Buscar</button>
						</div>
					
				</div>
			</div><!--FIN DE COL TABLA-->
		</div><!--FIN DE ROW-->
		<!--<h1>@{{mensaje}}</h1>--> 
	</div><!--FIN DE CONTAINER-->
</div><!--FIN DE INICIO-->

@endsection

@push('scripts') 
<script type="text/javascript" src="js/vue-resource.js"></script>
<script type="text/javascript" src="js/apis/apiVenta.js"></script>
@endpush 