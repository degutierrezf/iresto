<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MesasController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    // Muestra todas las mesas en local
    public function mostrar_mesas()
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
