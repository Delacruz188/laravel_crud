@extends('app.master')

@section('titulo')
    Socios Listado
@endsection

@section('contenido')
<div class="container">
  <div class="row" style="padding-top:20px">
      <div class="col-md-12">
        <form action="{{action('SocioController@formulario')}}" method="post">
        {{csrf_field()}}
          <button class="btn btn-success">Agregar socio</button>
        </form>
      </div>
    </div>
  <div class="row">
    </div>
      <div class="col-md-12 col-sm-12 col-xs-12"  style="padding-top:20px">
          <table class="table table-bordered table-hover">
              <tr>
                  <th style='font-size:25px'>ID Socio</th>
                  <th style='font-size:25px'>Nombre</th>
                  <th style='font-size:25px'>Foto</th>
                  <th style='font-size:25px'>Tipo socio</th>
              </tr>
              @foreach($contenido as $elemento)
              <tr>
                  <td>{{$elemento->id_socio}}</td>
                  <td><a href="{{action('SocioController@formulario', ["id_socio"=>$elemento->id_socio])}}">{{$elemento->nombre_socio}}</a></td>
                  <td>
                   <img src="{{{url($elemento->foto)}}}" style="width: 100px">
                  </td>
                  <td>{{$elemento->nombre_tiposocio}}</td>
                  
                  
              </tr>
              @endforeach
          </table>
      </div>
  </div>
</div>
@endsection