@extends('app.master')

@section('titulo')
    Productos Listado
@endsection

@section('contenido')
<div class="container">
  <div class="row" style="padding-top:20px">
      <div class="col-md-12">
        <form action="{{action('ProductosController@formulario')}}" method="post">
        {{csrf_field()}}
          <button class="btn btn-success">Agregar producto</button>
        </form>
      </div>
      <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12"  style="padding-top:20px">
              <table class="table table-bordered table-hover">
                  <tr>
                      <th style='font-size:25px'>Producto numero</th>
                      <th style='font-size:25px'>Nombre</th>
                      <th style='font-size:25px'>Precio</th>
                  </tr>
                  @foreach($contenido as $elemento)
                  <tr>
                      <td>{{$elemento->id_producto}}</td>
                      <td><a href="{{action('ProductosController@formulario',["id_producto"=>$elemento->id_producto])}}">{{$elemento->nombre_producto}}</a></td>
                      <td>{{$elemento->precio_producto}}</td>
                  </tr>
                  @endforeach
              </table>
          </div>
      </div>
  </div>
@endsection