<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OrganizationRequest as StoreRequest;
use App\Http\Requests\OrganizationRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class OrganizationCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OrganizationCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Organization');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/organization');
        $this->crud->setEntityNameStrings('organization', 'organizations');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->setFromDb();

        $this->crud->removeColumns(['district_id', 'province_id']);
        $this->crud->removeFields(['district_id', 'province_id']);

        $this->crud->addColumn([
            'label' => 'Province',
            'type' => 'select',
            'name' => 'province_id',
            'entity' => 'province',
            'attribute' => 'name',
            'model' => "App\Models\Province",
            'searchLogic' => false,
        ]);

        $this->crud->addField([
            'label' => 'Province',
            'type' => 'select2',
            'name' => 'province_id',
            'entity' => 'province',
            'attribute' => 'name',
            'model' => "App\Models\Province",
            'searchLogic' => false,
        ]);

        // add asterisk for fields that are required in OrganizationRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
