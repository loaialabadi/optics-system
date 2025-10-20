@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4>إضافة طبيب جديد</h4>
    <hr>
    @include('admin.doctor.form', ['action' => route('admin.doctors.store'), 'method' => 'POST'])
</div>
@endsection
