@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">➕ إضافة فرع جديد</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.branches.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">اسم الفرع</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="أدخل اسم الفرع" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">رقم الموبايل</label>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="01012345678" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">العنوان</label>
                    <input type="text" id="address" name="address" class="form-control" placeholder="أدخل عنوان الفرع" required>
                </div>

        

                <button type="submit" class="btn btn-primary w-100">حفظ الفرع</button>
            </form>
        </div>
    </div>
</div>
@endsection
