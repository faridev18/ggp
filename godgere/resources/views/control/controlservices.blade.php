@extends('control_layout.app')

@section('title')
    Acceuil
@endsection 

@section('contenu')
        
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tous les services</h1>
            
            @if (Session::has('status'))
                <div class="alert alert-success">
                {{Session::get('status')}}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Prix</th>
                                <th>Dernière mise à jour</th>
                                <th>Validation</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Titre</th>
                                <th>Catégorie</th>
                                <th>Prix</th>
                                <th>Dernière mise à jour</th>
                                <th>Validation</th>
                                <th>action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($services as $service)
                            <tr>
                                <td><img width="100px" src="{{asset('storage/service_image/'.$service->service_image)}}" alt=""></td>
                                <td>{{$service->service_name}}</td>
                                <td>{{$service->categorie}}</td>
                                <td>{{$service->service_price}} FCFA</td>
                                <td>{{$service->updated_at}}</td>
                                <td>

                                    @if ($service->comfirm == 1)
                                    <a href="{{url('/confirmservice/'.$service->id_s)}}"  onclick="return confirm('Voulez vous vraiment valider ce service?')"; class="btn btn-success">Valider <i class="nav-icon fas fa-trash"></i></a>
                                        
                                    @endif
                                    @if ($service->comfirm == 2)
                                    <a href="{{url('/removeservice/'.$service->id_s)}}"  onclick="return confirm('Voulez vous vraiment retirer ce service?')"; class="btn btn-warning">Masquer <i class="nav-icon fas fa-trash"></i></a>
                                        
                                    @endif

                                </td>
                                <td>
                                    <a style="margin-bottom: 10px" href="{{url('/service/'.$service->id_s)}}"  class="btn btn-primary">Voir <i class="nav-icon fas fa-eye"></i></a>
                                    <a style="margin-bottom: 10px" href="{{url('/deleteservice/'.$service->id_s)}}"  onclick="return confirm('Voulez vous vraiment suprimer ce service?')"; class="btn btn-danger">Supprimer <i class="nav-icon fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    
</div>

 
@endsection 