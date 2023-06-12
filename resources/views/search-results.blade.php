@extends('layout.master')

@section('dyncontent')

    <div class="container py-3">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li> <!-- Home breadcrumb link -->
                <li class="breadcrumb-item"><a
                        href="/search?search_query={{ $search_query }}&search_by={{ $search_by }}">Search by
                        {{ $search_by }}</a></li> <!-- Category breadcrumb link -->
                <li class="breadcrumb-item active" aria-current="page"><a
                        href="/search?search_query={{ $search_query }}&search_by={{ $search_by }}">{{ $search_query }}</a>
                </li> <!-- Active breadcrumb link for Automotive - Vehicles -->
            </ol>
        </nav>
        <h6 class="text-center m-4">Search results for <span class="text-danger">{{ $search_query }}</span> by <span
                class="text-danger">{{ $search_by }}</span>
            <span>| {{count($result)}} result{{ count($result) > 0 ? 's' : ''}}</span>
        </h6>
        <!-- End Breadcrumbs -->
        
        @if (count($result) > 0)
            @if ($search_by == 'category')
                <div class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($result as $category)
                        <div class="col">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <a href="/category/{{ $category->name }}" class="text-decoration-none">
                                        <!-- Category title with icon -->
                                        <h5 class="card-title mb-0">
                                            @php
                                                echo $category->logo_url;
                                            @endphp
                                            {{ $category->name }}
                                        </h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif ($search_by == 'company')
                <div class="row row-cols-1">
                    @foreach ($result as $company)
                        <!-- Start of First Company -->
                        <div class="col mb-4">
                            <div class="card h-100 customtest-card">
                                <a href="/category/{{ $company->category->name }}/{{ $company->name }}">
                                    <!-- Company logo -->
                                    <img src="{{ $company->logo }}" class="card-img-top company-logo" alt="Company Logo">
                                    <div class="card-body">
                                        <h5 class="card-title company-name"><a
                                                href="/category/{{ $company->category->name }}/{{ $company->name }}"
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
                                                    {{ $company->district }}, {{ $company->commune }} ,
                                                    {{ $company->city }}</small></span>
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
                </div>
            @endif
        @else
            <div class="alert alert-danger" role="alert">
                No results found for <span class="text-danger">{{ $search_query }}</span> by <span
                    class="text-danger">{{ $search_by }}</span>
            </div>
        @endif
    </div>


@stop
