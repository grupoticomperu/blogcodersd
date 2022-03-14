@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="col-sm-6">
        <h1 class="m-0">Datos del Cliente</h1>
        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus">
            </i> Crear Publicación</button>
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

                        <div class="form-group {{ $errors->has('nombres') ? 'text-danger' : '' }}">
                            <label>Nombres y Apellidos</label>
                            <input name="nombres" value="{{ old('nombres', $cliente->nombres) }}" type="text"
                                class="form-control" placeholder="ingrese aquí el nombre y apellido del cliente">
                            <!-- el segundo parametro del old sirve para pintar en caso este vacio -->
                            <!-- <div class="poner la clase para sombrear solo el mensaje">-->
                            {!! $errors->first('nombres', '<span class="help-block">:message</span>') !!}
                            <!-- </div>-->
                            <!-- le ponemos !! a cambio del { y del }-->
                        </div>

                        <div class="form-group {{ $errors->has('dni') ? 'text-danger' : '' }}">
                            <label>DNI</label>
                            <input name="dni" value="{{ old('dni', $cliente->dni) }}" type="text" class="form-control"
                                placeholder="ingrese DNI del cliente">

                            {!! $errors->first('dni', '<span class="help-block">:message</span>') !!}

                        </div>


                        <div class="form-group {{ $errors->has('user_id') ? 'text-danger' : '' }}">
                            <label>Tiendas</label>
                            <select name="user_id" class="form-control select2">
                                <option value="">Selecciona una tienda</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('user_id', $cliente->user_id) == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('user_id', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group {{ $errors->has('zona_id') ? 'text-danger' : '' }}">
                            <label>Zonas</label>
                            <select name="zona_id" class="form-control select22">
                                <option value="">Selecciona una zona</option>
                                @foreach ($zonas as $zona)
                                    <option value="{{ $zona->id }}"
                                        {{ old('zona_id', $cliente->zona_id) == $zona->id ? 'selected' : '' }}>
                                        {{ $zona->name }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('zona_id', '<span class="help-block">:message</span>') !!}
                        </div>


                        <div class="form-group {{ $errors->has('tipodocumento') ? 'text-danger' : '' }}">
                            <label>TIPO DOCUMENTO</label>

                            <select name="tipodocumento" class="form-control select23">
                                <option value="">Seleccione documento</option>
                              
                                    <option value="1"
                                        {{ old('tipodocumento', $cliente->tipodocumento) == 1 ? 'selected' : '' }}>
                                        FACTURA</option>
                                    <option value="2"
                                        {{ old('tipodocumento', $cliente->tipodocumento) == 2 ? 'selected' : '' }}>
                                        BOLETA</option>
                           
                            </select>

                            <!--  <input name="tipodocumento" value="{{ old('tipodocumento', $cliente->tipodocumento) }}"
                                type="text" class="form-control"
                                placeholder="ingrese aquí el tipo de documento"> -->

                            {!! $errors->first('tipodocumento', '<span class="help-block">:message</span>') !!}

                        </div>


                        <div class="form-group">
                          <label>Fecha de Venta:</label>

                          <div class="input-group date">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">
                                      <i class="fa fa-calendar-alt"></i>
                                  </span>
                              </div>
                              <input name="fechadeventa"
                                  value="{{ old('fechadeventa', $cliente->fechadeventa) }}"
                                  type="text" class="form-control pull-right" id="datepicker">
                          </div>
                          <!-- /.input group -->
                        </div>


                        <div class="form-group">
                            <label>Fecha de Recepción:</label>

                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input name="fechaderecepcion"
                                    value="{{ old('fechaderecepcion', $cliente->fechaderecepcion) }}"
                                    type="text" class="form-control pull-right" id="datepicker2">
                            </div>
                            <!-- /.input group -->
                        </div>




                        <div class="form-group {{ $errors->has('estadocivil') ? 'text-danger' : '' }}">
                            <label>ESTADO CIVIL</label>

                            <select name="estadocivil" class="form-control select23">
                                <option value="">Seleccione estado civil</option>
                              
                                    <option value="1"
                                        {{ old('estadocivil', $cliente->estadocivil) == 1 ? 'selected' : '' }}>
                                        SOLTERO</option>
                                    <option value="2"
                                        {{ old('estadocivil', $cliente->estadocivil) == 2 ? 'selected' : '' }}>
                                        CASADO</option>
                                        <option value="3"
                                        {{ old('estadocivil', $cliente->estadocivil) == 3 ? 'selected' : '' }}>
                                        VIUDO</option>
                                    <option value="4"
                                        {{ old('estadocivil', $cliente->estadocivil) == 4 ? 'selected' : '' }}>
                                        DIVORCIADO</option>                           
                            </select>


                            {!! $errors->first('estadocivil', '<span class="help-block">:message</span>') !!}

                        </div>


                        <div class="form-group {{ $errors->has('pagoadministrativo') ? 'text-danger' : '' }}">
                            <label>PAGO ADMINISTRATIVO</label>

                            <select name="pagoadministrativo" class="form-control select23">
                                <option value="">Seleccione Pago Administrativo</option>
                              
                                    <option value="1"
                                        {{ old('pagoadministrativo', $cliente->pagoadministrativo) == 1 ? 'selected' : '' }}>
                                        CONFORME</option>
                                    <option value="2"
                                        {{ old('pagoadministrativo', $cliente->pagoadministrativo) == 2 ? 'selected' : '' }}>
                                        NO FIGURA PAGO ADMIN</option>
                                                             
                            </select>


                            {!! $errors->first('pagoadministrativo', '<span class="help-block">:message</span>') !!}

                        </div>




                    </div>


                </div>

            </div>



            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Cliente</h3>
                    </div>
                    <div class="card-body">


                        <div class="form-group {{ $errors->has('marca') ? 'text-danger' : '' }}">
                            <label>Marca</label>
                            <input name="marca" value="{{ old('marca', $cliente->marca) }}" type="text"
                                class="form-control" placeholder="ingrese marca">

                            {!! $errors->first('marca', '<span class="help-block">:message</span>') !!}
          
                        </div>

                        <div class="form-group {{ $errors->has('modelo') ? 'text-danger' : '' }}">
                            <label>Modelo</label>
                            <input name="modelo" value="{{ old('modelo', $cliente->modelo) }}" type="text"
                                class="form-control" placeholder="ingrese modelo">
                            {!! $errors->first('modelo', '<span class="help-block">:message</span>') !!}        
                        </div>                        

                        <div class="form-group {{ $errors->has('chasis') ? 'text-danger' : '' }}">
                            <label>Chasis</label>
                            <input name="chasis" value="{{ old('chasis', $cliente->chasis) }}" type="text"
                                class="form-control" placeholder="ingrese chasis">
                            {!! $errors->first('chasis', '<span class="help-block">:message</span>') !!}        
                        </div> 

                        <div class="form-group {{ $errors->has('motor') ? 'text-danger' : '' }}">
                            <label>Motor</label>
                            <input name="motor" value="{{ old('motor', $cliente->motor) }}" type="text"
                                class="form-control" placeholder="ingrese motor">
                            {!! $errors->first('motor', '<span class="help-block">:message</span>') !!}        
                        </div>                         


                        <div class="form-group {{ $errors->has('color') ? 'text-danger' : '' }}">
                            <label>Color</label>
                            <input name="color" value="{{ old('color', $cliente->color) }}" type="text"
                                class="form-control" placeholder="ingrese color">
                            {!! $errors->first('color', '<span class="help-block">:message</span>') !!}        
                        </div>  

                        <div class="form-group {{ $errors->has('dua') ? 'text-danger' : '' }}">
                            <label>Dua</label>
                            <input name="dua" value="{{ old('dua', $cliente->dua) }}" type="text"
                                class="form-control" placeholder="ingrese dua">
                            {!! $errors->first('dua', '<span class="help-block">:message</span>') !!}        
                        </div>  


                        <div class="form-group {{ $errors->has('item') ? 'text-danger' : '' }}">
                            <label>Item</label>
                            <input name="item" value="{{ old('item', $cliente->item) }}" type="text"
                                class="form-control" placeholder="ingrese item">
                            {!! $errors->first('item', '<span class="help-block">:message</span>') !!}        
                        </div>  


                        <div class="form-group {{ $errors->has('tipovehiculo') ? 'text-danger' : '' }}">
                            <label>TIPO VEHICULO</label>

                            <select name="tipovehiculo" class="form-control select23">
                                <option value="">Seleccione tipo vehiculo</option>
                              
                                    <option value="lineal"
                                        {{ old('tipovehiculo', $cliente->tipovehiculo) == 'lineal' ? 'selected' : '' }}>
                                        LINEAL</option>
                                    <option value="trimoto"
                                        {{ old('tipovehiculo', $cliente->tipovehiculo) == 'trimoto' ? 'selected' : '' }}>
                                        TRIMOTO</option>
                                                             
                            </select>


                            {!! $errors->first('tipovehiculo', '<span class="help-block">:message</span>') !!}

                        </div>



                        <div class="form-group {{ $errors->has('tipoventa') ? 'text-danger' : '' }}">
                            <label>TIPO VENTA</label>

                            <select name="tipoventa" class="form-control select23">
                                <option value="">Seleccione tipo de venta</option>
                              
                                    <option value="1"
                                        {{ old('tipoventa', $cliente->tipoventa) == 1 ? 'selected' : '' }}>
                                        CONFORME</option>
                                    <option value="2"
                                        {{ old('tipoventa', $cliente->tipoventa) == 2 ? 'selected' : '' }}>
                                        NO FIGURA PAGO ADMIN</option>
                                                             
                            </select>


                            {!! $errors->first('tipoventa', '<span class="help-block">:message</span>') !!}

                        </div>


                        <div class="form-group {{ $errors->has('montodelacompra') ? 'text-danger' : '' }}">
                            <label>Monto de la compra</label>
                            <input name="montodelacompra" value="{{ old('montodelacompra', $cliente->montodelacompra) }}" type="text"
                                class="form-control" placeholder="ingrese montodelacompra">
                            {!! $errors->first('montodelacompra', '<span class="help-block">:message</span>') !!}        
                        </div>  









                        <div class="form-group">
                            <button type='submit' class="btn btn-primary btn-block">Guardar Cliente</button>
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
