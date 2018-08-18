<?php

namespace App\Http\Controllers\Api\Server;

use App\Models\Server\Ftp;
use Illuminate\Http\Request;

// ## 文件传输协议 File Transport Protocol
class FTPController extends Controller
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
     * @param  \App\Models\Server\Ftp  $ftp
     * @return \Illuminate\Http\Response
     */
    public function show(Ftp $ftp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Server\Ftp  $ftp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ftp $ftp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Server\Ftp  $ftp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ftp $ftp)
    {
        //
    }
}
