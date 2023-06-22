<div class="modal fade" id="newDocument" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Registrar Nuevo Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Vista para la creación de documentos -->
                <form action="{{ route('documents.store') }}" method="post">
                    @csrf
                    <div class="ro">
                        <div class="col-md-12 mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class ="form-control" name="name" placeholder="Nombre del documento" id="name">
                        </div>
                        
                        <div class="col-md-12 mb-3">
                            <label for="type_document" class="form-label">Tipo de Documento</label>
                            <select name="type_document" class="form-select" id="type_document">
                                @foreach($typeDocuments as $type)
                                    <option value="{{ $type->id }}">{{ $type->tip_name }} ({{ $type->tip_prefix }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="process" class="form-label">Proceso</label>
                            <select name="process" class="form-select" id="process">
                                @foreach($processes as $process)
                                    <option value="{{ $process->id }}">{{ $process->pro_name }} ({{ $process->pro_prefix }})</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3" id="content">
                            <label for="content" class="form-label">Contenido del Documento</label>
                            <textarea name="content" rows="8" class="form-control" placeholder="Contenido del documento"></textarea>
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;Crear documento</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
