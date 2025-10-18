@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">قائمة الفروع</h2>
        <a href="{{ route('admin.branches.create') }}" class="btn btn-primary">➕ إضافة فرع جديد</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>اسم الفرع</th>
                    <th>رقم الموبايل</th>
                    <th>العنوان</th>
                    <th>المسؤول</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($branches as $index => $branch)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $branch->name }}</td>
                    <td>{{ $branch->phone }}</td>
                    <td>{{ $branch->address }}</td>
                    <td>{{ $branch->user->name ?? '-' }}</td>
                    <td class="d-flex justify-content-center gap-2">
                        <a href="{{ route('admin.branches.edit', $branch) }}" class="btn btn-sm btn-success">تعديل</a>
                        <form action="{{ route('admin.branches.destroy', $branch) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف الفرع؟')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
