<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Articulo;
use App\Imagen;
use App\Precio;
use App\Stock;
use App\Material;
use App\Proveedor;
use App\Config;
use DB;
class IngresosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $modal = 0;
        if(session('modal') == 1)
            $modal = 1;
        if(session('data') == 1 ){
            $articulos = DB::table('article')
                    ->distinct()
                    ->join('price','article.id','=','price.articulo_id')
                    ->join('stock','article.id','=','stock.articulo_id')
                    ->join('image','article.id','=','image.articulo_id')
                    ->where('article.id','=',session('id'))           
                    ->select('article.id','nombre','codigo_barras','peso','valor_minimo','valor_actual','valor_compra','valor_venta','valor_oro','valor_peso','valor_dolar','image.path','material_id','provider_id')
                    ->get();
        }else{
            $articulos = DB::table('article')
                    ->distinct()
                    ->join('price','article.id','=','price.articulo_id')
                    ->join('stock','article.id','=','stock.articulo_id')
                    ->join('image','article.id','=','image.articulo_id')
                    ->where('article.codigo_barras','like','%'.request('codbar').'%')
                    ->orWhere('article.nombre','like','%'.request('codbar').'%')
                    ->select('article.id','nombre','codigo_barras','peso','valor_minimo','valor_actual','valor_compra','valor_venta','valor_oro','valor_peso','valor_dolar','image.path','material_id','provider_id')
                    ->get();
        }
        $proveedor = Proveedor::all();
        $material = Material::all();
        $config = Config::first();
        $keys = collect(['nombre','precio','stock']);
        return view('ingresos',[
            'proveedor'=>$proveedor,
            'material'=>$material,
            'articulos'=>$articulos,
            'hechura'=>$config->hechura,
            'keys'=>$keys,
            'title'=>'Nuevo Articulo',
            'modal' => $modal,
            'data'=> session('data')]
        );  
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
        $post = $request->all();
        $name = "";
        //$pesos = "";
        //$dolar = "";
        if($file = $request->file('path')){
            $name = date('dmYHis').'-'.$file->getClientOriginalName();
            $file->move('img_articles',$name);
        }
        $config = Config::where('name','like','%DOLAR%')->first();
        $articulo = Articulo::create($post);
        /*
        if($request->moneda == 'dolar'){
            $pesos = $post['valor_dolar']*$config->valor;
            $dolar = $post['valor_dolar'];
        }else{
            $dolar = $post['valor_pesos']/$config->valor;
            $pesos = $post['valor_pesos'];
        }
        */
        $data = array_merge(
            $post,[
                'articulo_id' => $articulo->id, 
                'path' => 'img_articles/'.$name,
                //'valor_venta' => $pesos,
                //'valor_dolar' => $dolar
                ]);
        $image = Imagen::create($data);
        $price = Precio::create($data);
        $stock = Stock::create($data);
        if($image && $price && $stock){
            return back()->with('success','Artículo creado correctamente');
        }
        return back()->with('error','Se ha producido un error');
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
        if($id == 0){
            return redirect()->action('IngresosController@index')->with(['modal' => 1, 'data' => 0 , 'id' => 0]);
        }     
        return redirect()->action('IngresosController@index')->with(['modal' => 1,'data' => 1 , 'id' => $id]);
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
        $config = Config::where('name','like','%DOLAR%')->first();
        $articulo = Articulo::find($id);
        $name = "";
        if($file = $request->file('path')){
            $name = date('dmYHis').'-'.$file->getClientOriginalName();
            $file->move('img_articles',$name);
                    
        }
        $imagen = Imagen::where('articulo_id',$articulo->id)->first();
        $imagen->path = 'img_articles/'.$name;
        $imagen->save();  
        $stock = Stock::where('articulo_id',$articulo->id)->first();
        $precio = Precio::where('articulo_id',$articulo->id)->first();
        $articulo->codigo_barras = $request->codigo_barras;
        $articulo->nombre = $request->nombre;
        $articulo->peso = $request->peso;
        $stock->valor_minimo = $request->valor_minimo;
        $stock->valor_actual = $request->valor_actual;
        $precio->valor_compra = $request->valor_compra;
        if($request->moneda == 'dolar'){
            $precio->valor_dolar = $request->valor_dolar;
            $precio->valor_venta = $request->valor_dolar*$config->valor;
        }else{
            $precio->valor_dolar = $request->valor_pesos/$config->valor;
            $precio->valor_venta = $request->valor_pesos;
        }
        
        $articulo->save();
        $stock->save();
        $precio->save();

        return back()->with('success','Articulo Actualizado');
        
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
        Articulo::find($id)->delete();
        return back()->with('success','Artículo eliminado correctamente');
    }
}

