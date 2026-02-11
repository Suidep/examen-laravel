<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpKernel\HttpCache\Store;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $buscar = trim($request->get("buscar"));
        $clientes = DB::table("clientes")
                        ->select('*')
                        ->where('nombre', 'LIKE', '%' . $buscar . '%')
                        ->orWhere('email', 'LIKE', '%' . $buscar . '%')
                        ->orderBy('nombre', 'asc')
                        ->paginate(10);

        return view('cliente.index', compact('clientes', 'buscar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos = $request->except('_token');

        if ($request->hasFile('logo')){
            $datos['logo'] = $request->file('logo')->store('uploads', 'public');
        }

        Clientes::insert($datos);

        return redirect('clientes');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $cliente = Clientes::findOrFail($id);

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datos = $request->except(['_token', '_method']);

        if ($request->hasFile('logo')){
            $cliente = Clientes::findOrFail($id);

            if (Storage::delete('public/' . $cliente->logo)){
                $datos['logo'] = $request->file('logo')->store('uploads', 'public');
            }
        }

        Clientes::where('id', '=', $id)->update($datos);

        return redirect('clientes')->with('mensaje', 'Cliente modificado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clientes $clientes)
    {
        //
    }
}
