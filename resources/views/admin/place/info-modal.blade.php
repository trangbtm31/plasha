<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Place's Infomation</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-xs-6">
            <b>ID: {{ $place['id'] }}</b>
        </div>
        <div class="col-xs-6">
            <p>Category: {{ $place['category_id'] }}</p>
        </div>
    </div>
    <b>Name: {{ $place['name'] }}</b>
    <p>Address: {{ $place['address'] }}</p>
    <p>Description: {{ $place['description'] }}</p>
    <div class="row">
        <div class="col-xs-6">
            <p>Open: {{ $place['time_open'] }} - {{ $place['time_close'] }}</p>
        </div>
        <div class="col-xs-6">
            <p>Time Stay: {{ $place['time_stay'] }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <p>Cost: {{ $place['cost'] }}</p>
        </div>
        <div class="col-xs-6">
            <p>Star: {{ $place['star'] }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6">
            <p>Created At: {{ $place['created_at'] }}</p>
        </div>
        <div class="col-xs-6">
            <p>Updated At: {{ $place['updated_at'] }}</p>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>