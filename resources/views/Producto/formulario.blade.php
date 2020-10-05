@extends('app.master')

@section('titulo')
    Producto formulario
@endsection

@section('contenido')
<div class="container">
  <h1>Agregar producto</h1>
      <form action="{{action('ProductosController@save')}}" class="form-horizontal" style='padding-top:20px' method="POST">
        {{csrf_field()}}
          <input type="hidden" name="id_producto" value="{{$producto->id_producto}}">  
          <div class="form-group">
                <label for="nombre_producto" class="col-sm-2 control-label">Nombre del producto</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre_producto" value="{{$producto->nombre_producto}}">
              </div>
          </div>
          <div class="form-group" style="padding-top:10px">
                <label for="precio_producto" class="col-sm-2 control-label">Precio del producto</label>
              <div class="col-sm-10">
              <input type="text" class="form-control" name="precio_producto" value="{{$producto->precio_producto}}">
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
              <!-- <input type="submit" class="btn btn-danger" name="operacion" value="Cancelar"> -->
              <input type="submit" class="btn btn-link" name="operacion" value="Cancelar">
              </div>
          </div>
          
      </form>
  </div>
@endsection