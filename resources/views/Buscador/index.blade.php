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
          <form action="{{action('BuscadorController@index')}}" method="post">
          {{csrf_field()}}
            <div class="form-froup">
              <label>Buscar</label>
            <input type="text" name="criterio" value="{{$criterio}}" placeholder="Escribir nombre personal o tipo de servicio" class="form-control">
            </div>
            <button class="btn btn-success">Buscar</button>
          </form>
        </div>
      </div>
      <br>
        <div id="app" class="row">
            <div v-if="registros.length!=0" class="col-md-12 col-sm-12 col-xs-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Busqueda Rapida</h3>
                </div>
                <div class="panel-body">
                  <div class="form-group">
                    <label>Tipo de servicio</label>
                    <select class="form-control" v-model="filtro_tipo">
                      <option value="Todos">Todos</option>
                      <option value="Basico">Basico</option>
                      <option value="Premium">Premium</option>
                      <option value="VIP">VIP</option>
                    </select>
                    <br>
                    {{-- <button @click="filtrar" class="btn btn-info">Borrar</button> --}}
                  </div>
                </div>
              </div>
            </div>
            <h3>Resultados de Busqueda</h3>
            <table class="table">
              <thead>
                <th>ID del socio</th>
                <th>Nombre</th>
                <th>Tipo Socio</th>
              </tr>
              <tr v-for="elemento in registros_final">
                <th>@{{elemento.id_socio}}</th>
                <th>@{{elemento.nombre_socio}}</th>
                <th>@{{elemento.nombre_tiposocio}}</th>
              </tr>
            </table>
        </div>
    </div>
    <script src="{{asset('public/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/jquery.min.js')}}"></script>
    <script src="{{asset('public/vue.js')}}"></script>
    <script>
      new Vue({
        el:'#app',
        data:{
          registros:<?php echo json_encode($registros);?>,
          filtro_tipo:'Todos',
          tipos:[]
        }
        ,computed:{
				registros_final:function(){
					lista=[];
					self=this;
					lista=this.registros.filter(function(item){
						bandera_tipo=false;
						if(self.filtro_tipo =='Todos')
						    bandera_tipo=true;
						else{
							if(self.filtro_tipo==item.nombre_tiposocio)
						        bandera_tipo=true;
						}
						return bandera_tipo;
					})
					return lista;
				}

			}
      });
    </script>
  </body>
</html>

