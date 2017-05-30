<!-- Place Create Box
    ================================================= -->
    {{ Form::open(array('route'=>'handle-create-place', 'method' => 'post', 'files' => true)) }}
    	<div class="create-place">
    	<h2>Place </h2>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="form-group">
                        <div class="row">
            				{{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Name', 'maxlength' => '50')) }}
                            {{ Form::text('address', '', array('class' => 'form-control col-md-12', 'placeholder' => 'Address', 'cols' => '50', 'rows' => '1' )) }}

                            {{ Form::file('thumbnail[]',array('class' => 'ion-images', 'accept' => 'image/*', 'multiple' =>'')) }}
                            <div class="row">
	                            <div class="col-md-4">
	                            {{ Form::number('time_open','', array('class' => 'form-control', 'placeholder' => 'Open time')) }}
	                            </div>
	                            <div class="col-md-4">
	                            {{ Form::number('time_close','', array('class' => 'form-control', 'placeholder' => 'Close time')) }}
	                            </div>

	                            <div class="col-md-4">
	                            {{ Form::number('time_stay','', array('class' => 'form-control', 'placeholder' => 'Stay time')) }}
	                            </div>
                            </div>
                            {{ Form::number('cost','', array('class' => 'form-control','placeholder'=>
                            'Cost'))}}
                            
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
    {{ Form::close() }}