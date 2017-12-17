@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

      <div class="panel panel-default">
          <div class="panel-heading">
                Buat Project Baru
          </div>
          <div class="panel-body">
              <form action="{{ route('projects.store')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                          <label for="judul"> Judul Proyek </label>
                          <input type="text" name="judul" class="form-control">
                    </div>
                    <div class="form-group">
                          <label for="category"> Pilih Kategori </label>
                          <select name="category_id" id="category" class="form-control">
                              @foreach($categories as $category)
                                  <option value="{{ $category->id }}"> {{ $category->name }} </option>
                              @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                          <label for="lokasi"> Lokasi </label>
                          <input type="text" name="lokasi" class="form-control">
                    </div>
                    <div class="form-group">
                          <label for="dana_need"> Kebutuhan Dana (Rp) </label>
                          <input type="number" name="dana_need" class="form-control">
                    </div>
                    <div class="form-group">
                          <label for="profit"> Profit (%) </label>
                          <input type="number" step="0.01" name="profit" class="form-control">
                    </div>
                    <div class="form-group">
                          <label for="profit"> Resiko </label>
                          <input type="text" name="resiko" class="form-control">
                    </div>
                    <div class="form-group">
                          <label for="mulai_proyek"> Mulai Proyek </label>
                          <input type="date" name="mulai_proyek" class="form-control">
                    </div>
                    <div class="form-group">
                          <label for="selesai_proyek"> Selesai Proyek </label>
                          <input type="date" name="selesai_proyek" class="form-control">
                    </div>
                    <div class="form-group">
                          <label for="deskripsi"> Deskripsi </label>
                          <input type="file" name="deskripsi" class="form-control">
                    </div>
                    <div class="form-group">
                          <label for="gambar"> Gambar </label>
                          <input type="file" name="gambar" class="form-control">
                    </div>
                    <div class="form-group">
                          <div class="text-center">
                              <button class="btn btn-success" type="submit"> Simpan Project </button>
                          </div>
                    </div>
              </form>
          </div>
      </div>
@endsection
