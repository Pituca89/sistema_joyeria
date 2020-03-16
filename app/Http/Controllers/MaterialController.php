<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $modal = session('modal');
        $materiales = Material::all();
        $ematerial = Material::find(session('id'));
        return view('material',['modal'=>$modal,'materiales'=>$materiales,'ematerial'=>$ematerial]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $post = $request->all();
        $material = Material::create($post);
        if($material)
            return back()->with('success','Nuevo material registrado correctamente');
        else
            return back()->with('error','Error de registro');
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
        return redirect()->action('MaterialController@index')->with(['modal'=>1,'id'=>$id]);
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
        $post = $request->all();
        $material = Material::find($id);
        $rows = $material->update($post);
        if($rows){
            return back()->with('success',"Material actualizado");
        }else{
            return back()->with('error',"Error de actualización");
        }
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
        Material::find($id)->delete();
        return back()->with('success','Material eliminado correctamente');

    }
}
