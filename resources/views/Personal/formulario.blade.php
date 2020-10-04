<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Personal</title>
    <link rel="stylesheet" href="{{asset('public/bootstrap.css')}}">
    <style>
      #dropzone{
        border-radius: 10px;
        padding: 40px;
        border-style: groove;
        border-width: 2px;
      }

      #foto{
        display: none;
      }

      #carga_file{
        cursor: pointer;
      }

      .inactivo{
        background-color: #7ea2f0;
        border-color: #185aa7
      }

      .conarchivo{
        background-color: #8bb47b;
        border-color: #38803e
      }

      .leave{
        background-color: #EFD8;
        border-color: red
        
      }

      .algo{
        background-color: #e0a21c;
        border-color: orange
      }
    </style>
  </head>
  <body>
  <div id="app" class="container">
    <h1>Agregar personal</h1>
        <form enctype="multipart/form-data" action="{{action('PersonalController@save')}}" class="form-horizontal" style='padding-top:20px' method="post">
          {{csrf_field()}}
            <input type="hidden" name="id_personal" value="{{$personal->id_personal}}">
            <div class="form-group">
                  <label for="nombre_personal" class="col-sm-2 control-label">Nombre de la persona</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nombre_personal" :value="nombre">
                </div>
            </div>
            <div class="form-group" style="padding-top:10px">
                  <label for="curp" class="col-sm-2 control-label">CURP de la persona</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="curp" :value="curp">
                </div>
            </div>
            <div class="form-group" style="padding-top:10px">
              <div class="col-sm-10">
                <input ref='foto' id="foto" type="file" class="form-control" name="foto" @change="cambiar">
              </div>
              <div id="dropzone"
                @dragover="sobre($event)"
                @dragleave="fuera($event)"
                @drop="drop($event)"
                :class="clase"
                >
                Coloca el archivo o de haz click <label id="carga_file" for="foto" class="form-label"><strong>Aqui</strong></label>
                <div v-show="nombre_archivo!=''">
                  <span>@{{nombre_archivo}}</span> <a href="#" @click="remove">Quitar</a>
                </div>
              </div>
              <div v-if="errores" style="background-color: #e0a21c;
              border-color: rgb(182, 123, 13); border-radius: 10px; border-width:2px; padding:12px">
                Solo se aceptan archivos de tipo JPEG o PNG.
              </div>
              <img :src="url" width="250">
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-info" name="operacion" value="{{$operacion}}">
                <!-- vamos a usar un if de laravel -->
                @if($operacion === 'Editar')
                <input type="submit" class="btn btn-danger" name="operacion" value="Eliminar">
                <!-- <button type="submit" class="btn btn-danger">Eliminar</button> -->
                @endif
                <input type="submit" class="btn btn-danger" name="operacion" value="Cancelar">
                <!-- <button type="submit" class="btn btn-link">Cancelar</button>
                </div> -->
            </div>
            
        </form>
    </div>
    <script src="{{asset('public/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/jquery.min.js')}}"></script>
    <script src="{{asset('public/vue.js')}}"></script>

    <script>
      new Vue({
        el:'#app',
        data:{
          errores: false,
          id_personal: '{{$personal->id_personal}}',
          nombre: '{{$personal->nombre_personal}}',
          curp: '{{$personal->curp}}',
          clase:{
            inactivo: true,
            conarchivo: false,
            leave: false,
            incorrecto: false
          },
          url: '{{URL::to("/")}}/'+'{{$personal->foto}}',
          tiposPermitidos:['image/png', 'image/jpeg'],
          nombre_archivo: ''
        },
        methods:{
            remove: function(){
              this.$refs.foto.value='';
              this.nombre_archivo = '';
              this.url = '';
            },cambiar: function(){
              let ultimo = this.$refs.foto.files.length-1;
              if (this.tiposPermitidos.indexOf(this.$refs.foto.files[ultimo].type)!=-1) {
                this.nombre_archivo = this.$refs.foto.files[ultimo].name;
                this.url = URL.createObjectURL(this.$refs.foto.files[ultimo]);
                this.errores = false;
                console.log('archivo correcto')
              }
              else {
                this.errores = true;
                console.log('archivo incorrecto')
              }
            },sobre: function(e){
            e.preventDefault();
            this.clase.leave=true;
            this.clase.conarchivo=false;
            this.clase.inactivo=false;
            this.clase.incorrecto = false;
          }, fuera: function(e){
            e.preventDefault();
            this.clase.leave=false;
            this.clase.conarchivo=false;
            this.clase.inactivo=true;
            this.clase.incorrecto = false;
          },
            drop: function(e){
            e.preventDefault();
            this.clase.leave=false;
            this.clase.conarchivo=true;
            this.clase.inactivo=false;
            this.clase.incorrecto = false;
            this.$refs.foto.files=e.dataTransfer.files; 
            this.cambiar();
          }
        }
      });
    </script>
  </body>
</html>