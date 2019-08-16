@extends('layouts.app')

@section('content')
<input type="hidden" class="type_form" value="">
<div class="content">
  <div class="container-fluid">
    <div class="row">
      @if(session('msg'))

        <div class="alert alert-success">
<div class="container-fluid">
<div class="alert-icon">
<i class="material-icons">check</i>
</div>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true"><i class="material-icons">clear</i></span>
</button>
<b>Alerta:</b> {{session('msg') }}
</div>
</div>
      @endif
      @if(Session::has('flash_message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('flash_message') }}
                </div>
            @endif
            @if (count($errors) > 0)
          <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif







<div class="container">

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                  <div class="col-md-8 col-md-offset-4">
                    <h3>Nueva Protesta</h3>
                  </div>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif



                    <form name="myForm" class="" action="/blog/public/protest" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Su CURP</label>
                                    <input type="text" class="form-control border-input" style="text-transform:uppercase;"  name="curp" value="{{$user->curp}}" disabled="" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre o tipo de tramite</label>
                                    <input type="text" class="form-control border-input"  name="title" value="{{old('title')}}" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre en contra de quien se presenta la protesta</label>
                                    <input type="text" class="form-control border-input" style="text-transform:uppercase;"  name="nombrevs" value="" >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Cargo</label>
                                    <input type="text" class="form-control border-input" style="text-transform:uppercase;"  name="cargo" value=""  >
                                </div>
                            </div>

                        </div>

                        <div class="row">



                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Dependencia / Organizacion</label>
                                        <select class="selectpicker " data-style="select-with-transition"  data-live-search="true" name="departament" value="{{old('departament')}}" title="Seleccione una Dependencia" required>
                                            @foreach($highusers->all() as $highuser)
                                            <option>{{$highuser->nombre}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Municipio</label>
                                        <select class="selectpicker " data-style="select-with-transition"  data-live-search="true" name="munipality" value="{{old('munipality')}}" title="Seleccione el Municipio" required>
                                            @foreach($municipalitys->all() as $municipality)
                                            <option>{{$municipality->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Domicilio, calle, numero</label>
                                    <input type="text" class="form-control border-input" style="text-transform:uppercase;"  name="address" value=""  >
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label>Tipo de persona</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="juridic"  value="Juridica" required> Juridica
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="juridic"  value="Fisica"> Fisica
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4 col-sm-2">
                              <legend>Identificacion</legend>
                              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail">
                                      <img src="{{asset('public/assets/img/imagen.png') }}" alt="..." style="width:100px; height:100px;">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                  <div>
                                      <span class="btn btn-gray btn-round btn-file">
                                          <span class="fileinput-new">Seleccionar Identificacion</span>
                                          <span class="fileinput-exists">Cambiar</span>
                                          <input type="file" name="documentidentification" required />
                                      </span>
                                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-4 col-sm-2">
                              <legend>Documento</legend>
                              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail">
                                      <img src="{{asset('public/assets/img/pdf.png') }}" style="width:100px; height:100px;">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                  <div>
                                      <span class="btn btn-gray btn-round btn-file">
                                          <span class="fileinput-new">Seleccionar Documento</span>
                                          <span class="fileinput-exists">Cambiar</span>
                                          <input type="file" name="document" required />
                                      </span>
                                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-4 col-sm-2">
                              <legend>Documentos Probatorios</legend>
                              <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail">
                                      <img src="{{asset('public/assets/img/docevidencia.jpg') }}" style="width:100px; height:100px;">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                  <div>
                                      <span class="btn btn-gray btn-round btn-file">
                                          <span class="fileinput-new">Seleccionar Documento</span>
                                          <span class="fileinput-exists">Cambiar</span>
                                          <input type="file" name="documentprobatory" required />
                                      </span>
                                      <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Eliminar</a>
                                  </div>
                              </div>
                          </div>

                        </div>




                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-fill btn-wd">Enviar Protesta</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
function validateForm() {
  var x = document.forms["myForm"]["curp"].value;
    if (min == "10") {
    alert("Campo Obligatario");
    return false;
  }
}
</script>
<script>
  $.validate({
    modules: 'file'
  });
</script>
@endsection
