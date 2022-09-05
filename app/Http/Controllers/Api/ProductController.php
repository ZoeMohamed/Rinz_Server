<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
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

        if ($request->hasFile('foto')) {
            // $request->validate(
            //     [
            //         "foto" => "file|max:3072",
            //         "nama" => "required",
            //         "kode" => "required",
            //         "unit" => "required",
            //         "deskripsi" => "required",
            //         "switch_pembelian" => "required",
            //         "switch_pejualan" => "required",
            //     ]
            // );

            // $product = new Product();
            $image  = $request->file('foto');
            // $image_name = $image->getClientOriginalName();
            $input = $image->store('products');

            Product::create([
                "foto" => $input,
                "nama" => $request->nama,
                "unit" => $request->unit,
                "kode" => $request->kode,
                "deskripsi" => $request->deskripsi,
                "switch_pembelian" => $request->switch_pembelian,
                "switch_penjualan" => $request->switch_penjualan
            ]);
            // $input['foto'] = $image_name;

            // $product->foto = $image_name;

            // Product::create($request->all());
        }
        // Product::create($request->all());





        // // $result = $request->file('foto')->store('storage/app/public');

        // // $request['foto'] = $result;


        // $input = $request->all();
        // Product::create($input);

        // // dd($input);
        // if ($request->hasFile('foto')) {
        //     $image  = $request->file('foto');
        //     $image_name = $image->getClientOriginalName();
        //     $input = $request->file('foto')->storeAs('/public', $image_name);
        //     $input['foto'] = $image_name;
        //     // Product::create($input);
        // }
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
