<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'لوحة تحكم الفرع')</title>
  <!-- Bootstrap RTL -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body { overflow-x: hidden; }
    #sidebar {
      width: 220px;
      min-height: 100vh;
      background: linear-gradient(to bottom, #27b6bbff, #d70bbfff);
      color: white;
      transition: all 0.3s;
    }
    #sidebar.collapsed { width: 80px; }
    #sidebar .nav-link { color: white; transition: all 0.3s; }
    #sidebar .nav-link:hover { background-color: rgba(255,255,255,0.1); border-radius: .5rem; }
    #sidebar.collapsed .nav-link span { display: none; }
    #sidebar .sidebar-footer { position: absolute; bottom: 0; width: 100%; padding: 1rem; font-size: .85rem; text-align: center; border-top: 1px solid rgba(255,255,255,.3);}
  </style>
</head>
<body>

<div class="d-flex">

  <!-- Sidebar -->
  <nav id="sidebar" class="position-relative">
    <div class="text-center py-4 fs-4 fw-bold border-bottom border-white">فرع وسط البلد</div>
    <ul class="nav flex-column mt-3 px-2">
      <li class="nav-item mb-2">
        <a href="{{ route('branch.dashboard') }}" class="nav-link d-flex align-items-center p-2">
          <i class="bi bi-house-door-fill"></i><span>لوحة التحكم</span>
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="#" class="nav-link d-flex align-items-center p-2">
          <i class="bi bi-people-fill"></i><span>العملاء</span>
        </a>
      </li>
      <li class="nav-item mb-2">
        <a href="#" class="nav-link d-flex align-items-center p-2">
          <i class="bi bi-bag-fill"></i><span>الطلبات</span>
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link d-flex align-items-center p-2">
          <i class="bi bi-box-arrow-right"></i><span>تسجيل الخروج</span>
        </a>
      </li>
    </ul>
    <div class="sidebar-footer">© 2025 OneOptics</div>
  </nav>

  <!-- Main Content -->
  <div class="flex-grow-1">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white shadow-sm px-4">
      <div class="d-flex align-items-center">
        <button id="sidebarToggle" class="btn btn-primary me-3">☰</button>
        <span class="fs-5 fw-bold">@yield('page-title', 'لوحة تحكم الفرع')</span>
      </div>
    </nav>

    <!-- Content -->
    <main class="p-4">
      @yield('content')
    </main>

  </div>

</div>

<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('sidebarToggle').addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
  });
</script>

</body>
</html>
