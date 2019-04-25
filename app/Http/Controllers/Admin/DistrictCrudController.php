<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\DistrictRequest as StoreRequest;
use App\Http\Requests\DistrictRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class DistrictCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DistrictCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\District');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/district');
        $this->crud->setEntityNameStrings('district', 'districts');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        //$this->crud->setFromDb();

        $this->crud->addColumns([
            [
                'name' => 'name',
                'label' => 'Name'
            ],
            [
                'name' => 'slug',
                'label' => 'Slug'
            ],
            [
                'label' => 'Province',
                'type' => 'select',
                'name' => 'province_id',
                'entity' => 'province',
                'attribute' => 'name',
                'model' => "App\Models\Province",
                'searchLogic' => false,
            ],
        ]);

        $this->crud->denyAccess('create');
        $this->crud->denyAccess('update');
        $this->crud->denyAccess('delete');
        $this->crud->removeAllButtons();

        // add asterisk for fields that are required in DistrictRequest
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
