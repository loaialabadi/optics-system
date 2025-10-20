@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">عرض مورد</h3>
        <div>
            <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-warning">تعديل</a>
            <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary">رجوع</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-3">الاسم</dt>
                <dd class="col-sm-9">{{ $supplier->name }}</dd>

                <dt class="col-sm-3">الهاتف</dt>
                <dd class="col-sm-9">{{ $supplier->phone ?? '-' }}</dd>

                <dt class="col-sm-3">البريد الإلكتروني</dt>
                <dd class="col-sm-9">{{ $supplier->email ?? '-' }}</dd>

                <dt class="col-sm-3">العنوان</dt>
                <dd class="col-sm-9">{{ $supplier->address ?? '-' }}</dd>

                <dt class="col-sm-3">شروط الدفع</dt>
                <dd class="col-sm-9">{{ $supplier->credit_terms ?? '-' }}</dd>

                <dt class="col-sm-3">ملاحظات</dt>
                <dd class="col-sm-9">{{ $supplier->notes ?? '-' }}</dd>

                <dt class="col-sm-3">الحالة</dt>
                <dd class="col-sm-9">
                    @if($supplier->is_active)
                        <span class="badge bg-success">نشط</span>
                    @else
                        <span class="badge bg-secondary">غير نشط</span>
                    @endif
                </dd>

                <dt class="col-sm-3">أُنشئ في</dt>
                <dd class="col-sm-9">{{ $supplier->created_at->format('Y-m-d H:i') }}</dd>
            </dl>
        </div>
    </div>
</div>
@endsection
