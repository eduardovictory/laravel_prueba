@extends('auth.layouts')
@section('content')

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <div class="row justify-content-between">
          <div class="col">
            <strong>LISTADO PEDIDOS</strong>
          </div>
          <div class="col-auto">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPedidos">
              NUEVO
            </button>
          </div>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col" width="5%">ID</th>
            <th scope="col" width="15%">Nombre</th>
            <th scope="col" width="15%">Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pedidos as $key => $pedido)
          <tr>
            <th scope="row">
              {{ $pedido['id'] }}
            </th>
            <td>
              {{ $pedido['nombre_usuario'] }}
            </td>
            <td>
              <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#modalPedidos" data-idpedido="{{ $pedido['id'] }}">
                Editar
              </button>
              <a href="{{ route('deletepedido', ['id' => $pedido['id']]) }}" class="btn btn-danger">
                Eliminar
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<x-modal-pedidos2 />

@endsection