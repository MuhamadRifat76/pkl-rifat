<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\tag;
use Session;
use Auth;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = tag::all();

        // Tanda '!' bisa diganti dengan 'is_null' dengan tambahan simbol dan variabel '($tag)' setelahnya.
        if (count($tag) <= 0) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'tag tidak ditemukan!'
            ];
            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'tag ditemukan!'
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
            'nama_tag' => 'required |unique:tags'
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

        $tag   = new tag();
        $tag->nama_tag = $request->nama_tag;
        $tag->slug = str_slug($request->nama_tag, '-');
        $tag->save();
        //4. buat fungsi untuk menghandle semua inputan->masukan ke table
        $tag = tag::create($input);

        //5. menampilkan response
        $response = [
            'success' => true,
            'data' => $tag,
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
        $tag = tag::find($id);
        // $input = $request->all();
        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'tag tidak ditemukan!'
            ];
            return response()->json($response, 404);
        }

        $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'Berhasil!'
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
        $tag = tag::find($id);
        $input = $request->all();

        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'tag tidak ditemukan!'
            ];
            return response()->json($response, 404);
        }

        $validator = Validator::make($input, [
            'nama_tag_tag' => 'required | min:1'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error',
                'message' => $validator->errors()
            ];
            return response()->json($response, 500);
        }

        $tag->nama_tag_tag = $input['nama_tag_tag'];
        $tag->slug = $input['slug'];
        $tag->save();

        $response = [
            'success' => true,
            'data' => $tag,
            'message' => 'Berhasil!'
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
        $tag = tag::find($id);

        if (!$tag) {
            $response = [
                'success' => false,
                'data' => 'Gagal menghapus!.',
                'message' => 'tag tidak ditemukan!'
            ];
            return response()->json($response, 404);
        }

        $tag->delete();
        $response = [
            'success' => true,
            'data' => $tag,
            'message' => $tag->nama_tag_tag . 'tag berhasil dihapus!'
        ];
        return response()->json($response, 200);
    }
}
