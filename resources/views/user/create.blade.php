@extends('layouts.app')

@section('content')
@unless (Auth::check())
    No has iniciado sesión.
@endunless
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
      <div class="panel-body">
          @if (session('status'))
              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
        </div>


<div class="content">
    <div class="container-fluid">
        <div class="col-sm-8 col-sm-offset-2">
            <!--      Wizard container        -->
            <div class="wizard-container">
                <div class="card wizard-card" data-color="" id="wizardProfile">
                    <form action="/blog/user" method="POST" enctype="multipart/form-data">
                      {{csrf_field()}}

                        <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                        <div class="wizard-header">
                            <h3 class="wizard-title">
                              Construye su perfil

                        <!--          <p>{{$posts->response[0]->nombre}}
                                     {{$posts->response[0]->apellidoPaterno}}
                                     {{$posts->response[0]->apellidoMaterno}}</p> -->


                            </h3>
                            <h5>Esta información nos permitirá crear usuarios para las dependencias..</h5>
                        </div>
                        <div class="wizard-navigation">
                            <ul>
                                <li>
                                    <a href="#about" data-toggle="tab">Perfil</a>
                                </li>
                                <li>
                                    <a href="#account" data-toggle="tab">Nivel de Usuario</a>
                                </li>
                                <li>
                                    <a href="#address" data-toggle="tab">Dependencia</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                                <div class="row">
                                    <h4 class="info-text"> Empecemos con la información básica.</h4>
                                    <div class="col-sm-4 col-sm-offset-1">
                                        <div class="picture-container">
                                            <div class="picture">
                                                <img src="{{ asset ('public/assets/img/24_2.png')}}" class="picture" id="wizardPicturePreview" title="" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">face</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Nombres
                                                    <small>(Requerido)</small>
                                                </label>
                                                <input name="name" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">record_voice_over</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Apellido
                                                    <small>(Requerido)</small>
                                                </label>
                                                <input name="lastname" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating">
                                                <label class="control-label">Email
                                                    <small>(Requerido)</small>
                                                </label>
                                                <input name="email" type="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> Defina su nivel de usuario</h4>
                                <div class="row">
                                    <div class="col-lg-10 col-lg-offset-1">

                                      <div class="col-sm-4">
                                         <div class="choice" data-toggle="wizard-checkbox">
                                             <input type="checkbox" name="type" value="analista">
                                             <div class="icon">
                                                 <i class="fa fa-terminal"></i>
                                             </div>
                                             <h6>Analista</h6>
                                         </div>
                                     </div>

                                       <div class="col-sm-4">
                                           <div class="choice" data-toggle="wizard-checkbox">
                                               <input type="checkbox" name="type" value="enlace">
                                               <div class="icon">
                                                   <i class="fa fa-terminal"></i>
                                               </div>
                                               <h6>Enlace</h6>
                                           </div>
                                       </div>
                                       <div class="col-sm-4">
                                           <div class="choice" data-toggle="wizard-checkbox">
                                               <input type="checkbox" name="type" value="admin">
                                               <div class="icon">
                                                   <i class="fa fa-laptop"></i>
                                               </div>
                                               <h6>Administrador(Super)</h6>
                                           </div>
                                       </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Seleccione la Dependencia  </h4>
                                    </div>

                                    <div class="col-sm-5 col-sm-offset-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Dependencia</label>

                                            <select class="selectpicker"  data-style="select-with-transition" data-live-search="true"
                                             name="dependece" value="{{old('departament')}}" title="{{old('departament')}}" required>
                                                @foreach($highusers->all() as $highuser)
                                                <option>{{$highuser->nombre}}</option>
                                                @endforeach
                                            </select>





                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Siguiente' />
                                <input type='submit' class='btn btn-finish btn-fill btn-danger  btn-wd' name='finish' value='Terminar' />
                            </div>
                            <div class="pull-left">
                                  <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Atras' />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- wizard container -->
        </div>
    </div>
</div>
@yield('footer')

@endsection
