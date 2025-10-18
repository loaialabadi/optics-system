<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>تسجيل الدخول</title>
  <!-- Bootstrap RTL CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      background-color: #f3f4f6;
    }
    .login-card {
      max-width: 400px;
      width: 100%;
      border-radius: 1rem;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

  <div class="card login-card p-4">
    <div class="card-body">
      <h2 class="text-center mb-4 fw-bold text-secondary">تسجيل الدخول</h2>

      @if(session('error'))
        <div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
      @endif

      <form action="{{ route('login.post') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="email" class="form-label">البريد الإلكتروني</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com" required>
        </div>

        <div class="mb-4">
          <label for="password" class="form-label">كلمة المرور</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">تسجيل الدخول</button>
      </form>
    </div>
  </div>

</body>
</html>
