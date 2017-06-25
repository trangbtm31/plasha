@section('scripts')
  <script language="javascript" src="dist/js/home/plan.js" ></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
@endsection
{{--<h2>Create Plan</h2>--}}
  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#auto-plan">Auto Create Plan</a></li>
    <li><a data-toggle="tab" href="#handle-plan">Share Place</a></li>
  </ul>
  <div class="tab-content" id="tabs">
    <div id="auto-plan" class="tab-pane">
     <!-- Post Create Box
     ================================================= -->
     {{ Form::open(array('route'=>'auto-create-plan', 'method' => 'post', 'files' => true)) }}
     {{ csrf_field() }}
     <div class="create-post">
         <div class="row">
             <div class="col-md-10 col-sm-10">
                 <div class="form-group">
                     <img src="images/users/{{ isset($current_user[0]->avatar)? $current_user[0]->avatar : 'users_default.png' }}" alt="" class="profile-photo-md" />
                     <div>
                         {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Enter name of plan', 'maxlength' => '50')) }}
                         {{ Form::textarea('description', '', array('class' => 'form-control', 'id' => 'upload-plan', 'placeholder' => 'Write your plan', 'cols' => '50', 'rows' => '1' )) }}
                         {{--{{ Form::file('thumbnail[]',array('class' => 'ion-images', 'accept' => 'image/*', 'multiple' =>'')) }}--}}
                         {{ Form::number('price', '', array('id' => 'total_cost', 'class' => 'form-control', 'placeholder' => 'Enter total cost for this plan', 'maxlength' => '10')) }}
                         {{ Form::radio('find_place', 'save-money', true, ['class' => '']) }} Save Money <br/>
                         {{ Form::radio('find_place', 'many-place', false, ['class' => '']) }} Many Place <br/>
                         {{ Form::radio('find_place', 'luxury-place', false, ['class' => '']) }} Luxury Place <br/>
                         <div class="row">
                             <div class="col-md-6 col-sm-6">
                                 {{ Form::text('start_time', '', array('class' => 'form-control', 'id' => 'start-time', 'placeholder' => 'Start Time')) }}
                                 <script>
                                     jQuery('#start-time').datetimepicker();
                                 </script>
                             </div>
                             <div class="col-md-6 col-sm-6">
                                 {{ Form::text('end_time', '', array('class' => 'form-control', 'id' => 'end-time', 'placeholder' => 'End Time')) }}
                                 <script>
                                     jQuery('#end-time').datetimepicker();
                                 </script>
                             </div>
                         </div>
                         <button type="button" class="btn btn-primary" onclick="auto_place()">Suggest</button>
                         <div id="recommend-place"></div>
                     </div>
                 </div>
                 <!-- Message for user -->
                 @if(Session::has('message'))
                     <div class="message">{{ Session::get('message') }}</div>
                 @endif
                 @foreach($errors->all() as $error)
                     <div class="error">{{ $error }}</div>
                 @endforeach
             </div><!-- Post Create Box End-->
             <div class="col-md-2 col-sm-2">
                 <div class="tools">
                     {{ Form::submit('Publish', array('class' => 'btn btn-primary pull-right')) }}
                 </div>
             </div>
             {{ Form::close() }}
         </div>
     </div>
    </div>
    <div id="handle-plan" class="tab-pane">
      <!-- Post Create Box
        ================================================= -->
        {{ Form::open(array('route'=>'handle-create-plan', 'method' => 'post', 'files' => true)) }}
        {{ csrf_field() }}
        <div class="create-post">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <img src="images/users/{{ isset($current_user[0]->avatar)? $current_user[0]->avatar : 'users_default.png' }}" alt="" class="profile-photo-md" />
                            {{--{{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Enter name of plan', 'maxlength' => '50')) }}
                            {{ Form::textarea('description', '', array('class' => 'form-control', 'id' => 'upload-plan', 'placeholder' => 'Plan Description', 'cols' => '50', 'rows' => '1' )) }}--}}
                            {{--{{ Form::file('thumbnail[]',array('class' => 'ion-images', 'accept' => 'image/*', 'multiple' =>'')) }}--}}
                            <div class="create-place">
                                {{--<a onclick="remove_place()" class="close"><span class="close-button glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>--}}
                                <h2>Share your Place</h2>
                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1">
                                            <div class="form-group">
                                                <div class="row">
                                                    {{ Form::text('place_name[]', '', array('class' => 'form-control', 'placeholder' => 'Name', 'maxlength' => '50')) }}
                                                    {{ Form::text('place_address[]', '', array('class' => 'form-control col-md-12', 'placeholder' => 'Address', 'cols' => '50', 'rows' => '1' )) }}
                                                    {{ Form::textarea('place_description[]', '', array('class' => 'form-control col-md-12', 'placeholder' => 'Place \'s Description', 'cols' => '50', 'rows' => '3' )) }}
                                                    {{--{{ Form::textarea('place_tips[]', '', array('class' => 'form-control col-md-12', 'placeholder' => 'Tips for this Place', 'cols' => '50', 'rows' => '2' )) }}--}}
                                                    {{ Form::file('place_thumbnail[]',array('class' => 'ion-images', 'accept' => 'image/*', 'multiple' =>'')) }}
                                                    {{ Form::select('place_category[]', $category, null,['class' => 'form-category form-control']) }}
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        {{ Form::text('place_time_open[]','', array('class' => 'form-control time', 'placeholder' => 'Open time')) }}
                                                        </div>
                                                        <div class="col-md-6">
                                                        {{ Form::text('place_time_close[]','', array('class' => 'form-control time', 'placeholder' => 'Close time')) }}
                                                        </div>
                                                        {{--
                                                        <div class="col-md-4 all-day">
                                                        {{ Form::checkbox('open_all_day[]','', array('class' => 'form-control ', 'value' => 'all-day')) }} Open All Day
                                                        </div>--}}
                                                    </div>
                                                    {{--<div class="row">
                                                        <div class="col-md-6">
                                                        {{ Form::text('place_time_start[]','', array('id' => 'start_time', 'class' => 'form-control stay-time', 'placeholder' => 'Stay from')) }}
                                                        </div>

                                                        <div class="col-md-6">
                                                        {{ Form::text('place_time_end[]','', array('class' => 'form-control stay-time', 'placeholder' => 'To')) }}
                                                        </div>
                                                    </div>--}}
                                                    {{ Form::number('place_cost[]','', array('class' => 'form-control','placeholder'=>'Cost'))}}
                                                    <div class="tools">
                                                        {{ Form::submit('Request', array('class' => 'btn btn-primary')) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Message for user -->
                                    @if(Session::has('message'))
                                        <div class="message">{{ Session::get('message') }}</div>
                                    @endif
                                    @foreach($errors->all() as $error)
                                        <div class="error">{{ $error }}</div>
                                    @endforeach
                                </div>
                                {{--<div class="col-md-6 col-sm-6">
                                    <button type="button" class="btn btn-primary" onclick="add_place()">Add Place</button>
                                </div>--}}
                    </div>
                </div>
            </div>
            <!-- Message for user -->
            @if(Session::has('message'))
                <div class="message">{{ Session::get('message') }}</div>
            @endif
            @foreach($errors->all() as $error)
                <div class="error">{{ $error }}</div>
            @endforeach
        </div><!-- Post Create Box End-->
        {{ Form::close() }}
    </div>
   </div>
    <script>
        jQuery('.stay-time').datetimepicker();
        jQuery('.time').datetimepicker({
            datepicker:false,
            format:'H:i'
          });
    </script>



