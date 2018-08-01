@extends('admin::layouts.dashboard')

@section('content')
<div class="container-fluid" id="content_games">
	<div class="row">
		<div class="col-lg-3 text-left">
			<img width="80%" src="{{ url('public/img/logos/logo_onixgames.png') }} " alt="Logo OnixGames">
		</div>
		<div class="col-lg-6 text-center">
			<h3> ADMINISTRADOR </h3>
		</div>
		<div class="col-lg-3 text-right"> <h3> {{ date("d/m/Y") }} </h3>  </div>
	</div>

	@yield('content_games')
</div>

<style type="text/css">
	body .container.body{background: #000;}
	
	.nav_menu, body .container.body .right_col, footer, .toggle a{background: #000;color: #FFF;}
	#content_games{
		background: #000;
		color: #FFF;
	}
</style>
@endsection