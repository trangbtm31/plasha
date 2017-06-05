
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.datetimepicker.full.min.js"></script>
  <script  src="dist/js/home/ajax.js" ></script>

    <!-- Place Create Box
    ================================================= -->
    	<div class="create-place">
    	<a onclick="remove_place()" class="close"><span class="close-button glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
    	<h2>Place </h2>
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
                            <div class="row">
	                            <div class="col-md-6">
	                            {{ Form::text('place_time_start[]','', array('id' => 'start_time', 'class' => 'form-control stay-time', 'placeholder' => 'Stay from')) }}
	                            </div>

	                            <div class="col-md-6">
	                            {{ Form::text('place_time_end[]','', array('class' => 'form-control stay-time', 'placeholder' => 'To')) }}
	                            </div>
                            </div>
                            {{ Form::number('place_cost[]','', array('class' => 'form-control','placeholder'=>'Cost'))}}
                            <a class="btn btn-primary submit-place"  >Ghim</a>
                            
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
    <script>
        jQuery('.stay-time').datetimepicker();
        jQuery('.time').datetimepicker({
            datepicker:false,
            format:'H:i'
          });
    </script>
