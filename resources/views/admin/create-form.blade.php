@extends('admin.core')

@section('content')

    <div id="list">

        <div class="container">
            <div><h2>{{trans('app.' . $tableName)}}</h2></div>

            {!! Form::open(['url' => $route]) !!}

            @foreach($fields as $field)
                @if(isset ($field['key']))
                {!! Form::label(trans('app.' . $field['key'])) !!}<br/>

                @if($field['type'] == 'dropDown')
                    {{Form::select($field['key'], $field['option'])}}<br/><br/>

                @elseif($field['type'] == 'singleLine')
                    {!! Form::text($field['key'])!!}<br/><br/>

                @elseif($field['type'] == 'checkBox')

                    @foreach($field['option'] as $option)
                        {{ Form::checkbox($option['name'], $option['value'])}} {{$option['title']}} <br/><br/>

                    @endforeach
                @endif
                @endif
            @endforeach

            {!! Form::submit(trans('app.create') , ['class' => 'btn btn-success']) !!}
            <a class="btn btn-primary"
               href="{{ route('app.' . $tableName . '.index') }}">{{trans('app.' . $tableName)}}</a>

        </div>
    </div>




@endsection