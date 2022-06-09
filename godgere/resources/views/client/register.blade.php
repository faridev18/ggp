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
			<h3 class="signup-tab"><a class="active" href="{{URL::to('/register')}}">Sign Up</a></h3>
			<h3 class="login-tab"><a href="{{URL::to('/login')}}">Login</a></h3>
		</div><!--.tabs-->

		<div class="tabs-content">
			<div id="signup-tab-content" class="active">
                @if (count($errors) > 0)
                    <div class="alert-danger">
                    
                        @foreach ($errors->all() as $error)
                            <p class="text-center" style="padding: 0; margin:0;">{{$error}}</p>
                        @endforeach
                    
                    </div>
                @endif
                @if (Session::has('status'))
                    <div class="alert alert-success">
                    {{Session::get('status')}}
                    </div>
                @endif
				<form class="signup-form" action="{{action('App\Http\Controllers\ClientController@saveclient')}}" method="post">
                    {{csrf_field()}}
					<input type="text" name="username" class="input" id="user_name" autocomplete="off" placeholder="Nom d'utilisateur" value="{{old('username')}}">
					<input type="email" name="email" class="input" id="user_email" autocomplete="off" placeholder="Email" value="{{old('email')}}">
					<!-- <label for="select">Type de compte</label> -->
					<select id="select" class="input" name="type_compte">
						<option value="1">je souhaite acheter des services</option>
						<option value="2" selected>je souhaite vendre des services</option>
					</select>
					<input type="password" name="password" class="input" id="user_pass" autocomplete="off" placeholder="Mot de passe">
					<input type="password" name="password2" class="input" id="user_pass" autocomplete="off" placeholder="Confirmer mot de passe">
					<input type="checkbox" class="checkbox" id="approuve" name="condition">
					<label class="approuve" for="approuve">Accepter <a href="">Conditions d'utilisation</a> et <a href="">politique de confidentialité</a></label>
					<input type="submit" class="button" value="Valider mon inscription">
				</form><!--.login-form-->
				
			</div><!--.signup-tab-content-->

			
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


