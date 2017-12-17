@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">
            <table class="table table-hover">
                  <thead>
                        <th class="text-center"> Id </th>
                        <th class="text-center"> Avatar </th>
                        <th class="text-center"> Nama </th>
                        <th class="text-center"> Status </th>
                  </thead>
                  <tbody class="text-center">
                          @foreach($users as $user)
                              <tr>
                                  <td>
                                    {{ $user->id }}
                                  </td>

                                  @if($user->profile == false)
                                      <td><img src="{{ asset('uploads/avatars/cai33.jpg') }}" alt="{{ $user->name }}" width="60px" height="70px"></td>
                                  @else
                                      <td><img src="{{ asset($user->profile->fotoprofil) }}" alt="{{ $user->name }}" width="60px" height="70px"></td>
                                  @endif

                                  <td>
                                    {{ $user->name }}
                                  </td>
                                  <td>
                                    @if($user->admin)
                                        <button type="button" class="btn btn-xs btn-success"> Admin </button>
                                    @else
                                        <button type="button" class="btn btn-xs btn-info"> Investor </button>
                                    @endif
                                  </td>
                              </tr>
                          @endforeach

                  </tbody>
            </table>
        </div>
    </div>

@endsection
