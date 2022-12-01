<div class="nav-item dropdown">
  <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
    <span class="avatar avatar-sm" style="background-image: url(./static/avatars/001f.jpg)"></span>
    <div class="d-none d-xl-block ps-2">
      <div>{{ Auth::user()->name }}</div>
      <div class="mt-1 small text-white">{{ Auth::user()->unit->name}}</div>
    </div>
  </a>
  <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
    <a href="#" class="dropdown-item">Profile</a>
    <div class="dropdown-divider"></div>
    <a href="./settings.html" class="dropdown-item">Settings</a>
    <form action={{route('logout')}} method="POST">
      @csrf
      <button type="submit" class="dropdown-item">Logout</button>
    </form>
  </div>
</div>