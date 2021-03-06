<ul class="sidebar-menu">
  <li class="header">
      <i class="fa fa-dashboard">&nbsp;</i>
      <span>
          <strong><b>DASHBOARD</b></strong>
      </span>
  </li>

  <!-- Optionally, you can add icons to the links -->
  <li class="{{ request()->is('admin') ? 'active' : '' }}">
      <a href="{{ route('admin') }}">
          <i class="fa fa-home"></i> <span>HOME</span>
      </a>
  </li>

  @if( checkrights('PUV', auth()->user()->permissions) )
    <li class="treeview {{ request()->is('admin/users*') ? 'active' : '' }} {{ request()->is('admin/roles*') ? 'active' : '' }}">
        <a href="{{ route('admin.users.index') }}"><i class="fa fa-user"></i> <span>USERS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ request()->is('admin/users') ? 'active' : '' }}">
                <a href="{{ route('admin.users.index') }}"><i class="fa fa-users"></i> List Users</a>
            </li>
            @if( checkrights('PRV', auth()->user()->permissions) )
                <li class="{{ request()->is('admin/roles') ? 'active' : '' }}">
                    <a href="{{ route('admin.roles.index') }}"><i class="fa fa-unlock-alt"></i> List Roles</a>
                </li>
            @endif
        </ul>
    </li>
  @endif

    @if( checkrights('PUV', auth()->user()->permissions) )
        <li class="treeview {{ request()->is('admin/posts*') ? 'active' : '' }}">
            <a href="{{ route('admin.users.index') }}"><i class="fa fa-newspaper-o"></i> <span>POST</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ request()->is('admin/posts') ? 'active' : '' }}">
                    <a href="{{ route('admin.posts.index') }}"><i class="fa fa-users"></i> List Post</a>
                </li>
{{--                @if( checkrights('PRV', auth()->user()->permissions) )--}}
{{--                    <li class="{{ request()->is('admin/roles') ? 'active' : '' }}">--}}
{{--                        <a href="{{ route('admin.roles.index') }}"><i class="fa fa-unlock-alt"></i> List Roles</a>--}}
{{--                    </li>--}}
{{--                @endif--}}
            </ul>
        </li>
    @endif

    <li class="treeview {{ request()->is('admin/states*') ? 'active' : '' }} {{ request()->is('admin/citys*') ? 'active' : '' }}">
        <a href="#"><i class="fa fa-users"></i> <span>OTHERS</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>

        @if( checkrights('PSV', auth()->user()->permissions) )
            <ul class="treeview-menu">
                <li class="{{ request()->is('admin/states') ? 'active' : '' }}">
                    <a href="{{ route('admin.states.index') }}"> <i class="fa fa-map-signs"></i> List States</a>
                </li>

                <li class="{{ request()->is('admin/citys') ? 'active' : '' }}">
                    <a href="{{ route('admin.citys.index') }}"> <i class="fa fa-map"></i> List Citys</a>
                </li>
            </ul>
        @endif
    </li>


  @if( checkrights('PRRV', auth()->user()->permissions) )
      <li class="treeview {{ request()->is('admin/records*') ? 'active' : '' }}">
          <a href=""><i class="fa fa-book"></i> <span>RECORD AND REPORTS</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li class="{{ request()->is('admin/records-users') ? 'active' : '' }}">
                  <a href="{{ route('admin.records') }}"><i class="fa fa-tags"></i> Record users</a>
              </li>
          </ul>
      </li>
  @endif
  {{--  <li>
      <a href="#"><i class="fa fa-close"></i> <span>SAIR</span></a>
  </li>  --}}
</ul>
