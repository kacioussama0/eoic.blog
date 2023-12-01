<div id="sidebar" class="active">
    <div class="sidebar-wrapper active border-end border-1 ">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">

                    <a href=""> <img src="{{asset('assets/imgs/logo.svg')}}"  alt="Logo" class = "main-logo "></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">

            <ul class="menu">
                <li class="sidebar-title">{{__('forms.lists')}}</li>

                <li
                    class="sidebar-item {{request()->is('admin') ? "active" : '' }}">
                    <a href="{{url('admin')}}" class='sidebar-link'>
                        <i class="bi bi-speedometer2"></i>
                        <span>{{__('forms.statistics')}}</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/profile*') ? "active" : '' }}">
                    <a href="{{route('admin/profile')}}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>{{__('forms.profile')}}</span>
                    </a>
                </li>
                @if(auth()->user()->type == 'super_admin')
                <li
                    class="sidebar-item {{request()->is('admin/users*') ? "active" : '' }} ">
                    <a href="{{route('users.index')}}" class="sidebar-link ">
                        <i class="bi bi-people-fill"></i>
                        <span>{{__('forms.members')}}</span>
                    </a>
                </li>
                @endif
                <li
                    class="sidebar-item {{request()->is('admin/categories*') ? "active" : '' }}">
                    <a href="{{route('categories.index')}}" class='sidebar-link '>
                        <i class="bi bi-bookmarks"></i>
                        <span>{{__('home.categories')}}</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/posts*') ? "active" : '' }}">
                    <a href="{{route('posts.index')}}" class='sidebar-link '>
                        <i class="bi bi-file-post"></i>
                        <span>{{__('forms.articles')}}</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/tags*') ? "active" : '' }}">
                    <a href="{{route('tags.index')}}" class='sidebar-link '>
                        <i class="bi bi-tag"></i>
                        <span>{{__('forms.tags')}}</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/news*') ? "active" : '' }}">
                    <a href="{{route('news.index')}}" class='sidebar-link '>
                        <i class="bi bi-info"></i>
                        <span>{{__('forms.latest-news')}}</span>
                    </a>
                </li>


{{--                <li--}}
{{--                    class="sidebar-item {{request()->is('admin/projects*') ? "active" : '' }}">--}}
{{--                    <a href="{{route('projects.index')}}" class='sidebar-link '>--}}
{{--                        <i class="bi bi-cash"></i>--}}
{{--                        <span>{{__('forms.projects')}}</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                <li
                    class="sidebar-item {{request()->is('admin/join-us*') ? "active" : '' }}">
                    <a href="{{route('join-us.index')}}" class='sidebar-link '>
                        <i class="bi bi-file-post"></i>
                        <span>{{__('forms.list-of-requests')}}</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/messages*') ? "active" : '' }}">
                    <a href="{{route('messages.index')}}" class='sidebar-link '>
                        <i class="bi bi-file-post"></i>
                        <span>{{__('forms.messages')}}</span>
                        @if(count(auth()->user()->unreadNotifications))
                        <span class="badge text-bg-danger rounded-pill display-6">
                            {{count(auth()->user()->unreadNotifications)}}
                        </span>
                        @endif
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/magazines') ? "active" : '' }}">
                    <a href="{{route('magazines.index')}}" class='sidebar-link'>
                        <i class="bi bi-book"></i>
                        <span>{{__('forms.magazines')}}</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/videos') ? "active" : '' }}">
                    <a href="{{route('videos.index')}}" class='sidebar-link'>
                        <i class="bi bi-camera-video"></i>
                        <span>{{__('forms.videos')}}</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/organization-members*') ? "active" : '' }}">
                    <a href="{{route('organization-members.index')}}" class='sidebar-link '>
                        <i class="bi bi-bookmarks"></i>
                        <span>{{__('forms.office-members')}}</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/cards*') ? "active" : '' }}">
                    <a href="{{route('cards.index')}}" class='sidebar-link '>
                        <i class="bi bi-file-post"></i>
                        <span>{{__('forms.cards')}}</span>
                    </a>
                </li>

                @if(auth()->user()->type == 'super_admin')

                <li
                    class="sidebar-item {{request()->is('admin/settings*') ? "active" : '' }}">
                    <a href="   {{route('settings.index')}}" class='sidebar-link '>
                        <i class="bi bi-gear"></i>
                        <span>{{__('forms.setting')}}</span>
                    </a>
                </li>
            @endif

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
