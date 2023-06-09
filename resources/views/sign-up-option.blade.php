@extends('layout.master')

@section('dyncontent')

    <div class="container my-5 login-option-page">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Sign-up option</h5> <!-- Card title -->
                        <div class="d-grid gap-2 mb-3">
                            <a class="btn btn-primary" href="/sign-up/user">
                                Sign-up for user
                            </a>
                            <!-- Button for user signup -->
                            <a class="btn btn-primary" href="/sign-up/company">
                                Sign-up for company
                            </a>
                            <!-- Button for company signup -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@stop
