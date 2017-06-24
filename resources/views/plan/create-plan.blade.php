@section('scripts')
  <script language="javascript" src="dist/js/home/plan.js" ></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
@endsection
<h2>Create Plan</h2>
  <ul class="nav nav-tabs">
    <li><a data-toggle="tab" href="#auto-plan">Auto Create Plan</a></li>
    <li><a data-toggle="tab" href="#handle-plan">Create Your Plan</a></li>
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
                        <div>
                            {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Enter name of plan', 'maxlength' => '50')) }}
                            {{ Form::textarea('description', '', array('class' => 'form-control', 'id' => 'upload-plan', 'placeholder' => 'Plan Description', 'cols' => '50', 'rows' => '1' )) }}
{{--                            {{ Form::file('thumbnail[]',array('class' => 'ion-images', 'accept' => 'image/*', 'multiple' =>'')) }}--}}
                            <div id='create-place'></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <button type="button" class="btn btn-primary" onclick="add_place()">Add Place</button>
                                </div>
                                <div class="tools col-md-6 col-sm-6">
                                    {{ Form::submit('Publish', array('class' => 'btn btn-primary pull-right')) }}
                                </div>
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
        </div><!-- Post Create Box End-->
        {{ Form::close() }}
    </div>
   </div>



