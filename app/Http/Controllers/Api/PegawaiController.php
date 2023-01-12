<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PegawaiResource;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
            ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
            ->select('pegawai.nip', 'pegawai.nama', 'pegawai.gender', 'jabatan.nama AS posisi',
                'divisi.nama AS bagian', 'pegawai.tmp_lahir', 'pegawai.tgl_lahir',
                'pegawai.alamat', )
            ->get();
        return new PegawaiResource(true, 'Data Pegawai', $pegawai);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|unique:pegawai|max:3',
            'nama' => 'required|max:45',
            'jabatan_id' => 'required|integer',
            'divisi_id' => 'required|integer',
            'gender' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'nullable|string|min:10',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        //cek error
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //proses menyimpan
        $pegawai = Pegawai::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'jabatan_id' => $request->jabatan_id,
            'divisi_id' => $request->divisi_id,
            'gender' => $request->gender,
            'tmp_lahir' => $request->tmp_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
        ]);

        return new PegawaiResource(true, 'Data Pegawai berhasil di input', $pegawai);

    }

    public function show($id)
    {
        //menampilkan detail data seorang pegawai
        $pegawai = Pegawai::join('jabatan', 'jabatan.id', '=', 'pegawai.jabatan_id')
            ->join('divisi', 'divisi.id', '=', 'pegawai.divisi_id')
            ->select('pegawai.nip', 'pegawai.nama', 'pegawai.gender', 'jabatan.nama AS posisi',
                'divisi.nama AS bagian', 'pegawai.tmp_lahir', 'pegawai.tgl_lahir',
                'pegawai.alamat', )
            ->where('pegawai.id', '=', $id)
            ->get();

        return new PegawaiResource(true, 'Data Pegawai', $pegawai);

        // if ($pegawai) { //jika data pegawai ditemukan
        //     return response()->json(
        //         [
        //             'success' => true,
        //             'message' => 'Detail Pegawai',
        //             'data' => $pegawai,
        //         ], 200);
        // } else { //jika data pegawai tidak ditemukan
        //     return response()->json(
        //         [
        //             'success' => false,
        //             'message' => 'Detail Pegawai Tidak ditemukan',
        //         ], 404);
        // }
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        //
    }

    public function destroy(Pegawai $pegawai)
    {
        //
    }
}
