<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Users\StoreUsersRequest;
use App\Http\Requests\Users\UpdateUsersRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Hash;

/**
 * Class UsersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UsersCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Users::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/users');
        CRUD::setEntityNameStrings('users', 'users');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id');
        CRUD::column('name');
        CRUD::column('first_name');
        CRUD::column('last_name');
        CRUD::column('email');
        CRUD::column('email_2');
        CRUD::column('email_verified_at');
        CRUD::column('password');
        CRUD::column('phone');
        CRUD::column('phone_2');
        CRUD::column('state');
        CRUD::column('address');
        CRUD::column('address_2');
        CRUD::column('address_3');
        CRUD::column('role');
        CRUD::column('remember_token');
        CRUD::column('created_at');
        CRUD::column('updated_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(StoreUsersRequest::class);


        // CRUD::field('id');
        CRUD::field('name');
        // CRUD::field('first_name');
        // CRUD::field('last_name');
        CRUD::field('email');
        // CRUD::field('email_2');
        // CRUD::field('email_verified_at');
        CRUD::field('password');
        // CRUD::field('phone');
        // CRUD::field('phone_2');
        // CRUD::field('state');
        // CRUD::field('address');
        // CRUD::field('address_2');
        // CRUD::field('address_3');
        $this->crud->addField([
            'name' => 'role',
            'type' => 'select_from_array',
            'options' => [  
                "3" => "User" ,
                "2" => "Modrator" ,
                "1" => "Admin" ,
            ],
            'allows_null' => false  // { Not allow val null first option } Set 1st Option val placeholder
        ]);
        // CRUD::field('remember_token');
        // CRUD::field('created_at');
        // CRUD::field('updated_at');



        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        CRUD::setValidation(UpdateUsersRequest::class);


        // CRUD::field('id');
        CRUD::field('name');
        // CRUD::field('first_name');
        // CRUD::field('last_name');
        CRUD::field('email');
        // CRUD::field('email_2');
        // CRUD::field('email_verified_at');
        CRUD::field('password');
        // CRUD::field('phone');
        // CRUD::field('phone_2');
        // CRUD::field('state');
        // CRUD::field('address');
        // CRUD::field('address_2');
        // CRUD::field('address_3');
        $this->crud->addField([
            'name' => 'role',
            'type' => 'select_from_array',
            'options' => [  
                "3" => "User" ,
                "2" => "Modrator" ,
                "1" => "Admin" ,
            ],
            'allows_null' => false  // { Not allow val null first option } Set 1st Option val placeholder
        ]);
        // CRUD::field('remember_token');
        // CRUD::field('created_at');
        // CRUD::field('updated_at');
    }












    /*===========================================================================
    =========================== {Store} Password {Hash}
    ===========================================================================*/
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation { store as traitStore; }

    public function store()
    {
        $this->crud->setRequest($this->crud->validateRequest());

        /** @var \Illuminate\Http\Request $request */
        $request = $this->crud->getRequest();

        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }

        $this->crud->setRequest($request);
        $this->crud->unsetValidation(); // Validation has already been run

        return $this->traitStore();
    }










    /*===========================================================================
    =========================== {Update} Password {Hash}
    ===========================================================================*/
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation { update as traitUpdate; }

    public function update()
    {
        $this->crud->setRequest($this->crud->validateRequest());

        /** @var \Illuminate\Http\Request $request */
        $request = $this->crud->getRequest();


        // Encrypt password if specified.
        if ($request->input('password')) {
            $request->request->set('password', Hash::make($request->input('password')));
        } else {
            $request->request->remove('password');
        }




        $this->crud->setRequest($request);
        $this->crud->unsetValidation(); // Validation has already been run

        return $this->traitUpdate();


    }






}
