<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BarangController extends Controller
{
    public function index()
    {
        return view('barang.index');
    }

    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $data = Barang::select([
                'id',
                'kode_barang',
                'nama_barang',
                'harga_beli',
                'harga_jual',
                'harga_member',
                'grosir1',
                'grosir2',
                'grosir3',
                'user',
            ]);

            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        abort(403, 'Unauthorized');
    }
}
