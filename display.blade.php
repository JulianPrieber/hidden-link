<?php use App\Models\UserData; ?>

@if(Auth::check())
    @switch($link->name)
        @case('custom')
          @if($link->custom_css === "" or $link->custom_css === "NULL" or (theme('allow_custom_buttons') == "false"))
           <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a id="{{ $link->id }}" class="button button-custom button-click button-hover icon-hover" rel="noopener noreferrer nofollow noindex" href="{{ $link->link }}" @if((UserData::getData($userinfo->id, 'links-new-tab') != false))target="_blank"@endif ><i style="color: {{$link->custom_icon}}" class="icon hvr-icon fa {{$link->custom_icon}}"></i>{{ $link->title }}</a></div>
              @break
           @elseif($link->custom_css != "")
           <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a id="{{ $link->id }}" class="button button-custom button-click button-hover icon-hover" style="{{ $link->custom_css }}" rel="noopener noreferrer nofollow noindex" href="{{ $link->link }}" @if((UserData::getData($userinfo->id, 'links-new-tab') != false))target="_blank"@endif ><i style="color: {{$link->custom_icon}}" class="icon hvr-icon fa {{$link->custom_icon}}"></i>{{ $link->title }}</a></div>
              @break
            @endif
        @case('custom_website')
           @if($link->custom_css === "" or $link->custom_css === "NULL" or (theme('allow_custom_buttons') == "false"))
             <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a id="{{ $link->id }}" class="button button-custom_website button-click button-hover icon-hover" rel="noopener noreferrer nofollow noindex" href="{{ $link->link }}" @if((UserData::getData($userinfo->id, 'links-new-tab') != false))target="_blank"@endif ><img alt="{{ $link->name }}" class="icon hvr-icon" src="@if(file_exists(base_path("assets/favicon/icons/").localIcon($link->id))){{url('assets/favicon/icons/'.localIcon($link->id))}}@else{{getFavIcon($link->id)}}@endif" onerror="this.onerror=null; this.src='{{asset('assets/linkstack/icons/website.svg')}}';">{{ $link->title }}</a></div>
               @break
           @elseif($link->custom_css != "")
            <div style="--delay: {{ $initial++ }}s" class="button-entrance"><a id="{{ $link->id }}" class="button button-custom_website button-click button-hover icon-hover" style="{{ $link->custom_css }}" rel="noopener noreferrer nofollow noindex" href="{{ $link->link }}" @if((UserData::getData($userinfo->id, 'links-new-tab') != false))target="_blank"@endif ><img alt="{{ $link->name }}" class="icon hvr-icon" src="@if(file_exists(base_path("assets/favicon/icons/").localIcon($link->id))){{url('assets/favicon/icons/'.localIcon($link->id))}}@else{{getFavIcon($link->id)}}@endif" onerror="this.onerror=null; this.src='{{asset('assets/linkstack/icons/website.svg')}}';">{{ $link->title }}</a></div>
             @break
           @endif
    @endswitch
@endif