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
        $modal = 0;
        $temporal = array();
        if(session('modal') == 1){
            $modal = 1;
            $temporal = Temporal::find(session('id'));
        }        
        $keys = collect(['nombre','precio','cantidad','subtotal']);
        $linea = Temporal::where('idusuario',Auth::id())->get();
        $total = DB::table('temporal')->where('idusuario',Auth::id())->sum('subtotal_pesos');
        return view('venta',['articulo_edit'=> $temporal,'temporales' => $linea,'keys' => $keys,'total' => $total,'modal' => $modal]);             
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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
                $temporal->subtotal_pesos = $temporal->cantidad * $temporal->precio;
                $temporal->save();
            }else{
                Temporal::create([
                    'idarticulo' => $articulo[0]['id'],
                    'idusuario' => Auth::id(),
                    'nombre' => $articulo[0]['nombre'],
                    'precio' => $precio['valor_venta'],
                    'cantidad' => 1,
                    'subtotal_pesos' => $precio['valor_venta'],
                    'subtotal_dolares' => $precio['valor_dolar'],
                    'subtotal_gramos_oro' => 0,
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
        return redirect()->action('VentaController@index')->with(['modal' => 1 , 'id' => $id]);
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
        $temporal = Temporal::find($id);
        $stock = Stock::where('articulo_id',$temporal->idarticulo)->first();
        if($request->cantidad > $stock->valor_actual){
            return back()->with('error','Stock Insuficiente');
        }
        
        $temporal->cantidad = $request->cantidad;
        $temporal->subtotal_pesos = $request->cantidad * $temporal->precio;
        $temporal->save();
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
        if($id == 0){
            Temporal::where('idusuario',Auth::id())->delete();
            return back()->with("success","Articulos eliminados correctamente");
        }else{
            Temporal::find($id)->delete();
            return back()->with("success","Articulo eliminados correctamente");
        }
        
    }

    public function procesarVenta(){

        $venta = Venta::create([
            'idusuario' => Auth::id(),
            'total_pesos' => 0,
            'total_dolares' => 0,
            'total_gramos_oro' => 0,
            'finalizada' => 0,
            'fecha_venta' => date('Y-m-d H:m:s')
        ]);
        DB::table('temporal')->where('idusuario',Auth::id())->update(['idventa' => $venta->id]);
        $temporal = Temporal::where('idusuario',Auth::id())->get();
        foreach ($temporal as $value) {
            LineaDeVenta::create($value->toArray());
        }
        Temporal::where('idusuario',Auth::id())->delete();
        return back()->with('success','Venta procesada correctamente');
    }
}
