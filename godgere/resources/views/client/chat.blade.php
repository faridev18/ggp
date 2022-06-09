<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>God Gere Project - Chat</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>

<link href='https://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="{{asset('client/style.css')}}">
<link rel="stylesheet" href="{{asset('client/chat.css')}}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    @include('layouts.nav')
  
  <main class="cd-main-content">
  <div class="chat-cont">
  	<section class="msger">
 

  <main class="msger-chat">
      @foreach ($messages as $message)

      
      <div class="msg {{$message->id_auth == Session::get('client.id') ?'right-msg':'left-msg'}}">
        <div
         class="msg-img"
         style="background-image: url({{asset('storage/profil_image/'.$message->prof_image)}})"
        ></div>
  
        <div class="msg-bubble">
          <div class="msg-info">
            <div class="msg-info-name">{{$message->username}}</div>
            <div class="msg-info-time"></div>
          </div>
  
          <div class="msg-text">
            {{$message->message}}
          </div>
        </div>
      </div>
   
      {{-- <div class="msg left-msg">
        <div
         class="msg-img"
         style="background-image: url({{asset('storage/profil_image/'.$message->prof_image)}})"
        ></div>
  
        <div class="msg-bubble">
          <div class="msg-info">
            <div class="msg-info-name">{{$message->username}}</div>
            <div class="msg-info-time">{{$message->created_at}}</div>
          </div>
  
          <div class="msg-text">
            {{$message->message}}
          </div>
        </div>
      </div> --}}

      
      
  

          
      @endforeach

  </main>

  <form class="msger-inputarea" action="{{action('App\Http\Controllers\ClientController@sendchat')}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="id_dest" value="{{request('id')}}">
    <textarea name="message" class="msger-input" placeholder="Enter your message..."></textarea>
    <button type="submit" class="msger-send-btn">Send</button>
  </form>
</section>
  	
  </div>



</main>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'>
</script><script  src="{{asset('js/script.js')}}"></script>

</body>
</html>
