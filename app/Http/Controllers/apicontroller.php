<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangModel;

class apicontroller extends Controller
{
    public function get_all()
    {
        return response()->json(BarangModel::all(), 200);
    }

    public function insert_data(request $request)
    {
        //$insert_barang = 0;
        $insert_barang = new BarangModel();
        $insert_barang->nama_barang = $request->namabarang;
        $insert_barang->jumlah_barang = $request->jumlahbarang;
        $insert_barang->save();

        return response([
            'status' => 'Sukses',
            'message' => 'Barang Disimpan',
            'data' => $insert_barang
        ], 200);
    }

    public function update_data(request $request, $id)
    {
        $check_barang = BarangModel::firstWhere('kode_barang', $id);
        if ($check_barang) {
            //echo 'data yang anda cari tersedia';
            $edit_barang = BarangModel::find($id);
            $edit_barang->nama_barang = $request->namabarang;
            $edit_barang->jumlah_barang = $request->jumlahbarang;
            $edit_barang->save();
            return response([
                'status' => 'Sukses',
                'message' => 'Barang Diubah',
                'update-data' => $edit_barang
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Barang Tidak Ditemukan'
            ], 404);
        }
    }

    public function get_id(request $request, $id)
    {
        $check_barang = BarangModel::firstWhere('kode_barang', $id);
        if ($check_barang) {
            //echo 'data yang anda cari tersedia';
            $edit_barang = BarangModel::find($id);
            return response([
                'data' => $edit_barang
            ], 200);
        } else {
            return response([
                'status' => 'Not Found',
                'message' => 'Barang Tidak Ditemukan'
            ], 404);
        }
    }

    public function delete_barang($id)
    {
        $check_barang = BarangModel::firstWhere('kode_barang', $id);
        if ($check_barang) {
            BarangModel::destroy($id);
            return response([
                'status' => true,
                'message' => 'Data Dihapus',
            ], 200);
        } else {
            return response([
                'status' => false,
                'message' => 'Kode Barang Tidak ditemukan'
            ], 404);
        }
    }
}
