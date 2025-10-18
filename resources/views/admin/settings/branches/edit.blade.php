@extends('layouts.admin')

@section('content')
<div class="container my-5">
    <div class="card shadow-sm mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">✏️ تعديل الفرع</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.branches.update', $branch) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="name" class="form-label">اسم الفرع</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $branch->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">رقم الموبايل</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $branch->phone }}" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">العنوان</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{ $branch->address }}" required>
                </div>

                <div class="mb-4">
                    <label for="user_id" class="form-label">المسؤول عن الفرع</label>
                    <select id="user_id" name="user_id" class="form-select" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $branch->user_id == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success w-100">تحديث الفرع</button>
            </form>
        </div>
    </div>
</div>
@endsection
