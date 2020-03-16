<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Modulo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $modulo = Modulo::all();
        foreach ($modulo as $value) {
            switch ($value->name) {
                case 'venta':
                    $venta = $value->state;
                    break;
                case 'ingreso':
                    $ingreso = $value->state;;
                    break;
                case 'caja':
                    $caja = $value->state;;
                    break;
                case 'estadistica':
                    $estadistica = $value->state;;
                    break;
                default:
                    # code...
                    break;
            }       
        }
        
        return view('home',['venta'=>$venta,'ingreso'=>$ingreso,'caja'=>$caja,'estadistica'=>$estadistica]);     
    }
}
