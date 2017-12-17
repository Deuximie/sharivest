@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                  <thead>
                        <th> Id </th>
                        <th> Judul </th>
                        <th> Deskripsi </th>
                        <th> Gambar </th>
                        <th> Edit </th>
                        <th> Delete </th>
                  </thead>
                  <tbody>
                      @if($projects->count() > 0)
                          @foreach($projects as $project)
                              <tr>
                                <td> {{ $project->id }} </td>
                                <td> {{ $project->judul }} </td>
                                <td> <a href="{{ $project->deskripsi }}" target="_blank"> Rincian Usaha </a> </td>
                                <td> <img src="{{ $project->gambar }}" alt="{{ $project->judul }}" width="80px" height="80px"> </td>
                                <td> <a href="{{ route('projects.edit', ['id' => $project->id])}}" class="btn btn-xs btn-info">edit</a> </td>
                                <td> <a href="{{ route('projects.delete', ['id' => $project->id])}}" class="btn btn-xs btn-danger">hapus</a> </td>
                              </tr>
                          @endforeach
                      @else
                              <tr>
                                <th colspan="9" class="text-center"> Tidak ada Project </th>
                              </tr>
                      @endif
                  </tbody>
            </table>
        </div>
    </div>

@endsection
