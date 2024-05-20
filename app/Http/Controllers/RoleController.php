<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\User;
class RoleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['permission:edit role|add role | add role|view role']);
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.role.index',[
            'roles'=>SpladeTable::for(Role::class)

                ->column('name',sortable:true)
                ->column('guard_name',sortable:true)
                ->withGlobalSearch(columns: ['name', 'email'])

                ->column('action')
                ->column('created_at', sortable: true, hidden: true)

                ->paginate(15)]);
    }
//SpladeTable::hidePaginationWhenResourceContainsOnePage();
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $details = [
            'url' => route('roles.store'),
            'method' => 'POST',
            'title' => 'Create New Role',
            'type' => 'create'
        ];
        $permissions = Permission::pluck('name')->toArray();
        return view('dashboard.role.create', [
            'details' => $details,
            'permissions'=>$permissions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->permissions);
        $role = Role::create(['name' => $request->input('name')]);



        $role->syncPermissions($request->permissions);
        // dd($permissions);
        // $role->syncPermissions([$permission->id]);

        return to_route('roles.index');
        //
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
    public function edit(Role $role)
    {
        $details = [
            'url' => route('roles.update',$role),
            'method' => 'PUT',
            'title' => 'Update Role',
            'type' => 'update'
        ];

        // 'role' => $role,
        // 'permissions' => Permission::pluck('name', 'id')->toArray()
        // $permissions = Permission::pluck('name')->toArray();
        // $permission1 = $role->permissions;



        return view('dashboard.role.edit')->with('role', $role)->with('details', $details)->with('permissions',Permission::pluck('name', 'id')->toArray());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // $permissionName  = Permission::where('id',$request->permissions);

        // dd($request->permissions);
        // $role->syncPermissions();
        $permissionIDs = $request->permissions;
        $permissions = [];

        foreach ($permissionIDs as $permissionID) {
            $permissions[] = Permission::find($permissionID)->name;
        }

        $role->syncPermissions($permissions);

        return redirect()->route('roles.index');

        // dd($role,$request->permissions);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back();
        //
    }
}
