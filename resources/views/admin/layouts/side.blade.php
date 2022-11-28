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
                <li class="sidebar-title">القائمة</li>

                <li
                    class="sidebar-item {{request()->is('admin') ? "active" : '' }}">
                    <a href="{{url('admin')}}" class='sidebar-link'>
                        <i class="bi bi-speedometer2"></i>
                        <span>الإحصائيات</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/profile*') ? "active" : '' }}">
                    <a href="{{route('admin/profile')}}" class='sidebar-link'>
                        <i class="bi bi-house-fill"></i>
                        <span>الصفحة الشخصية</span>
                    </a>
                </li>

        @role('admin')
                <li
                    class="sidebar-item {{request()->is('admin/users*') ? "active" : '' }} ">
                    <a href="{{route('users.index')}}" class="sidebar-link ">
                        <i class="bi bi-people-fill"></i>
                        <span>الأعضاء</span>
                    </a>
                </li>
        @endrole

                <li
                    class="sidebar-item {{request()->is('admin/categories*') ? "active" : '' }}">
                    <a href="{{route('categories.index')}}" class='sidebar-link '>
                        <i class="bi bi-bookmarks"></i>
                        <span>التصنيفات</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/posts*') ? "active" : '' }}">
                    <a href="{{route('posts.index')}}" class='sidebar-link '>
                        <i class="bi bi-file-post"></i>
                        <span>المقالات</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/tags*') ? "active" : '' }}">
                    <a href="{{route('tags.index')}}" class='sidebar-link '>
                        <i class="bi bi-tag"></i>
                        <span>الوسوم</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/news*') ? "active" : '' }}">
                    <a href="{{route('news.index')}}" class='sidebar-link '>
                        <i class="bi bi-info"></i>
                        <span>أخر الأخبار</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/join-us*') ? "active" : '' }}">
                    <a href="{{route('join-us.index')}}" class='sidebar-link '>
                        <i class="bi bi-file-post"></i>
                        <span>طلبات الإنخراط</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/messages*') ? "active" : '' }}">
                    <a href="{{route('messages.index')}}" class='sidebar-link '>
                        <i class="bi bi-file-post"></i>
                        <span>الرسائل</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/complaints*') ? "active" : '' }}">
                    <a href="{{route('complaints.index')}}" class='sidebar-link '>
                        <i class="bi bi-file-post"></i>
                        <span>شكاوي</span>
                    </a>
                </li>

                <li
                    class="sidebar-item {{request()->is('admin/joined-users*') ? "active" : '' }}">
                    <a href="{{route('joined-users.index')}}" class='sidebar-link '>
                        <i class="bi bi-people-fill"></i>
                        <span>هيكلة المرصد</span>
                    </a>
                </li>


                <li
                    class="sidebar-item {{request()->is('admin/faq*') ? "active" : '' }}">
                    <a href="{{url('admin/faq')}}" class='sidebar-link'>
                        <i class="bi bi-question"></i>
                        <span>أسئلة شائعة</span>
                    </a>
                </li>

                @role('admin')

                <li
                    class="sidebar-item {{request()->is('admin/settings*') ? "active" : '' }}">
                    <a href="{{route('settings.index')}}" class='sidebar-link '>
                        <i class="bi bi-gear"></i>
                        <span>إعدادات الموقع</span>
                    </a>
                </li>

                @endrole




            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
