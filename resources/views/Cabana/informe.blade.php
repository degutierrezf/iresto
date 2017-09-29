@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Cabañas - Informe
@endsection

@section('contentheader_title')
    Cabañas
@endsection
@section('contentheader_description')
    Registro Informe
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">

        <div class="col-md-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">INFORME</h3>

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
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

    </div>
@endsection
