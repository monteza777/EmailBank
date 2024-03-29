@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            <!-- <li>
                <a href="{{url('admin/calendar')}}">
                  <i class="fa fa-calendar"></i>
                  <span class="title">
                    Calendar
                  </span>
                </a>
            </li> -->
        
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @can('role_access')
                    <li>
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span>@lang('quickadmin.roles.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.users.title')</span>
                        </a>
                    </li>@endcan
                    
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('quickadmin.user-actions.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan

            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>@lang('quickadmin.clients.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.clients.index') }}">
                            <i class="fa fa-user"></i>
                            <span>@lang('quickadmin.clients.title_sidebar')</span>
                        </a>
                    </li>
                    @endcan
                    @can('user_access')
                    <li>
                        <a href="{{ route('admin.compids.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span>@lang('quickadmin.compids.title')</span>
                        </a>
                    </li>@endcan

                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.cemails.index') }}">
                            <i class="fa fa-envelope"></i>
                            <span>@lang('quickadmin.cemails.title_sidebar')</span>
                        </a>
                    </li>@endcan
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.issues.index') }}">
                            <i class="fa fa-exclamation"></i>
                            <span>@lang('quickadmin.issues.title')</span>
                        </a>
                    </li>@endcan
                    
                </ul>
            </li>@endcan
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-trash"></i>
                    <span>@lang('quickadmin.qa_soft_deletes')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    
                    @can('user_action_access')
                    <li>
                        <a href="{{ route('admin.cemails.archives') }}">
                            <i class="fa fa-envelope"></i>
                            <span>@lang('quickadmin.cemails.title_sidebar')</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>@endcan
           

            

            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

