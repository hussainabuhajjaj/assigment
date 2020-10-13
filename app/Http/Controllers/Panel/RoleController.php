<?php

namespace App\Http\Controllers\Panel;

use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        return view('panel.roles.index');
    }
    public function create()
    {
        return view('panel.roles.create');
    }

    public function store(RoleRequest $request)
    {

        $data = $request->only('name');
        $data['guard_name'] = 'admin';
        $role = Role::create($data);
        $role->syncPermissions([]);

        if (isset($request->permissions) && count($request->permissions) > 0 ){
            foreach ($request->permissions as $item) {
                $permission = Permission::firstOrCreate(['name' => $item]);
                if (!isset($permission)) {
                    return $this->response_api(false, 'حدث خطأ أثناء المعالجة');
                }
                $role->givePermissionTo($permission);
            }
        }

        return $this->response_api(true , __('front.success') , StatusCodes::OK);
    }

    public function edit($id){
        $data['item']=Role::findOrFail($id);
        return view('panel.roles.create', $data);
    }

    public function update($id , RoleRequest $request)
    {
        $data = $request->only('name');
        $role = Role::findOrFail($id);

        $role->update($data);
        $role->syncPermissions([]);

        if (isset($request->permissions) && count($request->permissions) > 0 ){
            foreach ($request->permissions as $item) {
                $permission = Permission::firstOrCreate(['name' => $item]);
                if (!isset($permission)) {
                    return $this->response_api(false, 'حدث خطأ أثناء المعالجة');
                }
                $role->givePermissionTo($permission);
            }
        }

        return $this->response_api(true , __('front.success') , StatusCodes::OK);
    }


    public function destroy($id)
    {
        $role = Role::findById( $id);
        return $role->delete() ? $this->response_api(true , __('front.success') , StatusCodes::OK) : $this->response_api(true , __('front.error') , StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Role::query();
        return getDatatable($items);
    }
}
