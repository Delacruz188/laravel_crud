@extends('app.master')

@section('titulo')
    Formulario
@endsection

@section('contenido')
    
<div class="container">
  <h1>Agregar servicio</h1>
      <form action="{{action('ServicioController@save')}}" class="form-horizontal" style='padding-top:20px' method="post">
        {{csrf_field()}}
        <input type="hidden" name="id_servicio" value="{{$servicio->id_servicio}}">          
        <div class="form-group">
                <label for="nombre_servicio" class="col-sm-2 control-label">Nombre del servicio</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre" value="{{$servicio->nombre}}">
                </div>
          </div>
          <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" class="btn btn-info" name="operacion" value="{{$operacion}}">
              <!-- vamos a usar un if de laravel -->
              @if($operacion === 'Editar')
              <input type="submit" class="btn btn-danger" name="operacion" value="Eliminar">
              <!-- <button type="submit" class="btn btn-danger">Eliminar</button> -->
              @endif
              <input type="submit" class="btn btn-link" name="operacion" value="Cancelar">
              <!-- <button type="submit" class="btn btn-link">Cancelar</button>
              </div> -->
          </div>
          
      </form>
  </div>

@endsection