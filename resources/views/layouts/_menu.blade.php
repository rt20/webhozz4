<div class="list-group">
     <h4 class="text-center py-4 pb-4">Menu</h4>
     <a href="{{ route('home') }}" class="list-group-item list-group-item-action {{ set_active('home') }}">
          Home
     </a>
     <h4 class="text-center py-4 pb-4">Admin Menu</h4>
     @can('view user')
     <a href="{{ route('admin.users.index') }}"
          class="list-group-item list-group-item-action {{ set_active('admin.users.index') }}">
          Users
     </a>
     @endcan
     @can('view role')
     <a href="{{ route('admin.roles.index') }}"
          class="list-group-item list-group-item-action {{ set_active('admin.roles.index') }}">Roles</a>
     @endcan
     @can('view permission')
     <a href="{{ route('admin.permissions.index') }}" class="list-group-item list-group-item-action">Permissions</a>
     @endcan
</div>