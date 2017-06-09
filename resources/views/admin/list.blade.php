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
                                                    toggleActive('{{route($callToAction, $record['id'])}}', 0)"
                                               href="#">{{trans('app.disable')}}</a>
                                            <a class="btn btn-primary btn-sm"
                                               onclick="toggleActive('{{route($callToAction, $record['id'])}}', 1)"
                                               style="display: none"
                                               href="#">{{trans('app.activate')}}</a>
                                        @else
                                            <a class="btn btn-danger btn-sm"
                                               onclick="toggleActive('{{route($callToAction, $record['id'])}}', 0)"
                                               style="display: none"
                                               href="#">{{trans('app.disable')}}</a>
                                            <a class="btn btn-primary btn-sm"
                                               onclick="toggleActive('{{route($callToAction, $record['id'])}}', 1)"
                                               href="#">{{trans('app.activate')}}</a>
                                        @endif
                                    @else
                                        {{$value}}
                                    @endif
                                </td>
                            @endforeach
                        </tr>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        function toggleActive(URL, value) {
            $.ajax({
                url: URL,
                type: 'POST',
                data: {is_active: value},
                success: function (responce) {
                    console.log(responce)
                }
            });
        }



    </script>

    @endsection