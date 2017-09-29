<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestoController extends Controller
{

    public function index()
    {

    }

    public function activas()
    {

        return view('Resto.activas');
    }

    public function realizadas()
    {

        return view('Resto.realizadas');
    }

    public function informe()
    {

        return view('Resto.informe');
    }


}
