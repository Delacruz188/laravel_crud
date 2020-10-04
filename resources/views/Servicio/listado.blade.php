<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Plantilla BT</title>
    <link rel="stylesheet" href="{{asset('public/bootstrap.css')}}">
  </head>
  <body>
    <div class="container">
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
                        <th style='font-size:25px'>Cliente</th>
                    </tr>
                    @foreach($lista as $elemento)
                    <tr>
                        <td>{{$elemento->id_servicio}}</td>
                        <td><a href="{{action('ServicioController@formulario', ["id_servicio"=>$elemento->id_servicio])}}">{{$elemento->nombre_servicio}}</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    <script src="{{asset('public/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/jquery.min.js')}}"></script>
  
  
  </body>
</html>