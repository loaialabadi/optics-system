@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>قائمة الأطباء</h4>
        <a href="{{ route('admin.doctors.create') }}" class="btn btn-primary">إضافة طبيب</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>الاسم</th>
                    <th>رقم الهاتف</th>
                    <th>العيادة</th>
                    <th>ملاحظات</th>
                    <th>تحكم</th>
                </tr>
            </thead>
            <tbody>
                @forelse($doctors as $doctor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->phone }}</td>
                        <td>{{ $doctor->clinic_name }}</td>
                        <td>{{ $doctor->notes }}</td>
                        <td>
                            <a href="{{ route('admin.doctors.edit', $doctor->id) }}" class="btn btn-sm btn-warning">تعديل</a>
                            <form action="{{ route('admin.doctors.destroy', $doctor->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6">لا توجد بيانات</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>عرض {{ $doctors->count() }} من {{ $doctors->total() }}</div>
        <div>{{ $doctors->withQueryString()->links() }}</div>
    </div>
</div>
@endsection
