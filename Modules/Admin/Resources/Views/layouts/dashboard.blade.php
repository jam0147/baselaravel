<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin::partials.dashboard.head')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border:0; background-color:#000 !important;">
							<center>
						  		<img width="80%" src="{{ url('public/img/logos/moneda.png') }} " alt="">
							</center>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info 
            <div class="profile clearfix">
              <div class="profile_pic">
                <a href="#"><i class="fa fa-home"></i></a>
              </div>
              <div class="profile_info">
                <h2>Home </h2>
              </div>
            </div>-->
            <!-- /menu profile quick info -->
            <!-- sidebar menu -->
            @include('admin::partials.dashboard.menu')
            <!-- /sidebar menu -->

            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
			<div class="nav_menu">
				<nav>

					<div class="nav toggle">
						<div class="menu-togg">
							<a id="menu_toggle">
							<i class="fa fa-bars"></i>
							</a>
						</div>
						

					</div>
					<div class="blank"></div>
					@yield('add-btn')
					<!--
					<div class="nav tick_2">
						<div class="tick_texto1">
							Dia de corte crédito:
						</div>
						<div class="tick_saldo">
							Lunes
						</div>
					</div>
					<ul class="message">
						<li>
							<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-envelope"></i>
							<ul>
								<li>jkbsd</li>
								<li>jkbsd</li>
								<li>jkbsd</li>
							</ul>
						</li>
						<li>
							<a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
							<i class="fa fa-bell"></i>
							<span class="badge bg-green">6</span>
							</a>
						</li>
					</ul>
					-->
					
					<ul class="nav navbar-nav navbar-right">
						<li class="li-nombre-cliente">
							<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<span class=" fa fa-angle-down" style="float: right;"></span>
							@if(is_file('public/img/usuarios/' . $usuario->usuario . '.jpg'))
								<img alt="" class="img-circle" src="{{ url('public/img/usuarios/' . $usuario->usuario . '.jpg') }}">
							@else
								<img alt="" class="img-circle" src="{{ url('public/img/usuarios/user.png') }}">
							@endif
							<strong style="float:right">{{ $usuario->nombre }}</strong> &nbsp;&nbsp;
							</a>
							<ul class="dropdown-menu dropdown-usermenu pull-right">
							<li>
								<a href="{{ url(Config::get('admin.prefix').'/perfil') }}">
								<i class="fa fa-user"></i> Mi Perfil
								</a>
							</li>
							<li>
								<a href="{{ url(Config::get('admin.prefix').'/login/salir') }}">
								<i class="fa fa-sign-out"></i> Salir</a></li>
							</ul>

						</li>

						
					</ul>
				</nav>
			</div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
         <div class="right_col" role="main">
          <!-- /top tiles -->
          @yield('content')
          
          </div>
        <!-- /page content -->

        <!-- footer content -->
        @include('admin::partials.dashboard.footer-bar')
        <!-- /footer content -->
      </div>
    </div>

    @include('admin::partials.dashboard.footer')
	
  </body>
</html>
