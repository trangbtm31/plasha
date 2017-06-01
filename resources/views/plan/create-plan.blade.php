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
     {{ Form::open(array('route'=>'create-plan', 'method' => 'post', 'files' => true)) }}
     {{ csrf_field() }}
     <div class="create-post">
         {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Enter name of plan', 'maxlength' => '50')) }}
         <div class="row">
             <div class="col-md-10 col-sm-10">
                 <div class="form-group">
                     <img src="images/users/{{ isset($current_user[0]->avatar)? $current_user[0]->avatar : 'users_default.png' }}" alt="" class="profile-photo-md" />
                     <div>
                         {{ Form::textarea('description', '', array('class' => 'form-control', 'id' => 'upload-plan', 'placeholder' => 'Write your plan', 'cols' => '50', 'rows' => '1' )) }}
                         {{ Form::file('thumbnail[]',array('class' => 'ion-images', 'accept' => 'image/*', 'multiple' =>'')) }}
                         {{ Form::select('category', $category, null,['class' => 'form-category']) }}
                         {{ Form::number('price', '', array('id' => 'total_cost', 'class' => 'form-control', 'placeholder' => 'Enter total cost for this plan', 'maxlength' => '10')) }}
                         {{ Form::radio('find_place', 'random', false, ['class' => '']) }} Random <br/>
                         {{ Form::radio('find_place', 'save-money', true, ['class' => '']) }} Save Money <br/>
                         {{ Form::radio('find_place', 'many-place', false, ['class' => '']) }} Many Place <br/>
                         {{ Form::radio('find_place', 'luxury-place', false, ['class' => '']) }} Luxury Place <br/>
                         {{ Form::label('max-place', 'Max Place', ['class' => 'max-place']) }}
                         {{ Form::select('max_place', [
                             '1' => 'One',
                             '2' => 'Two',
                             '3' => 'Three',
                             '4' => 'Four'
                         ], null, ['class' => 'max-place', 'id' => 'max-place']) }}
                         <input id="datetimepicker" type="text" >
                         <script>
                             jQuery('#datetimepicker').datetimepicker();
                         </script>
                         <button type="button" class="btn btn-primary" onclick="auto_place()">Suggest</button>
                         <div id="recommend-place"></div>
                     </div>
                     <div class="col-md-2 col-sm-2">
                         <div class="tools">
                             {{ Form::submit('Publish', array('class' => 'btn btn-primary pull-right')) }}
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
    </div>
    <div id="handle-plan" class="tab-pane">
      <!-- Post Create Box
        ================================================= -->
        {{ Form::open(array('route'=>'handle-create-plan', 'method' => 'post', 'files' => true)) }}
        {{ csrf_field() }}
        <div class="create-post">
            {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Enter name of plan', 'maxlength' => '50')) }}
            <div class="row">
                <div class="col-md-10 col-sm-10">
                    <div class="form-group">
                        <img src="images/users/{{ isset($current_user[0]->avatar)? $current_user[0]->avatar : 'users_default.png' }}" alt="" class="profile-photo-md" />
                        <div>
                            {{ Form::textarea('description', '', array('class' => 'form-control', 'id' => 'upload-plan', 'placeholder' => 'Plan Description', 'cols' => '50', 'rows' => '1' )) }}
                            {{ Form::file('thumbnail[]',array('class' => 'ion-images', 'accept' => 'image/*', 'multiple' =>'')) }}
                            {{ Form::select('category', $category, null,['class' => 'form-category']) }}
                            <div id='create-place'></div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <button type="button" class="btn btn-primary" onclick="create_place()">Add Place</button>
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



