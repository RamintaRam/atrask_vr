@extends('admin.core')

@section('content')

    <div id="list">

        <div class="container">
            <div><h2>{{trans('app.language')}}</h2></div>
            @if(sizeof($list)>0)
                <table class="table">
                    <thead>
                    <tr>
                        @foreach($list[0] as $key => $value)
                            <th>{{$key}}</th>
                        @endforeach

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $key => $record)
                        <tr>  {{--<tr> {{$record['id']}}"--}}
                            @foreach($record as $key =>$value)
                                <td> @if($key == 'is_active')
                                        @if($value == 1)
                                            <a class="btn btn-danger btn-sm" onclick="
                                                    enableDisable('{{route($callToAction, $record['id'])}}', 0)" href="#">{{trans('app.disable')}}</a>
                                            <a class="btn btn-primary btn-sm" onclick="enableDisable('app.language.edit', 1)" style="display: none"
                                               href="#">{{trans('app.activate')}}</a>
                                        @else
                                            <a class="btn btn-danger btn-sm" onclick="enableDisable('app.language.edit', 0)" style="display: none"
                                               href="#">{{trans('app.disable')}}</a>
                                            <a class="btn btn-primary btn-sm" onclick="enableDisable('app.language.edit', 1)" href="#">{{trans('app.activate')}}</a>
                                        @endif
                                    @else
                                        {{$value}}
                                    @endif
                                </td>

                    @endforeach
                  {{--<td>{{trans('app.view')}}</td>--}}
                  {{--<td>{{trans('app.edit')}}</td>--}}
                  {{--<td>{{trans('app.delete')}}</td>--}}

              {{--<td><a class="btn btn-primary btn-sm" href="{{route('app.' . $tableName . '.show', $record['id'])}}">{{trans('app.view')}}</a></td>--}}
              {{--<td><a class="btn btn-success btn-sm" href="{{route('app.' . $tableName . '.edit', $record['id'])}}">{{trans('app.edit')}}</a></td>--}}
              {{--<td><a id="del" onclick="deleteItem('{{route('app.' . $tableName . '.delete', $record['id'])}}')" class="btn btn-danger btn-sm" >{{trans('app.delete')}}</a></td>--}}
              {{--</tr>--}}
        @endforeach
            </tbody>
        </table>
            @else
        <p>No data</p>
            @endif


</div>
</div>

@endsection

@section('scripts')

    <script>
        function enableDisable()
        {
            alert('Hello')
        }


    </script>

    @endsection