@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Restorant - Cuentas Pagadas
@endsection

@section('contentheader_title')
    Restoran
@endsection
@section('contentheader_description')
    Cuentas Pagadas
@endsection

@section('main-content')
    <div class="container-fluid spark-screen">

        <div class="col-md-12">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">PAGOS CERRADOS EN SALON PRINCIPAL</h3>

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
                                <th>Nº Mesa</th>
                                <th>Personas Atendidas</th>
                                <th>Hora Apertura</th>
                                <th>Hora Cierre</th>
                                <th>Pagado</th>
                                <th>Razón / Obs</th>
                                <th>Detalle</th>
                            </tr>
                            <tr>
                                <td>12</td>
                                <td>3</td>
                                <td>12:33:03</td>
                                <td>16:01:22</td>
                                <td>$ 25.800</td>
                                <td></td>
                                <td>
                                    <button type="button" class="btn btn-block btn-success btn-xs">Ver Detalle</button>
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

    <div class="container-fluid spark-screen">

        <div class="col-md-12">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">PAGOS CERRADOS EN SALON DE QUINCHO</h3>

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
                                <th>Nº Mesa</th>
                                <th>Personas</th>
                                <th>Hora Apertura</th>
                                <th>Consumo</th>
                                <th>Pagado</th>
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

    <div class="container-fluid spark-screen">

        <div class="col-md-12">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">PAGOS CERRADOS EN SALON DE VENTAS</h3>

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
                                <th>Nº Mesa</th>
                                <th>Personas</th>
                                <th>Hora Apertura</th>
                                <th>Consumo</th>
                                <th>Pagado</th>
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
