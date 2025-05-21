<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Laporan;
use App\Models\Category;
use App\Models\Progress;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RiwayatPerkembangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

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

        $categories = Category::all();

        return view('Pages.Camera.index',compact('categories'));
    }

    public function laporkan(Request $request){

        $request->validate([
            'judul' => 'required|string',
            'kategori' => 'required|string',
            'deskripsi' => 'required|string',
            'bukti' => 'required|image',
            'alamat' => 'required|string',
        ]);

        $randomNumber = Str::random(6);

        $categories = Category::where('name',$request->kategori)->first();

        $laporan = new Laporan();
        $laporan->kode_laporan = "LAPOR$randomNumber";
        $laporan->pelapor = Auth::user()->name;
        $laporan->judul = $request->judul;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->latitude = $request->latitude;
        $laporan->longitude = $request->longitude;
        $laporan->alamat = $request->alamat;
        $laporan->users_id = Auth::user()->id;
        $laporan->categories_id = $categories->id;

        if (!File::exists(public_path('bukti_laporan'))) {
            File::makeDirectory(public_path('bukti_laporan'), 0755, true, true);
        }

        if ($request->hasFile('bukti')) {
            $fileName = time() . '.' . $request->bukti->extension();
            $request->bukti->move(public_path('bukti_laporan'), $fileName);
            $laporan->bukti = $fileName;
        }

        if ($laporan->save()) {

            $delivered = new Progress();
            $delivered->status = 'Delivered';
            $delivered->deskripsi = 'Laporan terkirim';
            $delivered->laporans_id = $laporan->id;
            $delivered->save();

            $lastest = new RiwayatPerkembangan();
            $lastest->activity = 'Laporan terkirim';
            $lastest->progress_id = $delivered->id;
            $lastest->laporans_id = $laporan->id;
            $lastest->save();

            return view('Pages.Camera.success-message');
        } else {
            toast('Gagal membuat laporan','error');
            return redirect()->back();
        }
    }

    public function chat(){
        return view('Pages.Chat.index');
    }
}
