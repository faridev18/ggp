@extends('layouts.app')

@section('title')
    Search
@endsection 

@section('contenu')
    <form class="search" action="{{action('App\Http\Controllers\ServiceController@makesearch')}}">
        {{csrf_field()}}
        <div class="search1">
            <div class="searcha">
                <div>
                    <input name="keyword" type="text" placeholder="Entrez le mot clé recherché">
                </div>
                <div>
                    <select name="cat">
                        <option value="Site Web et Application">Site Web et Application</option>
                        <option value="Design & Graphisme">Design & Graphisme</option>
                        <option value="Redaction">Redaction</option>
                        <option value="Audiovisuel">Audiovisuel</option>
                        <option value="Réseaux sociaux">Réseaux sociaux</option>
                        <option value="Business">Business</option>
                        <option value="Formation & Coaching">Formation & Coaching</option>
                        <option value="Vie quotidienne">Vie quotidienne</option>
                    </select>
                </div>
            </div>
            <div class="searchb">
                <input name="chercher" type="submit" value="Chercher">
            </div>
        </div>
    </form>


  <section class="skills">
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
  <div class="links">
      {{ $services->links() }}
  </div>
  
</section>
<!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->


    
@endsection 



