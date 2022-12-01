@extends('layouts.app')

@section('body')
<!-- Page header -->
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h3 class="page-pretitle text-success">User</h3>
        <h2 class="page-title">
          Create
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
      <div class="card card-borderless">
        <div class="card-body">
          <form action={{route('admin.manajemen.user.store')}} method="POST">
            @csrf
            <div class="row mb-2">
              <div class="col-md-3">
                <label for="nik" class="form-label">No Identitas Karyawan</label>
                <input type="text" class="form-control" id="nik" name="nik" autocomplete="off" maxlength="7">
                @error('nik')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror
              </div>
              <div class="col-md-5">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name">
                @error('name')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
                @error('email')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror
              </div>
            </div>

            <div class="row mb-2">
              <div class="col-md-3">
                <label for="phone" class="form-label">Kontak HP</label>
                <input type="text" class="form-control" id="phone" name="phone">
                @error('phone')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="birthplace" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="birthplace" name="birthplace">
                @error('birthplace')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror
              </div>
              <div class="col-md-4">
                <label for="dob" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="dob" name="dob">
                @error('dob')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-3">
                <label for="education" class="form-label">Pend. Terakhir</label>
                <select name="education" id="education" class="form-select @error('education') is-invalid @enderror">
                  <option value="null">Pilih Pend. Terakhir</option>
                  <option value="SD/SMP">SD/SMP</option>
                  <option value="SMA/SMK">SMA/SMK</option>
                  <option value="D3">D3</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="tmt" class="form-label">TMT</label>
                <input type="date" class="form-control" name="tmt" id="tmt">
                <small class="text-muted">Kosongkan jika belum karyawan tetap</small>
                @error('tmt')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror
              </div>
              <div class="col-md-3">
                <label for="unit_id" class="form-label">Unit</label>
                <select name="unit_id" id="unit_id" class="form-select @error('unit_id') is-invalid @enderror">
                  <option value="null">Pilih Unit</option>
                  @foreach ($units as $unit)s
                  <option value={{$unit->id}}>{{$unit->name}}</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                <span class="text-danger text-sm">{{$message}}</span>
                @enderror
              </div>
            </div>

            <div class="row justify-content-center">
              <div class="col-md-2">
                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection