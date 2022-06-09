<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Connexion / Inscription</title>
    <link rel="stylesheet" href="admin/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="client/login.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
	<div class="form-wrap">
		<div class="tabs">
			<h3 class="signup-tab"><a  href="{{URL::to('/register')}}">Sign Up</a></h3>
			<h3 class="login-tab"><a class="active" href="{{URL::to('/login')}}">Login</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
			

			<div id="login-tab-content" class="active">
				@if (count($errors) > 0)
					<div class="alert-danger">
					
						@foreach ($errors->all() as $error)
							<p class="text-center" style="padding: 0; margin:0;">{{$error}}</p>
						@endforeach
					
					</div>
				@endif
				<form class="login-form" action="{{action('App\Http\Controllers\ClientController@loginaction')}}" method="post">
					{{csrf_field()}}
                    @if (Session::has('status'))
                        <div class="alert alert-danger">
                        {{Session::get('status')}}
                        </div>
                    @endif
					<input type="text" name="email" class="input" id="user_login" autocomplete="off" placeholder="Email">
					<input type="password" name="password" class="input" id="user_pass" autocomplete="off" placeholder="Mot de passe">
					<input type="submit" class="button" value="Se connecter">
				</form><!--.login-form-->
				<div class="help-text">
					<p><a href="#">Forget your password?</a></p>
				</div><!--.help-text-->
			</div><!--.login-tab-content-->
		</div><!--.tabs-content-->
	</div><!--.form-wrap-->

	{{-- <script type="text/javascript">
		jQuery(document).ready(function($) {
				tab = $('.tabs h3 a');

				tab.on('click', function(event) {
					event.preventDefault();
					tab.removeClass('active');
					$(this).addClass('active');

					tab_content = $(this).attr('href');
					$('div[id$="tab-content"]').removeClass('active');
					$(tab_content).addClass('active');
				});
			});
	</script> --}}


</body>
</html>


