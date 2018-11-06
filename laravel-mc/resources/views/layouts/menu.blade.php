<!-- <li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('categries*') ? 'active' : '' }}">
    <a href="{!! route('categries.index') !!}"><i class="fa fa-edit"></i><span>Categries</span></a>
</li> -->

<li class="{{ Request::is('categories*') ? 'active' : '' }}">
    <a href="{!! route('categories.index') !!}"><i class="fa fa-edit"></i><span>Categories</span></a>
</li>

<li class="{{ Request::is('nominates*') ? 'active' : '' }}">
    <a href="{!! route('nominates.index') !!}"><i class="fa fa-edit"></i><span>Nominates</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('nominationUsers*') ? 'active' : '' }}">
    <a href="{!! route('nominationUsers.index') !!}"><i class="fa fa-edit"></i><span>Nomination Users</span></a>
</li>

<li class="{{ Request::is('nominations*') ? 'active' : '' }}">
    <a href="{!! route('nominations.index') !!}"><i class="fa fa-edit"></i><span>Nominations</span></a>
</li>

<!-- <li class="{{ Request::is('nominationUsers*') ? 'active' : '' }}">
    <a href="{!! route('nominationUsers.index') !!}"><i class="fa fa-edit"></i><span>Nomination Users</span></a>
</li> -->

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{!! route('settings.index') !!}"><i class="fa fa-edit"></i><span>Settings</span></a>
</li>

<<!-- li class="{{ Request::is('votings*') ? 'active' : '' }}">
    <a href="{!! route('votings.index') !!}"><i class="fa fa-edit"></i><span>Votings</span></a>
</li> -->

<li class="{{ Request::is('votings*') ? 'active' : '' }}">
    <a href="{!! route('votings.index') !!}"><i class="fa fa-edit"></i><span>Votings</span></a>
</li>

