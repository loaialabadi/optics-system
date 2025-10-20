@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="mb-3 d-flex justify-content-between align-items-center">
        <h3 class="mb-0">إضافة مورد جديد</h3>
        <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary">رجوع للقائمة</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>يوجد أخطاء في الإدخال:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.suppliers.store') }}" method="POST">
                @csrf
                @include('admin.suppliers.partials.form', ['supplier' => null])
                <div class="mt-3">
                    <button class="btn btn-success">حفظ المورد</button>
                    <a href="{{ route('admin.suppliers.index') }}" class="btn btn-outline-secondary">إلغاء</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
