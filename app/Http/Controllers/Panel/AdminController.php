<?php

namespace App\Http\Controllers\Panel;

use App\Admin;
use App\Constants\StatusCodes;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('panel.admins.index');
    }

    public function create()
    {
        return view('panel.admins.create');
    }

    public function store(AdminRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $admin = Admin::create($data);
        $admin->syncRoles([$data['role_id']]);

        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function edit($id)
    {
        $data['item'] = Admin::findOrFail($id);
        return view('panel.admins.create', $data);
    }

    public function update(AdminRequest $request, $id)
    {
        $data = $request->all();
        $admin = Admin::findOrFail($id);

        if (!$request->filled('password')) {
            $data['password'] = $admin->password;
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $admin->update($data);
        $admin->syncRoles([$data['role_id']]);

        return $this->response_api(true, __('front.success'), StatusCodes::OK);
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);
        return $admin->delete() ? $this->response_api(true, __('front.success'), StatusCodes::OK) : $this->response_api(true, __('front.error'), StatusCodes::INTERNAL_ERROR);
    }

    public function datatable()
    {
        $items = Admin::query();
        return getDatatable($items);
    }

}
