@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">➕ إضافة مستخدم جديد</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">الاسم</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="أدخل الاسم" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">البريد الإلكتروني</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="example@example.com" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">كلمة المرور</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <div class="mb-4">
                    <label for="role" class="form-label">الدور</label>
                    <select id="role" name="role" class="form-select" required>
                        <option value="branch">فرع</option>
                        <option value="workshop">ورشة</option>
                        <option value="admin">مدير</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary w-100">حفظ</button>
            </form>
        </div>
    </div>
</div>
@endsection
