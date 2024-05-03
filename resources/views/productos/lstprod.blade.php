@extends('auth.layouts')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <strong>LISTADO PRODUCTOS</strong>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" width="5%">ID</th>
                        <th scope="col" width="15%">Nombre</th>
                        <th scope="col" width="15%">Observacion</th>
                        <th scope="col" width="15%">Tipo Producto</th>
                        <th scope="col" width="10%">Deposito</th>
                        <th scope="col" width="10%">Precio</th>
                        <th scope="col" width="30%">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $key => $prod)
                    <tr>
                        <th scope="row">
                            {{ $prod['id'] }}
                        </th>
                        <td>
                            {{ $prod['nombre'] }}
                        </td>
                        <td>
                            {{ $prod['observacion'] }}
                        </td>
                        <td>
                            {{ $prod['tipo_nombre'] }}
                        </td>
                        <td>
                            {{ $prod['deposito_nombre'] }}
                        </td>
                        <td>
                            {{ $prod['precio'] }}
                        </td>
                        <td>
                            <a href="{{ route('delete.producto', ['id' => $prod['id']]) }}" class="btn btn-danger">
                                Eliminar
                            </a>
                            <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#modalProductos" data-idprod="{{ $prod['id'] }}">
                                Editar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<x-modal-productos3>
    <x-slot name="title">
        Editar Producto
    </x-slot>
</x-modal-productos3>
@endsection