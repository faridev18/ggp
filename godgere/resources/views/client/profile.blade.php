@extends('layouts.app')

@section('title')
    Profile
@endsection 

@section('contenu')

<div >
    
    <div class="carde">
		<div  class="card_gallery">
				<img width="100%" src="{{asset('storage/couverture_image/'.$profil->prof_couv)}}">
        </div>
		<main class="card__user">
			<img src="{{asset('storage/profil_image/'.$profil->prof_image)}}" alt="" class="card__user-image">
			<div class="card__user-info">
				<h2 class="card__user-info__name">{{$profil->username}}</h2>
				
				<p class="card__user-info__desc">{{$profil->prof_info}}</p>
			</div>
			<div class="card__user-actions">
				<a href="{{url('/chat/'.$profil->id)}}"><button class="card__user-actions-follow">Message</button></a>
				<a href="mailto:{{$profil->email}}"><button class="card__user-actions-message">Email</button></a>
			</div>
		</main>
	</div>
    <div class="carde">
        <div class="wrapper">
  
            <div class="containeri">
              <div class="question">
                Mes compétences
              </div>
              <div class="answercont">
                <div class="answer">
                  <h2>{{$profil->prof_comp}}</h2>
                </div>
              </div>
            </div>
            
              <div class="containeri">
              <div class="question">
                Mes statistiques
              </div>
              <div class="answercont">
                <div class="answer">
                    <div class="service-bloc">
                        <h1>statistiques</h1>
                        <hr>
                        <div class="stat-bloc">
                            <div class="stat-col">
                                <h1>Lorem ipsum dolor </h1>
                                <h1>Lorem ipsum dolor </h1>
                                <h1>Lorem ipsum dolor </h1>
                                <h1>Lorem ipsum dolor </h1>
                                <h1>Lorem ipsum dolor </h1>
                            </div>
                            <div class="stat-col droite">
                                <h1>95%</h1>
                                <h1>95%</h1>
                                <h1>95%</h1>
                                <h1>95%</h1>
                                <h1>95%</h1>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            
                <div class="containeri">
              <div class="question">
                Mes services
              </div>
              <div class="answercont">
                <div class="answer1">
                  <section class="skills">
                   
                  <div class="box-container">
                
                    @foreach ($services as $service)
                      <div class="box">
                        <div class="couvert">
                          <img src="{{asset('storage/service_image/'.$service->service_image)}}">
                        </div>
                          
                          <a href="{{url('/service/'.$service->id)}}"><h3>{{$service->service_name}}</h3></a>
                          <div class="profil">
                            <div class="img-prof" style="background-image: url({{asset('storage/profil_image/'.$profil->prof_image)}});
                                                        background-position:center;
                                                        background-repeat: no-repeat;
                                                        background-size: cover;">
                            </div>
                            <div class="nom-prof"><h2><a href="{{url('/profil/'.$service->id_auteur)}}">{{$profil->username}}</a><br><span>{{$service->service_price}}</span></h2></div>
                          </div>
                          <a href="{{url('/service/'.$service->id)}}"><div class="box-com">Commander</div></a>
                      </div>
                      @endforeach 
                      
                  </div>
                  <div class="box-com">Voir tous les services <i class="fa fa-arrow-right ani"></i></div>
                
                </section>
              </div>
              </div>
            </div>
           
            
           
            
          </div>
    </div>

</div>
<script>
    let question = document.querySelectorAll(".question");

    question.forEach(question => {
    question.addEventListener("click", event => {
        const active = document.querySelector(".question.active");
        if(active && active !== question ) {
        active.classList.toggle("active");
        active.nextElementSibling.style.maxHeight = 0;
        }
        question.classList.toggle("active");
        const answer = question.nextElementSibling;
        if(question.classList.contains("active")){
        answer.style.maxHeight = answer.scrollHeight + "px";
        } else {
        answer.style.maxHeight = 0;
        }
    })
    })
</script>


    
@endsection 



