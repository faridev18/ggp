@extends('layouts.app')

@section('title')
    Search
@endsection 

@section('contenu')
<div style="height: 100vh;">

    <form action="{{action('App\Http\Controllers\ClientController@become')}}" method="POST">
            {{csrf_field()}}
      <div class="condi">
        <p>
           Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
       
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <br>
        @if (count($errors) > 0)
                    <div class="alert-danger">
                    
                        @foreach ($errors->all() as $error)
                            <p class="text-center" style="color:white;background-color:rgb(204, 74, 74) ;padding: 10px; margin:10px; text-align:center; ";>{{$error}}</p>
                        @endforeach
                    
                    </div>
        @endif
        
        <div>
          <input id="check" type="checkbox" name="condition_generale" class="check" >
          <label for="check">Accepter les conditions générales d'utilisation </label>
        </div>
        <input class="devenir" type="submit" name="" value="Devenir freelancer">
        
      </div>
    </form>
    <style type="text/css">
        .condi{
          width: 60%;
          text-align: ;
          margin:21px auto;
        }
        .devenir{
          border: none;
          padding: 15px;
          width: 100%;
          background-color: #65acff;
          border-radius: 5px;
          margin: 10px auto;
          color: white;
          font-size: 1.2em;
        }
        @media screen and (max-width: 414px){
          .condi{
            width: 100%;
            margin: 20px auto;
            padding: 15px;
          }
        }
      
      </style>
  </div>



    
@endsection 



