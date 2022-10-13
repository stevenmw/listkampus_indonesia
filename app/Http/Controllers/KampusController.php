<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Kampus;
use Illuminate\Http\Request;
use App\Helpers\ApiFormatter;

class KampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kampus::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
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
            $validatedAccount = $request->validate([
                'nama' => 'required|max:255',
                'jenis' => 'required',
                'status' => 'required',
                'akreditasi' => 'required',
                'nomor_telp' => 'required',
                'fax' => 'required',
                // 'followed' => 'required',
            ]);

            $kampus = Kampus::create($validatedAccount);

            $data = Kampus::where('id', '=', $kampus->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kampus  $kampus
     * @return \Illuminate\Http\Response
     */

    public function searchByNama($nama)
    {
        $data = Kampus::where('nama', 'LIKE', '%' . $nama . '%')->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    public function show($followed)
    {
        $data = Kampus::where('followed', '=', $followed)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Failed');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kampus  $kampus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kampus $kampus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kampus  $kampus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kampus $kampus)
    {
        //
    }
}
