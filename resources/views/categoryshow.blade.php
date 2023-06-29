@extends('layout.master')

@section('dyncontent')

    <div class="container my-4">
        <!-- Breadcrumbs -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active"><a href="/category">Category</a></li>
            </ol>
        </nav>
        <!-- End Breadcrumbs -->

        <h2 class="header-align pb-3">Categories</h2>

        <div class="row row-cols-1 row-cols-md-4 g-4">
            {{-- Render from database. Will remove the above category once I fill database into category --}}
            @if ($categories)
                @foreach ($categories as $category)
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
            @else
                <p>No category found</p>
            @endif
        </div>
        <div class="pagination-to-right">
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>
    </div>

@stop
