{{ Form::text( 'number_place', count($places), array('class' => 'hidden') ) }}
@if (!empty($places))
    Expected cost: {{ Form::text( 'max_cost', $max_cost, ['class' => 'fake-input', 'readonly' => ''] ) }}
    @for( $i = 0; $i < count($places); $i++ )
        <div class="post-content">
            {{ Form::text( 'place_id[]', $places[$i]['id'], array('class' => 'hidden') ) }}
            Name: {{ $places[$i]['name'] }} <br/>
            Address: {{ $places[$i]['address'] }} <br/>
            Cost: {{ $places[$i]['cost'] }} <br/>
            Star: {{ $places[$i]['star'] }} <br/>
            Category: {{ $places[$i]['category_id'] }} <br/>
            Open: {{ $places[$i]['time_open'] }} - {{ $places[$i]['time_close'] }} <br/>
            Come on: {{ Form::text('come_on[]', $places[$i]['come_on'], ['class' => 'fake-input', 'readonly' => '']) }} <br/>
            Leave at: {{ Form::text('leave_at[]', $places[$i]['leave_at'], ['class' => 'fake-input', 'readonly' => '']) }} <br/>
        </div>
    @endfor
@else
    Sorry... We can't find any place suit with you.
@endif