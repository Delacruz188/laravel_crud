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
                    </tr>
                    @foreach($contenido as $elemento)
                    <tr>
                        <td>{{$elemento->id_personal}}</td>
                        <td><a href="{{action('PersonalController@formulario', ["id_personal"=>$elemento->id_personal])}}">{{$elemento->nombre_personal}}</a></td>
                        <td>{{$elemento->curp}}</td>
                        <td>
                          <img src="{{{url($elemento->foto)}}}" style="width: 100px">
                        </td>
                    </tr>
                    @endforeach

                    {{-- <tr>
                        <td>{{$elemento->id_personal}}</td>
                        <td><a href="{{action('PersonalController@formulario', ["id_personal"=>$elemento->id_personal])}}">{{$elemento->nombre_personal}}</a></td>
                        <td>{{$elemento->curp}}</td>
                        <td>{{$elemento->foto}}</td>
                    </tr> --}}
                </table>
            </div>
        </div>
    </div>
    <script src="{{asset('public/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/jquery.min.js')}}"></script>
  
    {{-- <script>
      new Vue({
        el:'#app',
        data:{
          
        },
        methods:{
          
        }
      });
    </script> --}}
  
  </body>
</html>

{{-- <tr v-for="elemento in registros">
                        <td><a :href="{{action('PersonalController@formulario')}}?id_personal=+'elemento-.id_personal'">@{{elemento.nombre}}</a></td>
                        <td><img :src="'{{URL::to('/')}}/'+elemento.foto" width="150"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="{{asset('public/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/jquery.min.js')}}"></script>
    <script src="{{asset('public/vue.js')}}"></script>
    
    <script>
      // creamos un nuevo script de vue
      new Vue({
        el: '#app',
        data: {
          registros://
        },
        methods: {}
      });
    </script>
  
  </body>
</html> --}}