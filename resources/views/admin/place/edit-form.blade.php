<div class="card" style="margin: 0px;">
    <div class="card-content">
        <form id="editPlace" class="form-horizontal" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Place ID: {{ $place['id'] }}</h4>
                <input type="text" name="place_id" class="form-control hidden" value="{{ $place['id'] }}">
            </div>
            <div class="modal-body">
                <div class="row">
                    <label class="col-md-2 label-on-left">Name</label>
                    <div class="col-md-10">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="name" class="form-control" value="{{ $place['name'] }}">
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 label-on-left">Address</label>
                    <div class="col-md-10">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="address" class="form-control" value="{{ $place['address'] }}">
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 label-on-left">Description</label>
                    <div class="col-md-10">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <textarea rows="4" name="description" class="form-control">{{ $place['description'] }}</textarea>
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 label-on-left">Open</label>
                    <div class="col-md-4">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="time_open" class="form-control timepicker" value="{{ $place['time_open'] }}">
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <label class="col-md-2 label-on-left">Close</label>
                    <div class="col-md-4">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="time_close" class="form-control timepicker" value="{{ $place['time_close'] }}">
                            <span class="material-input"></span>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.timepicker').datetimepicker({
                            format: 'HH:mm'
                        });
                    });
                </script>

                <div class="row">
                    <label class="col-md-2 label-on-left">Stay</label>
                    <div class="col-md-4">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="time_stay" class="form-control timepicker" value="{{ $place['time_stay'] }}">
                            <span class="material-input"></span>
                        </div>
                    </div>
                    <label class="col-md-2 label-on-left">Cost</label>
                    <div class="col-md-4">
                        <div class="form-group label-floating is-empty">
                            <label class="control-label"></label>
                            <input type="text" name="cost" class="form-control" value="{{ $place['cost'] }}">
                            <span class="material-input"></span>
                            <script>
                                $(document).ready(function() {
                                    $('.timepicker').datetimepicker({
                                        format: 'LT'
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <label class="col-md-2 label-on-left">Star</label>
                    <div class="col-md-4">
                        <select class="selectpicker" name="star" data-style="select-with-transition" title="Single Select" data-size="7" tabindex="-98"><option class="bs-title-option" value="">Choose star</option>
                            <option disabled="">Choose star</option>
                            @for($i = 1; $i <=5; $i++)
                                @if($i == $place['star'])
                                    <option value="{{ $i }}" selected>{{ $i }}</option>
                                @else
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endif
                            @endfor
                        </select>
                    </div>
                    <label class="col-md-2 label-on-left">Category</label>
                    <div class="col-md-4">
                        <select class="selectpicker" name="category_id" data-style="select-with-transition" title="Single Select" data-size="7" tabindex="-98"><option class="bs-title-option" value="">Choose category</option>
                            <option disabled="">Choose category</option>
                            @foreach($cates as $key => $value)
                                @if($key == $place['category_id'])
                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                @else
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endif
                            @endforeach
                        </select>
                        <script>
                            $('.selectpicker').selectpicker();
                        </script>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-fill btn-rose" onclick="edit_place(this)">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </form>
    </div>
</div>