<div class="row align-items-center">
    <div class="col-3">
        <input name="{{ $campo }}" id="tipificador-{{ $campo }}" class="form-control" />
    </div>
    <div class="col-2">
        <a id="lupa-{{ $campo }}" href="{{ route('lupa', ['campo' => $campo]) }}" class="btn btn-primary">
            🔎
        </a>
    </div>
    <div class="col-5" id="nomb-tipificador-{{ $campo }}">
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#lupa-{{ $campo }}').click(function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            var width = 600;
            var height = 400;
            var left = (screen.width - width) / 2; // Posición izquierda de la ventana emergente
            var top = (screen.height - height) / 2; // Posición superior de la ventana emergente
            window.open(url, '_blank', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=' + width + ', height=' + height + ', top=' + top + ', left=' + left); // Abrir ventana emergente
        });
    });

    function recibirDatos(datos) {
        $(`#tipificador-${datos.campo}`).val(datos.id);
        $(`#nomb-tipificador-${datos.campo}`).text(datos.nombre);
    }
</script>