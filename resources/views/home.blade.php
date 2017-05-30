@extends('layouts.master')

@section('title')
    Plasa news feed !!
@endsection

@section('content')
    @include("layouts.app")
    <div class="news-feed" >
      <div id="page-contents">
  	    <div class="container-fluid">
      		<div class="row" data-sticky_parent>
                  <div class="col-md-3 static">
                      @include('layouts.left-sidebar')
                  </div>
      			<div class="col-md-6">
                    @include('plan.create-plan')
              <!-- Post Content
              ================================================= -->
                    <div id="content">
                        @include('plan.plan-ajax')
                    </div>
                    <div id="loadding" class="hidden" style="color:#337ab7; font-size: 20px; font-weight: bold; text-align: center">
                      LOADDING ...
                    </div>
      	        </div>
            <!-- Newsfeed Common Side Bar Right
            ================================================= -->
            <div class="col-md-3 static" data-sticky_column>
                @include('layouts.right-sidebar')
            </div>
      	    </div>
          </div>
        </div>
    </div>
    @include('layouts.footer')
@endsection
