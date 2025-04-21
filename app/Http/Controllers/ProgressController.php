<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Progress;
use Illuminate\Http\Request;
use App\Models\RiwayatPerkembangan;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class ProgressController extends Controller
{
    public function progress_json($id){
        $data = Progress::where('laporans_id',$id)->orderByDesc('id');

        return DataTables::of($data)
        ->addIndexColumn()
        ->make(true);
    }

    public function create($kode){

        $kode = Laporan::where('kode_laporan',$kode)->first();

        return view('admin.progress.create',compact('kode'));
    }

    public function insert(Request $request){
        $request->validate([
            'status' => 'required',
            'deskripsi' => 'required',
        ]);

        $progress = new Progress();
        $progress->status = $request->status;
        $progress->deskripsi = $request->deskripsi;
        $progress->laporans_id = $request->id;

        if (!File::exists(public_path('progress'))) {
            File::makeDirectory(public_path('progress'), 0755, true, true);
        }
        
        if ($request->hasFile('bukti')) {
            $fileName = time() . '.' . $request->bukti->extension();
            $request->bukti->move(public_path('progress'), $fileName);
            $progress->bukti = $fileName;
        }

        if ($progress->save()) {
            $lastest = new RiwayatPerkembangan();
            $lastest->activity = $progress->deskripsi;
            $lastest->progress_id = $progress->id;
            $lastest->laporans_id = $progress->laporans_id;
            toast('Berhasil membuat progress','success');
            return redirect()->back();
        } else {
            toast('Gagal membuat progress','error');
            return redirect()->back();
        }
        
    }

    public function edit($id){
        $progress = Progress::findOrFail($id);

        $kode = Laporan::findOrFail($progress->laporans_id);

        return view('admin.progress.edit',compact('progress','kode'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'status' => 'required',
            'deskripsi' => 'required',
        ]);

        $progress = Progress::findOrFail($id);

        $progress->status = $request->status;
        $progress->deskripsi = $request->deskripsi;
        $progress->laporans_id = $request->id;

        if (!File::exists(public_path('progress'))) {
            File::makeDirectory(public_path('progress'), 0755, true, true);
        }
        
        if ($request->hasFile('bukti')) {

            if ($progress->bukti) {
                $oldFilePath = public_path('progress/' . $progress->bukti);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $fileName = time() . '.' . $request->bukti->extension();
            $request->bukti->move(public_path('progress'), $fileName);
            $progress->bukti = $fileName;
        }

        if ($progress->save()) {
            toast('Berhasil mengubah progress','success');
            $previousUrl = url()->previous();
            session()->put('previousUrl', $previousUrl);
            return redirect()->back();
        } else {
            toast('Gagal mengubah progress','error');
            return redirect()->back();
        }
    }

    public function delete($id){
        $data = Progress::findOrFail($id);

        if ($data->bukti) {
            $oldFilePath = public_path('progress/' . $data->bukti);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        if ($data->save()) {
            toast('Berhasil menghapus progress','success');
            return redirect()->route('data_laporan');
        } else {
            toast('Gagal menghapus progress','error');
            return redirect()->back();
        }
        
    }
}
