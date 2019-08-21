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

				<div class="col-md-12">
					<div class="card">
						<div class="card-header" data-background-color="section-success">
              <h3 class="white">{{$type}}s</h3>
  							<p class="category">A continuación se muestran los {{$type}}s registrados en el sistema</p>
  						</div>
  						<div class="card-content">





                @if($typefunction =='catalogo')
                <div class="row">
								<div class="col-sm-12">
                  <a class="btn btn-success pull-right" href="{{route(''.$model.'.create')}}">Nueva {{$type}}<i class="material-icons">add</i></a>
								</div>
							</div>
                @endif

  							<div class="row">
  								<div class="col-sm-12">
  									<div class="table-responsive">


<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
 <thead>
   <tr>
		 @foreach($columns as $id => $value)
		<th>{{ $id }}</th>
		 @endforeach

     @if($typefunction != 'catalogo')
		 		<th>Status</th>
      @endif
      @if($typefunction !='catalogo')
         <th>Archivos</th>
         <th>Desistir</th>
      @endif
      @if($typefunction =='catalogo')
         <th>Acción</th>
      @endif
   </tr>
 </thead>
 <tbody>
   @foreach($data as $entity)
       <tr>
				 @foreach($columns as $id => $value)
 					<td>{{ $entity->$value }}</td>
 					@endforeach
          @if($typefunction != 'catalogo')
					<td class="">
						@if($entity->proceed == '0')
						<button type="button" class="btn btn-danger" style="padding:12px 2px;" >Pendiente|Analista</button>
						@endif
						@if($entity->proceed == '1')
						<button type="button" class="btn btn-default" style="padding:12px 2px;" >Pendiente|Enlace</button>
						@endif
						@if($entity->proceed == '3')
						<button type="button" class="btn btn-warning" style="padding:12px 2px;" >Improcedente</button>
						@endif
						@if($entity->proceed == '4')
						<button type="button" class="btn btn-success" style="padding:12px 2px;" >Finalizado</button>
						@endif
					</td>
          @endif
					<td class="">
								<!--	<a class="btn btn-success" href="/system/{{$model}}/{{ $entity->id }}/edit">Editar</a> -->
                <div class="card-avatar">
                  @if($typefunction != 'catalogo')
                  <a href="#">
											<button type="button" class="btn btn-success btn-lg" style="padding:12px 24px;" data-toggle="modal" data-target="#{{ $entity->id }}" >Archivo</button>
									</a>
                  <td>
                    <a href="#">
  											<button onclick="demo.showSwal('warning-message-and-confirmation')" type="button" class="btn btn-warning btn-lg" style="padding:12px 24px;" data-toggle="modal_d" data-target="#{{ $entity->id }}" >
                          <i class="material-icons">warning</i></button>
  									</a>
                  </td>

                  @endif

                  @if($typefunction == 'catalogo')

											<a type="button" class="btn btn-success btn-lg" style="padding:12px 24px;" href="/blog/{{$model}}/{{ $entity->id }}/edit"> Detalle</a>

                  @endif

									<!-- Modal Archivo-->
								  <div class="modal fade" id="{{ $entity->id }}" role="dialog">
								    <div class="modal-dialog">

								      <!-- Modal content-->
								      <div class="modal-content">
								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">&times;</button>
								          <h4 class="modal-title">Archivo PDF</h4>
								        </div>
								        <div class="modal-body">
								          <p>Documento PDF</p>

													@if(Auth::user()->type == 'analista' || Auth::user()->type == 'admin' )
													<div class="row">

														<div class="col-md-5">


													<a href="#">
														<img src="{{$entity->documentidentification}}" alt="Identificación" style="width:190px; height:100px">
													</a>
													<div class="container">
													 <p>Identificación del Ciudadano</p>
													 </div>
															</div>
															<div class="col-md-7">
																	<label>Departamento</label>
																			<select class="selectpicker " data-style="select-with-transition" name="departament" value="{{$entity->departament}}" title="{{$entity->departament}}" required>
																					@foreach($highusers->all() as $highuser)
																					<option>{{$highuser->nombre}}</option>
																					@endforeach
																			</select>
															</div>
													</div>
													@endif
													<a href="#">
														<embed src="{{ $entity->document }}" type="application/pdf" style="width:550px; height:300px"></embed>
													</a>

								        </div>
								        <div class="modal-footer">

													@if(Auth::user()->type == 'analista' || Auth::user()->type == 'admin' )
													<form name="myForm" action="/blog/public/protest/{{ $entity->id }}" method="post" enctype="multipart/form-data">
														{{csrf_field()}}
														{{ method_field('PUT') }}
														<div class="row">
														<div class="col-md-12">
															<div class="tim-typo">
																	<h6>
																			<span class="tim-note">Comentarios</span></h6>
															</div>
															<textarea class="form-control" placeholder="Comentarios | Maximo 255 caracteres" rows="5" name="comments"></textarea>
														</div>
														</div>
														<div class="col-xs-7">
															<div class="radio">
																	<label>
																			<input type="radio" name="proceed" checked="true" value="3"> <p class="text-danger">No Procede </p>
																	</label>
															</div>
															<div class="radio">
																	<label>
																			<input type="radio" name="proceed" value="1">  <p class="text-success">Si Procede </p>
																	</label>
															</div>
														</div>

														<div class="text-center">
																<button type="submit" class="btn btn-success btn-fill btn-wd">Enviar</button>
														</div>
													</div>

													</form>
													@endif


													@if(Auth::user()->type == 'enlace' || Auth::user()->type == 'admin' )

													<form name="myForm" action="/blog/public/protest/{{ $entity->id }}" method="post" enctype="multipart/form-data">
														{{csrf_field()}}
														{{ method_field('PUT') }}
														<div class="row">
														<div class="col-md-12">
															<div class="tim-typo">
																	<h6>
																			<span class="tim-note">Comentarios Recibidos</span></h6>
															</div>
															<textarea class="form-control" placeholder="{{$entity->comments}}" rows="5"  disabled=""></textarea>
														</div>
														</div>
														<br>
														<div class="row">
														<div class="col-md-12">
															<div class="tim-typo">
																	<h6>
																			<span class="tim-note">Comentarios a Realizar</span></h6>
															</div>
															<textarea class="form-control" placeholder="Realice los comentarios y la accion que se tomara" rows="5" name="comments2"	></textarea>
														</div>
														</div>
														<div class="col-md-12">
															<div class="radio">
																	<label>
																			<input type="radio" name="proceed"  value="4"> <p class="text-success">Atención Ciudadana</p>
																	</label>
															</div>
															<div class="radio">
																	<label>
																			<input type="radio" name="proceed" value="5">  <p class="text-success">Irregularidad se previene al servidor publico</p>
																	</label>
															</div>
														</div>

														<div class="text-center">
																<button type="submit" class="btn btn-success btn-fill btn-wd">Enviar</button>
														</div>
													</div>

													</form>



													@endif

													@if(Auth::user()->type == 'user' || Auth::user()->type == 'admin' )
													<div class="row">
													<div class="col-md-12">
														<div class="tim-typo">
																<h6>
																		<span class="tim-note">Comentarios-Dependencia</span></h6>
														</div>
														<textarea class="form-control" placeholder="{{$entity->comments2}}" rows="5"  disabled=""></textarea>

													</div>
													</div>

													@endif

								        </div>
								      </div>

								    </div>
								  </div>

								</div>
                </div>
                <!--  <button type="button" id_element="{{$entity->id}}"
									rel="tooltip" title="Eliminar" class="btn btn-danger btn-simple btn-xs detele_r">
									<i class="fa fa-times"></i>
								</button> -->
         </td>

       </tr>
  @endforeach


 </tbody>
</table>




									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('js')

<script>
$('#exampleModal').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var recipient = button.data('whatever') // Extract info from data-* attributes
// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
var modal = $(this)
modal.find('.modal-title').text('New message to ' + recipient)
modal.find('.modal-body input').val(recipient)
})
</script>


	<script>
  $(document).ready(function() {
    $('#example').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
      }
    });
  });

	</script>

	<script>
		$(document).ready(function() {
			var type = $('.type_form').val();
			$('.detele_r').click( function(event){
				var element = $(this);
				var id = element.attr('id_element');
				deleteOfModel(id,element);
			});
			//Functions
			function deleteOfModel(id,element){
				modalSystem("Eliminar Usuario","Estas a punto de eliminar el usuario con el id: "+id);
				$('.t_action_system').click(function(){
						$('#modal_system').modal('hide');
						Ajax_delete(type,id);
						element.parents('tr').remove();
				});
			}
			function modalSystem(title="Alerta",msg="Terminar la operación"){
					$('#modal_system_label').text(title);
					$('#modal_system_msg').text(msg);
					$('#modal_system').modal();
			}
			function Ajax_delete(model,id){
				var token = '{{ csrf_token() }}';
	    		$.ajax({
	        url: model+"{{$model}}/"+id,
	        type: 'POST',
	        data: {_method: 'delete', _token :token},
	        success: function (resp) {
				console.log("Todo ok");
	        },
	        error: function( req, status, err ) {
				console.log(req.responseText);
	        },
	      });
			}
		}); //end
	</script>

@endsection
