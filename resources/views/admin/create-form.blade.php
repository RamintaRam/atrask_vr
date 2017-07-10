@extends('admin.core')

@section('content')

    <div id="list">

        <div class="container">
            <div><h2>{{trans('app.' . $tableName)}}</h2></div>

            {!! Form::open(['url' => $route, 'files' => true]) !!}

            @foreach($fields as $field)
                @if(isset ($field['key']))
                    {!! Form::label($field['key'], trans('app.' . $field['key'])) !!}<br>

                    @if($field['type'] == 'dropDown')

                        @if(isset($record[$field['key']]))
                            @if(in_array($field['key'], ['language_code', 'category_id', 'time', 'vr_rooms']))
                                {{Form::select($field['key'], $field['option'], $record[$field['key']] )}}<br><br>
                            @else
                                {{Form::select($field['key'], $field['option'], $record[$field['key']], ['placeholder'=>''])}}
                                <br/><br/>
                            @endif
                        @else
                            @if(in_array($field['key'], ['language_code', 'category_id', 'time', 'vr_rooms']))
                                {{Form::select($field['key'], $field['option'], null )}}<br><br>
                            @else
                                {{Form::select($field['key'], $field['option'], null, ['placeholder'=>''])}}
                                <br/><br/>
                                {{--@if($field['key'] == 'time')--}}



                                {{--@endif--}}
                            @endif


                        @endif

                            @elseif($field['type'] == 'singleLine')
                                @if(isset($record[$field['key']]))
                                    {!! Form::text ($field['key'], $record[$field['key']])!!}<br><br>
                                @else
                                    {!! Form::text ($field['key'])!!}<br><br>
                                @endif

                            @elseif($field['type'] == 'checkBox')
                                @if(isset($record[$field['key']]))
                                    @foreach($field['option'] as $option)
                                        {{Form::checkbox($option['name'],$option['value'], $record[$field['key']])}}<br>
                                        <br/>
                                    @endforeach
                                @else
                                    @foreach($field['option'] as $option)
                                        {{ Form::checkbox($option['name'], $option['value'])}} {{$option['title']}} <br>
                                        <br>
                                    @endforeach
                                @endif

                            @elseif($field['type'] == 'file')

                                @if(isset($record[$field['key']]))
                                    <img src={{asset($record['path'])}}  width="170">

                                    {{Form::file('file'),$record[$field['key']]}}
                                    <br>
                                @else
                                    <div class="form-group">
                                        {{Form::file('file')}}
                                    </div>
                                @endif

                            @endif
                        @endif

                        @endforeach


                        {!! Form::submit(trans('app.create') , ['class' => 'btn btn-success']) !!}
                        <a class="btn btn-primary"
                           href="{{ route('app.' . $tableName . '.index') }}">{{trans('app.' . $tableName)}}</a>

        </div>
    </div>


    {!!Form::close()!!}

@endsection

@section('scripts')

    <script>

        console.log($('#language_code'));
        $('#language_code').bind('change', function () {
            window.location.href = '?language_code=' + $('#language_code').val();
            alert($('#language_code').val());


        });




        if($('#time').length > 0 &&
            $('#vr_rooms').length > 0);
        {
            console.log('cool');

            $('#time').bind('change', getAvailableHour);

            $('#vr_rooms').bind('change', getAvailableHour);


            function getAvailableHour() {
            console.log($('#vr_rooms').val());
            console.log($('#time').val());


                $.ajax({
                    url: '{{route('app.order.reservations') }}',
                    type: 'GET',
                    data: {
                        time: $('#time').val(),
                        vr_rooms: $('#vr_rooms').val()
                    },
                    success: function (response) {

                        console.log(response);

                    }
                });
            }


            var list = prepareForCheckBox ('2017-06-27');
            console.log(list);

            function prepareForCheckBox(day)
            {
                // reserved days from server
                var reserved = [day + ' 17:00:00', day + ' 17:10:00'];

                // new date
                var date = new Date(day + ' 00:00:00');

                // checking if date is today
                if (date.toDateString() == new Date().toDateString())
                    date = new Date();

                // closing time property
                var closingTime = 22;

                // opening time property
                var openingTime = 10;

                // available times for this
                var availableTimes = [];

                // allow rezervation 2 hours from now
                date.setHours(date.getHours() + 2);

                // moving minutes to dividable by 10
                date.setMinutes(Math.ceil(date.getMinutes() / 10) * 10);

                // while it is not closing time execute
                while (date.getHours() < closingTime)
                {
                    // cheking if hours are more than opening time
                    if (date.getHours() >= openingTime)
                    {
                        // creating rezervation time visible for users
                        var time = date.getHours() + ':' + pad(date.getMinutes(), 2);
                        // creating dateTime / id which will be recorded in the databse
                        var dateTime = day + ' ' + time + ':00';

                        // adding data to array
                        availableTimes.push(
                            {
                                title: time,
                                id: dateTime,
                                // cheking if time is reserved
                                reserved: reserved.indexOf(dateTime) >= 0 ? 1 : 0
                            });
                    }

                    // interval each 10 minutes
                    // increasing time by 10 minutes
                    date.setMinutes(date.getMinutes() + 10);
                }

                // function which adds zeros from left size of the number 1 -> 001
                function pad(num, size) {
                    var s = num + "";
                    while (s.length < size) s = "0" + s;
                    return s;
                }

                return availableTimes;
            }


        }






    </script>
@endsection
