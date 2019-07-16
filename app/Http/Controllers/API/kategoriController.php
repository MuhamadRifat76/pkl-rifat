<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\kategori;

class kategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kategori::all();
        if (!$kategori) {
            $response = [
                'success' => false,
                'data' => ' Empty ',
                ' message' => 'kategori. tidak ditemukan.'
            ];
            return response()->json($response,  404);
        }

        $response = [
            'success' => true,
            ' data ' =>  $kategori,
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
        //1. tampung semua inputan ke $input;
        $input = $request->all();

        //2. buat validasi ditampung ke $validator
        $validator = Validator::make($input, [
            'nama' => 'required |unique:kategoris'
        ]);

        //3. chek validasi
        if ($validator->fails()) {
            $response = [
                ' success ' => false,
                ' data' =>   'Validation   Error.',
                ' message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }

        $kategori   = new kategori();
        $kategori->nama = $request->nama;
        $kategori->slug = str_slug($request->nama, '-');
        $kategori->save();
        //4. buat fungsi untuk menghandle semua inputan->masukan ke table
        $kategori = kategori::create($input);

        //5. menampilkan response
        $response = [
            'success' => true,
            'data' => $kategori,
            ' message' => 'Data kategori berhasil disimpan.'
        ];
        //6. tampilkan hasil
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = kategori::Find($id);
        if (!$kategori) {
            $response = [
                ' success ' => false,
                ' data ' =>  '  empty ',
                'message'  => 'Si s wa tidak ditemukan.'
            ];
            return response()->json($response,  404);
        }

        $response  =  [
            'success' => true,
            ' data' => $kategori,
            ' message'  => 'Berhasil.'
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
        $kategori = kategori::Find($id);
        $input = $request->all();

        if (!$kategori) {
            $response = [
                ' success ' => false,
                ' data ' =>  '  empty ',
                'message'  => 'kategori tidak ditemukan.'
            ];
            return response()->json($response,  404);
        }

        $validator = Validator::make($input, [
            'nama' => 'required | min:10'
        ]);

        $kategori->nama = $input['nama'];
        $kategori->save();

        $response  =  [
            'success' => true,
            ' data' => $kategori,
            ' message'  => 'kategori berhasil diupdate.'
        ];
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = kategori::Find($id);

        if (!$kategori) {
            $response = [
                ' success ' => false,
                ' data ' =>  '  Gagal Update ',
                'message'  => 'kategori tidak ditemukan.'
            ];
            return response()->json($response,  404);
        }

        $kategori->delete();
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'kategori Berhasil DiHapus.'
        ];
        return response()->json($response,  200);
    }
}
