@extends('layouts.app')

@section('title')
    Home
@endsection 

@section('contenu')
  <section class="heading_cards">
    <div class="heading_cards_1">
      <ol class="ol-cards">
        <li style="--accent-color: #EE5830">
            <div class="icon"><i class="fa-solid fa-store"></i></div>
            <div class="title">Lorem Ipsum</div>
            <div class="descr">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam voluptatum doloribus ea harum numquam iste non pariatur placeat cum maiores!</div>
        </li>
        <li style="--accent-color: #FAAF47">
            <div class="icon"><i class="fa-solid fa-comments"></i></div>
            <div class="title">Lorem Ipsum</div>
            <div class="descr">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam voluptatum doloribus ea harum numquam iste non pariatur placeat cum maiores!</div>
        </li>
        <li style="--accent-color: #4CBEB8">
            <div class="icon"><i class="fa-solid fa-credit-card"></i></div>
            <div class="title">Lorem Ipsum</div>
            <div class="descr">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam voluptatum doloribus ea harum numquam iste non pariatur placeat cum maiores!</div>
        </li>
    </ol>
    </div>
    <div class="heading_cards_2">
      <h1>Lorem ipsum dolor sit amet</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      <img width="70%" src="images/lorem.jpg">
    </div>
  </section>


  <section class="skills">
    <a href="{{URL::to('/devenir-freelancer')}}"><div class="box-com">Devenir freelancer <i class="fa fa-arrow-right ani"></i></div></a>

  <h1 class="heading">Microservices à la une </h1>

  <div class="box-container">

    @foreach ($services as $service)
    
      <div class="box">
        <div class="couvert">
          <img src="storage/service_image/{{$service->service_image}}">
        </div>
          <a href="{{url('/service/'.$service->id)}}"><h3>{{$service->service_name}}</h3></a>
          <div class="profil">
            <div class="img-prof" style="background-image: url(storage/profil_image/{{$service->prof_image}});
                                        background-position:center;
                                        background-repeat: no-repeat;
                                        background-size: cover;">
            </div>
            <div class="nom-prof"><h2><a href="{{url('/profil/'.$service->id_auteur)}}">{{$service->username}}</a><br><span>{{$service->service_price}}</span></h2></div>
          </div>
          <a href="{{url('/service/'.$service->id_s)}}"><div class="box-com">Commander</div></a>
      </div>
      @endforeach 
      
  </div>
  <a href="{{URL::to('/search')}}"><div class="box-com">Voir tous les services <i class="fa fa-arrow-right ani"></i></div></a>


</section>
<!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->
<section>
<h1 class="heading">Les projets</h1>
<div class="box-com">Soumettre un projet<i class="fa fa-arrow-right ani"></i></div>
<div class="main">
<ul class="cardsa">
  <li class="cards_item">
    <div class="card">
      <div class="card_image"><img src="https://picsum.photos/500/300/?image=10"></div>
      <div class="card_content">
        <h2 class="card_title">Card Grid Layout</h2>
        <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
        <button class="btn card_btn">En savoir plus</button>
      </div>
    </div>
  </li>
  <li class="cards_item">
    <div class="card">
      <div class="card_image"><img src="https://picsum.photos/500/300/?image=5"></div>
      <div class="card_content">
        <h2 class="card_title">Card Grid Layout</h2>
        <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
        <button class="btn card_btn">En savoir plus</button>
      </div>
    </div>
  </li>
  <li class="cards_item">
    <div class="card">
      <div class="card_image"><img src="https://picsum.photos/500/300/?image=11"></div>
      <div class="card_content">
        <h2 class="card_title">Card Grid Layout</h2>
        <p class="card_text">Demo of pixel perfect pure CSS simple responsive card grid layout</p>
        <button class="btn card_btn">En savoir plus</button>
      </div>
    </div>
  </li>
</ul>
</div>
<div class="box-com">Voir tous les projets<i class="fa fa-arrow-right ani"></i></div>
</section>


    
@endsection 



