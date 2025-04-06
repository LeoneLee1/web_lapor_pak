<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Mail\VerificationCodeMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function index(){
        $pelapor = Auth::user()->name;

        $aktif = Laporan::where('pelapor', Auth::user()->name)->count();

        $done = DB::select("SELECT COUNT(STATUS) AS proses FROM progress
                            LEFT JOIN laporans ON laporans.id = progress.laporans_id
                            WHERE STATUS = 'Complete' AND laporans.pelapor = '$pelapor';");

        foreach ($done as $key => $item) {
            $selesai = $item->proses;
        }

        return view('Pages.Profile.index',compact('aktif','selesai'));
    }

    public function settings($id){
        $user = User::findOrFail($id);

        return view('Pages.Profile.settings',compact('user'));
    }

    public function update_settings(Request $request, $id){
        $request->validate([
            'name' => 'string|max:255',
            'avatar' => 'image',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;

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
            toast('Berhasil Mengubah Data','success');
            return redirect()->route('profile');
        } else {
            toast('Gagal Mengubah Data','error');
            return redirect()->back();
        }
    }
}
