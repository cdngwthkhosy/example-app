@extends('layouts.app')

@section('body')
<!-- Page header -->
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h3 class="page-pretitle text-success">Manajemen</h3>
        <h2 class="page-title">
          User
        </h2>
      </div>
    </div>
  </div>
</div>
<!-- Page body -->
<div class="page-body">
  <div class="container-xl">
    <!-- Content here -->
    <div class="col-12">
      <div class="row">
        @if (session()->has('user_success'))
        <div class="alert alert-success" role="alert">
          {{session('user_success')}}
        </div>
        @elseif (session()->has('user_failed'))
        <div class="alert alert-danger" role="alert">
          {{session('user_failed')}}
        </div>
        @elseif (session()->has('updated_user'))
        <div class="alert alert-success" role="alert">
          {{session('updated_user')}}
        </div>
        @elseif (session()->has('f_update_user'))
        <div class="alert alert-danger" role="alert">
          {{session('f_update_user')}}
        </div>
        @elseif (session()->has('deleted_user'))
        <div class="alert alert-primary" role="alert">
          {{session('deleted_user')}}
        </div>
        @elseif (session()->has('f_delete_user'))
        <div class="alert alert-danger" role="alert">
          {{session('f_delete_user')}}
        </div>
        @endif
      </div>
      <div class="card card-borderless">
        <div class="card-body">
          <div class="row mb-3">
            <div class="col-md-3">
              <a href={{route('admin.manajemen.user.create')}} class="btn btn-sm btn-warning">Add
                User</a>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-dark table-striped" style="width: 100%" id="myTable">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">Id Karyawan</th>
                  <th class="text-center">Nama Lengkap</th>
                  <th class="text-center">Unit</th>
                  <th class="text-center">Kontak HP</th>
                  <th class="text-center">Tempat Lahir</th>
                  <th class="text-center">Tanggal Lahir</th>
                  <th class="text-center">Status Pend.</th>
                  <th class="text-center">TMT</th>
                  <th class="text-center">Role</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <th class="text-center">{{$loop->iteration}}</th>
                  <td class="text-center">{{$user->nik}}</td>
                  <td class="text-center">{{$user->name}}</td>
                  <td class="text-center">{{$user->unit->name}}</td>
                  <td class="text-center">{{$user->phone}}</td>
                  <td class="text-center">{{$user->birthplace}}</td>
                  <td class="text-center">{{$user->dob}}</td>
                  <td class="text-center">{{$user->education}}</td>
                  <td class="text-center">{{$user->tmt}}</td>
                  @foreach ($user->roles as $role)
                  <td>{{$role->name}}</td>
                  @endforeach
                  <td>
                    <a href={{route('admin.manajemen.user.destroy', ['id'=> $user->id])}} class="btn btn-sm btn-danger
                      mb-2" onclick="return confirm('Apakah anda yakin akan menghapus akun ini ?')">Hapus</a>
                    <a href={{route('admin.manajemen.user.edit', ['id' => $user->id])}} class="btn btn-sm btn-primary">Ubah</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection