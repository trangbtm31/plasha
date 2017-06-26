@extends('admin.master')

@section('title')
    Plasa Admin
@endsection

@section('content')
    <div class="main-panel ps-container ps-theme-default ps-active-y" data-ps-id="8fb49fd2-2735-bc0a-5a3b-2e97b9e0447c">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-minimize">
                    <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                        <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                        <i class="material-icons visible-on-sidebar-mini">view_list</i>
                    </button>
                </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="http://demos.creative-tim.com/material-dashboard-pro/examples/tables/extended.html#"> Extended Tables </a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            {{ Form::open(array('route'=>'insert-place', 'method' => 'post', 'files' => true, 'class' => 'form-horizontal', 'onsubmit' => 'return checkInsertPlace()')) }}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="card-header card-header-text" data-background-color="rose">
                                    <h4 class="card-title">New Place</h4>
                                </div>
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-10">
                                            @if(Session::has('message'))
                                                <div class="alert alert-success">{{ Session::get('message') }}</div>
                                            @endif
                                            @foreach($errors->all() as $error)
                                                <div class="alert alert-danger">{{ $error }}</div>
                                            @endforeach
                                        </div>
                                        <div class="col-sm-1"></div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Name</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                {{ Form::text('name', '', array('class' => 'form-control', 'maxlength' => '100')) }}
                                                <span class="help-block">Enter name.</span>
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Address</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                {{ Form::text('address', '', array('class' => 'form-control', 'maxlength' => '100')) }}
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Description</label>
                                        <div class="col-sm-10">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                {{ Form::textarea('description', '', array('class' => 'form-control', 'rows' => '4')) }}
                                                <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Open</label>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                {{ Form::text('time_open', '', array('class' => 'form-control timepicker')) }}
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 label-on-left">Close</label>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                {{ Form::text('time_close', '', array('class' => 'form-control timepicker')) }}
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-2 label-on-left">Time Stay</label>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                {{ Form::text('time_stay', '', array('class' => 'form-control timepicker')) }}
                                                <span class="help-block">How long we should stay at this place?</span>
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                        <label class="col-sm-2 label-on-left">Cost</label>
                                        <div class="col-sm-4">
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label"></label>
                                                {{ Form::text('cost', '', array('class' => 'form-control')) }}
                                                <span class="help-block">Average cost of a person.</span>
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-md-2 label-on-left">Star</label>
                                        <div class="col-md-4">
                                            {{ Form::select('star', [0,1,2,3,4,5], null, [
                                            'class' => 'selectpicker',
                                            'data-style' => 'select-with-transition',
                                            'title' => 'Choose star',
                                            'data-size' => '7',
                                            'tabindex' => '-98',
                                            ]) }}
                                        </div>
                                        <label class="col-md-2 label-on-left">Category</label>
                                        <div class="col-md-4">
                                            {{ Form::select('category_id', $cates, null, [
                                            'class' => 'selectpicker',
                                            'data-style' => 'select-with-transition',
                                            'title' => 'Choose category',
                                            'data-size' => '7',
                                            'tabindex' => '-98',
                                            ]) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-2 label-on-left">Thumbnail</label>
                                    <div class="col-md-4 fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail">
                                            <img src="/images/admin/image_placeholder.jpg" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                        <div>
                                        <span class="btn btn-rose btn-round btn-file">
                                            <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            {{--<input type="hidden" value="" name="...">--}}
                                            {{ Form::file('place_thumbnail[]',array( 'accept' => 'image/*', 'multiple' =>'')) }}
                                            {{--<input type="file" name="">--}}
                                        <div class="ripple-container"></div></span>
                                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-md-4 label-on-left">Location</label>
                                        <div class="col-md-8">
                                            <button type="button" class="btn btn-fill btn-rose" is_busy="false" onclick="getLocation(this)">Get Location</button>
                                        </div>
                                        <label class="col-md-4 label-on-left">Longitude</label>
                                        <div class="col-md-8">
                                            {{ Form::text('lat', '', array('class' => 'form-control')) }}
                                        </div>
                                        <label class="col-md-4 label-on-left">Latitude</label>
                                        <div class="col-md-8">
                                            {{ Form::text('lng', '', array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-fill btn-rose">Add Place</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;"><div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps-scrollbar-y-rail" style="top: 0px; height: 600px; right: 0px;"><div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 184px;"></div></div></div>
@endsection