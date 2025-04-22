<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Category;
use App\Models\Progress;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RiwayatPerkembangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function data_laporan_json(){

        $data = Laporan::with('category')
                ->orderBy('id', 'desc')
                ->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('kategori', function($laporan) {
            return $laporan->category->name;
        })
        ->make(true);
    }

    public function data_laporan(){

        $title = 'Delete Data Laporan?';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title,$text);
        
        return view('admin.laporan.data_laporan');
    }

    public function create(){

        $kategori = Category::all();

        return view('admin.laporan.create',compact('kategori'));
    }

    public function insert(Request $request){
        $request->validate([
            'kategori' => 'required|string',
            'judul' => 'required|string',
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

            toast('Berhasil membuat laporan','success');
            return redirect()->route('data_laporan');
        } else {
            toast('Gagal membuat laporan','error');
            return redirect()->back();
        }
    }

    public function edit($id){
        $laporan = Laporan::with('category')
                ->where('id',$id)
                ->first();

        $kategori = Category::all();

        return view('admin.laporan.edit',compact('laporan','kategori'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'judul' => 'required|string',
            'deskripsi' => 'required|string',
            'alamat' => 'required|string',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->judul = $request->judul;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->latitude = $request->latitude;
        $laporan->longitude = $request->longitude;
        $laporan->alamat = $request->alamat;

        if (!File::exists(public_path('bukti_laporan'))) {
            File::makeDirectory(public_path('bukti_laporan'), 0755, true, true);
        }
        
        if ($request->hasFile('bukti')) {

            if ($laporan->bukti) {
                $oldFilePath = public_path('bukti_laporan/' . $laporan->bukti);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $fileName = time() . '.' . $request->bukti->extension();
            $request->bukti->move(public_path('bukti_laporan'), $fileName);
            $laporan->bukti = $fileName;
        }

        if ($laporan->save()) {
            toast('Berhasil Mengubah Data','success');
            return redirect()->route('data_kategori_laporan');
        } else {
            toast('Gagal Mengubah Data','error');
            return redirect()->back();
        }
    }

    public function show($id){
        $data = Laporan::with('category')
                ->where('id',$id)
                ->first();

        return view('admin.laporan.show',compact('data'));
    }

    public function delete($id){
        $data = Laporan::findOrFail($id);

        if ($data->bukti) {
            $oldFilePath = public_path('bukti_laporan/' . $data->bukti);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
        
        if ($data->delete()) {
            toast('Berhasil Menghapus Data','success');
            return redirect()->back();
        } else {
            toast('Gagal Menghapus Data','error');
            return redirect()->back();
        }
    }

}
