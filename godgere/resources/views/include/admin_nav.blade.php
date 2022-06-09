<ul class="nava">
  <li class="{{request()->is('dashboard') ?'active':''}}"><a href="{{URL::to('/dashboard')}}"><i class="fa fa-dashboard"></i></a></li>
  <li class="{{request()->is('addservice') ?'active':''}}"><a href="{{URL::to('/addservice')}}"><i class="fa fa-plus"></i></a></li>
  <li class="{{request()->is('services') ?'active':''}}"><a href="{{URL::to('/services')}}"><i class="fa-solid fa-table-list"></i></a></li>
  <li><a href="{{request()->is('profilsetting') ?'active':''}}"><a href="{{URL::to('/profilsetting')}}"><i class="fa fa-user-gear"></i></a></li>
  <li><a href="#"><i class="fa fa-paper-plane"></i></a></li>
  <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
  <li><a href="#"><i class="fa fa-bell"></i></a></li>
  <li><a href="#"><i class="fa fa-calendar"></i></a></li>
  <li><a href="#"><i class="fa fa-cog"></i></a></li>
</ul>