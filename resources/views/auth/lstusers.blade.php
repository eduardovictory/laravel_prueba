@extends('auth.layouts')
@section('content')

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <strong>LISTADO USUARIOS</strong>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($users as $key => $user)
          <tr>
            <th scope="row">{{ $user['id'] }}</th>
            <td>{{ $user['name'] }}</td>
            <td>{{ $user['email'] }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection