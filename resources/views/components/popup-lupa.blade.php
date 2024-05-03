<!DOCTYPE html>
<html>

<head>
    <title>Laravel Pruebas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div id="menu-titulo" class="card-header">
                        Seleccionar
                    </div>
                    <div class="card-body" id="menu">
                        <table class="table" id="tabla-{{ $campo }}">
                            <thead>
                                <tr>
                                    <th scope="col" width="20%">ID</th>
                                    <th scope="col" width="60%">Nombre</th>
                                    <th scope="col" width="20%">Seleccionar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipificador as $key => $tip)
                                <tr>
                                    <th scope="row">
                                        {{ $tip['id'] }}
                                    </th>
                                    <td>
                                        {{ $tip['nombre'] }}
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" onclick="enviarDatos({{ $tip['id'] }}, '{{ $tip['nombre'] }}')">Seleccionar</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function enviarDatos(id, nombre) {
        // Acceder al objeto window del padre y llamar a una función definida en él
        if (window.opener && !window.opener.closed) {

            var datos = {
                campo: "{{ $campo }}",
                id: id,
                nombre: nombre
            }

            window.opener.recibirDatos(datos);
        }

        window.close();
    }
</script>