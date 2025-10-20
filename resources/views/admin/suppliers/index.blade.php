@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">الموردين</h3>
        <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary">+ إضافة مورد</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Search form -->
    <form class="mb-3" method="GET" action="{{ route('admin.suppliers.index') }}">
        <div class="input-group">
            <input type="search" name="q" value="{{ request('q') }}" class="form-control" placeholder="ابحث بالاسم أو الهاتف...">
            <button class="btn btn-outline-secondary" type="submit">بحث</button>
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>الاسم</th>
                    <th>الهاتف</th>
                    <th>البريد</th>
                    <th>العنوان</th>
                    <th>شروط الدفع</th>
                    <th>الحالة</th>
                    <th class="text-end">إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->phone ?? '-' }}</td>
                        <td>{{ $supplier->email ?? '-' }}</td>
                        <td style="max-width: 220px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $supplier->address ?? '-' }}
                        </td>
                        <td>{{ $supplier->credit_terms ?? '-' }}</td>
                        <td>
                            @if($supplier->is_active)
                                <span class="badge bg-success">نشط</span>
                            @else
                                <span class="badge bg-secondary">غير نشط</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.suppliers.show', $supplier->id) }}" class="btn btn-sm btn-info">عرض</a>
                            <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-sm btn-warning">تعديل</a>

                            <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline-block"
                                  onsubmit="return confirm('هل أنت متأكد من حذف المورد؟ هذا الإجراء قابل للاستعادة إن كان soft delete.');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">لا توجد بيانات للموردين.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>عرض {{ $suppliers->count() }} من {{ $suppliers->total() }}</div>
        <div>{{ $suppliers->withQueryString()->links() }}</div>
    </div>
</div>
@endsection
