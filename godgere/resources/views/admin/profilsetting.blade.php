@extends('admin_layout.admin')

@section('title')
    Parametre profil
@endsection 

@section('cont')
<div class="container corp">
  <br>
  <h1>Paramètre profil</h1>
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
  <form action="{{action('App\Http\Controllers\ClientController@updateprofil')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$client->id}}">
      <div class="form-group">
          <label>Nom d'utilisateur</label>
          <input type="text" name="user_name" placeholder="" class="form-control" value="{{$client->username}}">
      </div>
      <div class="form-group">
          <label>Biographie</label>
          <textarea name="biographie" class="form-control" placeholder="" value="">{{$client->prof_info}}</textarea>
      </div>
      <div class="form-group">
        <label>Compétence (efficace, rapide, travail bien fait ...)</label>
        <textarea name="competence" class="form-control" placeholder="" value="">{{$client->prof_comp}}</textarea>
    </div>

      <div class="form-group">
          <label>Image de profile</label>
          <input type="file" name="profil_image" class="form-control">
      </div>

      <div class="form-group">
        <label>Image de couverture</label>
        <input type="file" name="couverture_image" class="form-control">
      </div>
      
      <input type="submit" value="Mettre à jour" class="btn btn-primary">
    </form>
    

</div>

@endsection
