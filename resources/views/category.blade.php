@extends('layout.master')

@section('dyncontent')
<div class="container">
    <h2 class="text-center pb-3">Categories</h2>
        <div class="row d-flex justify-content-center">
            <div class="col-md-9">
                <!-- First category -->
                <div class="accordion accordion-flush" id="Categories">
                    <div class="accordion-item acc-item-bmargin">
                        <h2 class="accordion-header">
                            <!-- Category name -->
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#automotive" aria-expanded="false" aria-controls="automotive">
                                Automotive - Vehicles
                            </button>
                        </h2>
                        <div id="automotive" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="row">
                                    <!-- Subcategories -->
                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="/subcate1" title="Automobile Glass Coating" class="text-decoration-none">Automobile Glass Coating</a>
                                    </div>

                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Automotive Maintenance Equipment" class="text-decoration-none">Automotive Maintenance Equipment</a>
                                    </div>

                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Battery Supplies" class="text-decoration-none">Battery Supplies</a>
                                    </div>

                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Car & Automobile - Garage Services" class="text-decoration-none">Car & Automobile - Garage Services</a>
                                    </div>
                                    <!-- End Subcategories -->
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End First category -->

                <!-- Second category -->
                    <div class="accordion-item acc-item-bmargin">
                        <h2 class="accordion-header">
                            <!-- Category name -->
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#banking" aria-expanded="false" aria-controls="banking">
                                Banking & Finance
                            </button>
                        </h2>
                        <div id="banking" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="row">
                                    <!-- Subcategories -->
                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Banking Equipment & Supplies" class="text-decoration-none">Banking Equipment & Supplies</a>
                                    </div>

                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Banks & Finance" class="text-decoration-none">Banks & Finance</a>
                                    </div>

                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Loan Brokerage" class="text-decoration-none">Loan Brokerage</a>
                                    </div>

                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Money Exchange" class="text-decoration-none">Money Exchange</a>
                                    </div>
                                    <!-- End Subcategories -->
                                </div>
                            </div>
                        </div>
                    </div>  
                <!-- End Second category -->

                <!-- Third category -->
                    <div class="accordion-item acc-item-bmargin">
                        <h2 class="accordion-header">
                            <!-- Category name -->
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#businesservice" aria-expanded="false" aria-controls="businesservice">
                                Business Services
                            </button>
                        </h2>
                        <div id="businesservice" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="row">
                                    <!-- Subcategories -->
                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Accountants - General" class="text-decoration-none">Accountants - General</a>
                                    </div>

                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Agricultural Consultants & Development" class="text-decoration-none">Agricultural Consultants & Development</a>
                                    </div>

                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Artists - Commercial" class="text-decoration-none">Artists - Commercial</a>
                                    </div>

                                    <div class="col-12 col-md-4 subcate-list-bmargin">
                                        <a href="#" title="Audit Services" class="text-decoration-none">Audit Services</a>
                                    </div>
                                    <!-- End Subcategories -->
                                </div>
                            </div>
                        </div>
                    </div> 
                <!-- End Third category --> 
    
                </div>  
            </div>
    </div> 
</div>

@stop