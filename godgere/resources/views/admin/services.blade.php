@extends('admin_layout.admin')

@section('title')
    Gestion Service
@endsection 

@section('cont')
<div class="corp">
    <div class="container">
        <br>
        <h1>Gestion des services</h1>
        <br>
        <div class="table-responsive">
            @if (Session::has('status'))
                <div class="alert alert-success">
                {{Session::get('status')}}
                </div>
            @endif
        <table class="table">
          <thead>
            <tr>
              <th>image</th>
              <th>Titre du service</th>
              <th>Validation</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($services as $service)
                <tr>
                <td><img src="storage/service_image/{{$service->service_image}}" style="width: 100px" alt="User Image"></td>
                <td>{{$service->service_name}}</td>
                <td>
                  @if ($service->comfirm == 2)
                  <i style="font-size: 2em; color:green" class="fa-solid fa-circle-check"></i>
                  @endif
                  @if ($service->comfirm == 1)
                  <i style="font-size: 2em; color:rgb(231, 227, 8)" class="fa-solid fa-circle-exclamation"></i>
                  @endif
                  
                </td>
                <td>
                    <a href="{{url('/service/'.$service->id_s)}}" class="btn btn-primary"><i class="nav-icon fas fa-eye"></i></a>
                    <a href="{{url('/editservice/'.$service->id_s)}}" class="btn btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                    <a href="{{url('/deleteservice/'.$service->id_s)}}" onclick="return confirm('Voulez vous vraiment suprimer ce service?');" class="btn btn-danger" ><i class="nav-icon fas fa-trash"></i></a>
                </td>
                </tr>
              @endforeach
          </tbody>
        </table>
    </div>
      </div>
</div>
@endsection
