<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function data_laporan_json(){
        $data = Laporan::orderBy('id','desc')->get();

        return DataTables::of($data)
        ->addIndexColumn()
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
            toast('Berhasil membuat laporan','success');
            return redirect()->route('data_laporan');
        } else {
            toast('Gagal membuat laporan','error');
            return redirect()->back();
        }
    }

    public function edit($id){
        $kategori = Category::findOrFail($id);

        return view('admin.kategori.edit',compact('kategori'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255',
        ]);

        $kategori = Category::findOrFail($id);
        $kategori->name = $request->name;

        if (!File::exists(public_path('icon'))) {
            File::makeDirectory(public_path('icon'), 0755, true, true);
        }
        
        if ($request->hasFile('icon')) {

            if ($kategori->icon) {
                $oldFilePath = public_path('icon/' . $kategori->icon);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $fileName = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('icon'), $fileName);
            $kategori->icon = $fileName;
        }

        if ($kategori->save()) {
            toast('Berhasil Menambah Data','success');
            return redirect()->route('data_kategori_laporan');
        } else {
            toast('Gagal Menambah Data','error');
            return redirect()->back();
        }
    }
    
    public function show($id){
        $data = Category::findOrFail($id);

        return view('admin.kategori.show',compact('data'));
    }

    public function delete($id){
        $data = Category::findOrFail($id);

        if ($data->icon) {
            $oldFilePath = public_path('icon/' . $data->icon);
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
