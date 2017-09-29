@extends('adminlte::layouts.app')

@section('htmlheader_title')

@endsection

@section('contentheader_title')
    Detalle por Mesa
@endsection
@section('contentheader_description')
    MESA Nº {{$pedido->mesas_id_mesa}} / ATENDIDO POR: Auth::
@endsection

@section('main-content')

    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>$ {{  number_format($sum_d_pedido,0,',','.') }}</h3>

                    <p>CONSUMO</p>
                </div>
                <div class="icon">
                    <i class="fa fa-dollar"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$pedido->personas}}</h3>

                    <p>PERSONAS</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$pedido->hora_apertura}}</h3>

                    <p>HORA APERTURA</p>
                </div>
                <div class="icon">
                    <i class="fa fa-clock-o"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{$pedido->id_pedido}}</h3>

                    <p>Nº PEDIDO</p>
                </div>
                <div class="icon">
                    <i class="fa fa-cutlery"></i>
                </div>
                <a href="#" class="small-box-footer">
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="container-fluid spark-screen">

        <div class="col-md-8">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">OPERACIONES MESA</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @if($e_mesa->estado==1)
                        <a id="btn_modal_del_corral" class="btn btn-app">
                            <i class="fa fa-plus"></i> Del Corral
                        </a>

                        <a id="btn_modal_del_mar" class="btn btn-app">
                            <i class="fa fa-plus"></i> Del Mar
                        </a>

                        <a id="btn_modal_comen_por_cuatro" class="btn btn-app">
                            <i class="fa fa-plus"></i> Comen por 4
                        </a>

                        <a id="btn_modal_empanadas_sandwichs" class="btn btn-app">
                            <i class="fa fa-plus"></i> Empanadas / Sandwichs
                        </a>

                        <a id="btn_modal_bebestibles" class="btn btn-app">
                            <i class="fa fa-plus"></i> Bebestibles
                        </a>

                        <a id="btn_modal_menu_tarde" class="btn btn-app">
                            <i class="fa fa-plus"></i> Menú Quincho Tarde
                        </a>
                    @else
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-4">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">OPERACIONES PAGO</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <a class="btn btn-app">
                        <i class="fa fa-print"></i> Imprimir Comanda
                    </a>
                    @if($e_mesa->estado==1)
                        @if($btn_1==0)
                            <a id="btn_modal_cerrar_mesa" class="btn btn-app">
                            <i class="fa fa-close"></i> Cerrar Mesa
                            </a>
                            @else
                            <button id="btn_modal_pago" class="btn-success btn btn-app" disabled>
                                <i class="fa fa-close" aria-disabled="true"></i> Cerrar Mesa
                            </button>
                            @endif
                    @else
                    @endif
                    @if($e_mesa->estado==2)
                        <button id="btn_modal_pago" class="btn-success btn btn-app">
                            <i class="fa fa-dollar" aria-disabled="true"></i> Pago Mesa
                        </button>
                    @else
                        <button id="btn_modal_pago" class="btn-success btn btn-app" disabled>
                            <i class="fa fa-dollar" aria-disabled="true"></i> Pago Mesa
                        </button>
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>

    <div class="container-fluid spark-screen">

        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">CONSUMO MESA #{{$pedido->mesas_id_mesa}}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>Nº</th>
                                <th>Producto</th>
                                <th>
                                    <center>Cantidad</center>
                                </th>
                                <th>Valor</th>
                                <th>Sub Total</th>
                                <th>Hora</th>
                                <th>Estado</th>
                                <th>Razón / Obs</th>
                                <th>Acción</th>
                            </tr>
                            <?php $num_ges = 1; ?>
                            @foreach($d_pedido as $dp)

                                <tr>
                                    <td><?php
                                        echo $num_ges;
                                        $num_ges = $num_ges + 1;
                                        ?>
                                    </td>
                                    <td>{{$dp->descripcion}}</td>
                                    <td>
                                        <center>{{$dp->cantidad}}</center>
                                    </td>
                                    <td>$ {{  number_format($dp -> unitario,0,',','.') }}</td>
                                    <td>$ {{  number_format($dp -> subtotal,0,',','.') }}</td>
                                    <td>{{$dp->hora_pedido}}</td>
                                    <td>
                                        @if($dp->estado==0)
                                            <span class="label label-primary">EN PROCESO</span>
                                        @elseif($dp->estado==1)
                                            <span class="label label-success">SERVIDO</span>
                                        @elseif($dp->estado==2)
                                            <span class="label label-warning">ANULADO CLIENTE</span>
                                        @else
                                            <span class="label label-danger">ANULADO MESERO</span>
                                        @endif
                                    </td>
                                    <td>{{$dp->obs}}</td>
                                    <td>@if($dp->estado==0)
                                            <form action="ConfirmarPedido" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control pull-right" id="mesa" type="hidden"
                                                       name="mesa"
                                                       value="{{$pedido->mesas_id_mesa}}">
                                                <input class="form-control pull-right" id="id_detalle" type="hidden"
                                                       name="id_detalle"
                                                       value="{{$dp->id_d_pedido}}">
                                                <button type="submit" class="btn btn-block btn-success btn-xs">
                                                    Confirmar
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-block btn-success btn-xs" disabled>
                                                Confirmar
                                            </button>
                                        @endif
                                        @if($dp->estado==0)
                                            <form action="AnularDetalle" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control pull-right" id="mesa" type="hidden"
                                                       name="mesa"
                                                       value="{{$pedido->mesas_id_mesa}}">
                                                <input class="form-control pull-right" id="id_detalle" type="hidden"
                                                       name="id_detalle"
                                                       value="{{$dp->id_d_pedido}}">
                                                <input class="form-control pull-right" id="tipo" type="hidden"
                                                       name="tipo"
                                                       value="2">
                                                <button type="submit" class="btn btn-block btn-warning btn-xs">Anular
                                                    por Cliente
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-block btn-warning btn-xs" disabled>
                                                Anular por Cliente
                                            </button>
                                        @endif

                                        @if($dp->estado==0)
                                            <form action="AnularDetalle" method="POST">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input class="form-control pull-right" id="mesa" type="hidden"
                                                       name="mesa"
                                                       value="{{$pedido->mesas_id_mesa}}">
                                                <input class="form-control pull-right" id="id_detalle" type="hidden"
                                                       name="id_detalle"
                                                       value="{{$dp->id_d_pedido}}">
                                                <input class="form-control pull-right" id="tipo" type="hidden"
                                                       name="tipo"
                                                       value="3">
                                                <button type="submit" class="btn btn-block btn-danger btn-xs">Anular por
                                                    Mesero
                                                </button>
                                            </form>
                                        @else
                                            <button type="button" class="btn btn-block btn-danger btn-xs" disabled>
                                                Anular por Mesero
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>

    <div class="modal fade" id="modal_del_corral"
         tabindex="-1" role="dialog"
         aria-labelledby="favbtn_add_dteoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">Menú - Del Corral</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('MenuMesa') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control pull-right" id="mesa" type="hidden" name="mesa"
                                   value="{{$pedido->mesas_id_mesa}}">
                            <input class="form-control pull-right" id="id_pedido" type="hidden" name="id_pedido"
                                   value="{{$pedido->id_pedido}}">

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">Menú</label>

                                <div class="col-sm-8">
                                    <select class="form-control pull-right" name="menu">
                                        <?php  foreach ($menu_1 as $m1) { ?>
                                        <option class="form-control pull-right"
                                                value="<?php echo $m1->id_producto ?>"><?php echo $m1->descripcion ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">OBS</label>

                                <div class="col-sm-4">
                                    <textarea class="form-control pull-right" name="obs" id="obs" rows="4"></textarea>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">CANTIDAD</label>

                                <div class="col-sm-2">
                                    <input class="form-control pull-right" id="cant" type="number" min="1" value="1"
                                           name="cant">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-remove "></i> Cancelar
                            </button>


                            <button id="btn_sub_dte" type="submit" class="btn btn-primary">
                                <i class="fa fa-check "></i> Agregar a la Mesa
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_del_mar"
         tabindex="-1" role="dialog"
         aria-labelledby="favbtn_add_dteoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">Menú - Del Mar</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('MenuMesa') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control pull-right" id="mesa" type="hidden" name="mesa"
                                   value="{{$pedido->mesas_id_mesa}}">
                            <input class="form-control pull-right" id="id_pedido" type="hidden" name="id_pedido"
                                   value="{{$pedido->id_pedido}}">

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Menú</label>

                                <div class="col-sm-8">
                                    <select class="form-control pull-right" name="menu">
                                        <?php  foreach ($menu_2 as $m2) { ?>
                                        <option class="form-control pull-right"
                                                value="<?php echo $m2->id_producto ?>"><?php echo $m2->descripcion ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">OBS</label>

                                <div class="col-sm-4">
                                    <textarea class="form-control pull-right" name="obs" id="obs" rows="4"></textarea>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">CANTIDAD</label>

                                <div class="col-sm-2">
                                    <input class="form-control pull-right" id="cant" type="number" min="1" value="1"
                                           name="cant">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-remove "></i> Cancelar
                            </button>


                            <button id="btn_sub_dte" type="submit" class="btn btn-primary">
                                <i class="fa fa-check "></i> Agregar a la Mesa
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_comen_por_cuatro"
         tabindex="-1" role="dialog"
         aria-labelledby="favbtn_add_dteoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">Menú - Comen por Cuatro</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('MenuMesa') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control pull-right" id="mesa" type="hidden" name="mesa"
                                   value="{{$pedido->mesas_id_mesa}}">
                            <input class="form-control pull-right" id="id_pedido" type="hidden" name="id_pedido"
                                   value="{{$pedido->id_pedido}}">

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Menú</label>

                                <div class="col-sm-8">
                                    <select class="form-control pull-right" name="menu">
                                        <?php  foreach ($menu_3 as $m3) { ?>
                                        <option class="form-control pull-right"
                                                value="<?php echo $m3->id_producto ?>"><?php echo $m3->descripcion ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">OBS</label>

                                <div class="col-sm-4">
                                    <textarea class="form-control pull-right" name="obs" id="obs" rows="4"></textarea>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">CANTIDAD</label>

                                <div class="col-sm-2">
                                    <input class="form-control pull-right" id="cant" type="number" min="1" value="1"
                                           name="cant">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-remove "></i> Cancelar
                            </button>


                            <button id="btn_sub_dte" type="submit" class="btn btn-primary">
                                <i class="fa fa-check "></i> Agregar a la Mesa
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_empanadas"
         tabindex="-1" role="dialog"
         aria-labelledby="favbtn_add_dteoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">Menú - Empanadas / Sandwichs</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('MenuMesa') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control pull-right" id="mesa" type="hidden" name="mesa"
                                   value="{{$pedido->mesas_id_mesa}}">
                            <input class="form-control pull-right" id="id_pedido" type="hidden" name="id_pedido"
                                   value="{{$pedido->id_pedido}}">

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Menú</label>

                                <div class="col-sm-8">
                                    <select class="form-control pull-right" name="menu">
                                        <?php  foreach ($menu_4 as $m4) { ?>
                                        <option class="form-control pull-right"
                                                value="<?php echo $m4->id_producto ?>"><?php echo $m4->descripcion ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">OBS</label>

                                <div class="col-sm-4">
                                    <textarea class="form-control pull-right" name="obs" id="obs" rows="4"></textarea>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">CANTIDAD</label>

                                <div class="col-sm-2">
                                    <input class="form-control pull-right" id="cant" type="number" min="1" value="1"
                                           name="cant">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-remove "></i> Cancelar
                            </button>


                            <button id="btn_sub_dte" type="submit" class="btn btn-primary">
                                <i class="fa fa-check "></i> Agregar a la Mesa
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_bebestibles"
         tabindex="-1" role="dialog"
         aria-labelledby="favbtn_add_dteoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">Menú de Acompañamiento</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('MenuMesa') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control pull-right" id="mesa" type="hidden" name="mesa"
                                   value="{{$pedido->mesas_id_mesa}}">
                            <input class="form-control pull-right" id="id_pedido" type="hidden" name="id_pedido"
                                   value="{{$pedido->id_pedido}}">

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">BEBESTIBLE</label>

                                <div class="col-sm-8">
                                    <select class="form-control pull-right" name="menu">
                                        <?php  foreach ($menu_5 as $m5) { ?>
                                        <option class="form-control pull-right"
                                                value="<?php echo $m5->id_producto ?>"><?php echo $m5->descripcion ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">OBS</label>

                                <div class="col-sm-4">
                                    <textarea class="form-control pull-right" name="obs" id="obs" rows="4"></textarea>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">CANTIDAD</label>

                                <div class="col-sm-2">
                                    <input class="form-control pull-right" id="cant" type="number" min="1" value="1"
                                           name="cant">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-remove "></i> Cancelar
                            </button>


                            <button id="btn_sub_dte" type="submit" class="btn btn-primary">
                                <i class="fa fa-check "></i> Agregar a la Mesa
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_menu_tarde"
         tabindex="-1" role="dialog"
         aria-labelledby="favbtn_add_dteoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">Menú - Quincho Tarde</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('MenuMesa') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control pull-right" id="mesa" type="hidden" name="mesa"
                                   value="{{$pedido->mesas_id_mesa}}">
                            <input class="form-control pull-right" id="id_pedido" type="hidden" name="id_pedido"
                                   value="{{$pedido->id_pedido}}">

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Menú</label>

                                <div class="col-sm-8">
                                    <select class="form-control pull-right" name="menu">
                                        <?php  foreach ($menu_6 as $m6) { ?>
                                        <option class="form-control pull-right"
                                                value="<?php echo $m6->id_producto ?>"><?php echo $m6->descripcion ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">OBS</label>

                                <div class="col-sm-4">
                                    <textarea class="form-control pull-right" name="obs" id="obs" rows="4"></textarea>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">CANTIDAD</label>

                                <div class="col-sm-2">
                                    <input class="form-control pull-right" id="cant" type="number" min="1" value="1"
                                           name="cant">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-remove "></i> Cancelar
                            </button>


                            <button id="btn_sub_dte" type="submit" class="btn btn-primary">
                                <i class="fa fa-check "></i> Agregar a la Mesa
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_cerrar_mesa"
         tabindex="-1" role="dialog"
         aria-labelledby="favbtn_add_dteoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">CERRAR MESA</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('CerrarMesa') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control pull-right" id="mesa" type="hidden" name="mesa"
                                   value="{{$pedido->mesas_id_mesa}}">
                            <input class="form-control pull-right" id="id_pedido" type="hidden" name="id_pedido"
                                   value="{{$pedido->id_pedido}}">
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-info" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-remove "></i> Cancelar
                            </button>

                            <button id="btn_sub_dte" type="submit" class="btn btn-danger">
                                <i class="fa fa-check "></i> Cerrar Mesa
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_pago"
         tabindex="-1" role="dialog"
         aria-labelledby="favbtn_add_dteoritesModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"
                        id="favoritesModalLabel">ASIGNAR DEPOSITO</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('PagarMesa') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input class="form-control pull-right" id="mesa" type="hidden" name="mesa"
                                   value="{{$pedido->mesas_id_mesa}}">
                            <input class="form-control pull-right" id="id_pedido" type="hidden" name="id_pedido"
                                   value="{{$pedido->id_pedido}}">

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">MONTO</label>

                                <div class="col-sm-7">
                                    <input class="form-control pull-right" id="num_doc" type="number" name="monto"
                                           value="{{$sum_d_pedido}}"
                                           readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">CUENTA DEPÓSITO</label>

                                <div class="col-sm-7">
                                    <select class="form-control pull-right" name="id_cuenta">
                                        <option class="form-control pull-right"
                                                value="XXX">EFECTIVO
                                        </option>

                                        <option class="form-control pull-right"
                                                value="XXX">TRANSFERENCIA
                                        </option>

                                        <option class="form-control pull-right"
                                                value="XXX">OTRO
                                        </option>

                                        <option class="form-control pull-right"
                                                value="XXX">CORTESÍA
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">PROPINA</label>

                                <div class="col-sm-7">
                                    <input class="form-control pull-right" id="propina" type="number" name="propina"
                                           value="{{$sum_d_pedido*0.1}}" step="50" min="0">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">FONDO PROPINA</label>

                                <div class="col-sm-7">
                                    <select class="form-control pull-right" name="id_cuenta">
                                        <option class="form-control pull-right"
                                                value="XXX">EFECTIVO
                                        </option>

                                        <option class="form-control pull-right"
                                                value="XXX">TRANSFERENCIA
                                        </option>

                                        <option class="form-control pull-right"
                                                value="XXX">OTRO
                                        </option>

                                        <option class="form-control pull-right"
                                                value="XXX">CORTESÍA
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-remove "></i> Cancelar
                            </button>


                            <button id="btn_sub_dte" type="submit" class="btn btn-primary">
                                <i class="fa fa-dollar "></i> Pagar
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection