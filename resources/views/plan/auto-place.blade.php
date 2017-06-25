{{ Form::text( 'number_place', count($places), array('class' => 'hidden') ) }}
@if (!empty($places))
    Expected cost: {{ Form::text( 'max_cost', $max_cost, ['class' => 'fake-input expected-cost', 'readonly' => '','size' => '5'] ) }}
    <div class="plan-place">
    @for( $i = 0; $i < count($places); $i++ )
        <div class="place-content row">
            <div class="col-md-4 place-img" id="place-img-{{$places[$i]['id']}}">
                <img src="/images/places/{{ !empty($places[$i]['place_thumbnail'])? $places[$i]['place_thumbnail'][0]['thumbnail'] : 'default.jpg'}}"  width="100px" height="100px" style="border-radius: 50%; border: 5px solid #FFF; position:relative;">
            </div>

            <div class="col-md-8 place-info" id="place-info-{{$places[$i]['id']}}">
                {{ Form::text( 'place_id[]', $places[$i]['id'], array('class' => 'hidden') ) }}
                {{ Form::text('come_on[]', $places[$i]['come_on'], ['class' => 'fake-input place-stay-time', 'readonly' => '']) }}<br>
                <em>to</em><br>
                {{ Form::text('leave_at[]', $places[$i]['leave_at'], ['class' => 'fake-input place-stay-time', 'readonly' => '']) }}<br>
            </div>
            <div class="col-md-11 col-md-offset-1">
                <span class="place-name"><strong>{{ $places[$i]['name'] }}</strong></span><br>
                <ul class="place-rating">
                    @for( $j = 0; $j < (int)$places[$i]['star'] ; $j++)
                    <li><img src="/images/star-icon.png"></li>
                    @endfor
                </ul>
                <span class="place-address">{{ $places[$i]['address'] }}</span><br>
                <span class="place-category">Category: {{ $places[$i]['category_id'] }}</span><br>
                <span class="place-open-time col-md-6">Open at: {{ date('H:i', strtotime($places[$i]['time_open'])) }}</span><br>
                <span class="place-close-time col-md-6">Close at: {{ date('H:i', strtotime($places[$i]['time_close'])) }}</span><br>
                <span class="place-cost">Expected cost: {{ $places[$i]['cost'] }} VND</span>
            </div>
            {{--{{ Form::text( 'place_id[]', $places[$i]['id'], array('class' => 'hidden') ) }}
            Name: {{ $places[$i]['name'] }} <br/>
            Address: {{ $places[$i]['address'] }} <br/>
            Cost: {{ $places[$i]['cost'] }} <br/>
            Star: {{ $places[$i]['star'] }} <br/>
            Category: {{ $places[$i]['category_id'] }} <br/>
            Open: {{ $places[$i]['time_open'] }} - {{ $places[$i]['time_close'] }} <br/>
            Come on: {{ Form::text('come_on[]', $places[$i]['come_on'], ['class' => 'fake-input', 'readonly' => '']) }} <br/>
            Leave at: {{ Form::text('leave_at[]', $places[$i]['leave_at'], ['class' => 'fake-input', 'readonly' => '']) }} <br/>--}}
        </div>
    @endfor
    </div>
@else
    Sorry... We can't find any place suit with you.
@endif