@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                  <thead>
                        <th> Kategori </th>
                        <th> Edit </th>
                        <th> Hapus </th>
                  </thead>
                  <tbody>
                    @if($categories->count() >0)
                        @foreach($categories as $category)
                            <tr>
                              <td>
                                  {{ $category->name }}
                              </td>
                              <td>
                                  <a href="{{ route('category.edit', ['id' => $category->id])}}" class="btn btn-xs btn-info">edit</a>
                              </td>
                              <td>
                                  <a href="{{ route('category.delete', ['id' => $category->id])}}" class="btn btn-xs btn-danger">hapus</a>
                              </td>
                            </tr>
                        @endforeach
                    @else
                          <tr>
                            <th colspan="9" class="text-center"> Tidak ada Kategori </th>
                          </tr>
                    @endif
                  </tbody>
            </table>
        </div>
    </div>

@endsection
