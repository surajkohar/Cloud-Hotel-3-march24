<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use ProtoneMedia\Splade\SpladeTable;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.permission.index',[
            'permissions'=>SpladeTable::for(Permission::class)

            ->column('name',sortable:true)
            ->column('guard_name',sortable:true)
            ->withGlobalSearch(columns: ['name', 'email'])

             ->column('action')
             ->column('created_at', sortable: true, hidden: true)
             ->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $details = [
            'url' => route('permissions.store'),
            'method' => 'POST',
            'title' => 'Create New Permission',
            'type' => 'create'
        ];
        // $permissions = Permission::pluck('name')->toArray();
    return view('dashboard.permission.create', [
        'details' => $details,
        // 'permissions'=>$permissions,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = Permission::create(['name' => $request->input('name')]);
        return to_route('permissions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        $details = [
            'url' => route('permissions.update',$permission),
            'method' => 'PUT',
            'title' => 'Update Permission',
            'type' => 'update'
        ];
        $defaults = [
            'name' => $permission->name,
            'guard_name' => $permission->guard_name,


        ];
        // dd($defaults);
    return view('dashboard.permission.create')->with('defaults', $defaults)->with('details', $details);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::find($id);
        $permission->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        dd($permission);
        $permission->delete();
        return back();
    }
}
