<div class="wrapper">
		<div class="sidebar" data-active-color="rose" data-background-color="purple" data-image="{{asset('assets/img/card-1.png')}}">
				<!--
		Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
		Tip 2: you can also add an image using data-image tag
		Tip 3: you can change the color of the sidebar with data-background-color="white | black"
-->

				<div class="sidebar-wrapper">
						<div class="user">
								<div class="photo">
										<img src="{{asset('assets/img/card-1.png')}}" />
								</div>
								<div class="info">
										<a data-toggle="collapse" href="#collapseExample" class="collapsed">
												{{ Auth::user()->name }}
												<b class="caret"></b>
										</a>
										<div class="collapse" id="collapseExample">
												<ul class="nav">
														<li>
																<a href="#">My Perfil</a>
														</li>
														<li>
																<a href="#">Editar Perfil</a>
														</li>
														</ul>
										</div>
								</div>
						</div>
						<ul class="nav">



								<!--
								<li>

										<a data-toggle="collapse" href="#mapsExamples">
												<i class="material-icons">place</i>
												<p>Maps
														<b class="caret"></b>
												</p>
										</a>
										<div class="collapse" id="mapsExamples">
												<ul class="nav">
														<li>
																<a href="../maps/google.html">Google Maps</a>
														</li>
														<li>
																<a href="../maps/fullscreen.html">Full Screen Map</a>
														</li>
														<li>
																<a href="../maps/vector.html">Vector Map</a>
														</li>
												</ul>
										</div>
								</li>
							-->
								@if(Auth::user()->type == 'admin')
								<li>
										<a href="/blog/public/protest/create">
												<i class="material-icons">date_range</i>
												<p>Nueva Protesta</p>
										</a>
								</li>

								<li>
										<a href="/blog/public/turnado">
												<i class="material-icons">offline_pin</i>
												<p>Protesta Atendidas</p>
										</a>
								</li>
								<li>
										<a href="/blog/public/noturnado">
												<i class="material-icons">clear</i>
												<p>Improcedentes</p>
										</a>
								</li>

								<li>
										<a data-toggle="collapse" href="#pagesExamples">
												<i class="material-icons">supervised_user_circle</i>
												<p>Usuarios
														<b class="caret"></b>
												</p>
										</a>
										<div class="collapse" id="pagesExamples">
												<ul class="nav">
														<li>
																<a href="/blog/public/user/create">Nuevo usuario</a>
														</li>
														<li>
																<a href="/blog/public/user">Todos los usuarios</a>
														</li>
												</ul>
										</div>
								</li>
								@endif

								@if(Auth::user()->type == 'analista')
								<li>
										<a href="/blog/public/home">
												<i class="material-icons">date_range</i>
												<p>Todas las Protesta</p>
										</a>
								</li>
								<li>
										<a href="/blog/public/turnado">
												<i class="material-icons">offline_pin</i>
												<p>Protesta Atendidas</p>
										</a>
								</li>
								<li>
										<a href="/blog/public/noturnado">
												<i class="material-icons">clear</i>
												<p>Improcedentes</p>
										</a>
								</li>
								@endif

								@if(Auth::user()->type == 'enlace')
								<li>
										<a href="/blog/public/home">
												<i class="material-icons">date_range</i>
												<p>Todas las Protesta Recibidas</p>
										</a>
								</li>
								<li>
										<a href="/blog/public/turnado">
												<i class="material-icons">offline_pin</i>
												<p>Protesta Atendidas</p>
										</a>
								</li>
								<li>
										<a href="/blog/public/vence">
												<i class="material-icons">alarm</i>
												<p>Por vencer</p>
										</a>
								</li>
								<li>
										<a href="/blog/public/noturnado">
												<i class="material-icons">report_off</i>
												<p>No atendidas</p>
										</a>
								</li>
								@endif


								@if(Auth::user()->type == 'user')
							<li>
									<a href="/blog/public/protest/create">
											<i class="material-icons">date_range</i>
											<p>Nueva Protesta</p>
									</a>
							</li>
								<li>
										<a href="/blog/public/protest">
												<i class="material-icons">date_range</i>
												<p>Mis Protestas</p>
										</a>
								</li>
								 @endif

						</ul>
				</div>
		</div>



		<div class="main-panel">
			<div class="row">
					<div class="col-md-12">
						<div class="container-fluid">
				<div class="card">
					<div class="card-content">
							@yield('content')
					</div>
					</div>
				</div>
				</div>
			</div>



							<!--	<div class="header text-center">
										<h3 class="title">Material Dashboard Heading</h3>
										<p class="category">Created using Roboto Font Family</p>
								</div> -->






				<footer class="footer">
						<div class="container-fluid">
								<nav class="pull-left">
											</nav>
								<p class="copyright pull-right">
										&copy;
										<script>
												document.write(new Date().getFullYear())
										</script>
										<a href="http://www.creative-tim.com/">CEMER</a>, Todos los derechos Reservador
								</p>
						</div>
				</footer>
		</div>
