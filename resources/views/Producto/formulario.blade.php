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
    <script src="{{asset('public/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/jquery.min.js')}}"></script>
  
  
  </body>
</html>