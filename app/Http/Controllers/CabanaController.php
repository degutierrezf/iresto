<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CabanaController extends Controller
{

    public function index()
    {

    }

    public function reserva()
    {

        return view('Cabana.reserva');
    }

    public function activas()
    {

        return view('Cabana.activas');
    }

    public function historicas()
    {

        return view('Cabana.historicas');
    }

    public function informe()
    {

        return view('Cabana.informe');
    }

}
