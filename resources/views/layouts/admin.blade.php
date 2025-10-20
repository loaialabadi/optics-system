<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'لوحة التحكم')</title>
    <!-- Bootstrap RTL CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            overflow-x: hidden;
        }
        #sidebar {
            width: 240px;
            min-height: 100vh;
            transition: all 0.3s;
            background: linear-gradient(to bottom, #0d6efd, #0b5ed7);
            color: white;
        }
        #sidebar.collapsed {
            width: 80px;
        }
        #sidebar .nav-link {
            color: white;
            transition: all 0.3s;
        }
        #sidebar .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            border-radius: 0.5rem;
        }
        #sidebar .nav-link i {
            width: 30px;
        }
        #content {
            transition: margin 0.3s;
        }
        #sidebar.collapsed .nav-link span {
            display: none;
        }
        #sidebar .sidebar-footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            padding: 1rem;
            font-size: 0.85rem;
            text-align: center;
            border-top: 1px solid rgba(255,255,255,0.3);
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- Sidebar -->
    <nav id="sidebar" class="position-relative">
        <div class="text-center py-4 fs-4 fw-bold border-bottom border-white">
            <span class="d-inline-block">OneOptics</span>
        </div>
        <ul class="nav flex-column mt-3 px-2">
            <li class="nav-item mb-2">
                <a href="{{ route('admin.dashboard.index') }}" class="nav-link d-flex align-items-center p-2">
                    <i class="bi bi-house-door-fill"></i>
                    <span>لوحة التحكم</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.users.index') }}" class="nav-link d-flex align-items-center p-2">
                    <i class="bi bi-person-plus-fill"></i>
                    <span> المستخدمين</span>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.settings.index') }}" class="nav-link d-flex align-items-center p-2">
                    <i class="bi bi-gear-fill"></i>
                    <span>الإعدادات</span>
                </a>
            </li>
    
            <li class="nav-item mb-2">
                <a href="{{ route('admin.suppliers.index') }}" class="nav-link d-flex align-items-center p-2">
                    <i class="bi bi-person-plus-fill"></i>
                    <span> الموردين</span>
                </a>
            </li>
            
            <li class="nav-item mb-2">
                <a href="{{ route('admin.doctors.index') }}" class="nav-link d-flex align-items-center p-2">
                    <i class="bi bi-person-badge-fill"></i>
                    <span> الأطباء</span>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link d-flex align-items-center p-2">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>تسجيل الخروج</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-footer text-white">
            © 2025 OneOptics
        </div>
    </nav>

    <!-- Main Content -->
    <div id="content" class="flex-grow-1">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white shadow-sm px-4">
            <div class="d-flex align-items-center">
                <button id="sidebarToggle" class="btn btn-primary me-3">☰</button>
                <span class="fs-5 fw-bold">@yield('page-title', 'لوحة التحكم')</span>
            </div>
            <div class="ms-auto d-flex align-items-center gap-2">
                <span class="text-secondary fw-medium">مرحبا، {{ Auth::user()->name ?? 'Admin' }}</span>
                <img src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff' }}" 
                     alt="Avatar" class="rounded-circle" width="36" height="36">
            </div>
        </nav>

        <!-- Page Content -->
        <main class="p-4 bg-light">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-white text-center p-3 border-top text-secondary">
            كل الحقوق محفوظة © 2025
        </footer>

    </div>

</div>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script>
    const sidebar = document.getElementById('sidebar');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('collapsed');
    });
</script>

</body>
</html>
