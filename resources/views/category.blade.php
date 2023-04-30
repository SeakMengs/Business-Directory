@extends('layout.master')

@section('dyncontent')

<!-- <h1>nothing yet</h1> -->

<div class="container">

    <div class="row d-flex justify-content-center">
        <div class="col-lg-3 col-md-4 col-12">
            <div class="card mb-3"> 
                <div class="card-body p-3 card-head-bgcolor">
                        <div class="d-flex justify-content-between">
                            <h6 class="m-0">Category</h6>
                        </div>
                </div>

                <div class="card-body py-3">
                    <a href="#" title="Automotive - Vehicles">
                        <div class="d-flex">
                            <span class="mb-2 px-1">Automotive - Vehicles</span>
                        </div>
                    </a>
                    <a href="#" title="Banking & Finance">
                        <div class="d-flex">
                            <span class="mb-2 px-1">Banking & Finance</span>
                        </div>
                    </a>
                   
                </div>

            </div>
        </div>
    </div>  

</div>

@stop