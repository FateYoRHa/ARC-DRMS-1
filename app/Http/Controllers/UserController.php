<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Departments;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->where('username', '!=', 'Master')->get();

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    // Get the currently authenticated user
                    $user = Auth::user();
                    if ($user == $row) {
                        $actionBtn = '';
                    } else if ($user != $row) {
                        $actionBtn = '
                        <a href="/users/' . $row->user_id . '/edit" class="edit btn btn-secondary btn-sm" title="Modify"><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><path d="M6,13c0-1.65,0.67-3.15,1.76-4.24L6.34,7.34C4.9,8.79,4,10.79,4,13c0,4.08,3.05,7.44,7,7.93v-2.02 C8.17,18.43,6,15.97,6,13z M20,13c0-4.42-3.58-8-8-8c-0.06,0-0.12,0.01-0.18,0.01l1.09-1.09L11.5,2.5L8,6l3.5,3.5l1.41-1.41 l-1.08-1.08C11.89,7.01,11.95,7,12,7c3.31,0,6,2.69,6,6c0,2.97-2.17,5.43-5,5.91v2.02C16.95,20.44,20,17.08,20,13z"/></g></g></svg> Modify</a>
                        <button type="button" id="btnDelete" class="delete btn btn-outline-danger btn-sm ml-3" data-id=" ' . $row->user_id . ' "><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#df4759"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg></button>';
                    } else if ($user->isadmin != 1) {
                        $actionBtn = '
                        <a href="/users/' . $row->user_id . '/edit" class="edit btn btn-secondary btn-sm" title="Modify"><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#FFFFFF"><g><path d="M0,0h24v24H0V0z" fill="none"/></g><g><g><path d="M6,13c0-1.65,0.67-3.15,1.76-4.24L6.34,7.34C4.9,8.79,4,10.79,4,13c0,4.08,3.05,7.44,7,7.93v-2.02 C8.17,18.43,6,15.97,6,13z M20,13c0-4.42-3.58-8-8-8c-0.06,0-0.12,0.01-0.18,0.01l1.09-1.09L11.5,2.5L8,6l3.5,3.5l1.41-1.41 l-1.08-1.08C11.89,7.01,11.95,7,12,7c3.31,0,6,2.69,6,6c0,2.97-2.17,5.43-5,5.91v2.02C16.95,20.44,20,17.08,20,13z"/></g></g></svg> Reset Password</a>
                        <button type="button" id="btnDelete" class="delete btn btn-outline-danger btn-sm" data-id=" ' . $row->user_id . ' "><svg class="material-icons" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#df4759"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16 9v10H8V9h8m-1.5-6h-5l-1 1H5v2h14V4h-3.5l-1-1zM18 7H6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7z"/></svg> Delete</button>';
                    }

                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->editColumn('created_at', function ($row) {
                    //Format Date to Readable format
                    $formatedDate = DateTime::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('d-m-Y h:i a');
                    return $formatedDate;
                })
                ->editColumn('is_admin', function ($row) {
                    //Format Date to Readable format
                    if($row->is_admin == 1){
                        $role = 'Admin';
                    }
                    else if($row->is_admin == 2){
                        $role = 'Uploader';
                    }
                    else if($row->is_admin == 3){
                        $role = $row->department . ' Dean';
                    }
                    else {
                        $role = 'Viewer';
                    }
                    return $role;
                })
                ->editColumn('updated_at', function ($row) {
                     //Format Date to Readable format
                    $formatedDate = DateTime::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d-m-Y h:i a');
                    return $formatedDate;
                })
                ->make(true);
        }
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $userQuery = User::findOrFail($user_id);
        // dd($userQuery);
        $departments = Departments::latest()->get();
        return view('users.edit', compact('departments','userQuery'))->with(['userQuery', $userQuery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $user_id)
    {
        //Find id. If none, fails.
        $userQuery = User::findOrFail($user_id);
        if($request->has('submit')){
            $userQuery->username = $request->input('username');
            $userQuery->idNumber = $request->input('idNumber');
            $userQuery->department = null;
            $passwords = '1';
            $userQuery->password = Hash::make($passwords);

            $userQuery->save();
            alert()->info('Password','Password is set to 1');
            return redirect('/users');

        } else if($request->has('admin')) {
            $userQuery->username = $request->input('username');
            $userQuery->idNumber = $request->input('idNumber');
            $userQuery->department = null;
            $role = '1';
            $userQuery->is_admin = $role;

            $userQuery->save();
            alert()->info('Role Changed','User is now ADMIN');
            return back();

        } else if($request->has('uploader')) {
            $userQuery->username = $request->input('username');
            $userQuery->idNumber = $request->input('idNumber');
            $userQuery->department =  null;
            $role = '2';
            $userQuery->is_admin = $role;

            $userQuery->save();
            alert()->info('Role Changed','User is now UPLOADER');
            return back();
        } else if($request->has('viewer')) {
            $userQuery->username = $request->input('username');
            $userQuery->idNumber = $request->input('idNumber');
            $userQuery->department =  null;
            $role = null;
            $userQuery->is_admin = $role;

            $userQuery->save();
            alert()->info('Role Changed','User is now VIEWER');
            return back();
        } else if($request->has('dean')) {

            // $user = DB::table('users')
            //     ->where('users.department' == $request->input('department'))
            //     ->get();
                // $dept = $userQuery = User::findOrFail($request->input('department'));
                // dd($dept);
            // if($user->count()>0){

            // }
            $user = User::where('department', '=', $request->input('department'))->get();

            // dd($user->count());
            if($user->count() > 0)
            {
                foreach($user as $user){
                    $name = $user->username;
                }
                alert()->info('Cannot be assigned','Department was already asigned to '. $name . '.');
                // alert()->info('error','Department was already asigned.');
                return back();
            }


            $userQuery->username = $request->input('username');
            $userQuery->idNumber = $request->input('idNumber');
            $userQuery->department = $request->input('department');
            $role = '3';
            $userQuery->is_admin = $role;
            $userQuery->save();

            alert()->info('Role Changed',$request->input('username') . ' is now '. $request->input('department') . ' DEAN');
            return back();
        } else {
            alert()->error('Error','Something Went Wrong!');
            return redirect('/users');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $users_id = $user_id;
        $recordQuery = User::findOrFail($users_id);
        $recordQuery->delete();

        return response()->json([
            'message' => 'User deleted successfully!'
        ]);
    }
}
