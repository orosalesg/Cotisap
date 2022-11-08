<div class="an-sidebar-nav">
  
    <ul class="an-main-nav">

        @foreach(json_decode($rolUserConfig) as $rol)

        @php

        $roles = $rol[0]->name;

        if($rol[0]->status){

        if(strrpos($roles, 'Parent', -1)) {

        @endphp

        <li class="an-nav-item">
            <a class="js-show-child-nav" href="#">
                <span class="nav-title">
                    {{ trans('menu.'.$rol[0]->name) }}
                    <span class="an-arrow-nav"><i class="icon-arrow-down"></i></span>
                </span>
            </a>

            <ul class="an-child-nav js-open-nav">
                @foreach($rol[0]->children as $rolChildren)

                @if($rolChildren[0]->status)

                <li><a href="{{ URL::route($rolChildren[0]->name) }}">
                        {{ trans('menu.'.$rolChildren[0]->name) }}</a></li>

                @endif

                @endforeach
            </ul>

        </li>

        @php

        } else {

        @endphp

        <li class="an-nav-item">
            <a href="{{ URL::route($rol[0]->name) }}">
                <span class="nav-title">
                    {{ trans('menu.'.$rol[0]->name) }}
                </span>
            </a>
        </li>

        @php

        }
        }

        @endphp

        @endforeach

    </ul>
</div>