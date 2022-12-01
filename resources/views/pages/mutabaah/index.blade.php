@extends('layouts.app')

@section('body')
<!-- Page header -->
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<h3 class="page-pretitle text-success">Evaluation</h3>
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
					@if (session()->has('f_date_mutabaah'))
					<div class="alert alert-danger" role="alert">
						{{session('f_date_mutabaah')}}
					</div>
					@elseif (session()->has('f_exceed_date_mutabaah'))
					<div class="alert alert-danger" role="alert">
						{{session('f_exceed_date_mutabaah')}}
					</div>
					@endif
					<form action={{route('user.evaluation.mutabaah.store')}} method="POST">
						@csrf
						<input type="hidden" name="user_id" value={{ Auth::user()->id }} >
						<div class="row mb-4">
							<div class="col-md-3">
								<label for="tanggal_isi" class="form-label">Tanggal Isi</label>
								<input type="date" class="form-control @error('tanggal_isi') is-invalid @enderror" name="tanggal_isi" id="tanggal_isi">
								@error('tanggal_isi')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>
						</div>
						<div class="row">
							<h4><strong>Sholat Wajib</strong></h4>
						</div>
						<div class="row mb-4">
							<div class="col-sm mb-2">
								<label for="sholat_subuh" class="form-label">Sholat Subuh</label>
								<select name="sholat_subuh" id="sholat_subuh" class="form-select @error('sholat_subuh') is-invalid @enderror">
									<option value="null"> ---Pilih--- </option>
									<option value="2">Berjamaah</option>
									<option value="1">Munfarid</option>
									<option value="0">Tidak Sholat</option>
								</select>
								@error('sholat_subuh')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm mb-2">
								<label for="sholat_dzuhur" class="form-label">Sholat Dzuhur</label>
								<select name="sholat_dzuhur" id="sholat_dzuhur" class="form-select @error('sholat_dzuhur') is-invalid @enderror">
									<option value="null"> ---Pilih--- </option>
									<option value="2">Berjamaah</option>
									<option value="1">Munfarid</option>
									<option value="0">Tidak Sholat</option>
								</select>
								@error('sholat_dzuhur')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm mb-2">
								<label for="sholat_ashar" class="form-label">Sholat Ashar</label>
								<select name="sholat_ashar" id="sholat_ashar" class="form-select @error('sholat_ashar') is-invalid @enderror">
									<option value="null"> ---Pilih--- </option>
									<option value="2">Berjamaah</option>
									<option value="1">Munfarid</option>
									<option value="0">Tidak Sholat</option>
								</select>
								@error('sholat_ashar')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm mb-2">
								<label for="sholat_maghrib" class="form-label">Sholat Maghrib</label>
								<select name="sholat_maghrib" id="sholat_maghrib" class="form-select @error('sholat_maghrib') is-invalid @enderror">
									<option value="null"> ---Pilih--- </option>
									<option value="2">Berjamaah</option>
									<option value="1">Munfarid</option>
									<option value="0">Tidak Sholat</option>
								</select>
								@error('sholat_maghrib')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm mb-2">
								<label for="sholat_isya" class="form-label">Sholat Isya</label>
								<select name="sholat_isya" id="sholat_isya" class="form-select @error('sholat_isya') is-invalid @enderror">
									<option value="null"> ---Pilih--- </option>
									<option value="2">Berjamaah</option>
									<option value="1">Munfarid</option>
									<option value="0">Tidak Sholat</option>
								</select>
								@error('sholat_isya')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>
						</div>

						<div class="row">
							<h4><strong>Sholat Rawatib</strong></h4>
						</div>
						<div class="row mb-4">
							<div class="col-sm col-md-2 mb-2">
								<label for="qobla_subuh" class="form-check-label form-check-inline">
									<input type="hidden" name="qobla_subuh" value="0">
									<input class="form-check-input mr-3 @error('qobla_subuh') is-invalid @enderror" type="checkbox" name="qobla_subuh" id="qobla_subuh" value="1">
									Qobla Subuh
								</label>
								@error('qobla_subuh')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm col-md-2 mb-2">
								<label for="qobla_dzuhur" class="form-check-label form-check-inline">
									<input type="hidden" name="qobla_dzuhur" value="0">
									<input class="form-check-input mr-3 @error('qobla_dzuhur') is-invalid @enderror" type="checkbox" name="qobla_dzuhur" id="qobla_dzuhur" value="1">
									Qobla Dzuhur
								</label>
								@error('qobla_dzuhur')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm col-md-2 mb-2">
								<label for="bada_dzuhur" class="form-label">
									<input type="hidden" name="bada_dzuhur" value="0">
									<input class="form-check-input mr-3 @error('bada_dzuhur') is-invalid @enderror" type="checkbox" name="bada_dzuhur" id="bada_dzuhur" value="1">
									Bada Dzuhur
								</label>
								@error('bada_dzuhur')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm col-md-2 mb-2">
								<label for="bada_maghrib" class="form-label">
									<input type="hidden" name="bada_maghrib" value="0">
									<input class="form-check-input mr-3 @error('bada_maghrib') is-invalid @enderror" type="checkbox" name="bada_maghrib" id="bada_maghrib" value="1">
									Bada Maghrib
								</label>
								@error('bada_maghrib')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm col-md-2 mb-2">
								<label for="bada_isya" class="form-label">
									<input type="hidden" name="bada_isya" value="0">
									<input class="form-check-input mr-3 @error('bada_isya') is-invalid @enderror" type="checkbox" name="bada_isya" id="bada_isya" value="1">
									Bada Isya
								</label>
								@error('bada_isya')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>
						</div>

						<div class="row">
							<h4><strong>Sholat Sunnah</strong></h4>
						</div>
						<div class="row mb-4">
							<div class="col-sm col-md-2 mb-2">
								<label for="tahajud" class="form-label">
									<input type="hidden" name="tahajud" value="0">
									<input class="form-check-input mr-3 @error('tahajud') is-invalid @enderror" type="checkbox" name="tahajud" id="tahajud" value="1">
									Tahajud
								</label>
								@error('tahajud')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm col-md-2 mb-2">
								<label for="witir" class="form-label">
									<input type="hidden" name="witir" value="0">
									<input class="form-check-input mr-3 @error('witir') is-invalid @enderror" type="checkbox" name="witir" id="witir" value="1">
									Witir
								</label>
								@error('witir')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm col-md-2 mb-2">
								<label for="dhuha" class="form-label">
									<input type="hidden" name="dhuha" value="0">
									<input class="form-check-input mr-3 @error('dhuha') is-invalid @enderror" type="checkbox" name="dhuha" id="dhuha" value="1">
									Dhuha
								</label>
								@error('dhuha')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							{{-- <div class="col-sm mb-2">
								<label for="tarawih" class="form-label">
									<input type="hidden" name="tarawih" value="0">
									<input class="form-check-input mr-3" type="checkbox" name="tarawih" id="tarawih" value="1">
									Tarawih
								</label>
							</div> --}}
						</div>

						<div class="row">
							<h4><strong>Shaum</strong></h4>
						</div>
						<div class="row mb-4">
							<div class="col-sm col-md-2 mb-2">
								<label for="shaum_sunnah" class="form-label">
									<input type="hidden" name="shaum_sunnah" value="0">
									<input class="form-check-input mr-3" type="checkbox" name="shaum_sunnah" id="shaum_sunnah" value="1">
									Sunnah
								</label>
								@error('shaum_sunnah')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							{{-- <div class="col-sm col-md-2 mb-2">
								<label for="shaum_ramadhan" class="form-label">
									<input type="hidden" name="shaum_ramadhan" value="0">
									<input class="form-check-input mr-3" type="checkbox" name="shaum_ramadhan" id="shaum_ramadhan" value="1">
									Ramadhan</label>
							</div> --}}
						</div>

						<div class="row">
							<h4><strong>Amalan Lainnya</strong></h4>
						</div>
						<div class="row mb-4">
							<div class="col-sm col-md-2 mb-2">
								<label for="al_matsurat" class="form-label">
									<input type="hidden" name="al_matsurat" value="0">
									<input class="form-check-input mr-3" type="checkbox" name="al_matsurat" id="al_matsurat" value="1">
									Al-Matsurat 
								</label>
								@error('al_matsurat')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm col-md-2 mb-2">
								<label for="infaq" class="form-label">
									<input type="hidden" name="infaq" value="0">
									<input class="form-check-input mr-3" type="checkbox" name="infaq" id="infaq" value="1">
									Infaq
								</label>
								@error('infaq')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm col-md-2 mb-2">
								<label for="baca_buku" class="form-label">
									<input type="hidden" name="baca_buku" value="0">
									<input class="form-check-input mr-3" type="checkbox" name="baca_buku" id="baca_buku" value="1">
									Baca Buku
								</label>
								@error('baca_buku')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm col-md-2 mb-2">
								<label for="kajian_keilmuan" class="form-label">
									<input type="hidden" name="kajian_keilmuan" value="0">
									<input class="form-check-input mr-3" type="checkbox" name="kajian_keilmuan" id="kajian_keilmuan" value="1">
									Kajian Keilmuan
								</label>
								@error('kajian_keilmuan')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>
						</div>

						<div class="row">
							<h4><strong>Interaksi dengan Al-Quran</strong></h4>
						</div>
						<div class="row mb-4">
							<div class="col-sm col-md-2 mb-2">
								<label for="baca_terjemahan_quran" class="form-label">
									<input type="hidden" name="baca_terjemahan_quran" value="0">
									<input class="form-check-input mr-3" type="checkbox" name="baca_terjemahan_quran" id="baca_terjemahan_quran" value="1">
									Baca Terjemahan
								</label>
								@error('baca_terjemahan_quran')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm col-md-2 mb-2">
								<label for="tahfizh_quran" class="form-label">
									<input type="hidden" name="tahfizh_quran" value="0">
									<input class="form-check-input mr-3" type="checkbox" name="tahfizh_quran" id="tahfizh_quran" value="1">
									Tahfizh Quran
								</label>
								@error('tahfizh_quran')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm mb-2">
								<label for="tilawah_quran" class="form-label">Tilawah</label>
								<input type="number" class="form-control @error('tilawah_quran') is-invalid @enderror" name="tilawah_quran" id="tilawah_quran">
								@error('tilawah_quran')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>

							<div class="col-sm mb-2">
								<label for="surah_terakhir" class="form-label">Surat Terakhir</label>
								<select name="surah_terakhir" id="surah_terakhir" class="form-select @error('surah_terakhir') is-invalid @enderror">
									<option value="null"> ----Pilih Surat---- </option>
									@foreach ($responseBody as $item)
											<option value={{$item->nama_latin}}>{{$item->nama_latin}}</option>
									@endforeach
								</select>
								@error('surah_terakhir')
										<span class="text-danger text-sm">{{$message}}</span>
								@enderror
							</div>
						</div>

						<div class="row justify-content-center">
							<div class="col-sm col-md-2">
								<button class="btn btn-success" type="submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>


@endsection