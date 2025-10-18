@extends('layouts.admin')

@section('title', 'لوحة تحكم المدير')
@section('page-title', 'لوحة تحكم المدير')

@section('content')
<div class="row g-4">
    <!-- بطاقة المستخدمين -->
    <div class="col-md-4">
        <div class="card text-white bg-primary shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h5 class="card-title">عدد المستخدمين</h5>
                <p class="display-4 fw-bold">10</p>
                <i class="bi bi-people-fill fs-1"></i>
            </div>
        </div>
    </div>

    <!-- بطاقة الفروع -->
    <div class="col-md-4">
        <div class="card text-white bg-success shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h5 class="card-title">عدد الفروع</h5>
                <p class="display-4 fw-bold">5</p>
                <i class="bi bi-shop-window fs-1"></i>
            </div>
        </div>
    </div>

    <!-- بطاقة الورش -->
    <div class="col-md-4">
        <div class="card text-white bg-warning shadow-sm h-100">
            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                <h5 class="card-title">عدد الورش</h5>
                <p class="display-4 fw-bold">3</p>
                <i class="bi bi-gear-fill fs-1"></i>
            </div>
        </div>
    </div>
</div>
@endsection
