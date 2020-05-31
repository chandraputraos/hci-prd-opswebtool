<?php

namespace App\Http\Controllers;

use App\Clientzone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Clientzone::latest()->get();
        return response([
            'success' => true,
            'message' => 'List Semua Contract',
            'data' => $posts
        ], 200);
    }

    public function store(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'contract'     => 'required',         
        ],
            [
                'contract.required' => 'Masukkan Contract !',
              
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Contractnya gan..!',
                'data'    => $validator->errors()
            ],400);

        } else {

            $post = Clientzone::create([
                'contract'     => $request->input('contract'),
                
            ]);


            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Contract Berhasil Disimpan!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Contract Gagal Disimpan!',
                ], 400);
            }
        }
    }


    public function show($id)
    {
        $post = Clientzone::whereId($id)->first();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Detail Post!',
                'data'    => $post
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Tidak Ditemukan!',
                'data'    => ''
            ], 404);
        }
    }

    public function update(Request $request)
    {
        //validate data
        $validator = Validator::make($request->all(), [
            'contract'     => 'required',
           
        ],
            [
                'title.required' => 'Masukkan Title Post !',
                'content.required' => 'Masukkan Content Post !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Isi Bidang Yang Kosong',
                'data'    => $validator->errors()
            ],400);

        } else {

            $post = clientzone::whereId($request->input('id'))->update([
                'contract'     => $request->input('contract'),
               
            ]);


            if ($post) {
                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Diupdate!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Diupdate!',
                ], 500);
            }

        }

    }

    public function destroy($id)
    {
        $post = Clientzone::findOrFail($id);
        $post->delete();

        if ($post) {
            return response()->json([
                'success' => true,
                'message' => 'Post Berhasil Dihapus!',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Dihapus!',
            ], 500);
        }

    }
}