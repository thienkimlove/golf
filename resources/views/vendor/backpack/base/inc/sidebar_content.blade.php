<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li><a href="{{ backpack_url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
<li><a href="{{ backpack_url('custom_user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
{{--<li><a href="{{ backpack_url('elfinder') }}"><i class="fa fa-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>--}}
<li><a href="{{ backpack_url('category') }}"><i class="fa fa-cab"></i> <span>Chuyên mục</span></a></li>
<li><a href="{{ backpack_url('post') }}"><i class="fa fa-podcast"></i> <span>Bài viết</span></a></li>

<!-- Users, Roles Permissions -->
@role('system')
<li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Settings</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
        <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
        <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
        <li><a href="{{ backpack_url('province') }}"><i class="fa fa-group"></i> <span>Tỉnh/Thành phố</span></a></li>
        <li><a href="{{ backpack_url('district') }}"><i class="fa fa-key"></i> <span>Quận/Huyện</span></a></li>
        <li><a href="{{ backpack_url('organization') }}"><i class="fa fa-key"></i> <span>Organization</span></a></li>
    </ul>
</li>
@endrole