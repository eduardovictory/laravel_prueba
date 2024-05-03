<div class="row align-items-center">
    <div class="col-3">
        <input name="{{ $campo }}" id="tipificador-{{ $campo }}" class="form-control" />
    </div>
    <div class="col-2">
        <button class="btn btn-primary" id="btn-tipificador-{{ $campo }}">
            🔎
        </button>
    </div>
    <div class="col-5" id="nomb-tipificador-{{ $campo }}">
    </div>
</div>

<div id="lupa-componente-{{ $campo }}">

</div>

<script>
    $(document).ready(function() {
        $('#btn-tipificador-{{ $campo }}').click(function(e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("renderizar_lupa") }}',
                method: 'GET',
                data: {
                    campo: "{{ $campo }}"
                },
                success: function(response) {
                    $('#lupa-componente-{{ $campo }}').empty();
                    $('#lupa-componente-{{ $campo }}').append(response);
                    $('#modalLupa-{{ $campo }}').modal('show');
                }
            });
        });

        $('#tipificador-{{ $campo }}').change(function(e) {
            e.preventDefault();

            $.ajax({
                url: "http://127.0.0.1:8000/api/gettipificador?campo={{ $campo }}&id=" + $("#tipificador-{{ $campo }}").val(),
                method: 'GET',
                success: function(response) {
                    res = response[0];
                    if (res[0]) {
                        $("#tipificador-{{$campo}}").val(res[0].id);
                        $("#nomb-tipificador-{{$campo}}").text(res[0].nombre);
                    } else {
                        alert('ID incorrecto.')
                    }
                }
            });
        });
    });
</script>