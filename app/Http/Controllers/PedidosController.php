<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PedidosController extends Controller
{

    public function index()
    {

    }

    public function mostrar_mesas(){

        $mesas_s1 = DB::table('mesas')
            ->where('salones_venta_id_salon_venta','=',1)
            ->get();

        $mesas_s2 = DB::table('mesas')
            ->where('salones_venta_id_salon_venta','=',2)
            ->get();

        $mesas_ev = DB::table('mesas')
            ->where('salones_venta_id_salon_venta','=',3)
            ->get();

        /* return view('Mesas.mostrar', [
            'mesas_s1' => $mesas_s1,
            'mesas_s2' => $mesas_s2,
            'mesas_ev' => $mesas_ev
        ]);*/

        return redirect("mesas");
    }

    public function apertura()
    {

        $num_pers = $_POST['num_pers'];
        $mesa = $_POST['num_mesa'];
        $mesero = 1;
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');


        DB::table('pedido')->Insert([
            'fecha_apertura' => $fecha,
            'hora_apertura' => $hora,
            'personas' => $num_pers,
            'meseros_id_mesero' => $mesero,
            'mesas_id_mesa' => $mesa,
            'fecha_cierre' => null,
            'hora_cierre' => null,
            'estado' => 1
        ]);

        DB::table('mesas')
            ->where('id_mesa', $mesa)
            ->update([
                'estado' => 1,
            ]);

        return back();
    }

    public function detalle_mesa()
    {

        $mesa = $_POST['id_mesa'];

        // Estado 0 Abierto - Estado 1 Para Pago - Estado 2 Para Cierre

        $estado_mesa = DB::table('mesas')
            ->where('id_mesa', '=', $mesa)
            ->select('estado')
            ->first();

        $pedido = DB::table('pedido')
            ->where('mesas_id_mesa', '=', $mesa)
            ->where('estado', '<>', 0)
            ->first();

        $id_pedido = DB::table('pedido')
            ->where('mesas_id_mesa', '=', $mesa)
            ->where('estado', '<>', 0)
            ->select('id_pedido')
            ->first();

        $det_pedido = DB::table('detalle_pedido')
            ->join('producto', 'id_producto', '=', 'producto_id_producto')
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->get();

        $det_pedido2 = DB::table('detalle_pedido')
            ->where('estado','=',0)
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->count();

        if($det_pedido2==0){
            $btn_1 = 0;
        }else{
            $btn_1 = 1;
        }

        $sum_d_ped = DB::table('detalle_pedido')
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->where('estado', '=', 1)
            ->sum('subtotal');

        $menu_1 = DB::table('producto')
            ->where('categoria_id_cat', '=', 1)
            ->get();

        $menu_2 = DB::table('producto')
            ->where('categoria_id_cat', '=', 2)
            ->get();

        $menu_3 = DB::table('producto')
            ->where('categoria_id_cat', '=', 3)
            ->get();

        $menu_4 = DB::table('producto')
            ->where('categoria_id_cat', '=', 4)
            ->get();

        $menu_5 = DB::table('producto')
            ->where('categoria_id_cat', '=', 5)
            ->get();

        $menu_6 = DB::table('producto')
            ->where('categoria_id_cat', '=', 6)
            ->get();

        return view('Mesas.detalle', [
            'pedido' => $pedido,
            'd_pedido' => $det_pedido,
            'sum_d_pedido' => $sum_d_ped,
            'menu_1' => $menu_1,
            'menu_2' => $menu_2,
            'menu_3' => $menu_3,
            'menu_4' => $menu_4,
            'menu_5' => $menu_5,
            'menu_6' => $menu_6,
            'e_mesa' => $estado_mesa,
            'btn_1' => $btn_1
        ]);
    }

    public function menu_mesa()
    {

        $mesa = $_POST['mesa'];
        $id_pedido = $_POST['id_pedido'];
        $id_producto = $_POST['menu'];
        $cant = $_POST['cant'];
        $obs = $_POST['obs'];
        $hora = date('H:i:s');

        $val_unit = DB::table('producto')
            ->where('id_producto', '=', $id_producto)
            ->select('valor_venta')
            ->first();

        $val_unit = $val_unit->valor_venta;
        $val_unit = intval($val_unit);

        $subtotal = $val_unit * $cant;

        DB::table('detalle_pedido')->Insert([
            'cantidad' => $cant,
            'unitario' => $val_unit,
            'subtotal' => $subtotal,
            'hora_pedido' => $hora,
            'hora_atencion' => null,
            'obs' => $obs,
            'estado' => 0,
            'pedido_id_pedido' => $id_pedido,
            'producto_id_producto' => $id_producto
        ]);

        $pedido = DB::table('pedido')
            ->where('mesas_id_mesa', '=', $mesa)
            ->where('estado', '<>', 0)
            ->first();

        $id_pedido = DB::table('pedido')
            ->where('mesas_id_mesa', '=', $mesa)
            ->where('estado', '<>', 0)
            ->select('id_pedido')
            ->first();

        $det_pedido = DB::table('detalle_pedido')
            ->join('producto', 'id_producto', '=', 'producto_id_producto')
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->get();

        $det_pedido2 = DB::table('detalle_pedido')
            ->where('estado','=',0)
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->count();

        if($det_pedido2==0){
            $btn_1 = 0;
        }else{
            $btn_1 = 1;
        }

        $sum_d_ped = DB::table('detalle_pedido')
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->where('estado', '=', 1)
            ->sum('subtotal');

        $menu_1 = DB::table('producto')
            ->where('categoria_id_cat', '=', 1)
            ->get();

        $menu_2 = DB::table('producto')
            ->where('categoria_id_cat', '=', 2)
            ->get();

        $menu_3 = DB::table('producto')
            ->where('categoria_id_cat', '=', 3)
            ->get();

        $menu_4 = DB::table('producto')
            ->where('categoria_id_cat', '=', 4)
            ->get();

        $menu_5 = DB::table('producto')
            ->where('categoria_id_cat', '=', 5)
            ->get();

        $menu_6 = DB::table('producto')
            ->where('categoria_id_cat', '=', 6)
            ->get();

        $estado_mesa = DB::table('mesas')
            ->where('id_mesa', '=', $mesa)
            ->select('estado')
            ->first();

        return view('Mesas.detalle', [
            'pedido' => $pedido,
            'd_pedido' => $det_pedido,
            'sum_d_pedido' => $sum_d_ped,
            'menu_1' => $menu_1,
            'menu_2' => $menu_2,
            'menu_3' => $menu_3,
            'menu_4' => $menu_4,
            'menu_5' => $menu_5,
            'menu_6' => $menu_6,
            'e_mesa' => $estado_mesa,
            'btn_1' => $btn_1
        ]);
    }

    public function ConfirmarPedido()
    {

        $mesa = $_POST['mesa'];
        $id_detalle = $_POST['id_detalle'];
        $hora_atencion = date('H:i:s');

        DB::table('detalle_pedido')
            ->where('id_d_pedido', $id_detalle)
            ->update([
                'estado' => 1,
                'hora_atencion' => $hora_atencion
            ]);

        $pedido = DB::table('pedido')
            ->where('mesas_id_mesa', '=', $mesa)
            ->where('estado', '<>', 0)
            ->first();

        $id_pedido = DB::table('pedido')
            ->where('mesas_id_mesa', '=', $mesa)
            ->where('estado', '<>', 0)
            ->select('id_pedido')
            ->first();

        $det_pedido = DB::table('detalle_pedido')
            ->join('producto', 'id_producto', '=', 'producto_id_producto')
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->get();

        $det_pedido2 = DB::table('detalle_pedido')
            ->where('estado','=',0)
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->count();

        if($det_pedido2==0){
            $btn_1 = 0;
        }else{
            $btn_1 = 1;
        }

        $sum_d_ped = DB::table('detalle_pedido')
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->where('estado', '=', 1)
            ->sum('subtotal');

        $menu_1 = DB::table('producto')
            ->where('categoria_id_cat', '=', 1)
            ->get();

        $menu_2 = DB::table('producto')
            ->where('categoria_id_cat', '=', 2)
            ->get();

        $menu_3 = DB::table('producto')
            ->where('categoria_id_cat', '=', 3)
            ->get();

        $menu_4 = DB::table('producto')
            ->where('categoria_id_cat', '=', 4)
            ->get();

        $menu_5 = DB::table('producto')
            ->where('categoria_id_cat', '=', 5)
            ->get();

        $menu_6 = DB::table('producto')
            ->where('categoria_id_cat', '=', 6)
            ->get();

        $estado_mesa = DB::table('mesas')
            ->where('id_mesa', '=', $mesa)
            ->select('estado')
            ->first();

        return view('Mesas.detalle', [
            'pedido' => $pedido,
            'd_pedido' => $det_pedido,
            'sum_d_pedido' => $sum_d_ped,
            'menu_1' => $menu_1,
            'menu_2' => $menu_2,
            'menu_3' => $menu_3,
            'menu_4' => $menu_4,
            'menu_5' => $menu_5,
            'menu_6' => $menu_6,
            'e_mesa' => $estado_mesa,
            'btn_1' => $btn_1
        ]);


    }

    public function AnularDetalle()
    {

        $mesa = $_POST['mesa'];
        $id_detalle = $_POST['id_detalle'];
        $tipo = $_POST['tipo'];
        $hora_atencion = date('H:i:s');

        if ($tipo == 2) {
            DB::table('detalle_pedido')
                ->where('id_d_pedido', $id_detalle)
                ->update([
                    'estado' => 2,
                    'hora_atencion' => $hora_atencion,
                    'obs' => 'Anulado por Cliente'
                ]);
        } else {
            DB::table('detalle_pedido')
                ->where('id_d_pedido', $id_detalle)
                ->update([
                    'estado' => 3,
                    'hora_atencion' => $hora_atencion,
                    'obs' => 'Anulado por Mesero'
                ]);
        }

        $pedido = DB::table('pedido')
            ->where('mesas_id_mesa', '=', $mesa)
            ->where('estado', '<>', 0)
            ->first();

        $id_pedido = DB::table('pedido')
            ->where('mesas_id_mesa', '=', $mesa)
            ->where('estado', '<>', 0)
            ->select('id_pedido')
            ->first();

        $det_pedido = DB::table('detalle_pedido')
            ->join('producto', 'id_producto', '=', 'producto_id_producto')
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->get();

        $det_pedido2 = DB::table('detalle_pedido')
            ->where('estado','=',0)
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->count();

        if($det_pedido2==0){
            $btn_1 = 0;
        }else{
            $btn_1 = 1;
        }

        $sum_d_ped = DB::table('detalle_pedido')
            ->where('pedido_id_pedido', '=', $id_pedido->id_pedido)
            ->where('estado', '=', 1)
            ->sum('subtotal');

        $menu_1 = DB::table('producto')
            ->where('categoria_id_cat', '=', 1)
            ->get();

        $menu_2 = DB::table('producto')
            ->where('categoria_id_cat', '=', 2)
            ->get();

        $menu_3 = DB::table('producto')
            ->where('categoria_id_cat', '=', 3)
            ->get();

        $menu_4 = DB::table('producto')
            ->where('categoria_id_cat', '=', 4)
            ->get();

        $menu_5 = DB::table('producto')
            ->where('categoria_id_cat', '=', 5)
            ->get();

        $menu_6 = DB::table('producto')
            ->where('categoria_id_cat', '=', 6)
            ->get();

        $estado_mesa = DB::table('mesas')
            ->where('id_mesa', '=', $mesa)
            ->select('estado')
            ->first();

        return view('Mesas.detalle', [
            'pedido' => $pedido,
            'd_pedido' => $det_pedido,
            'sum_d_pedido' => $sum_d_ped,
            'menu_1' => $menu_1,
            'menu_2' => $menu_2,
            'menu_3' => $menu_3,
            'menu_4' => $menu_4,
            'menu_5' => $menu_5,
            'menu_6' => $menu_6,
            'e_mesa' => $estado_mesa,
            'btn_1' => $btn_1
        ]);
    }

    public function CerrarMesa()
    {

        $id_mesa = $_POST['mesa'];
        $id_pedido = $_POST['id_pedido'];
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        DB::table('pedido')
            ->where('id_pedido', $id_pedido)
            ->update([
                'fecha_cierre' => $fecha,
                'hora_cierre' => $hora,
                'estado' => 1
            ]);

        DB::table('mesas')
            ->where('id_mesa', $id_mesa)
            ->update([
                'estado' => 2
            ]);

        return $this->mostrar_mesas();

    }

    public function PagarMesa()
    {

        $id_mesa = $_POST['mesa'];
        $id_pedido = $_POST['id_pedido'];

        DB::table('pedido')
            ->where('id_pedido', $id_pedido)
            ->update([
                'estado' => 0
            ]);

        DB::table('mesas')
            ->where('id_mesa', $id_mesa)
            ->update([
                'estado' => 0
            ]);

        return $this->mostrar_mesas();
    }



}
