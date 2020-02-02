<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maquina;
use App\Licencia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
class MaquinaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return view('host',[
            'mac' => php_uname('s').'-'.php_uname('v').'-'.$request->getHttpHost()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param  array  $data
     */
    public function create()
    {
        //
        return view('host');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        
        $licencias = Licencia::all();
        foreach ($licencias as $licencia){
            if(Hash::check($request->licencia, $licencia->serie)){
                if(!Maquina::where('mac',$request->mac)->exists()){
                    Maquina::create([
                        'mac' => $request->mac,
                        'licencia' => Hash::make($request->licencia),
                        'estado' => 1,
                    ]);
                    return back()->with('success','Datos actualizado correctamente');
                }
                return back()->with('warning','Licencia registrada');
            }
        }        
        return back()->with('error','Licencia Inválida');
              
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return back();
    }
}
