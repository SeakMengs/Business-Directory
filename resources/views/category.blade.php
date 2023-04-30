@extends('layout.master')

@section('dyncontent')
<div class="container">

    <h2 class="text-center pb-3">Categories</h2>
    <div class="row d-flex justify-content-center">
       <div class="col-md-9">
            <div class="accordion accordion-flush" id="Categories">
                <div class="accordion-item acc-item-bmargin">
                    <h2 class="accordion-header">
                        <!-- Category name -->
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Automotive - Vehicles
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row">
                                <!-- Subcategories -->
                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="Automobile Glass Coating" class="text-decoration-none">Automobile Glass Coating</a>
                                </div>

                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="Automotive Maintenance Equipment" class="text-decoration-none">Automotive Maintenance Equipment</a>
                                </div>

                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="Battery Supplies" class="text-decoration-none">Battery Supplies</a>
                                </div>

                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="Bulldozer" class="text-decoration-none">Bulldozer</a>
                                </div>

                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="D" class="text-decoration-none">D</a>
                                </div>
                                 <!-- End Subcategories -->
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="accordion-item acc-item-bmargin">
                    <h2 class="accordion-header">
                        <!-- Category name -->
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                             Banking & Finance
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row">
                                <!-- Subcategories -->
                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="Banking Equipment & Supplies" class="text-decoration-none">Banking Equipment & Supplies</a>
                                </div>

                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="D" class="text-decoration-none">D</a>
                                </div>

                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="D" class="text-decoration-none">D</a>
                                </div>

                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="D" class="text-decoration-none">D</a>
                                </div>
                                 <!-- End Subcategories -->
                            </div>
                        </div>
                    </div>
                </div>  

                <div class="accordion-item acc-item-bmargin">
                    <h2 class="accordion-header">
                        <!-- Category name -->
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Business Services
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            <div class="row">
                                <!-- Subcategories -->
                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="D" class="text-decoration-none">D</a>
                                </div>

                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="D" class="text-decoration-none">D</a>
                                </div>

                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="D" class="text-decoration-none">D</a>
                                </div>

                                <div class="col-12 col-md-4 subcate-list-bmargin">
                                    <a href="#" title="D" class="text-decoration-none">D</a>
                                </div>
                                 <!-- End Subcategories -->
                            </div>
                        </div>
                    </div>
                </div>  
 
            </div>
              
       </div>
   </div> 
</div>

@stop