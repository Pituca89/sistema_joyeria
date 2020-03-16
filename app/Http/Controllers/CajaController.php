<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LineaDeVenta;
use DB;
class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha_caja = date('Y-m-d 00:00:00');

        $pesos = DB::table('lineofsale')
            ->join('sale','sale.id','=','lineofsale.idventa')
            ->where('sale.fecha_venta','>=',$fecha_caja)
            ->sum('subtotal_pesos');

        $dolares = DB::table('lineofsale')
            ->join('sale','sale.id','=','lineofsale.idventa')
            ->where('sale.fecha_venta','>=',$fecha_caja)
            ->sum('subtotal_dolares');

        $oro = DB::table('lineofsale')
            ->join('sale','sale.id','=','lineofsale.idventa')
            ->where('sale.fecha_venta','>=',$fecha_caja)
            ->sum('subtotal_gramos_oro');

        return view('caja',[
            'pesos' => $pesos,
            'dolares' => $dolares,
            'oro' => $oro
            ]);
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
        //
    }
}
