@extends('layouts.app')

@section('body')
<!-- Page header -->
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h3 class="page-pretitle text-success">Assalammu'alaikum</h3>
				<h2 class="page-title">
					Dashboard
				</h2>
			</div>
		</div>
	</div>
</div>
<!-- Page body -->
<div class="page-body">
	<div class="container-xl">
		<!-- Content here -->
		<div class="row mb-3">
			<div class="col-md-3">
				<h4>{{$dateNow}}</h4>
			</div>
		</div>

		<div class="row">
			@if (session()->has('s_mutabaah'))
			<div class="alert alert-success" role="alert">
				{{session('s_mutabaah')}}
			</div>
			@endif
		</div>

		<div class="col-md-6 col-lg-3">
			<div class="card card-borderless" style="background: #313556">
				<div class="card-body">
					<div class="text-white mb-3">Yuk, tingkatin lagi ibadah yang belum mencapai target</div>
					@php
							$sum_sholat_subuh = 0;
					@endphp
					@foreach ($mutabaahData as $data)
					<?php $sum_sholat_subuh += $data->sholat_subuh; ?>
					@endforeach
					@if ($sum_sholat_subuh < 62)
					<div class="text-danger"> <strong>Sholat Subuh masih dibawah standar</strong> </div>
					@endif
					<div class="text-danger"> <strong>{{$sum_sholat_subuh}}</strong> </div>
					<div class="text-success"> <strong>Card without border</strong> </div>
					<div class="text-danger"> <strong>Card without border</strong> </div>
				</div>
			</div>
		</div>

	</div>
</div>
@endsection