<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = categorie::with(['user'])->get();

        return response()->json([
            "status"=>"ok",
            "data"=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * fkasfjjiasjfajfajfsjafk
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required|string|min:2',
            'type'=>'required',
            'user_id'=>'required',
        ]);
        $data = categorie::create($validated);
        return response()->json([
            "status"=>"ok",
            "message"=>"Dato insertado correctamente",
            "data"=>$data
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = categorie::find($id);
        if($data){
            return response()->json([
            "status"=>"ok",
            "message"=>"Cuenta encontrada",
            "data"=>$data
        ]);
        }
        return response()->json([
            "status"=>"error",
            "message"=>"Cuenta no encontrada"
        ],400);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'=>'required|string|min:2',
            'type'=>'required',
            'user_id'=>'required',
        ]);
        $data = categorie::findOrFail($id);
        $data->update($validated);
        //$data = account::create($validated);
        return response()->json([
            "status"=>"ok",
            "message"=>"Dato insertado correctamente",
            "data"=>$data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = categorie::find($id);
        if($data){
            $data->delete();
        }
        return response()->json([
            "status"=>"ok",
            "message"=>"Dato eliminado correctamente"
        ]);
    }
}
