<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;

class UserController extends Controller
{
    public function setting_profile($id){
        $data = [
            'title' => 'Pengaturan Profil',
            'user' => User::find($id),
            'profile' => Profile::where('id_user',$id)->first()
        ];

        return view('backend.pages.setting.profile',$data);
    }

    public function store_profile(Request $request,$id){
        $validated = $request->validate([
            'username'=>'required',
            'email'=>'required|email'
        ]);
        $user = User::find($id);
        $data = Profile::where('id_user',$id)->first();
        if(empty($data->gbr_profil)){
            // simpan data user
            $user->username = $validated['username'];
            $user->email = $validated['email'];
            $user->save();

            // simpan data profil user
            $profile = new Profile;
            if($request->file('img_file')){
                $path_img = $request->file('img_file')->store('profile');
                $profile->gbr_profil = $path_img;
            }else{
                $profile->gbr_profil = $request->old_img;
            }

            $profile->id_user = $id;
            $saved = $profile->save();
    
            if($saved){
                return back()->with('success','Data profil berhasil disimpan');
            }else{
                return back()->with('error','Data profil gagal disimpan');
            }

        }else{
            // simpan data user 
            $user->username = $validated['username'];
            $user->email = $validated['email'];
            $user->save();

            // simpan data profil user
            if($request->file('img_file')){
                $path_img = $request->file('img_file')->store('profile');
                $data->gbr_profil = $path_img;
            }else{
                $data->gbr_profil = $request->old_img;
            }

            $data->id_user = $id;
            $saved = $data->save();

            if($saved){
                return back()->with('success','Data profil berhasil disimpan');
            }else{
                return back()->with('error','Data profil gagal disimpan');
            }
        }
    }

    public function setting_password($id){
        $data = [
            'title' => 'Pengaturan Password',
            'user' => User::find($id)
        ];

        return view('backend.pages.setting.change-password',$data);
    }

    public function change_password(Request $request,$id){
        $validated = $request->validate([
            'old_pass' => 'required|min:6',
            'new_pass' => 'required|min:6',
        ]);

        $user = User::find($id);
        if(! Hash::check($request->old_pass,$user->password)){
            return back()->withErrors([
                'old_pass' => ['The Old password does not match our records']
            ]);
        }else if($request->pass_conf !== $request->new_pass){
            return back()->withErrors([
                'pass_conf' => ['Confirmation password must be the same as the new password']
            ]);
        }
        $user->password = Hash::make($validated['new_pass']);
        $updated = $user->save();

        if($updated){
            return back()->with('success','Ubah password berhasil disimpan');
        }else{
            return back()->with('error','Ubah password gagal disimpan');
        }
    }
}
