@extends('layouts.master')
@section('contenido')
	<h1> HOLA MUNDO CRUEL </h1>
@endsection

@push('scripts')
   <script type="text/apis/javascript" src={{asset('js/mascotas.js')}}></script>
@endpush