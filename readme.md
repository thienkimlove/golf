## Golf Project
`https://github.com/Laravel-Backpack/CRUD/issues/1209`
`php artisan backpack:crud:publish list`
### Install

```
# Basic Install
composer create-project --prefer-dist laravel/laravel bosan`
composer require backpack/crud
mysql -uroot -ptieungao -e "CREATE DATABASE bosan CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
php artisan migrate
php artisan backpack:base:install
php artisan backpack:crud:install
rm -rf app/Http/Controllers/Auth
php artisan backpack:base:user
```
### Install permission manager

```textmate
 composer require backpack/permissionmanager
    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
    php artisan migrate
    php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
    
    php artisan vendor:publish --provider="Backpack\PermissionManager\PermissionManagerServiceProvider"
```
   
* Add to `App/Models/BackpackUser`

```textmate
    use CrudTrait; // <----- this
    use HasRoles; // <------ and this

```
* Add a menu item for it in 

`resources/views/vendor/backpack/base/inc/sidebar_content.blade.php` or `menu.blade.php`

```textmate
<!-- Users, Roles Permissions -->
  <li class="treeview">
    <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
    <ul class="treeview-menu">
      <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
      <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
      <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
    </ul>
  </li>
```

* If you want to use the `@can` handler inside Backpack routes

You can add a middleware to all your Backpack routes by adding this to your `config/backpack/base.php` file
 
 ```textmate
 // The classes for the middleware to check if the visitor is an admin
    // Can be a single class or an array of clases
    'middleware_class' => [
        App\Http\Middleware\CheckIfAdmin::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
+       Backpack\Base\app\Http\Middleware\UseBackpackAuthGuardInsteadOfDefaultAuthGuard::class,
    ],
```

* Please note:
```textmate

this will make auth() return the exact same thing as backpack_auth() on Backpack routes;

you only need this if you want to use @can; you can just as well use @if(backpack_user()->can('read')), which does the exact same thing, but works 100% of the time;


[Optional] Disallow create/update on your roles or permissions after you define them, using the config file in config/backpack/permissionmanager.php. 

Please note permissions and roles are referenced in code using their name. 

If you let your admins edit these strings and they do, your permission and role checks will stop working.
```

* Disallow the user interface for creating/updating permissions or roles in `config/backpack/permissionmanager.php`
```textmate
'allow_permission_create' => true,
'allow_permission_update' => false,
'allow_permission_delete' => false,
'allow_role_create'       => true,
'allow_role_update'       => true,
'allow_role_delete'       => false,
```

* Example 

Create permission `system`, add to role `admin`. Assign this role to user `quan.dm@teko.vn`.

```textmate
<!-- Users, Roles Permissions -->
@if(backpack_user()->can('system'))
    <li class="treeview">
        <a href="#"><i class="fa fa-group"></i> <span>Users, Roles, Permissions</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
            <li><a href="{{ backpack_url('user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
            <li><a href="{{ backpack_url('role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
            <li><a href="{{ backpack_url('permission') }}"><i class="fa fa-key"></i> <span>Permissions</span></a></li>
        </ul>
    </li>
@endif
```

### Work with SSL
```
cd /etc/nginx/sites-enabled/
cp bosan.vn golf.vn

```

Remove `server https` part and run `nginx -t && service nginx reload`.

Go to `https://www.sslforfree.com/create?generate&domains=golf.teko.dev`

Create `.well-known/acme-challenge` directory in `public`

Put the manually verify file there and upload to host.

Using Safari to browser to link with `http` for verify.

Create `golf.crt` by copy `golf.bosan.crt` first and then `cabundle.crt` to below.

Create `golf.key` using `private.key`

Enable `https` part in `golf.vn` and reload Nginx.

## Create post and categories.


