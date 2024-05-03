<select name="{{ $campo }}" id="tipificador-{{ $campo }}">
</select>

<script>
    $(document).ready(function() {

        $.ajax({
            url: "http://127.0.0.1:8000/api/gettipificador?campo={{ $campo }}",
            method: "GET"
        }).then(function(data) {
            var datos = data[0];

            $('[name="{{ $campo }}"]').empty();

            var option = $('<option>', {
                value: 0,
                text: '-'
            });

            $('[name="{{ $campo }}"]').append(option);

            for (var tip in datos) {
                var tipObject = datos[tip];

                var option = $('<option>', {
                    value: tipObject.id,
                    text: tipObject.nombre
                });

                //$('#tipificador-{{ $campo }}').append(option);
                $('[name="{{ $campo }}"]').append(option);
            }

        });
    });
</script>