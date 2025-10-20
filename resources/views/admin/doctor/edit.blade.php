@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <h4>تعديل بيانات الطبيب</h4>
    <hr>
    @include('admin.doctor.form', ['action' => route('admin.doctors.update', $doctor->id), 'method' => 'PUT'])
</div>
@endsection
