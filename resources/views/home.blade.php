@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                  <div class="col-md-8 col-md-offset-4">
                    <h3>Bienvenido</h3>
                  </div>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                      <div class="col-md-8 col-md-offset-4">
                            <a href="/blog/public/protest/create">
                            <button type="submit" class="btn btn-success btn-fill btn-wd">Nueva Protesta  </button>
                            </a>
                      </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
