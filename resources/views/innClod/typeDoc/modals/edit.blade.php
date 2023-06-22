<div class="modal fade" id="editTypeDocument{{ $typeDoc->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Editar Proceso {{ $typeDoc->tip_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Vista para la creación de documentos -->
                <form action="{{ route('typeDocument.update', $typeDoc->id) }}" method="post">
                    @csrf
                    <div class="ro">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class ="form-control" name="name" placeholder="Nombre del proceso" id="name" value="{{ $typeDoc->tip_name }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="prefix" class="form-label">Nombre</label>
                            <input type="text" class ="form-control" name="prefix" placeholder="Prefijo del proceso" id="prefix" value="{{ $typeDoc->tip_prefix }}">
                        </div>
                        
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;Editar tipo de documento</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
