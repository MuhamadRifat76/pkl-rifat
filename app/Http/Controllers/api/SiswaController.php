<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Siswa = Siswa::all();
        if (!$Siswa) {
            $response = [
                'success' => false,
                'data' => ' Empty ',
                ' message' => 'Siswa. tidak ditemukan.'
            ];
            return response()->json($response,  404);
        }

        $response = [
            'success' => true,
            ' data ' =>  $Siswa,
            ' message' =>     'Berhasil .'
        ];

        return response()->json($response, 200);
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
        $Siswa = Siswa::Find();
        if (!$Siswa) {
            $response = [
                'success' => false,
                'data' => ' Empty ',
                ' message' => 'Siswa. tidak ditemukan.'
            ];
            return response()->json($response,  404);
        }

        $response = [
            'success' => true,
            ' data ' =>  $Siswa,
            ' message' =>     'Berhasil .'
        ];

        return response()->json($response, 200);
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
