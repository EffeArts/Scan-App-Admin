<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\User;

class ScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_role = Auth::user()->role_id;

        if($user_role == 1){
            $scans = DB::table('scans')
            ->join('devices', 'scans.devices_id', '=', 'devices.id')
            ->select('scans.*', 'devices.device_name')
            ->paginate(5);
        }
        else{
            $assoc_device = Auth::user()->device_id;

            $scans = DB::table('scans')
            ->join('devices', 'scans.devices_id', '=', 'devices.id')
            ->select('scans.*', 'devices.device_name')
            ->where('devices_id', $assoc_device)
            ->paginate(5);
        }
        

        return view('scans.index', ['scans' => $scans]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
