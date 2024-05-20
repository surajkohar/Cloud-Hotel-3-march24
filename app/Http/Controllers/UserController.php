<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
// use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role;
use ProtoneMedia\Splade\Facades\Splade;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.user.index',[
            'users'=>SpladeTable::for(User::class)
           
            ->column('name',sortable:true)
            ->withGlobalSearch(columns: ['name', 'email'])
            ->column('email',sortable:true)
          
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
            'url' => route('roles.store'),
            'method' => 'POST',
            'title' => 'Create New Role',
            'type' => 'create'
        ];
      
    return view('dashboard.user.create', [
        'details' => $details,
        // 'permissions'=>$permissions,
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
    public function edit(User $user)
    {
        $details = [
            'url' => route('users.update',$user),
            'method' => 'PUT',
            'title' => 'Update Role',
            'type' => 'update'
        ];
    
        // 'role' => $role,
        // 'permissions' => Permission::pluck('name', 'id')->toArray()
        // $permissions = Permission::pluck('name')->toArray();
        // $permission1 = $role->permissions;
        // $role = $user->hasRole();
        $role = $user->getRoleNames();
        $all_roles_in_database[] = Role::all()->pluck('name','id')->toArray();
        // dd(['userRole'=>$role], ['allRoles'=>$all_roles_in_database] );
   
    return view('dashboard.user.edit')->with('user',$user)->with('role', $role)->with('details', $details)->with('roles',$all_roles_in_database);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        // dd($request->all());
        $roleID = $request->roles;
        // dd(Role::find($roleID)[0]->name);
        // $roleName = Role::find($roleID)->name;
        $roleIDs = $request->roles;
        $roles = [];
        if($roleIDs)
       {
        foreach ($roleIDs as $roleID) {
            $roles[] = Role::find($roleID)->name;
        }
        $user->assignRole($roles);
        Splade::toast('User updated Sucessfully ')->autoDismiss(3);
       }
       else{
        $fetchRoles = $user->getRoleNames();
        foreach($fetchRoles as $fetchRole){
            $user->removeRole($fetchRole);
        }
        Splade::toast('User updated Sucessfully ')->autoDismiss(3);

       }


        // $role = $request->input('roles');
     
        return back();
        // dd($request->all(),$user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // $fetchRoles = $user->getRoleNames();
        // dd($fetchRoles);
        //
    }
    
    // public function resetRoles(User $user)
    // {
    //     $fetchRoles = $user->getRoleNames();
    //     foreach($fetchRoles as $fetchRole){
    //         $user->removeRole($fetchRole);
    //     }
    //     Splade::toast('Roles sucessfully Reset ')->autoDismiss(3);
    //     // dd($fetchRoles);
    //     //
    // }

}
