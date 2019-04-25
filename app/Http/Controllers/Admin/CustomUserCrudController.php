<?php

namespace App\Http\Controllers\Admin;

use App\Libraries\Golf;
use Backpack\PermissionManager\app\Http\Controllers\UserCrudController;
use Backpack\PermissionManager\app\Http\Requests\UserStoreCrudRequest as StoreRequest;
use Backpack\PermissionManager\app\Http\Requests\UserUpdateCrudRequest as UpdateRequest;

class CustomUserCrudController extends UserCrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        parent::setup();

        $this->crud->setRoute(backpack_url('custom_user'));

        $this->crud->addColumns([
            [
                'name' => 'phone',
                'label' => 'SDT Đăng nhập'
            ],
            [
                'name' => 'avatar',
                'label' => 'Avatar',
                'type' => 'image'
            ],
            [
                'name' => 'user_type',
                'label' => 'Loại thành viên',
                'type' => 'select_from_array',
                'options' => Golf::getMemberTypes()
            ],
            [
                'name' => 'is_active',
                'label' => 'Trạng thái',
                'type' => 'select_from_array',
                'options' => [1 => 'Active', 0 => 'Inactive']
            ],
            [
                'name' => 'is_admin',
                'label' => 'IsAdmin',
                'type' => 'select_from_array',
                'options' => [1 => 'Yes', 0 => 'No']
            ]
        ]);

        $this->crud->removeFields(['password', 'password_confirmation'], 'update');
        // Fields

        $this->crud->addFields([
            [
                'name' => 'phone',
                'label' => 'SDT Đăng nhập'
            ],
            [
                'name' => 'avatar',
                'label' => 'Avatar',
                'type' => 'browse'
            ],
            [
                'name' => 'user_type',
                'label' => 'Loại thành viên',
                'type' => 'select_from_array',
                'options' => Golf::getMemberTypes()
            ],
            [
                'name' => 'is_active',
                'label' => 'Trạng thái',
                'type' => 'select_from_array',
                'options' => [1 => 'Active', 0 => 'Inactive']
            ],
            [
                'name' => 'is_admin',
                'label' => 'IsAdmin',
                'type' => 'select_from_array',
                'options' => [1 => 'Yes', 0 => 'No']
            ]
        ]);

    }

    /**
     * Store a newly created resource in the database.
     *
     * @param StoreRequest $request - type injection used for validation using Requests
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        return parent::storeCrud($request);
    }

    /**
     * Update the specified resource in the database.
     *
     * @param UpdateRequest $request - type injection used for validation using Requests
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request)
    {
        return parent::updateCrud($request);
    }


}
