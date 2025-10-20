<div class="row">
    <div class="col-md-6 mb-3">
        <label for="name" class="form-label">اسم المورد</label>
        <input type="text" name="name" id="name"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $supplier->name ?? '') }}"
               placeholder="أدخل اسم المورد">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="phone" class="form-label">رقم الهاتف</label>
        <input type="text" name="phone" id="phone"
               class="form-control @error('phone') is-invalid @enderror"
               value="{{ old('phone', $supplier->phone ?? '') }}"
               placeholder="أدخل رقم الهاتف">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="email" class="form-label">البريد الإلكتروني</label>
        <input type="email" name="email" id="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $supplier->email ?? '') }}"
               placeholder="أدخل البريد الإلكتروني (اختياري)">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label for="address" class="form-label">العنوان</label>
        <input type="text" name="address" id="address"
               class="form-control @error('address') is-invalid @enderror"
               value="{{ old('address', $supplier->address ?? '') }}"
               placeholder="أدخل عنوان المورد">
        @error('address')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label for="notes" class="form-label">ملاحظات</label>
        <textarea name="notes" id="notes" rows="3"
                  class="form-control @error('notes') is-invalid @enderror"
                  placeholder="ملاحظات إضافية">{{ old('notes', $supplier->notes ?? '') }}</textarea>
        @error('notes')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
