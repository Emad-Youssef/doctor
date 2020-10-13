<?php

namespace App\Http\Controllers\Dashboard;

use App\Admin;
use App\DataTables\AdminDatatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:read_admins'])->only('index');
        $this->middleware(['permission:create_admins'])->only('create');
        $this->middleware(['permission:update_admins'])->only('edit');
        $this->middleware(['permission:delete_admins'])->only('destroy');

    }//end of constructor
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminDatatables $admin)
    {
        return $admin->render('dashboard.admins.index',['title' => 'adminControl']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.admins.create',['title' => 'create_admin']);
    }

    /**
     * Store a newly created resource in storage.
     *sss
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'          => 'required|string|max:30',
            'email'         => 'required|email|unique:admins|max:40',
            'password'      => 'required|confirmed|string|min:4',
            'permissions'   => 'required'
        ],[],[
            'permissions'   => trans('site.permissions')
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 0,
                'message' => $validator->errors()
            ]);

            }else {
            $admin = new Admin;
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);

            $admin->save();
            $admin->attachRole('admin');
            $admin->syncPermissions($request->permissions);
            return response()->json([
                'status'  => 1,
                'message' => trans('site.doneAdd'),
            ]);

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = Admin::find($id);

        return view ('dashboard.admins.profile', ['title' => 'profile', 'admin' => $admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('dashboard.admins.edit',['title' => 'edit_admin', 'admin' => $admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'name'          => 'required|string|max:30',
            'email'         => [
                'nullable',
                'max:50',
                'email',
                Rule::unique('admins', 'email')->ignore($id)
                ],
            'password'      => 'nullable|confirmed|string|min:4',
            'permissions'   => 'required'
        ],[],[
            'permissions'   => trans('site.permissions')
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 0,
                'message'   => $validator->errors()
            ]);
        }
        $admin = Admin::find($id);
        $admin->fill($request->all());
        if($request->has('password')){
         $admin->password = bcrypt($request->password);
        }
        $admin->save();

        $admin->syncPermissions($request->permissions);

        return response()->json([
            'status'    => 1,
            'message'   => trans('site.updeted_done')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admins = Admin::find($id)->delete();

        if($admins) {
            return response()->json(['status'  => 1,'message' => trans('site.doneDelete')]);
        } else{
            return response()->json(['status'  => 0,'message' => trans('site.error')]);
        }
    }

    public function destroyAll(Request $request)
    {
        if(is_array(Request('item'))){
            $admins = Admin::destroy(Request('item'));
            return response()->json([
                'status'  => 1,
                'message' => trans('site.doneDelete')
                ]);
        }
    }

    public function profile(Request $request,$id)
    {
        $validator = Validator::make($request->all(),[
            'name'          => 'required|string|max:30',
            'email'         => [
                'required',
                'max:50',
                'email',
                Rule::unique('admins', 'email')->ignore($id)
                ],
            'password'      => 'nullable|confirmed|string|min:4',
        ]);

        if($validator->fails()) {
            return response()->json([
                'status'    => 0,
                'message'   => $validator->errors()
            ]);
        }
        $admin = Admin::find($id);
        $admin->fill($request->all());
        if($request->has('password')){
         $admin->password = bcrypt($request->password);
        }
        $admin->save();


        return response()->json([
            'status'    => 1,
            'message'   => trans('site.updeted_done')
        ]);

    }
}
