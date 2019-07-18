@extends('layouts.app')

@section('content')



    <div class="container register-page" filter-color="black">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="card card-signup">

                <h2 class="card-title text-center">Registro</h2>

                <div class="row">
                    <div class="col-md-5 col-md-offset-1">


                        <div class="card-content">
                            <div class="info info-horizontal">
                                <div class="icon icon-rose">
                                    <i class="material-icons">timeline</i>
                                </div>
                                <div class="description">
                                    <h4 class="info-title">Bienvenido a protesta ciudadana</h4>
                                    <p class="description">
                                      Hemos creado la protesta ciudadana online. Es un gusto que forme parte de nuestro sistema..

                                    </p>
                                    <br><br><br><br><br><br>

                                </div>

                            </div>

                            <div class="info info-horizontal">
                              <div class="card-image" data-header-animation="true">

                                        <img class="img" src="{{asset('assets/img/24_2.png') }}">

                              <div class="ripple-container"></div></div>
                            </div>






                            </div>
                          </div>





                    <div class="col-md-5">
                        <div class="social text-center">

                            <h4> Bienvenidos </h4>
                        </div>
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="card-content">


                              <div class="input-group">

                                  <span class="input-group-addon">
                                      <i class="material-icons">perm_identity</i>
                                  </span>
                                  <input type="text" class="form-control" style="text-transform:uppercase;" placeholder="CURP..." name="curp" value="{{ old('curp') }}" required autofocus maxlength="18">

                                  @if ($errors->has('curp'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('curp') }}</strong>
                                      </span>
                                  @endif
                              </div>

                                <div class="input-group">

                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input id="name" type="text" class="form-control"style="text-transform:uppercase;" placeholder="Nombre completo..." name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group">

                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input id="name" type="text" class="form-control" style="text-transform:uppercase;" placeholder="Apellido paterno..." name="apat" value="{{ old('apat') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('apat') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group">

                                    <span class="input-group-addon">
                                        <i class="material-icons">face</i>
                                    </span>
                                    <input id="name" type="text" class="form-control" style="text-transform:uppercase;" placeholder="Apellido materno..." name="amat" value="{{ old('amat') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('amat') }}</strong>
                                        </span>
                                    @endif
                                </div>





                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">email</i>
                                    </span>
                                    <input id="email" type="email" placeholder="Email..." class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input id="password" placeholder="Contraseña..." type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock_outline</i>
                                    </span>
                                    <input id="password-confirm" placeholder="Confirmar Contraseña..."type="password" class="form-control" name="password_confirmation" required>


                                </div>
                                <!-- If you want to add a checkbox to this form, uncomment this code -->
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="optionsCheckboxes" checked> Acepto los
                                        <a href="#something">terminos y condiciones </a>.
                                    </label>
                                </div>
                            </div>
                            <div class="footer text-center">
                                <button type="submit" class="btn btn-primary btn-round">
                                    Comenzar
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>








<!--
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Registrate</div>

                <div class="panel-body">


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
@endsection
