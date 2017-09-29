@extends('adminlte::layouts.app')

@section('htmlheader_title')

@endsection

@section('contentheader_title')
    Quincho Restaurante
@endsection
@section('contentheader_description')
    SALAS DE VENTAS - ¡HOLA!: {{ Auth::user()->name }}
@endsection

@section('main-content')

    <div class="container-fluid spark-screen">

        <div class="col-md-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Salón Principal</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    @foreach($mesas_s1 as $s1)
                        @if($s1->estado==0)
                            <a id="btn_modal_pedido" class="btn btn-app">
                                <span class="badge bg-green">Libre</span>
                                <i class="fa fa-cutlery"></i> Mesa <span id="nume_de_mesa">{{$s1->num_mesa}}</span>
                            </a>
                        @else
                            <form action="{{url('mesa')}}" method="POST">
                                <button id="btn_sub_dte" type="submit" class="btn btn-app">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id_mesa" value="{{$s1->id_mesa}}">
                                    @if($s1->estado==1)
                                        <span class="badge bg-yellow">En Atención</span>
                                    @else
                                        <span class="badge bg-red">Pendiente de Pago</span>
                                    @endif
                                    <i class="fa fa-cutlery"></i> Mesa {{$s1->num_mesa}}
                                </button>
                            </form>
                        @endif
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Salón de Quincho</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach($mesas_s2 as $s2)
                        @if($s2->estado==0)
                            <a id="btn_modal_pedido" class="btn btn-app">
                                <span class="badge bg-green">Libre</span>
                                <i class="fa fa-cutlery"></i> Mesa <span id="nume_de_mesa">{{$s2->num_mesa}}</span>
                            </a>
                        @else
                            <form action="{{url('mesa')}}" method="POST">
                                <button id="btn_sub_dte" type="submit" class="btn btn-app">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id_mesa" value="{{$s2->id_mesa}}">
                                    @if($s2->estado==1)
                                        <span class="badge bg-yellow">En Atención</span>
                                    @else
                                        <span class="badge bg-red">Pendiente de Pago</span>
                                    @endif
                                    <i class="fa fa-cutlery"></i> Mesa {{$s2->num_mesa}}
                                </button>
                            </form>
                        @endif
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Salón de Ventas</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach($mesas_ev as $ev)
                        @if($ev->estado==0)
                            <a id="btn_modal_pedido" class="btn btn-app">
                                <span class="badge bg-green">Libre</span>
                                <i class="fa fa-cutlery"></i> Mesa <span id="nume_de_mesa">{{$ev->num_mesa}}</span>
                            </a>
                        @else
                            <form action="{{url('mesa')}}" method="POST">
                                <button id="btn_sub_dte" type="submit" class="btn btn-app">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id_mesa" value="{{$ev->id_mesa}}">
                                    @if($ev->estado==1)
                                        <span class="badge bg-yellow">En Atención</span>
                                    @else
                                        <span class="badge bg-red">Pendiente de Pago</span>
                                    @endif
                                    <i class="fa fa-cutlery"></i> Mesa {{$ev->num_mesa}}
                                </button>
                            </form>
                        @endif
                    @endforeach
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>


    <div class="modal fade" id="modal_pedido"
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
                        id="favoritesModalLabel">APERTURA DE MESA</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="form" action="{{ url('AperturaMesa') }}" role="form"
                          method="POST" enctype="multipart/form-data">

                        <div class="box-body">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Fecha</label>

                                <div class="col-sm-4">
                                    <input class="form-control pull-right" id="fecha" type="date" name="fecha"
                                           value="<?php echo date("Y-m-d");?>" readonly>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-2 control-label">Hora</label>

                                <div class="col-sm-3">
                                    <input class="form-control pull-right" id="hora" type="time" name="hora"
                                           value="<?php echo date('H:i')?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Nº de Mesa</label>

                                <div class="col-sm-3">
                                    <input class="form-control pull-right" id="num_mesa" type="number" name="num_mesa"
                                           value="" readonly>
                                </div>
                                <label for="exampleInputEmail1" class="col-sm-3 control-label">Nº de Personas</label>

                                <div class="col-sm-3">
                                    <input class="form-control pull-right" id="num_pers" type="number" min="1"
                                           name="num_pers" value="1">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="modal-footer">

                            <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-remove "></i> Cancelar
                            </button>

                            <button id="btn_sub_dte" type="submit" class="btn btn-primary">
                                <i class="fa fa-check "></i> Crear Apertura
                            </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection