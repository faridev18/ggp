@extends('control_layout.app')

@section('title')
    Acceuil
@endsection 

@section('contenu')
        
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><span >Nombre d'utilisateur</span>
                                     <br><span style="font-size: 1.5rem;">{{$nu}}</span></div>
                                   
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                               
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><span >Nombre de services</span>
                                     <br><span style="font-size: 1.5rem;">{{$ns}}</span></div>
                                   
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><span >Nombre d'avis</span>
                                     <br><span style="font-size: 1.5rem;">{{$nr}}</span></div>
                                   
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body"><span >Nombre de....</span>
                                     <br><span style="font-size: 1.5rem;">???</span></div>
                                   
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> --}}
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
                                            <th>Profil</th>
                                            <th>Nom d'utilsateur</th>
                                            <th>email</th>
                                            <th>Type de compte</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Profil</th>
                                            <th>Nom d'utilsateur</th>
                                            <th>email</th>
                                            <th>Type de compte</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td><div style="width: 50px;
                                                height: 50px;
                                                border-radius: 50%;
                                                background-image: url({{asset('storage/profil_image/'.$user->prof_image)}});
                                                  background-position:center;
                                                  background-repeat: no-repeat;
                                                  background-size: cover;" ></div></td>
                                            <td>{{$user->username}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>
                                                @if ($user->type_compte == 1)
                                                {{'Client'}}
                                                @endif
                                                @if ($user->type_compte == 2)
                                                {{'Freelancer'}}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('/deleteuser/'.$user->id)}}"  onclick="return confirm('Voulez vous vraiment suprimer ce service?')"; class="btn btn-danger">Bannir <i class="nav-icon fas fa-trash"></i></a>
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
        </div>
 
        @endsection 