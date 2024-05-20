<?php

namespace App\Http\Controllers;

use App\Models\AdminSetting;
use App\Http\Requests\StoreAdminSettingRequest;
use App\Http\Requests\UpdateAdminSettingRequest;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.adminSetting.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminSetting $adminSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminSetting $adminSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminSettingRequest $request, AdminSetting $adminSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminSetting $adminSetting)
    {
        //
    }
}
