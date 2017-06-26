@extends('layouts.master')

@section('title')
    Place list
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
      			<div class="col-md-9 friend-list">
              <!-- Friend List
                 ================================================= -->
                  @foreach($place_list as $place)
                        <div class = "friend-request-item col-sm-6 col-md-6 col-lg-6 plan-place" >
                            <div class="friend-card">
                                <img style="width: 100%; height: 100%" src="images/places/{{ $place['thumbnail']? $place['thumbnail']: 'default.jpg' }}" alt="profile-cover" class="img-responsive cover">
                                <div class="card-info">
                                    <div class="place-content" style="background: none; height: 100%;">
                                        <span class="place-name"><strong>{{ $place['name'] }}</strong></span><br>
                                        <ul class="place-rating">
                                            @for( $j = 0; $j < (int)$place['star'] ; $j++)
                                            <li><img src="/images/star-icon.png"></li>
                                            @endfor
                                        </ul>
                                        <span class="place-address">{{ $place['address'] }}</span><br>
                                        <span class="place-category">Category: {{ $place['category_id'] }}</span><br>
                                        <span class="place-open-time">Open at: {{ date('H:i', strtotime($place['time_open'])) }}</span><br>
                                        <span class="place-close-time">Close at: {{ date('H:i', strtotime($place['time_close'])) }}</span><br>
                                        <span class="place-cost">Expected cost: {{ $place['cost'] }} VND</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endforeach
                 </div>
            <!-- Newsfeed Common Side Bar Right
            ================================================= -->
      	    </div>
          </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
