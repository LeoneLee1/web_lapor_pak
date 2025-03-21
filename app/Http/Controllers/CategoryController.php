<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function data_kategori_laporan_json(){
        $data = Category::orderBy('id','desc')->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function data_kategori_laporan(){

        $title = 'Delete Data Kategori?';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title,$text);

        return view('admin.kategori.data_kategori_laporan');
    }

    public function create(){
        return view('admin.kategori.create');
    }

    public function insert(Request $request){
        $request->validate([
            'name' => 'required|max:255',
            'icon' => 'required|image',
        ]);

        $user = new Category();
        $user->name = $request->name;

        if (!File::exists(public_path('icon'))) {
            File::makeDirectory(public_path('icon'), 0755, true, true);
        }
        
        if ($request->hasFile('icon')) {
            $fileName = time() . '.' . $request->icon->extension();
            $request->icon->move(public_path('icon'), $fileName);
            $user->icon = $fileName;
        }

        if ($user->save()) {
            toast('Berhasil Menambah Data','success');
            return redirect()->route('data_kategori_laporan');
        } else {
            toast('Gagal Menambah Data','error');
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
