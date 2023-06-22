@extends('innClod.layouts.app')
@section('title', 'Tipos De Documentos')

@section('content')
    <div class="row justify-content-between mb-3">
        <div class="col-auto">
            <h5 class="mt-2">Tipos De Documentos</h5>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTypeDocument">
                <span data-bs-toggle="tooltip" data-bs-offset="0,1" data-bs-placement="top" data-bs-html="true"
                    title="" data-bs-original-title="<span>Crear Tipo de Documento</span>"><i
                        class="fas fa-plus"></i></span>
            </button>
            @include('innClod.typeDoc.modals.add')
        </div>
    </div>
    <div class="card h-auto h-100">
        <div class="table-responsive text-nowrap table-hover p-t mt-4" style="min-height: 30rem;">
            <table class="table data-table table-striped">
                <thead>
                    <tr class="text-nowrap">
                        <th>Nombre</th>
                        <th>Prefijo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($typeDocs as $typeDoc)
                    @include('innClod.typeDoc.modals.edit')
                        <tr>
                            <td>{{ $typeDoc->tip_name }}</td>
                            <td>{{ $typeDoc->tip_prefix }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button"
                                        class="btn btn-icon rounded-pill dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                        <li>
                                            <button class="dropdown-item pointer" data-bs-toggle="modal" data-bs-target="#editTypeDocument{{ $typeDoc->id }}">
                                                <i class="fas fa-edit"></i>&nbsp; Editar
                                            </button>
                                        </li>
                                        <li>
                                            <form action="{{ route('typeDocument.destroy', $typeDoc->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="dropdown-item pointer text-danger"><i class="fas fa-trash"></i>&nbsp; Eliminar</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection