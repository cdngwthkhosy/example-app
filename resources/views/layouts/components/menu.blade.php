<li class="nav-item">
  <a class="nav-link" href={{route('dashboard')}}>
    <span class="nav-link-icon d-md-none d-lg-inline-block">
      <!-- Download SVG icon from http://tabler-icons.io/i/star -->
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <circle cx="12" cy="13" r="2"></circle>
        <line x1="13.45" y1="11.55" x2="15.5" y2="9.5"></line>
        <path d="M6.4 20a9 9 0 1 1 11.2 0z"></path>
     </svg>
    </span>
    <span class="nav-link-title">
      Dashboard
    </span>
  </a>
</li>

@role('super-admin')
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#navbar-third" data-bs-toggle="dropdown"
    data-bs-auto-close="outside" role="button" aria-expanded="false">
    <span class="nav-link-icon d-md-none d-lg-inline-block">
      <!-- Download SVG icon from http://tabler-icons.io/i/star -->
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
        <path d="M9 12h6"></path>
        <path d="M9 16h6"></path>
     </svg>
    </span>
    <span class="nav-link-title">
      Manajemen
    </span>
  </a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href= {{ route('admin.manajemen.user') }} >
      User
    </a>
    <a class="dropdown-item text-muted" href="#">
      Role
    </a>
    <a class="dropdown-item text-muted" href="#">
      Unit
    </a>
    <a class="dropdown-item text-muted" href="#">
      Hires
    </a>
    <a class="dropdown-item text-muted" href="#">
      Grades
    </a>
    <a class="dropdown-item" href={{route('admin.manajemen.mutabaah')}}>
      Mutabaah
    </a>
  </div>
</li>
@endrole

@hasanyrole('pendidik|tenaga-kependidikan|staff')
<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#navbar-third" data-bs-toggle="dropdown"
    data-bs-auto-close="outside" role="button" aria-expanded="false">
    <span class="nav-link-icon d-md-none d-lg-inline-block">
      <!-- Download SVG icon from http://tabler-icons.io/i/star -->
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
        <path d="M9 12h6"></path>
        <path d="M9 16h6"></path>
     </svg>
    </span>
    <span class="nav-link-title">
      Evaluation
    </span>
  </a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href= {{ route('user.evaluation.mutabaah') }} >
      Mutabaah Yaumiyah
    </a>
    <a class="dropdown-item text-muted" href="#">
      PKG
    </a>
  </div>
</li>

<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#navbar-third" data-bs-toggle="dropdown"
    data-bs-auto-close="outside" role="button" aria-expanded="false">
    <span class="nav-link-icon d-md-none d-lg-inline-block">
      <!-- Download SVG icon from http://tabler-icons.io/i/star -->
      <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-infographic" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <circle cx="7" cy="7" r="4"></circle>
        <path d="M7 3v4h4"></path>
        <line x1="9" y1="17" x2="9" y2="21"></line>
        <line x1="17" y1="14" x2="17" y2="21"></line>
        <line x1="13" y1="13" x2="13" y2="21"></line>
        <line x1="21" y1="12" x2="21" y2="21"></line>
     </svg>
    </span>
    <span class="nav-link-title">
      Report
    </span>
  </a>
  <div class="dropdown-menu">
    <a class="dropdown-item" href= {{ route('user.report.mutabaah', ['id' => Auth::user()->id]) }} >
      Mutabaah Yaumiyah
    </a>
    <a class="dropdown-item text-muted" href="#">
      PKG
    </a>
  </div>
</li>
@endhasanyrole