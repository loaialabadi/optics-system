@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <h2 class="fw-bold mb-5 text-center text-primary">
        ⚙️ إعدادات النظام
    </h2>

    <div class="row justify-content-center g-4">

        <!-- بطاقة الفروع -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 text-center hover-card">
                <div class="card-body py-5">
                    <h5 class="card-title mb-3 fw-bold">🏢 الفروع</h5>
                    <p class="text-muted mb-4">إدارة الفروع ومعلوماتها الأساسية</p>
                    <a href="{{ route('admin.branches.index') }}" class="btn btn-outline-primary px-4">
                        فتح الفروع
                    </a>
                </div>
            </div>
        </div>

        <!-- بطاقة المستخدمين -->
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4 text-center hover-card">
                <div class="card-body py-5">
                    <h5 class="card-title mb-3 fw-bold">👤 المستخدمين</h5>
                    <p class="text-muted mb-4">إدارة حسابات المستخدمين والصلاحيات</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary px-4">
                        فتح المستخدمين
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<style>
    .hover-card {
        transition: all 0.3s ease;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
</style>
@endsection
