<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Profile;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.profile')->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
            'name'          =>  'required',
            'email'         =>  'required|email',
            'alamat'        =>  'required',
            'kota'          =>  'required',
            'noktp'         =>  'required',
            'kodepos'       =>  'required|min:5|max:5',
            'namaktp'       =>  'required',
            'fotoprofil'    =>  'image|max:1000'
      ]);

      $user = Auth::user();

      $fotoprofil         =   $request->fotoprofil;
      $foto_new_name      =   time() . $fotoprofil->getClientOriginalName();
      $fotoprofil->move('uploads/avatars', $foto_new_name);

      $profil = Profile::create([
          'fotoprofil'  =>    'uploads/avatars/'. $foto_new_name,
          'user_id'     =>    $user->id
      ]);

      $user->name                     = $request->name;
      $user->email                    = $request->email;
      $user->profile->alamat          = $request->alamat;
      $user->profile->kota            = $request->kota;
      $user->profile->kodepos         = $request->kodepos;
      $user->profile->jeniskelamin    = $request->jeniskelamin;
      $user->profile->noktp           = $request->noktp;
      $user->profile->namaktp         = $request->namaktp;

      $user->save();
      $user->profile->save();

      if($request->has('password'))
      {
          $user->password = bcrypt($request->password);
          $user->save();
      }

      Session::flash('success', 'Berhasil mengupdate Profil');
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
              'name'          =>  'required',
              'email'         =>  'required|email',
              'alamat'        =>  'required',
              'kota'          =>  'required',
              'noktp'         =>  'required',
              'kodepos'       =>  'required|min:5|max:5',
              'namaktp'       =>  'required',
              'fotoprofil'    =>  'image|max:1000'
        ]);

        $user = Auth::user();

        if($request->hasFile('fotoprofil'))
        {
            $fotoprofil       = $request->fotoprofil;
            $foto_new_name    = time() . $fotoprofil->getClientOriginalName();
            $fotoprofil->move('uploads/avatars', $foto_new_name);
            $user->profile->fotoprofil = 'uploads/avatars/'. $foto_new_name;

            $user->profile->save();
        }

        $user->name                     = $request->name;
        $user->email                    = $request->email;
        $user->profile->alamat          = $request->alamat;
        $user->profile->kota            = $request->kota;
        $user->profile->kodepos         = $request->kodepos;
        $user->profile->jeniskelamin    = $request->jeniskelamin;
        $user->profile->noktp           = $request->noktp;
        $user->profile->namaktp         = $request->namaktp;

        $user->save();
        $user->profile->save();

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
            $user->save();
        }

        Session::flash('success', 'Berhasil mengupdate Profil');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
