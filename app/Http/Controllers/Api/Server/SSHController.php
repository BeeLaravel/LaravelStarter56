<?php

namespace App\Http\Controllers\Api\Server;

use App\Models\Server\Ssh;
use Illuminate\Http\Request;

// ## 安全 Shell Security Shell
class SSHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
     * @param  \App\Models\Server\Ssh  $ssh
     * @return \Illuminate\Http\Response
     */
    public function show(Ssh $ssh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Server\Ssh  $ssh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ssh $ssh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Server\Ssh  $ssh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ssh $ssh)
    {
        //
    }
}
