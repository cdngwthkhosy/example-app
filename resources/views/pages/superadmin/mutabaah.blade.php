@extends('layouts.app')

@section('body')
<!-- Page header -->
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h3 class="page-pretitle text-success">Manajemen</h3>
        <h2 class="page-title">
          Mutabaah
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
          <form action={{route('admin.manajemen.mutabaah.show')}} method="POST">
            @csrf
            <div class="row justify-content-center mb-3">
              <div class="col-md-5">
                <select id="select-user" name="user" placeholder="Select a person..." autocomplete="off">
                  <option value="">Pilih user</option>
                  @foreach ($users as $user)
                  <option value={{$user->id}}>{{$user->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-5">
                <button class="btn btn-sm btn-primary" type="submit">Pilih</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection