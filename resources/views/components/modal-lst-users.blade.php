<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Filtros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-4">
                        <p class="col text-right">Nombre:</p>
                    </div>
                    <div class="col-8">
                        <input id="nombre" type="text" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <p class="col text-right">Email:</p>
                    </div>
                    <div class="col-8">
                        <input id="email" type="text" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="redirigirUsers()">Buscar</button>
            </div>
        </div>
    </div>
</div>

<script>
    function redirigirUsers() {

        const email = document.getElementById('email').value;
        const nombre = document.getElementById('nombre').value;

        const url = "{{ route('lstusers')}}" + '?email=' + encodeURIComponent(email) + '&nombre=' + encodeURIComponent(nombre);
        window.location.href = url;
    }
</script>