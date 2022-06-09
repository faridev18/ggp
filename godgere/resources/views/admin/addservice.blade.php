@extends('admin_layout.admin')
@section('title')
    Ajouter Service
@endsection 

@section('cont')
<div class="container corp">
    <br>
    <h1>Ajouter un service</h1>
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
    <form action="{{action('App\Http\Controllers\ServiceController@saveservice')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label>Titre du service</label>
            <input type="text" name="service_name" placeholder="Je ..." class="form-control" value="{{old('service_name')}}">
            
        </div>

        <div class="form-group">
            <label for="categorie" class="form-label">Categorie</label>
            <select id="categorie" name="categorie" class="form-control">
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
        <div class="form-group">
            <label>Description du service</label>
            <textarea name="service_description" class="form-control" placeholder="Décrivez votre service" value="">{{old('service_description')}}</textarea>
        </div>
        <div class="form-group">
            <label>Prix de base</label>
            <input type="number" name="service_price" placeholder="Prix de base" class="form-control" value="{{old('service_price')}}">
        </div>
        
        {{-- basic --}}
        <hr>
        <h2>Pack basic</h2>
        <div class="form-group">
            <label>Option suplémentaire</label>
            <textarea name="basic_description" class="form-control" value="{{old('basic_description')}}"></textarea>
            @if ($errors->has('service_price'))
            <h6 class="text-center alert-danger">Veillez décrire votre service</h6>
            @endif
        </div>
        <div class="form-group">
            <label>Prix du pack</label>
            <input type="number" name="basic_price" placeholder="Correspond au prix de base" class="form-control" value="{{old('basic_price')}}">
        </div>
        <div class="form-group">
            <label>Nombre de jour de livraison</label>
            <input type="number" name="basic_day" placeholder="" class="form-control" value="{{old('basic_day')}}">
        </div>
        {{-- Standard --}}
        <hr>
        <h2>Pack standard</h2>
        <div class="form-group">
            <label>Option suplémentaire</label>
            <textarea name="standard_description" class="form-control" value="">{{old('standard_description')}}</textarea>
        </div>
        <div class="form-group">
            <label>Prix du pack</label>
            <input type="number" name="standard_price" placeholder="Prix du pack standard" class="form-control" value="{{old('standard_price')}}">
        </div>
        <div class="form-group">
            <label>Nombre de jour de livraison</label>
            <input type="number" name="standard_day" placeholder="" class="form-control" value="{{old('standard_day')}}">
        </div>
        {{-- God --}}
        <hr>
        <h2>Pack God</h2>
        <div class="form-group">
            <label>Option suplémentaire</label>
            <textarea name="god_description" class="form-control" value="">{{old('god_description')}}</textarea>
        </div>
        <div class="form-group">
            <label>Prix du pack</label>
            <input type="number" name="god_price" placeholder="Prix du pack god" class="form-control" value="{{old('god_price')}}">
        </div>
        <div class="form-group">
            <label>Nombre de jour de livraison</label>
            <input type="number" name="god_day" placeholder="" class="form-control" value="{{old('god_day')}}">
        </div>
        <hr>
        <div class="form-group">
            <label>Image de couverture du service</label>
            <input type="file" name="service_image" class="form-control">
        </div>
        
        <input type="submit" value="Valider" class="btn btn-primary">
      </form>
      

</div>
@endsection