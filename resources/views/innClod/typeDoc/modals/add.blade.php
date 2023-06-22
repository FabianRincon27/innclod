<div class="modal fade" id="newTypeDocument" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Registrar Nuevo Tipo de Documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Vista para la creación de documentos -->
                <form action="{{ route('typeDocument.store') }}" method="post">
                    @csrf
                    <div class="ro">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class ="form-control" name="name" placeholder="Nombre del proceso" id="name">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="prefix" class="form-label">Prefijo</label>
                            <input type="text" class ="form-control" name="prefix" placeholder="Prefijo del proceso" id="prefix">
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;Crear tipo de documento</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
