<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Crud extends Controller
{

    public function index()
    {
        $poet = DB::table('poets')
            ->orderBy('poet_id')
            ->get();

        return view('Crud.showPoets', [
            'poets' => $poet
        ]);
    }

    public function create()
    {
        return view('Crud.createPoets');
    }

    public function store(Request $request)
    {
        $poet = DB::table('poets')
            ->insert([
                'fName' => $request->input('firstname'),
                'surname' => $request->input('surname'),
                'address' => $request->input('address'),
                'postcode' => $request->input('postcode'),
                'phoneNum' => $request->input('phoneNum')
            ]);
        return redirect()->action('Crud@index')
            ->with('status','Poeta Ingresado Exitosamente');
    }

    public function show($id)
    {
        $poet = DB::table('poets')
            ->where('poet_id', '=', $id)
            ->first();
        return view('crud.createPoets', ['poet'=> $poet]);
    }

    public function update(Request $request)
    {
        $poet = DB::table('poets')
            ->where('poet_id', '=',  $request->input('id'))
            ->update([
                'fName' => $request->input('firstname'),
                'surname' => $request->input('surname'),
                'address' => $request->input('address'),
                'postcode' => $request->input('postcode'),
                'phoneNum' => $request->input('phoneNum')
            ]);

        return redirect()->action('Crud@index')
            ->with('status','Poeta Modificado Exitosamente');
    }

    public function destroy($id)
    {
        $poet = DB::table('poets')
            ->where('poet_id', '=',  $id)
            ->delete();

        return redirect()->action('Crud@index')
            ->with('status','Poeta Eliminado Exitosamente');
    }
}
