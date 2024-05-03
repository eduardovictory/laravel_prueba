@extends('auth.layouts')
@section('content')

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <form method="POST" action="{{route('newpedido') }}">
        <div>
          USUARIO:
          <input name="nombre_usuario" />
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
              <th scope="col" width="30%">Cantidad</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $key => $prod)
            <tr id="producto{{ $prod['id'] }}">
              <th scope="row">
                <input hidden name="productos[]" value="{{ $prod['id'] }}" />
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
                <input type="number" name="cantidad[]" />
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <button class="btn btn-primary">CONFIRMAR</button>

      </form>
    </div>
  </div>
</div>

@endsection