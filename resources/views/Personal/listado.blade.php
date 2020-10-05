@extends('app.master')

@section('titulo')
    Personal Listado
@endsection

@section('contenido')
<div class="container">
  <div class="row" style="padding-top:20px">
      <div class="col-md-12">
        <form action="{{action('PersonalController@formulario')}}" method="post">
        {{csrf_field()}}
          <button class="btn btn-success">Agregar personal</button>
        </form>
      </div>
    </div>
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12"  style="padding-top:20px">
          <table class="table table-bordered table-hover">
              <tr>
                  <th style='font-size:25px'>Personal numero</th>
                  <th style='font-size:25px'>Nombre</th>
                  <th style='font-size:25px'>CURP</th>
                  <th style='font-size:25px'>Foto</th>
                  <th style='font-size:25px'>Sucursal a la cual pertenece</th>
              </tr>
              @foreach($contenido as $elemento)
              <tr>
                  <td>{{$elemento->id_personal}}</td>
                  <td><a href="{{action('PersonalController@formulario', ["id_personal"=>$elemento->id_personal])}}">{{$elemento->nombre_personal}}</a></td>
                  <td>{{$elemento->curp}}</td>
                  <td>
                    <img src="{{{url($elemento->foto)}}}" style="width: 100px">
                  </td>
                  <td>{{$elemento->nombre}}</td>
              </tr>
              @endforeach
          </table>
      </div>
  </div>
</div>
@endsection
    
   
 