<?php

namespace App\Http\Controllers;

use App\Models\DocDocument;
use App\Models\ProProcess;
use App\Models\TipTipoDoc;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = DocDocument::with(['typeDocument', 'process'])->get();
        $processes = ProProcess::all();
        $typeDocuments = TipTipoDoc::all();

        return view('innClod.documents.index', compact('documents','processes', 'typeDocuments'));
    }

    public function store(Request $request)
    {
        $document = new DocDocument;
        $document->doc_name = $request->name;
        $document->doc_content = $request->content;
        $document->doc_id_type = $request->type_document;
        $document->doc_id_process = $request->process;
        $document->doc_code = $this->generateCodeDocument($request->type_document, $request->process);
        $document->save();

        return back()->with('message', 'Documento creado correctamente.')->with('color', 'bg-success');
    }


    public function update(Request $request, $id)
    {

        $document = DocDocument::findOrFail($id);
        $document->doc_name = $request->name;
        $document->doc_content = $request->content;
        $document->doc_id_type = $request->type_document;
        $document->doc_id_process = $request->process;

        if ($document->isDirty('doc_id_type') || $document->isDirty('doc_id_process')) {
            $document->doc_code = $this->generateCodeDocument($request->type_document, $request->process);
        }

        $document->save();

        return redirect()->route('documents.index')->with('message', 'Documento actualizado correctamente.')->with('color', 'bg-success');
    }

    public function destroy($id)
    {
        $document = DocDocument::findOrFail($id);
        $document->delete();

        return redirect()->route('documents.index')->with('message', 'Documento eliminado correctamente.')->with('color', 'bg-success');
    }

    private function generateCodeDocument($typeDocumentId, $processId)
    {
        $typeDocument = TipTipoDoc::findOrFail($typeDocumentId);
        $process = ProProcess::findOrFail($processId);

        $consecutive = DocDocument::where('doc_id_type', $typeDocumentId)
            ->where('doc_id_process', $processId)
            ->count() + 1;

        return $typeDocument->tip_prefix . '-' . $process->pro_prefix . '-' . $consecutive;
    }
}
