@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

      <div class="panel panel-default">
          <div class="panel-heading">
                Edit Profile
          </div>
          <div class="panel-body">

              @if($user->profile == false)
              <form action="{{ route('profile.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                              <label for="name"> Nama </label>
                              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                              <label for="email"> Email </label>
                              <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                              <label for="password"> Ubah Password </label>
                              <input type="password" name="password" class="form-control" value="{{ $user->password }}">
                        </div>
                        <div class="form-group">
                              <label for="alamat"> Alamat </label>
                              <input type="text" name="alamat" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="kota"> Kota </label>
                              <input type="text" name="kota" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="kodepos"> Kodepos </label>
                              <input type="number" name="kodepos" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="jeniskelamin"> Jenis Kelamin </label>
                              <select name="jeniskelamin" id="jeniskelamin" class="form-control">
                                  <option> Laki-laki </option>
                                  <option> Perempuan </option>
                              </select>
                        </div>
                        <div class="form-group">
                              <label for="noktp"> No KTP </label>
                              <input type="number" name="noktp" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="namaktp"> Nama KTP </label>
                              <input type="text" name="namaktp" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="fotoprofil"> Foto Profil </label>
                              <input type="file" name="fotoprofil" class="form-control">
                        </div>
                        <div class="form-group">
                              <div class="text-center">
                                  <button class="btn btn-success" type="submit"> Simpan Profil </button>
                              </div>
                        </div>
              </form>
              @else
              <form action="{{ route('profile.update')}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                              <label for="name"> Nama </label>
                              <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                              <label for="email"> Email </label>
                              <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                              <label for="password"> Password </label>
                              <input type="password" name="password" class="form-control" value="{{ $user->password }}">
                        </div>
                        <div class="form-group">
                              <label for="alamat"> Alamat </label>
                              <input type="text" name="alamat" class="form-control" value="{{ $user->profile->alamat }}">
                        </div>
                        <div class="form-group">
                              <label for="kota"> Kota </label>
                              <input type="text" name="kota" class="form-control" value="{{ $user->profile->kota }}">
                        </div>
                        <div class="form-group">
                              <label for="kodepos"> Kodepos </label>
                              <input type="number" name="kota" class="form-control" value="{{ $user->profile->kodepos }}">
                        </div>
                        <div class="form-group">
                              <label for="jeniskelamin"> Jenis Kelamin </label>
                              <select name="jeniskelamin" class="form-control">
                                  <option value=""> Laki-laki </option>
                                  <option value=""> Perempuan </option>
                              </select>
                        </div>
                        <div class="form-group">
                              <label for="noktp"> No KTP </label>
                              <input type="number" name="noktp" class="form-control" value="{{ $user->profile->noktp }}">
                        </div>
                        <div class="form-group">
                              <label for="namaktp"> Nama KTP </label>
                              <input type="text" name="namaktp" class="form-control" value="{{ $user->profile->namaktp }}">
                        </div>
                        <div class="form-group">
                              <label for="fotoprofil"> Foto Profil </label>
                              <input type="file" name="fotoprofil" class="form-control">
                        </div>
                        <div class="form-group">
                              <div class="text-center">
                                  <button class="btn btn-success" type="submit"> Simpan Profil </button>
                              </div>
                        </div>
                </form>
                @endif
          </div>
      </div>
@endsection
