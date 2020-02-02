<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Venta;
use App\Articulo;
use App\Precio;
use App\Stock;
use App\LineaDeVenta;
use App\Temporal;
use DB;
class VentaController extends Controller
{
    public function __constructor(){
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keys = collect(['nombre','precio','cantidad','subtotal']);
        $linea = Temporal::where('idusuario',Auth::id())->get();
        $total = DB::table('temporal')->where('idusuario',Auth::id())->sum('subtotal');
        return view('venta',['articulos'=>$linea,'keys'=>$keys,'total'=> $total]);             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        /*
        LineaDeVenta::create([
            'idusuario' => Auth::id(),
            'idarticulo' => $articulo['id'],
            'subtotal_pesos' => $stock['valor_actual'] * $precio['valor_venta'],
            'subtotal_dolares'=> $stock['valor_actual'] * $precio['valor_venta'],
            'subtotal_gramos_oro' => $stock['valor_actual'] * $precio['valor_venta']
        ]);
        */
       return view('venta');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {               
        $articulo = Articulo::where('codigo_barras',$request->dato)->get();
        if($articulo->count() > 0){
            $precio = Precio::where('articulo_id',$articulo[0]['id'])->first();
            $stock = Stock::where('articulo_id',$articulo[0]['id'])->first();
            if($stock['valor_actual']<=0)
                return back()->with('error','Stock de '.$articulo[0]['nombre'].' insuficiente');
            if(Temporal::where('idarticulo',$articulo[0]['id'])->exists()){
                $temporal = Temporal::where('idarticulo',$articulo[0]['id'])->first();
                $temporal->cantidad += 1;
                if($temporal->cantidad > $stock['valor_actual']){
                    return back()->with('error','Stock de '.$articulo[0]['nombre'].' insuficiente');
                }
                $temporal->subtotal = $temporal->cantidad * $temporal->precio;
                $temporal->save();
            }else{
                Temporal::create([
                    'idarticulo' => $articulo[0]['id'],
                    'idusuario' => Auth::id(),
                    'nombre' => $articulo[0]['nombre'],
                    'precio' => $precio['valor_venta'],
                    'cantidad' => 1,
                    'subtotal' => $precio['valor_venta'],
                ]); 
            }                      
        }
        return back();      
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Temporal::where('idusuario',$id)->delete();
        return back()->with("success","Articulos eliminados correctamente");
    }
}
