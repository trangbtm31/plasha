<?php
//echo "<pre>";
//print_r($data);
//echo "</pre>";
?>
@foreach( $data as $place )
    <div class="post-content">
        Name: {{ $place['name'] }} <br/>
        Address: {{ $place['address'] }} <br/>
        Cost: {{ $place['cost'] }} <br/>
        Star: {{ $place['star'] }} <br/>
        Open: {{ $place['time_open'] }} - {{ $place['time_close'] }} <br/>
        Time Stay: {{ $place['time_stay'] }} <br/>
        Come on: {{ $place['come_on'] }} <br/>
        Leave at: {{ $place['leave_at'] }} <br/>
    </div>
@endforeach
