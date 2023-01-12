<?php
namespace App\Http\Controllers;
use App\Models\Pegawai;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $ar_kekayaan = DB::table('pegawai')->select('nama','kekayaan')->get();
        $ar_gender = DB::table('pegawai')
                ->selectRaw('gender, count(gender) as jumlah')
                ->groupBy('gender')
                ->get();
        return view('dashboard.index', compact('ar_kekayaan','ar_gender'));
    }
}

