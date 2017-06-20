@extends('admin.core')

@section('content')

    <div id="list">

        <div class="container">
            <div><h2>{{trans('app.' . $tableName)}}</h2></div><br>
            @if(isset($new))
                <div><a class="btn btn-success btn-sm" href="{{route($new)}}">{{trans('app.createNew')}}</a></div><br>
            @endif

            {{--jeigu liste yra duomenu--}}
            @if(sizeof($list)>0)
                <table class="table">
                    <thead>
                    <tr>
                        @foreach($list[0] as $key => $value)
                            <th>{{trans('app.' . $key)}}</th>
                        @endforeach
                        <th></th><th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($list as $key => $record)
                        <tr id="{{$record['id']}}">
                            @foreach($record as $key =>$value)
                                <td>
                                    @if($key == 'is_active')
                                        @if($value == 1)
                                            <a class="btn btn-danger btn-sm" onclick="
                                                    toggleActive('{{route($callToAction, $record['id'])}}', 0)"
                                               href="#">{{trans('app.disable')}}</a>
                                            <a class="btn btn-success btn-sm"
                                               onclick="toggleActive('{{route($callToAction, $record['id'])}}', 1)"
                                               style="display: none"
                                               href="#">{{trans('app.activate')}}</a>
                                        @else
                                            <a class="btn btn-danger btn-sm"
                                               onclick="toggleActive('{{route($callToAction, $record['id'])}}', 0)"
                                               style="display: none"
                                               href="#">{{trans('app.disable')}}</a>
                                            <a class="btn btn-success btn-sm"
                                               onclick="toggleActive('{{route($callToAction, $record['id'])}}', 1)"
                                               href="#">{{trans('app.activate')}}</a>
                                        @endif


                                    @elseif($key == 'role')
                                        @if(isset($value['role_id']))
                                            {{$value['role_id']}}
                                        @else
                                            -
                                        @endif


                                    @elseif($key == 'translation')

                                        @if(isset($value['name']))
                                            {{$value['name'] . ' ' . $value['language_code']}}
                                        @elseif(($value['title']))
                                            {{$value['title'] . ' ' . $value['language_code']}}
                                        @else
                                            -
                                        @endif


                                    @elseif($key == 'image')

                                        @if(isset($value['path']))
                                            <img src = {{$value['path']}} width="80">
                                        @else
                                            -
                                        @endif


                                    @else
                                        {{$value}}
                                    @endif
                                </td>
                            @endforeach
                            @if(isset ($edit))
                                <td><a class="btn btn-primary btn-sm" href="{{route($edit, $record['id'])}}"><i
                                                class="fa fa-pencil fa-sm" aria-hidden="true"></i> {{trans('app.edit')}}</a></td>
                            @endif
                            @if(isset ($delete))
                                <td><a id="del" onclick="deleteItem('{{route($delete, $record['id'])}}')"
                                       class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-sm"></i> {{trans('app.delete')}}</a></td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                {{--jeigu duomenu liste nėra--}}
                <p><h4 style="font-style: italic">{{trans('app.noData')}} </h4></p>
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
                success: function (response) {

                    var dangerButton = $('#' + response.id).find('.btn-danger');
                    var successButton = $('#' + response.id).find('.btn-success');

                    // console.log(dangerButton, successButton)

                    /*                   console.log($('#' + response.id).
                     find('btn btn-danger btn-sm').
                     find('btn btn-primary btn-sm'))*/


//                   console.log( $('#' + response.id).hide())


                    console.log(response.is_active);

                    if (response.is_active === '1') {
                        successButton.hide();
                        dangerButton.show()
                    } else {
                        successButton.show();
                        dangerButton.hide()
                    }


                }
            });
        }




        function deleteItem(route) {
            $.ajax({
                url: route,
                type: 'DELETE',
                data: {},
                dataType: 'json',
                success: function (r) {
                    $("#" + r.id).remove();
                },
                error: function () {
                    alert('error');
                }
            });
        }







    </script>

@endsection