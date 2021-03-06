<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // public function __construct()
    //{
     //   $this->middleware('auth');
   // }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $mesas_s1 = DB::table('mesas')
            ->where('salones_venta_id_salon_venta', '=', 1)
            ->get();

        $mesas_s2 = DB::table('mesas')
            ->where('salones_venta_id_salon_venta', '=', 2)
            ->get();

        $mesas_ev = DB::table('mesas')
            ->where('salones_venta_id_salon_venta', '=', 3)
            ->get();

        return view('Mesas.mostrar', [
            'mesas_s1' => $mesas_s1,
            'mesas_s2' => $mesas_s2,
            'mesas_ev' => $mesas_ev,
        ]);
    }
}