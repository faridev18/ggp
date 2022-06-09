<header>
    <div class="cd-logo"><a href="{{URL::to('/')}}"><img width="100px" src="{{asset('images/lorem.png')}}" alt="Logo"></a></div>
    <nav class="cd-main-nav-wrapper">
      <ul class="cd-main-nav">
        <li><a href="{{URL::to('/')}}">Acceuil</a></li>
        @if (Session::has('client'))
          @if (Session::get('client.type_compte')==2)
          <li><a href="{{URL::to('/dashboard')}}">Service admin</a></li>
          @endif
          @if (Session::get('client.type_compte')==1)
          <li><a href="{{URL::to('/dashboard')}}">Devenir Freelancer</a></li>
          @endif
        @endif
        
        <li><a href="#0">Projets</a></li>
        <li><a href="#0">Blog</a></li>
        <li><a href="{{URL::to('/search')}}">Rechercher</a></li>
        @if (Session::has('client'))
        <li><a href="{{URL::to('/logout')}}">Se deconnecter</a></li>
          @else
          <li><a href="{{URL::to('/login')}}">Se connecter</a></li>
          @endif
        
        <li>
          <a href="#0" class="cd-subnav-trigger"><span>Catégories</span></a>
          <ul>
            <li class="go-back"><a href="#0">Menu</a></li>
            <li><a href="#0">Catégorie 1 <br> Catégorie 1</a></li>
            <li><a href="#0">Catégorie 2</a></li>
            <li><a href="#0">Catégorie 3</a></li>
            <li><a href="#0">Catégorie 4</a></li>
            <li><a href="#0">Catégorie <br> 5 Catégorie 1</a></li>
            <li><a href="#0">Catégorie 5</a></li>
            <li><a href="#0">Catégorie 5</a></li>
            <li><a href="#0" class="placeholder">Placeholder</a></li>
          </ul>
        </li>
      </ul> <!-- .cd-main-nav -->
    </nav> <!-- .cd-main-nav-wrapper -->
    
    <a href="#0" class="cd-nav-trigger">Menu<span></span></a>
  </header>