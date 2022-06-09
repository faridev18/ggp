@extends('layouts.app')

@section('title')
    Home
@endsection 

@section('contenu')
<section class="service-content">
    <div class="service-des">
        <div class="service-bloc partie1">
            <h1>{{$service->service_name}}</h1>
            <h2>{{$service->categorie}}</h2>
            <p><i class="fa fa-star"></i>{{$moy}} <span>({{$counta}} avis)</span></p>
            <hr>
            
            <img width="100%" src="{{asset('storage/service_image/'.$service->service_image)}}">

        </div>
        <div class="service-bloc partie2">
            <h1>Description du service</h1>
            <hr>
            <div>
                {{$service->service_description}}
            </div>
            
        </div>
        <div class="service-bloc">
            <h1>Payement</h1>
            <hr>
            <div class="cardo">
                <div class="wrapper">
          
                    <div class="containeri">
                      <div class="question ">
                        Pack basic
                      </div>
                      <div class="answercont">
                        <div class="answer">
                            <h2>Description du pack</h2>
                            <hr>
                            {{$service->basic_description}}
                            <hr>
                            <h2>Livraison en <span class="jours">{{$service->basic_day}}</span> jours</h2>
                            <hr>
                            <br>
                           
                            <a href=""><div class="box-comm commander">
                                <div class="tot-prix">{{$service->basic_price}} FCFA</div>
                                <div class="but">Commander</div>
                            </div></a>

                        </div>
                      </div>
                    </div>
                    
                      <div class="containeri">
                      <div class="question">
                        Pack standard
                      </div>
                      <div class="answercont">
                        <div class="answer">
                            <h2>Description du pack</h2>
                            <hr>
                            {{$service->standard_description}}
                            <hr>
                            <h2>Livraison en <span class="jours">{{$service->standard_day}}</span> jours</h2>
                            <hr>
                            <br>
                            <a href="">
                            <div class="box-comm commander">
                                <div class="tot-prix">{{$service->standard_price}} FCFA</div>
                                <div class="but">Commander</div>
                            </div></a>
                            
                        </div>
                      </div>
                    </div> 
                    <div class="containeri">
                        <div class="question">
                            Pack God
                        </div>
                        <div class="answercont">
                          <div class="answer">
                            <h2>Description du pack</h2>
                            <hr>
                            {{$service->god_description}}
                            <hr>
                            <h2>Livraison en <span class="jours">{{$service->god_day}}</span> jours</h2>
                            <hr>
                            <br>
                           
                            <a href=""><div class="box-comm commander">
                                <div class="tot-prix">{{$service->god_price}} FCFA</div>
                                <div class="but">Commander</div>
                            </div></a>
                              
                          </div>
                        </div>
                      </div> 
                    
                  </div>
            </div>
        </div>

        

    </div>
    <div class="service-autre">
        <div class="service-bloc partie3">
            <div class="img0" style="background-image: url({{asset('storage/profil_image/'.$service->prof_image)}});
                      background-position:center;
                      background-repeat: no-repeat;
                      background-size: cover;">
          </div>
            <h1>{{$service->username}}</h1>
            <br>
            <a href="{{url('/chat/'.$service->id_auteur)}}"><div class="box-com">Message <i class="fa fa-envelope"></i></div></a>
            <a href="{{url('/profil/'.$service->id_auteur)}}"><div class="box-com">Voir le profil <i class="fa fa-user"></i></div></a>
        </div>
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
        <div class="service-bloc">
            <h1>Info utile</h1>
        </div>
        <div class="service-bloc">
            <h1>Avis des clients</h1> 
        <hr>
        <div id="myBtn" class="box-com">Donner votre avis</div>
        <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <form action="{{action('App\Http\Controllers\ServiceController@addrating')}}" method="POST">
              {{csrf_field()}}
              <input type="hidden" value="{{$service->id_s}}" name="id_service">
              <div class="but-note">
                <h2>Note</h2>
              </div>
              <div class="rating-css">
                <div class="star-icon">
                    <input type="radio" value="1" name="service_rating" checked id="rating1">
                    <label for="rating1" class="fa fa-star"></label>
                    <input type="radio" value="2" name="service_rating" id="rating2">
                    <label for="rating2" class="fa fa-star"></label>
                    <input type="radio" value="3" name="service_rating" id="rating3">
                    <label for="rating3" class="fa fa-star"></label>
                    <input type="radio" value="4" name="service_rating" id="rating4">
                    <label for="rating4" class="fa fa-star"></label>
                    <input type="radio" value="5" name="service_rating" id="rating5">
                    <label for="rating5" class="fa fa-star"></label>
                </div>
            </div>
            <div class="but-note">
              <label for="avis">Avis</label><br>
              <input class="" type="text" name="commentaire" placeholder="Ajouter un commentaire"><br>

              <button type="submit" class="box-com ">Valider</button>
            </div>
            
            </form>
          </div>
        
        </div>
        <hr>
          <table class="comment">
            @foreach ($comments as $comment)
            <tr>
              <td>
                <div style="width: 50px;
                height: 50px;
                border-radius: 50%;
                background-image: url({{asset('storage/profil_image/'.$comment->prof_image)}});
                  background-position:center;
                  background-repeat: no-repeat;
                  background-size: cover;" ></div>
                  <h2>{{$comment->username}}</h2>
              </td>
              <td>
                <span>{{$comment->comment}}</span><br><br>
                @if ($comment->stars_rated == 1)
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star-g.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star-g.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star-g.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star-g.svg')}}" alt="">
                @endif
                @if ($comment->stars_rated == 2)
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star-g.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star-g.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star-g.svg')}}" alt="">
                @endif
                @if ($comment->stars_rated == 3)
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star-g.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star-g.svg')}}" alt="">
                @endif
                @if ($comment->stars_rated == 4)
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star-g.svg')}}" alt="">
                @endif
                @if ($comment->stars_rated == 5)
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                <img width="25px" src="{{asset('images/star.svg')}}" alt="">
                @endif
                
              </td>
            </tr>
            @endforeach
          </table>
        </div>
        
    </div>
    <section class="skills">
              <h1 class="heading">Microservices du même vendeur</h1>

              <div class="box-container">
                @foreach ($services as $servi)
                <div class="box">
                  <div class="couvert">
                    <img src="{{asset('storage/service_image/'.$servi->service_image)}}">
                  </div>
                    
                    <a href="{{url('/service/'.$servi->id)}}"><h3>{{$servi->service_name}}</h3></a>
                    <div class="profil">
                      <div class="img-prof" style="background-image: url({{asset('storage/profil_image/'.$servi->prof_image)}});
                                                  background-position:center;
                                                  background-repeat: no-repeat;
                                                  background-size: cover;">
                      </div>
                      <div class="nom-prof"><h2><a href="{{url('/profil/'.$servi->id_auteur)}}">{{$servi->username}}</a><br><span>{{$servi->service_price}}</span></h2></div>
                    </div>
                    <a href="{{url('/service/'.$servi->id)}}"><div class="box-com">Commander</div></a>
                </div>
                @endforeach 
                
                  
                  
             </div>
          </section>
</section>

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

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

@endsection