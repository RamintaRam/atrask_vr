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
                                @if($field['key'] == 'time')



                                @endif
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
        }






    </script>
@endsection
