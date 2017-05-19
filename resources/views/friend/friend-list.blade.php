@extends('layouts.master')

@section('title')
    Plasa news feed !!
@endsection

@section('content')
     @include('layouts.app')
    <div class="news-feed" >
      <div id="page-contents">
  	    <div class="container-fluid">
      		<div class="row">
                  <div class="col-md-3 static">
                      @include('layouts.left-sidebar')
                  </div>
      			<div class="col-md-6">
              <!-- Friend List
                 ================================================= -->
                 <div class="friend-list">
                    <div class="row">
                        @foreach($friend_list_info as $friend)
                        <div class="col-md-6 col-sm-6">
                       <div class="friend-card">
                        <img src="images/covers/{{$friend[0]->cover_photo}}" alt="profile-cover" class="img-responsive cover" />
                        <div class="card-info">
                           <img src="images/users/{{$friend[0]->avatar}}" alt="user" class="profile-photo-lg" />
                           <div class="friend-info">
                             <a href="#" class="pull-right text-green">My Friend</a>
                            <h5><a href="timeline.html" class="profile-link">{{$friend[0]->first_name}} {{$friend[0]->last_name}}</a></h5>
                            <p>{{$friend[0]->job}} at {{$friend[0]->company}}</p>
                           </div>
                         </div>
                       </div>
                     </div>
                     @endforeach
                    </div>
                 </div>
                 </div>
            <!-- Newsfeed Common Side Bar Right
            ================================================= -->
            <div class="col-md-3 static">
                @include('layouts.right-sidebar')
            </div>
      	    </div>
          </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
