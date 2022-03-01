<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
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
            $data = User::latest()->get();

            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    // Get the currently authenticated user
                    $user = Auth::user();
                    if ($user == $row) {
                        $actionBtn = '';
                    } else if ($user != "Admin") {
                        $actionBtn = '
                        <a href="/users/' . $row->user_id . '/edit" class="edit btn btn-secondary btn-sm" title="Reset Password"><span class="material-icons-outlined material-icons">restart_alt</span> Reset Password</a> 
                        <button type="button" id="btnDelete" class="delete btn btn-outline-danger btn-sm" data-id=" ' . $row->user_id . ' "><span class="material-icons-outlined material-icons">delete</span> Delete</button>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->editColumn('created_at', function ($row) {
                    //Format Date to Readable format
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('d-m-Y h:i a');
                    return $formatedDate;
                })
                ->editColumn('updated_at', function ($row) {
                     //Format Date to Readable format
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $row->updated_at)->format('d-m-Y h:i a');
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
        return view('users.edit')->with('userQuery', $userQuery);
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
        $userQuery->username = $request->input('username');
        $userQuery->idNumber = $request->input('idNumber');
        $passwords = '1';
        $userQuery->password = Hash::make($passwords);

        $userQuery->save();
        alert()->success('Success','Resetted successfully!');
        alert()->info('Password','Resetted to 1');
        return redirect('/users');
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
