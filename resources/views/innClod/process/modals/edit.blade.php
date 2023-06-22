<div class="modal fade" id="editProcess{{ $process->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Editar Proceso {{ $process->doc_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Vista para la creación de documentos -->
                <form action="{{ route('process.update', $process->id) }}" method="post">
                    @csrf
                    <div class="ro">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class ="form-control" name="name" placeholder="Nombre del proceso" id="name" value="{{ $process->pro_name }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="prefix" class="form-label">Nombre</label>
                            <input type="text" class ="form-control" name="prefix" placeholder="Prefijo del proceso" id="prefix" value="{{ $process->pro_prefix }}">
                        </div>
                        
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;Editar proceso</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
