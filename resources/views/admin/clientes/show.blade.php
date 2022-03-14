@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0">Datos del Cliente</h1>
        
    </div>
@stop

@section('content')

@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
    
@endif



    <form method="POST" action="{{ route('admin.clientes.update', $cliente) }}">
        {{ csrf_field() }} {{ method_field('PUT') }}
        <div class="row">

            <div class="col-md-4">

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Cliente</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="form-group">
                            <label>Nombres y Apellidos</label>
                            <input name="nombres" value="{{ $cliente->nombres }}" type="text"
                                class="form-control" readonly>
              
                        </div>

 




                    </div>


                </div>

            </div>















        </div>
    </form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.1/dropzone.css"> 
    <!--   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.min.css"> -->
  
    <link rel="stylesheet" href="/vendor/adminlte/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/vendor/adminlte/plugins/select2/css/select2.min.css">
@stop

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.1/min/dropzone.min.js"></script>



    <script src="/vendor/adminlte/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="/vendor/adminlte/plugins/select2/js/select2.full.min.js"></script>



    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>  -->

    <script>
        $('#datepicker').datepicker({
            autoclose: true
        });

        $('#datepicker2').datepicker({
            autoclose: true
        });

        $('.select2').select2({
            tags: true
        });

        $('.select22').select2({
            tags: true
        });

        $('.select23').select2({
            tags: true
        });

    </script>





@stop
