@extends('layout.master')

@section('dyncontent')

    <div class="container py-3">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li> <!-- Home breadcrumb link -->
                <li class="breadcrumb-item"><a href="/category">Category</a></li> <!-- Category breadcrumb link -->
                <li class="breadcrumb-item active" aria-current="page"><a
                        href="/category/{{ $categoryName }}">{{ $categoryName }}</a></li>
                <!-- Active breadcrumb link for Automotive - Vehicles -->
            </ol>
        </nav>
        <!-- End Breadcrumbs -->

        @if ($cateNotFound)
            <div class="alert alert-danger" role="alert">
                Category does not exist :(
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-3">
                @if (count($companies) >= 1)
                    @foreach ($companies as $company)
                        <!-- Start of First Company -->
                        <div class="col mb-4">
                            <div class="card h-100">
                                <a href="/category/{{ $categoryName }}/{{ $company->name }}">
                                    <!-- Company logo -->
                                    <img src="{{ $company->logo }}" class="card-img-top company-logo" alt="Company Logo">
                                    <div class="card-body">
                                        <h5 class="card-title company-name"><a
                                                href="/category/{{ $categoryName }}/{{ $company->name }}"
                                                class="company-link">{{ $company->name }}</a></h5>
                                        <!-- Company contact info -->
                                        <div>
                                            @if (count($company->contacts) >= 1)
                                                @foreach ($company->contacts as $contact)
                                                    <span class="company-phone"><i
                                                            class="fa-solid fa-phone fontawe-icon"></i>
                                                        0{{ $contact->phone_number }} </span><br>
                                                @endforeach
                                            @else
                                                <span>This company does not have contact number</span>
                                            @endif
                                            <span class="company-address"><small>{{ $company->street }},
                                                    {{ $company->village }}, {{ $company->district }},
                                                    {{ $company->commune }} , {{ $company->city }}</small></span>
                                        </div>
                                        <!-- Company rating -->
                                        <div class="company-rating">
                                            @php
                                                $totalStar = 5;
                                                $avgRate = round($company->avg_star_rate);
                                                $emptyStar = $totalStar - $avgRate;

                                                for ($i = 0; $i < $avgRate; $i++) {
                                                    echo '<i class="fa fa-star checked"></i>';
                                                }

                                                for ($i = 0; $i < $emptyStar; $i++) {
                                                    echo '<i class="fa fa-star-o"></i>';
                                                }
                                            @endphp
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-danger" style="width: 100%" role="alert">
                        No company found for <span class="text-danger">Category</span> name <span
                            class="text-danger">{{ $categoryName }}</span>
                    </div>
                @endif
            </div>
            <div class="pagination-to-right">
                {{ $companies->links('pagination::bootstrap-4') }}
            </div>
        @endif
    </div>

@stop
