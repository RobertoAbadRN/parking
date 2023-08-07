<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\FormRoleEditRequest;
use App\Http\Requests\FormRoleCreateRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index(Request $request)
    {
        if ($request->ajax()) {
            $role = DB::table('roles')->select('id', 'name', 'description')->get();

            return Datatables::of($role)
                    ->addIndexColumn()
                    ->addColumn('action', function($role){
                        $btn = '';
                        if(auth()->user()->can('edit-role')){
                            $btn .= '<a href="'.route('roles.edit',['role' => $role->id]).'" data-toggle="tooltip" data-placement="right" title="Editar"  data-id="'.$role->id.'" id="edit_'.$role->id.'" class="btn btn-primary btn-xs mr-1 editRole">
                                            <i class="ti-pencil"></i>
                                    </a>';
                        }
                        if(auth()->user()->can('show-role')){
                            $btn .= '<a href="'.route('roles.show',['role' => $role->id]).'" data-toggle="tooltip" data-placement="right" title="Detalles"  data-id="'.$role->id.'" id="det_'.$role->id.'" class="btn btn-info btn-xs  mr-1 detailRole">
                                        <i class="ti-search"></i>
                                    </a>';
                        }
                        if(auth()->user()->can('delete-role')){
                            $btn .= '<a href="javascript:void(0)" data-toggle="tooltip" data-placement="right" title="Eliminar"  data-url="'.route('roles.destroy',['role' => $role->id]).'" class="btn btn-danger btn-xs deleteRole">
                                            <i class="ti-trash"></i>
                                    </a>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('panel.roles.index', ['title' => 'Roles']);
    }*/

    public function index()
    {
       $roles = Role::all();

        return view('roles.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create', ['permissions' => Permission::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *///FormRoleCreateRequest
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'access_level' => 'required',
        ]);

        $store = Role::create(['name' => $request->name])->syncPermissions($request->access_level);

        if($store)
            return redirect()->route('roles.index')->with('success_message', 'Role created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $syncPermissions = DB::table('role_has_permissions')->select('permission_id')->where('role_id',  $id)->pluck('permission_id')->toArray();
        return view('panel.roles.show', [ 'permissions' => Permission::whereIn('id', $syncPermissions)->get(), 'role' => Role::findOrFail($id), 'syncPermissions' => $syncPermissions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $syncPermissions = DB::table('role_has_permissions')->select('permission_id')->where('role_id',  $id)->pluck('permission_id')->toArray();
        return view('roles.edit', ['permissions' => Permission::all(), 'role' => Role::findOrFail($id), 'syncPermissions' => $syncPermissions]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'access_level' => 'required',
        ]);

        $role = Role::findOrFail($role->id);

        $update = $role->update([
            'name'         => $request->name,
        ]);
        $role->syncPermissions($request->access_level, true);
        if($update)
            return redirect()->route('roles.index')->with('success_message', 'Role updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\Request::wantsJson()){
            $role = Role::findOrFail($id);
            $delete = $role->delete();
            if ($delete) {
                return response()->json(['success' => true, 'message' => 'Role eliminado exitosamente.'], 200);
            } else {
                return response()->json(['error' => true, 'message' => 'El Role no se elimino correctamente. Intente mas tarde.'], 403);
            }
        }
        abort(404);
    }
}
