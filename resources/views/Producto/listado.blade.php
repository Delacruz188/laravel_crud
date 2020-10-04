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
    <script src="{{asset('public/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/jquery.min.js')}}"></script>
  
  
  </body>
</html>