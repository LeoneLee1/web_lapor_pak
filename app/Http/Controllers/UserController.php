<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function data_masyarakat_json(){
        $data = User::orderBy('id','desc')->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function data_masyarakat(){

        $title = 'Delete User?';
        $text = 'Are you sure you want to delete?';
        confirmDelete($title,$text);

        return view('admin.users.data_masyarakat');
    }

    public function create(){
        return view('admin.users.create');
    }

    public function insert(Request $request){
        $request->validate([
            'email' => 'required|max:255',
            'name' => 'required|max:255',
            'password' => 'required|max:255',
            'avatar' => 'nullable|image',
            'role' => 'required',
        ]);

        $user = new User();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->role = $request->role;

        if (!File::exists(public_path('avatar'))) {
            File::makeDirectory(public_path('avatar'), 0755, true, true);
        }
        
        if ($request->hasFile('avatar')) {
            $fileName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatar'), $fileName);
            $user->avatar = $fileName;
        }

        if ($user->save()) {
            toast('Berhasil Menambah Data','success');
            return redirect()->route('data_masyarakat');
        } else {
            toast('Gagal Menambah Data','error');
            return redirect()->back();
        }
    }

    
    public function edit($id){
        $user = User::findOrFail($id);

        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:255',
            'password' => 'nullable|max:255',
            'role' => 'required',
            'avatar' => 'nullable|image',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->role = $request->role;

        if ($request->password === '' || $request->password === null) {
            //
        } else {            
            $user->password = bcrypt($request->password);
        }

        if (!File::exists(public_path('avatar'))) {
            File::makeDirectory(public_path('avatar'), 0755, true, true);
        }
        
        if ($request->hasFile('avatar')) {

            if ($user->avatar) {
                $oldFilePath = public_path('avatar/' . $user->avatar);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $fileName = time() . '.' . $request->avatar->extension();
            $request->avatar->move(public_path('avatar'), $fileName);
            $user->avatar = $fileName;
        }

        if ($user->save()) {
            toast('Berhasil Menambah Data','success');
            return redirect()->route('data_masyarakat');
        } else {
            toast('Gagal Menambah Data','error');
            return redirect()->back();
        }
    }
    
    public function show($id){
        $data = User::findOrFail($id);

        return view('admin.users.show',compact('data'));
    }

    public function delete($id){
        $data = User::findOrFail($id);

        if ($data->avatar) {
            $oldFilePath = public_path('avatar/' . $data->avatar);
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
