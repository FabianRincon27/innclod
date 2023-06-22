@extends('innClod.layouts.app')
@section('title', 'Documentos')

@section('content')
    <div class="row justify-content-between mb-3">
        <div class="col-auto">
            <h5 class="mt-2">Documentos</h5>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newDocument">
                <span data-bs-toggle="tooltip" data-bs-offset="0,1" data-bs-placement="top" data-bs-html="true"
                    title="" data-bs-original-title="<span>Crear Documento</span>"><i
                        class="fas fa-plus"></i></span>
            </button>
            @include('innClod.documents.modals.add')
        </div>
    </div>
    <div class="card h-auto h-100">
        <div class="table-responsive text-nowrap table-hover p-t mt-4" style="min-height: 30rem;">
            <table class="table data-table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Tipo de Documento</th>
                        <th>Proceso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($documents as $document)
                    @include('innClod.documents.modals.edit')
                        <tr>
                            <td>{{ $document->doc_code }}</td>
                            <td>{{ $document->doc_name }}</td>
                            <td>{{ $document->typeDocument->tip_name }}</td>
                            <td>{{ $document->process->pro_name }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button"
                                        class="btn btn-icon rounded-pill dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li>
                                            <button class="dropdown-item pointer" data-bs-toggle="modal" data-bs-target="#editDocument{{ $document->id }}">
                                                <i class="fas fa-edit"></i>&nbsp; Editar
                                            </button>
                                        </li>
                                        <li>
                                            <form action="{{ route('documents.destroy', $document->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="dropdown-item pointer text-danger"><i class="fas fa-trash"></i>&nbsp; Eliminar</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <a href="{{ route('documentos.edit', $document->doc_id) }}">Editar</a> --}}
                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection