@extends('layout.master')

@section('dyncontent')
<div class="container my-5">
    <div class="row">
        <div class="col">
            <h2 class="pb-4">Featured Categories</h2>
        </div>
        <div class="col text-end">
            <a href="#" class="btn btn-primary">View More</a>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title">Accountants - General</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title">Architectural - Design</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title">Consultants</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title">Banks &amp; Finance</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title">Pest Control Services</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="#" class="text-decoration-none">
                        <h5 class="card-title">Printing Houses</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@stop