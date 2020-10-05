@extends('app.master')

@section('titulo')
    Formulario Socio
@endsection

@section('contenido')

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Socios</title>
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

<div id="app" class="container">
  <h1>Agregar socio</h1>
      <form enctype="multipart/form-data" action="{{action('SocioController@save')}}" class="form-horizontal" style='padding-top:20px' method="post">
        {{csrf_field()}}
          <input type="hidden" name="id_socio" value="{{$socio->id_socio}}">
          <div class="form-group">
                <label for="nombre_socio" class="col-sm-2 control-label">Nombre de la persona</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nombre_socio" :value="nombre_socio">
              </div>
          </div>
          <div class="container pt-4">
            <div class="col-md-12 col-sm-12 col-xs-12"  style="padding-top:20px">
              <table class="table table-bordered table-hover">
                  <tr>
                      <th style='font-size:25px'>Numero</th>
                      <th style='font-size:25px'>Tipod de Socio</th>
                  </tr>
                  <tr>
                      <td>1</td>
                      <td>Premium</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Basico</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>VIP</td>
                  </tr>
              </table>
          </div>
          <div class="form-group" style="padding-top:10px">
                <label for="curp" class="col-sm-2 control-label">Tipo de socio que desea</label>
              <div class="col-sm-10">
                <input type="text" placeholder="(Basico: 1. Premium: 2. VIP: 3)" class="form-control" name="id_tiposocio" :value="id_tiposocio">
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
@endsection

@section('script')
<script>
  new Vue({
    el:'#app',
    data:{
      errores: false,
      id_socio: '{{$socio->id_socio}}',
      nombre_socio: '{{$socio->nombre_socio}}',
      id_tiposocio: '{{$socio->id_tiposocio}}',
      clase:{
        inactivo: true,
        conarchivo: false,
        leave: false,
        incorrecto: false
      },
      url: '{{URL::to("/")}}/'+'{{$socio->foto}}',
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
@endsection

