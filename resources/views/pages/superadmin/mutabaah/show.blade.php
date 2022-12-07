@extends('layouts.app')

@section('body')
<!-- Page header -->
<div class="page-header d-print-none">
  <div class="container-xl">
    <div class="row g-2 align-items-center">
      <div class="col">
        <h3 class="page-pretitle text-success">Report (ADMIN)</h3>
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
          <div class="row mb-3">
            @foreach ($mutabaahData as $data)
              <strong> Nama  : {{$data->user->name}} </strong><br>
              <strong> NIK   : {{$data->user->nik}} </strong>
            @endforeach
          </div>
          <form action="{{route('admin.manajemen.mutabaah.show')}}" method="post">
            <div class="row mb-4">
              <div class="col-md-3">
                @csrf
                <input type="month" class="form-control" name="cari_data" id="cari_data">
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-outline-primary">Filter</button>
              </div>
            </div>
          </form>
          <div class="row mb-2">
            <strong>Sholat Wajib</strong>
          </div>

          <div class="table-responsive mb-2">
            <table class="table table-warning mb-3">
              <thead>
                <tr>
                  <th scope="col" class="text-center">#</th>
                  <th scope="col" class="text-center">Tanggal</th>
                  <th scope="col" class="text-center">Sholat Subuh</th>
                  <th scope="col" class="text-center">Sholat Dzuhur</th>
                  <th scope="col" class="text-center">Sholat Ashar</th>
                  <th scope="col" class="text-center">Sholat Maghrib</th>
                  <th scope="col" class="text-center">Sholat Isya</th>
                </tr>
              </thead>
              <tbody>
                <?php $sum_total_sholat_subuh = 0?>
                <?php $sum_total_sholat_dzuhur = 0?>
                <?php $sum_total_sholat_ashar = 0?>
                <?php $sum_total_sholat_maghrib = 0?>
                <?php $sum_total_sholat_isya = 0?>

                @foreach ($mutabaahData as $data)
                <tr>
                  <th class="text-center">{{$loop->iteration}}</th>
                  <th class="text-center">{{$data->tanggal_isi}}</th>
                  <td class="text-center">{{$data->sholat_subuh}}</td>
                  <td class="text-center">{{$data->sholat_dzuhur}}</td>
                  <td class="text-center">{{$data->sholat_ashar}}</td>
                  <td class="text-center">{{$data->sholat_maghrib}}</td>
                  <td class="text-center">{{$data->sholat_isya}}</td>
                </tr>
                <?php $sum_total_sholat_subuh += $data->sholat_subuh ?>
                <?php $sum_total_sholat_dzuhur += $data->sholat_dzuhur ?>
                <?php $sum_total_sholat_ashar += $data->sholat_ashar ?>
                <?php $sum_total_sholat_maghrib += $data->sholat_maghrib ?>
                <?php $sum_total_sholat_isya += $data->sholat_isya ?>

                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row mb-4 justify-content-center">
            <div class="col-md-2">
              <div class="card bg-indigo text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path
                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Sholat Subuh</h5>
                  <h3 class="text-center">{{$sum_total_sholat_subuh}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-yellow text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun-high" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M14.828 14.828a4 4 0 1 0 -5.656 -5.656a4 4 0 0 0 5.656 5.656z"></path>
                      <path d="M6.343 17.657l-1.414 1.414"></path>
                      <path d="M6.343 6.343l-1.414 -1.414"></path>
                      <path d="M17.657 6.343l1.414 -1.414"></path>
                      <path d="M17.657 17.657l1.414 1.414"></path>
                      <path d="M4 12h-2"></path>
                      <path d="M12 4v-2"></path>
                      <path d="M20 12h2"></path>
                      <path d="M12 20v2"></path>
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Sholat Dzuhur</h5>
                  <h3 class="text-center">{{$sum_total_sholat_dzuhur}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-orange text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun-low" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <circle cx="12" cy="12" r="4"></circle>
                      <path d="M4 12h.01"></path>
                      <path d="M12 4v.01"></path>
                      <path d="M20 12h.01"></path>
                      <path d="M12 20v.01"></path>
                      <path d="M6.31 6.31l-.01 -.01"></path>
                      <path d="M17.71 6.31l-.01 -.01"></path>
                      <path d="M17.7 17.7l.01 .01"></path>
                      <path d="M6.3 17.7l.01 .01"></path>
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Sholat Ashar</h5>
                  <h3 class="text-center">{{$sum_total_sholat_ashar}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-purple text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sunset-2" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 13h1"></path>
                      <path d="M20 13h1"></path>
                      <path d="M5.6 6.6l.7 .7"></path>
                      <path d="M18.4 6.6l-.7 .7"></path>
                      <path d="M8 13a4 4 0 1 1 8 0"></path>
                      <path d="M3 17h18"></path>
                      <path d="M7 20h5"></path>
                      <path d="M16 20h1"></path>
                      <path d="M12 5v-1"></path>
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Sholat Maghrib</h5>
                  <h3 class="text-center">{{$sum_total_sholat_maghrib}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-primary text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Sholat Isya</h5>
                  <h3 class="text-center">{{$sum_total_sholat_isya}}</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-2">
            <strong>Sholat Rawatib</strong>
          </div>
          <div class="table-responsive mb-2">
            <table class="table table-success">
              <thead>
                <tr>
                  <th scope="col" class="text-center">#</th>
                  <th scope="col" class="text-center">Tanggal</th>
                  <th scope="col" class="text-center">Qobla Subuh</th>
                  <th scope="col" class="text-center">Qobla Dzuhur</th>
                  <th scope="col" class="text-center">Bada Dzuhur</th>
                  <th scope="col" class="text-center">Bada Maghrib</th>
                  <th scope="col" class="text-center">Bada Isya</th>
                </tr>
              </thead>
              <tbody>
                <?php $sum_total_qobla_subuh = 0; $sum_total_qobla_dzuhur = 0; $sum_total_bada_dzuhur = 0; $sum_total_bada_ashar = 0; $sum_total_bada_maghrib = 0; $sum_total_bada_isya = 0 ?>
                @foreach ($mutabaahData as $data)
                <tr>
                  <th class="text-center">{{$loop->iteration}}</th>
                  <th class="text-center">{{$data->tanggal_isi}}</th>
                  <td class="text-center">{{$data->qobla_subuh}}</td>
                  <td class="text-center">{{$data->qobla_dzuhur}}</td>
                  <td class="text-center">{{$data->bada_dzuhur}}</td>
                  <td class="text-center">{{$data->bada_maghrib}}</td>
                  <td class="text-center">{{$data->bada_isya}}</td>
                </tr>

                <?php 
                  $sum_total_qobla_subuh += $data->qobla_subuh;
                  $sum_total_qobla_dzuhur += $data->qobla_dzuhur;
                  $sum_total_bada_dzuhur += $data->bada_dzuhur;
                  $sum_total_bada_maghrib += $data->bada_maghrib;
                  $sum_total_bada_isya += $data->bada_isya;
                ?>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row mb-4 justify-content-center">
            <div class="col-md-2">
              <div class="card bg-indigo text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path
                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Qobla Subuh</h5>
                  <h3 class="text-center">{{$sum_total_qobla_subuh}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-yellow text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun-high" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M14.828 14.828a4 4 0 1 0 -5.656 -5.656a4 4 0 0 0 5.656 5.656z"></path>
                      <path d="M6.343 17.657l-1.414 1.414"></path>
                      <path d="M6.343 6.343l-1.414 -1.414"></path>
                      <path d="M17.657 6.343l1.414 -1.414"></path>
                      <path d="M17.657 17.657l1.414 1.414"></path>
                      <path d="M4 12h-2"></path>
                      <path d="M12 4v-2"></path>
                      <path d="M20 12h2"></path>
                      <path d="M12 20v2"></path>
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Qobla Dzuhur</h5>
                  <h3 class="text-center">{{$sum_total_qobla_dzuhur}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-yellow text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun-low" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <circle cx="12" cy="12" r="4"></circle>
                      <path d="M4 12h.01"></path>
                      <path d="M12 4v.01"></path>
                      <path d="M20 12h.01"></path>
                      <path d="M12 20v.01"></path>
                      <path d="M6.31 6.31l-.01 -.01"></path>
                      <path d="M17.71 6.31l-.01 -.01"></path>
                      <path d="M17.7 17.7l.01 .01"></path>
                      <path d="M6.3 17.7l.01 .01"></path>
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Bada Dzuhur</h5>
                  <h3 class="text-center">{{$sum_total_bada_dzuhur}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-purple text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sun-low" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <circle cx="12" cy="12" r="4"></circle>
                      <path d="M4 12h.01"></path>
                      <path d="M12 4v.01"></path>
                      <path d="M20 12h.01"></path>
                      <path d="M12 20v.01"></path>
                      <path d="M6.31 6.31l-.01 -.01"></path>
                      <path d="M17.71 6.31l-.01 -.01"></path>
                      <path d="M17.7 17.7l.01 .01"></path>
                      <path d="M6.3 17.7l.01 .01"></path>
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Bada Maghrib</h5>
                  <h3 class="text-center">{{$sum_total_bada_maghrib}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-primary text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Bada Isya</h5>
                  <h3 class="text-center">{{$sum_total_bada_isya}}</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-2">
            <strong>Sholat Sunnah</strong>
          </div>
          <div class="table-responsive mb-2">
            <table class="table table-secondary">
              <thead>
                <tr>
                  <th scope="col" class="text-center">#</th>
                  <th scope="col" class="text-center">Tanggal</th>
                  <th scope="col" class="text-center">Sholat Tahajud</th>
                  <th scope="col" class="text-center">Sholat Witir</th>
                  <th scope="col" class="text-center">Sholat Dhuha</th>
                </tr>
              </thead>
              <tbody>
                <?php $sum_total_witir = 0; $sum_total_tahajud = 0; $sum_total_dhuha = 0; ?>
                @foreach ($mutabaahData as $data)
                <tr>
                  <th class="text-center">{{$loop->iteration}}</th>
                  <th class="text-center">{{$data->tanggal_isi}}</th>
                  <td class="text-center">{{$data->tahajud}}</td>
                  <td class="text-center">{{$data->witir}}</td>
                  <td class="text-center">{{$data->dhuha}}</td>
                </tr>

                <?php 
                  $sum_total_tahajud += $data->tahajud;
                  $sum_total_witir += $data->witir;
                  $sum_total_dhuha += $data->dhuha;
                ?>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row mb-4 justify-content-center">
            <div class="col-md-2">
              <div class="card bg-indigo text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moon-stars" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z"></path>
                      <path d="M17 4a2 2 0 0 0 2 2a2 2 0 0 0 -2 2a2 2 0 0 0 -2 -2a2 2 0 0 0 2 -2"></path>
                      <path d="M19 11h2m-1 -1v2"></path>
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Tahajud</h5>
                  <h3 class="text-center">{{$sum_total_tahajud}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-indigo text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                      stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                      <path
                        d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Witir</h5>
                  <h3 class="text-center">{{$sum_total_witir}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-yellow text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-sunrise" width="24"
                      height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                      stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 17h1m16 0h1m-15.4 -6.4l.7 .7m12.1 -.7l-.7 .7m-9.7 5.7a4 4 0 0 1 8 0"></path>
                      <line x1="3" y1="21" x2="21" y2="21"></line>
                      <path d="M12 9v-6l3 3m-6 0l3 -3"></path>
                    </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Dhuha</h5>
                  <h3 class="text-center">{{$sum_total_dhuha}}</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-2">
            <strong>Dzikr, Interaksi Al-Quran, dll</strong>
          </div>
          <div class="table-responsive mb-4">
            <table class="table table-primary">
              <thead>
                <tr>
                  <th scope="col" class="text-center">#</th>
                  <th scope="col" class="text-center">Tanggal</th>
                  <th scope="col" class="text-center">Al-Matsurat</th>
                  <th scope="col" class="text-center">Tilawah Quran</th>
                  <th scope="col" class="text-center">Membaca Terjemah Al-Quran</th>
                  <th scope="col" class="text-center">Tahfizh Quran</th>
                  <th scope="col" class="text-center">Surah Terakhir</th>
                  <th scope="col" class="text-center">Shaum Sunnah</th>
                  <th scope="col" class="text-center">Infaq</th>
                  <th scope="col" class="text-center">Membaca Buku</th>
                  <th scope="col" class="text-center">Kajian Keilmuan</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $sum_total_al_matsurat=0;
                $sum_total_tilawah_quran=0;
                $sum_total_baca_terjemahan_quran=0;
                $sum_total_tahfizh_quran=0;
                $sum_total_shaum_sunnah=0;
                $sum_total_infaq=0;
                $sum_total_baca_buku=0;
                $sum_total_kajian_keilmuan=0;
                ?>

                @foreach ($mutabaahData as $data)
                <tr>
                  <th class="text-center">{{$loop->iteration}}</th>
                  <th class="text-center">{{$data->tanggal_isi}}</th>
                  <td class="text-center">{{$data->al_matsurat}}</td>
                  <td class="text-center">{{$data->tilawah_quran}} L</td>
                  <td class="text-center">{{$data->baca_terjemahan_quran}}</td>
                  <td class="text-center">{{$data->tahfizh_quran}}</td>
                  <td class="text-center">{{$data->surah_terakhir}}</td>
                  <td class="text-center">{{$data->shaum_sunnah}}</td>
                  <td class="text-center">{{$data->infaq}}</td>
                  <td class="text-center">{{$data->baca_buku}}</td>
                  <td class="text-center">{{$data->kajian_keilmuan}}</td>
                </tr>
                <?php 
                $sum_total_al_matsurat += $data->al_matsurat;
                $sum_total_tilawah_quran += $data->tilawah_quran;
                $sum_total_baca_terjemahan_quran += $data->baca_terjemahan_quran;
                $sum_total_tahfizh_quran += $data->tahfizh_quran;
                $sum_total_shaum_sunnah += $data->shaum_sunnah;
                $sum_total_infaq += $data->infaq;
                $sum_total_baca_buku += $data->baca_buku;
                $sum_total_kajian_keilmuan += $data->kajian_keilmuan;
                ?>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="row mb-4 justify-content-center">
            <div class="col-md-2">
              <div class="card bg-indigo text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                      <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                      <line x1="3" y1="6" x2="3" y2="19"></line>
                      <line x1="12" y1="6" x2="12" y2="19"></line>
                      <line x1="21" y1="6" x2="21" y2="19"></line>
                   </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Al-Matsurat</h5>
                  <h3 class="text-center">{{$sum_total_al_matsurat}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-cyan text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                      <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                      <line x1="3" y1="6" x2="3" y2="19"></line>
                      <line x1="12" y1="6" x2="12" y2="19"></line>
                      <line x1="21" y1="6" x2="21" y2="19"></line>
                   </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Tilawah Quran</h5>
                  <h3 class="text-center">{{$sum_total_tilawah_quran}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-dark text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                      <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                      <line x1="3" y1="6" x2="3" y2="19"></line>
                      <line x1="12" y1="6" x2="12" y2="19"></line>
                      <line x1="21" y1="6" x2="21" y2="19"></line>
                   </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Baca Terjemahan Quran</h5>
                  <h3 class="text-center">{{$sum_total_baca_terjemahan_quran}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-yellow text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                      <path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0"></path>
                      <line x1="3" y1="6" x2="3" y2="19"></line>
                      <line x1="12" y1="6" x2="12" y2="19"></line>
                      <line x1="21" y1="6" x2="21" y2="19"></line>
                   </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Tahfizh Quran</h5>
                  <h3 class="text-center">{{$sum_total_tahfizh_quran}}</h3>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-4 justify-content-center">
            <div class="col-md-2">
              <div class="card bg-lime text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <circle cx="9" cy="7" r="4"></circle>
                      <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                      <path d="M16 11l2 2l4 -4"></path>
                   </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Shaum Sunnah</h5>
                  <h3 class="text-center">{{$sum_total_shaum_sunnah}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-success text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <rect x="3" y="4" width="18" height="4" rx="2"></rect>
                      <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
                      <line x1="10" y1="12" x2="14" y2="12"></line>
                   </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Infaq</h5>
                  <h3 class="text-center">{{$sum_total_infaq}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-teal text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-books" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <rect x="5" y="4" width="4" height="16" rx="1"></rect>
                      <rect x="9" y="4" width="4" height="16" rx="1"></rect>
                      <path d="M5 8h4"></path>
                      <path d="M9 16h4"></path>
                      <path d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z"></path>
                      <path d="M14 9l4 -1"></path>
                      <path d="M16 16l3.923 -.98"></path>
                   </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Baca Buku</h5>
                  <h3 class="text-center">{{$sum_total_baca_buku}}</h3>
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card bg-orange text-primary-fg">
                <div class="card-stamp">
                  <div class="card-stamp-icon bg-white text-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-books" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                      <rect x="5" y="4" width="4" height="16" rx="1"></rect>
                      <rect x="9" y="4" width="4" height="16" rx="1"></rect>
                      <path d="M5 8h4"></path>
                      <path d="M9 16h4"></path>
                      <path d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z"></path>
                      <path d="M14 9l4 -1"></path>
                      <path d="M16 16l3.923 -.98"></path>
                   </svg>
                  </div>
                </div>
                <div class="card-body text-white">
                  <h5 class="card-title">Rekap Kajian Keilmuan</h5>
                  <h3 class="text-center">{{$sum_total_kajian_keilmuan}}</h3>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

@endsection