@if (!empty($data))
    Expected cost: {{ $max_cost }}
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
@else
    Sorry... We can't find any place suit with you.
@endif