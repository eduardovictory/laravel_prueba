@extends('genericos.modal-form-generico')
@section('content')

<div class="row">
    <div class="col-4">
        <p class="col text-right">Nombre:</p>
    </div>
    <div class="col-8">
        <input name="nombre" id="nombre" type="text" value="{{ $datos['nombre'] }}" />
    </div>
</div>
<div class="row">
    <div class="col-4">
        <p class="col text-right">Observacion:</p>
    </div>
    <div class="col-8">
        <input name="observacion" id="observacion" type="text" value="{{ $datos['observacion'] }}" />
    </div>
</div>
<div class="row">
    <div class="col-4">
        <p class="col text-right">Precio:</p>
    </div>
    <div class="col-8">
        <input name="precio" id="precio" type="number" value="{{ $datos['precio'] }}" />
    </div>
</div>

@endsection