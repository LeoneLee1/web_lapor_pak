<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Laporan;
use App\Models\Category;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RiwayatPerkembangan;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index(){
        $categories = Category::all();
        
        $laporan = DB::table('laporans as a')
                    ->select('a.*', 'b.status')
                    ->leftJoin('progress as b', function ($join){
                        $join->on('b.laporans_id', '=', 'a.id')
                        ->where('b.id', '=', DB::raw('(SELECT MAX(id) FROM progress WHERE laporans_id = a.id)'));
                    })
                    ->orderByDesc('a.id')
                    ->get();
        
        $lingkungan = DB::table('laporans as a')
                    ->select('a.*', 'b.status')
                    ->leftJoin('progress as b', function ($join){
                        $join->on('b.laporans_id', '=', 'a.id')
                        ->where('b.id', '=', DB::raw('(SELECT MAX(id) FROM progress WHERE laporans_id = a.id)'));
                    })
                    ->where('a.categories_id', '=', 1)
                    ->orderByDesc('a.id')
                    ->get();

        $keamanan = DB::table('laporans as a')
                    ->select('a.*', 'b.status')
                    ->leftJoin('progress as b', function ($join){
                        $join->on('b.laporans_id', '=', 'a.id')
                        ->where('b.id', '=', DB::raw('(SELECT MAX(id) FROM progress where laporans_id = a.id)'));
                    })
                    ->where('a.categories_id', '=', 2)
                    ->orderByDesc('a.id')
                    ->get();
        
        $infrastruktur = DB::table('laporans as a')
                        ->select('a.*', 'b.status')
                        ->leftJoin('progress as b', function ($join){
                            $join->on('b.laporans_id', '=', 'a.id')
                            ->where('b.id', '=', DB::raw('(SELECT MAX(id) FROM progress where laporans_id = a.id)'));
                        })
                        ->where('a.categories_id', '=', 3)
                        ->orderByDesc('a.id')
                        ->get();

        $kesehatan = DB::table('laporans as a')
                    ->select('a.*', 'b.status')
                    ->leftJoin('progress as b', function ($join){
                        $join->on('b.laporans_id', '=', 'a.id')
                        ->where('b.id', '=', DB::raw('(SELECT MAX(id) FROM progress where laporans_id = a.id)'));
                    })
                    ->where('a.categories_id', '=', 4)
                    ->orderByDesc('a.id')
                    ->get();

        return view('Pages.beranda.index',compact('categories','laporan','lingkungan','keamanan','infrastruktur','kesehatan'));
    }

    public function laporanmu(){

        $authCheck = Auth::check();

        $idAuth = Auth::user()->id;

        if (!$authCheck) {
            return redirect()->route('login');
        }

        $terkirim = DB::table('laporans as a')
                    ->select('a.*', 'b.status', 'c.name as kategori', 'b.deskripsi')
                    ->leftJoin('progress as b', function ($join){
                        $join->on('b.laporans_id', '=', 'a.id')
                        ->where('b.id', '=', DB::raw('(SELECT MAX(id) FROM progress where laporans_id = a.id)'));
                    })
                    ->where('b.status', '=', 'Delivered')
                    ->leftJoin('categories as c', 'c.id', '=', 'a.categories_id')
                    ->where('a.users_id', '=', $idAuth)
                    ->orderByDesc('a.id')
                    ->get();
        
        $diproses = DB::table('laporans as a')
                    ->select('a.*', 'b.status', 'c.name as kategori', 'b.deskripsi')
                    ->leftJoin('progress as b', function ($join){
                        $join->on('b.laporans_id', '=', 'a.id')
                        ->where('b.id', '=', DB::raw('(SELECT MAX(id) FROM progress where laporans_id = a.id)'));
                    })
                    ->where('b.status', '=', 'In Process')
                    ->leftJoin('categories as c', 'c.id', '=', 'a.categories_id')
                    ->where('a.users_id', '=', $idAuth)
                    ->orderByDesc('a.id')
                    ->get();

        $selesai = DB::table('laporans as a')
                    ->select('a.*', 'b.status', 'c.name as kategori', 'b.deskripsi')
                    ->leftJoin('progress as b', function ($join){
                        $join->on('b.laporans_id', '=', 'a.id')
                        ->where('b.id', '=', DB::raw('(SELECT MAX(id) FROM progress where laporans_id = a.id)'));
                    })
                    ->where('b.status', '=', 'Complete')
                    ->leftJoin('categories as c', 'c.id', '=', 'a.categories_id')
                    ->where('a.users_id', '=', $idAuth)
                    ->orderByDesc('a.id')
                    ->get();

        $ditolak = DB::table('laporans as a')
                    ->select('a.*', 'b.status', 'c.name as kategori', 'b.deskripsi')
                    ->leftJoin('progress as b', function ($join){
                        $join->on('b.laporans_id', '=', 'a.id')
                        ->where('b.id', '=', DB::raw('(SELECT MAX(id) FROM progress where laporans_id = a.id)'));
                    })
                    ->where('b.status', '=', 'Rejected')
                    ->leftJoin('categories as c', 'c.id', '=', 'a.categories_id')
                    ->where('a.users_id', '=', $idAuth)
                    ->orderByDesc('a.id')
                    ->get();
        
        $lastest = RiwayatPerkembangan::all();

        return view('Pages.Laporanmu.index',compact('terkirim','diproses','selesai','ditolak','lastest'));
    }

    public function camera(){
        return view('Pages.Camera.index');
    }

    public function chat(){
        return view('Pages.Chat.index');
    }
}
