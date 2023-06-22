<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipTipoDoc;

class TypeDocumentController extends Controller
{
    public function index()
    {
        $typeDocs = TipTipoDoc::all();
        return view('innClod.typeDoc.index', compact('typeDocs'));
    }

    public function store(Request $request)
    {
        $typeDoc = new TipTipoDoc;
        $typeDoc->tip_name = $request->name;
        $typeDoc->tip_prefix = $request->prefix;
        $typeDoc->save();

        return back()->with('message', 'Tipo de Documento creado correctamente.')->with('color', 'bg-success');
    }

    public function update(Request $request, $id)
    {

        $typeDoc = TipTipoDoc::find($id);

        if (!$typeDoc) {
            return back()->with('error', 'Tipo de Documento no encontrado.')->with('color', 'bg-danger');
        }

        $typeDoc->tip_name = $request->name;
        $typeDoc->tip_prefix = $request->prefix;
        $typeDoc->save();

        return back()->with('message', 'Tipo de Documento actualizado correctamente.')->with('color', 'bg-success');
    }

    public function destroy($id)
    {
        $typeDoc = TipTipoDoc::find($id);

        if (!$typeDoc) {
            return back()->with('message', 'Tipo de Documento no encontrado.')->with('color', 'bg-danger');
        }

        $typeDoc->delete();

        return back()->with('message', 'Tipo de Documento eliminado correctamente.')->with('color', 'bg-success');
    }
}
