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
                </div>
            </div>
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