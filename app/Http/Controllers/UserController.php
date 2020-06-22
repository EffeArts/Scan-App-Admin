<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->join('devices', 'users.device_id', '=', 'devices.id')
            ->select('users.*', 'devices.device_name', 'roles.name as role_name')
            ->paginate(10);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->get();
        $devices = DB::table('devices')->get();
        return view('users.register')
            ->with('devices', $devices)
            ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['device_id']){
            $device_id = $request['device_id'];
        }
        else{
            $device_id = 0;
        }
        
        try{
            DB::table('users')->insertGetId(
                [
                    'name' => $request['name'], 
                    'email' => $request['email'],
                    'device_id' => $device_id,
                    'role_id' => $request['role_id'],
                    'password' => Hash::make($request['password'])
                ]
            );
        } catch(\Illuminate\Database\QueryException  $ex){
            return redirect()->back()->withErrors([$ex->getMessage()]);
        }
        
        return redirect()->back()
            ->with("success", "Admin successfully registered.");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
