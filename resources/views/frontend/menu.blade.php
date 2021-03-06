

<nav class="navbar navbar-default" id="menu">
    <div class="container-fluid">


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            @foreach($menu as $menuItem)
                <ul class="nav navbar-nav">
                    @if($menuItem['children'] != null)
                        <li class="dropdown">
                            <a href="{{($menuItem['translation']['url'])}}" class="dropdown-toggle"
                               data-toggle="dropdown" role="button" aria-haspopup="true"
                               aria-expanded="false"> {{($menuItem['translation']['name'])}}
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach($menuItem['children'] as $child)
                                    <li>
                                        <a href="/{{$child['translation']['url']}}">{{($child['translation']['name'])}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                    @else
                        <li>
                            <a href="/{{$menuItem['translation']['url']}}">{{$menuItem['translation']['name']}}</a>
                        </li>
                    @endif
                </ul>
            @endforeach

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> {{trans('app.lang')}}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($lang as $key => $value)
                            <li><a href="/{{$key}}">{{($value)}}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false"> {{trans('app.rooms')}}
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach($rooms as $key => $value)
                            <li>
                                <a href="/{{app()->getLocale() . '/pages/' . $value['translation']['slug']}}">{{($value['translation']['title'])}}</a>
                            </li>

                        @endforeach


                    </ul>
                </li>

            </ul>

        </div>

    </div>
       <div>Facebook</div>

</n  >


