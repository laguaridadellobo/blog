@extends('layouts.app')

@section('content')
<div class="wrapper wrapper-full-page">
    <div class="full-page login-page" filter-color="" data-image="{{asset('public/assets/img/login.jpg')}}">
        <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                          {{ csrf_field() }}
                            <div class="card card-login card-hidden">
                                <div class="card-header text-center" data-background-color="gray">
                                    <h4 class="card-title">Iniciar Sesión</h4>

                                </div>


                                <div class="card-content">

                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">email</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Correo electronico</label>
                                            <input id="email" type="email" class="form-control border-input" name="email" value="{{ old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons">lock_outline</i>
                                        </span>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Contraseña</label>
                                            <input id="password" type="password" class="form-control border-input" name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                  <p class="category text-center">
                                    <a  href="{{ route('password.request') }}">
                                      <p class="text-center info-title">
                                      ¿Olvidaste tu Contraseña?
                                      </p>
                                    </a>
                                    </p>




                                <div class="footer text-center">
                                    <button type="submit" class="btn btn-success btn-fill btn-wd btn-lg">Iniciar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
