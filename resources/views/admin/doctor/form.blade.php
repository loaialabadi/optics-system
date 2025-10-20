<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <div class="mb-3">
        <label class="form-label">اسم الطبيب</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $doctor->name ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">رقم الهاتف</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $doctor->phone ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">اسم العيادة</label>
        <input type="text" name="clinic_name" class="form-control" value="{{ old('clinic_name', $doctor->clinic_name ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">ملاحظات</label>
        <textarea name="notes" class="form-control">{{ old('notes', $doctor->notes ?? '') }}</textarea>
    </div>

    <button class="btn btn-success">{{ $method === 'PUT' ? 'تحديث' : 'حفظ' }}</button>
    <a href="{{ route('admin.doctors.index') }}" class="btn btn-secondary">رجوع</a>
</form>
