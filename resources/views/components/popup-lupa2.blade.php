<!-- Modal -->
<div class="modal" id="modalLupa-{{ $campo }}" tabindex="-1" role="dialog" aria-labelledby="lupa" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">Seleccionar</h5>
                <button type="button" class="close" onclick="cerrarLupa()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
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

<script>
    function enviarDatos(id, nombre) {
        $("#tipificador-{{$campo}}").val(id);
        $("#nomb-tipificador-{{$campo}}").text(nombre);
        $("modalLupa-{{ $campo }}").modal('hide');
        cerrarLupa();
    }

    function cerrarLupa() {
        $("#modalLupa-{{ $campo }}").modal('hide');
        $("#modalLupa-{{ $campo }}").modal('dispose');
        $("#lupa-componente-{{ $campo }}").empty();
    }
</script>