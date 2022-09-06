<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        return response()->json(
            [
                "status" => "success",
                "data" => [
                    $product
                ]
            ]
        );
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
        try {
            $request->validate(
                [
                    "foto" => "file|max:3072",
                    "nama" => "required",
                    "kode" => "required",
                    "unit" => "required",
                    "deskripsi" => "required",
                    "switch_pembelian" => "required",
                    "switch_penjualan" => "required",
                ]
            );
            $product = new Product();
            $filename = "";
            $product->foto = $filename;
            if ($request->hasFile('foto')) {
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->storeAs('/galeri', $filename);

                $product->foto = url('storage/galeri/' . $filename);
            }
            $product->nama = $request->nama;
            $product->kode = $request->kode;
            $product->unit = $request->unit;
            $product->deskripsi = $request->deskripsi;
            $product->switch_pembelian = $request->switch_pembelian;
            $product->switch_penjualan = $request->switch_penjualan;
            $product->save();

            return response()->json([
                'data' => $product
            ], 202);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e
            ], 422);
        }
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
