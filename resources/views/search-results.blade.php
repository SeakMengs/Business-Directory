@extends('layout.master')

@section('dyncontent')

<div class="container py-3">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li> <!-- Home breadcrumb link -->
            <li class="breadcrumb-item"><a href="/categoryshow">Category</a></li> <!-- Category breadcrumb link -->
            <li class="breadcrumb-item active" aria-current="page"><a href="/automotive_cate">Automotive - Vehicles</a></li> <!-- Active breadcrumb link for Automotive - Vehicles -->
        </ol>
    </nav>
    <!-- End Breadcrumbs -->

    <div class="row row-cols-1 row-cols-md-3">
        @foreach ($tasks as $task)
        <div class="col mb-4">
            <div class="card h-100">
                <!-- Company logo -->
                <img src="{{ $task->company_logo }}" class="card-img-top company-logo" alt="Company Logo">
                <div class="card-body">
                    <h5 class="card-title company-name"><a href="{{ $task->company_link }}" class="company-link">{{ $task->company_name }}</a></h5>
                    <!-- Company contact info -->
                    <div>
                        <span class="company-phone"><i class="fa-solid fa-phone fontawe-icon"></i> {{ $task->company_phone }}</span><br>
                        <span class="company-address"><small>{{ $task->company_address }}</small></span>
                    </div>
                    <!-- Company rating -->
                    <div class="company-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@stop
