<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProProcess;

class ProcessController extends Controller
{
    public function index()
    {
        $processes = ProProcess::all();
        return view('innClod.process.index', compact('processes'));
    }

    public function store(Request $request)
    {
        $process = new ProProcess;
        $process->pro_name = $request->name;
        $process->pro_prefix = $request->prefix;
        $process->save();

        return back()->with('message', 'Proceso creado correctamente.')->with('color', 'bg-success');
    }

    public function update(Request $request, $id)
    {

        $process = ProProcess::find($id);

        if (!$process) {
            return back()->with('error', 'Proceso no encontrado.')->with('color', 'bg-danger');
        }

        $process->pro_name = $request->name;
        $process->pro_prefix = $request->prefix;
        $process->save();

        return back()->with('message', 'Proceso actualizado correctamente.')->with('color', 'bg-success');
    }

    public function destroy($id)
    {
        $process = ProProcess::find($id);

        if (!$process) {
            return back()->with('message', 'Proceso no encontrado.')->with('color', 'bg-danger');
        }

        $process->delete();

        return back()->with('message', 'Proceso eliminado correctamente.')->with('color', 'bg-success');
    }
}
