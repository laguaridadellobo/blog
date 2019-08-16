@extends('layouts.app')

@section('content')
@unless (Auth::check())
    No has iniciado sesión.
@endunless
<!-- Banner de mensaje invisible -->
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
                    <h3>Dependencia</h3>
                  </div>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>

                    <form name="myForm" class="" action="/blog/public/dependece" method="post" enctype="multipart/form-data">
                      {{csrf_field()}}


                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Organizacion / Dependencia </label>
                                    <input type="text" class="form-control border-input"  name="name" value="" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Codigo Postal</label>
                                    <input type="text" class="form-control border-input"  name="cp" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dirección</label>
                                    <input type="text" class="form-control border-input"  name="address" value="" required>
                                </div>
                            </div>
                        </div>







                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success btn-fill btn-wd">Guardar</button>
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
