@extends('app.master')

@section('titulo')
    Servicios Listado
@endsection

@section('contenido')
<div class="row" style="padding-top:20px">
  <div class="col-md-12">
    <form action="{{action('ServicioController@formulario')}}" method="post">
    {{csrf_field()}}
      <button class="btn btn-success">Agregar servicio</button>
    </form>
  </div>
</div>
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <h1>Catalogo de servicios</h1>
          <table class="table table-bordered table-hover">
              <tr>
                  <th style='font-size:25px'>Servicio numero</th>
                  <th style='font-size:25px'>Tipo de servicio</th>
                  <th style='font-size:25px'>Personal que realizo el servicio</th>
                  <th style='font-size:25px'>Socio que recibio el servicio</th>
              </tr>
              @foreach($lista as $elemento)
              <tr>
                  <td>{{$elemento->id_servicio}}</td>
                  <td><a href="{{action('ServicioController@formulario', ["id_servicio"=>$elemento->id_servicio])}}">{{$elemento->nombre}}</a></td>
                  <td>{{$elemento->nombre_personal}}</td>
                  <td>{{$elemento->nombre_socio}}</td>
              </tr>
              @endforeach
          </table>
      </div>
  </div>   
@endsection

