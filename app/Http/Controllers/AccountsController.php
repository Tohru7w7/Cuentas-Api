<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$data = account::select([
            "accounts.*",
            "users.name as nombre"]
        )->join('users','accounts.user_id',"=","users.id")
        ->get();*/
        $data = account::with(['user'])->get();

        return response()->json([
            "status"=>"ok",
            "data"=>$data
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
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
            'ammount'=>'required|numeric',
            'status'=>'required',
            'user_id'=>'required',
        ]);
        $data = account::create($validated);
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
        $data = account::find($id);
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
            'ammount'=>'required|numeric',
            'status'=>'required',
            'user_id'=>'required',
        ]);
        $data = account::findOrFail($id);
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
        $data = account::find($id);
        if($data){
            $data->delete();
        }
        return response()->json([
            "status"=>"ok",
            "message"=>"Dato eliminado correctamente"
        ]);
    }
    public function changeStatus(Request $request){
        $data = account::find($request->id);
        if($data){
            $data->status = $request->status;
            $data->save();
        }
        return response()->json([
            "status"=>"ok",
            "message"=>"Estatus actualizado correctamente",
            "data"=>$data
        ]);
    }
}
