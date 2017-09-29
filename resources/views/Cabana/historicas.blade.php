@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cabañas - Historico
@endsection

@section('contentheader_title')
    Cabañas
@endsection
@section('contentheader_description')
    Registro Historico
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">

        <div class="col-md-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">HISTORICO CABAÑAS</h3>

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
                                <th>Nº Cabaña</th>
                                <th>Personas</th>
                                <th>Fecha Reserva</th>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Días</th>
                                <th>Consumo Interno</th>
                                <th>Valor Estadia</th>
                                <th>Estado</th>
                                <th>Razón / Obs</th>
                                <th>Acción</th>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>4</td>
                                <td>27 Ago 2017</td>
                                <td>01 Sep 2017</td>
                                <td>06 Sep 2017</td>
                                <td>6 Días</td>
                                <td>$ 0</td>
                                <td>$ 180.000</td>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-block btn-success btn-xs">Detalle</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>
@endsection
