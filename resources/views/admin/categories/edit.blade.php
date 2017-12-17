@extends('layouts.app')

@section('content')

@include('admin.includes.errors')

      <div class="panel panel-default">
          <div class="panel-heading">
                Edit Kategori : {{ $categories->name }}
          </div>
          <div class="panel-body">
              <form action="{{ route('category.update', ['id' => $categories->id])}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                          <label for="name"> Kategori </label>
                          <input type="text" name="name" value="{{ $categories->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                          <div class="text-center">
                              <button class="btn btn-success" type="submit"> Update Kategori </button>
                          </div>
                    </div>
              </form>
          </div>
      </div>
@endsection
