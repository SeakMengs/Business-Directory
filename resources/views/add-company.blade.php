@extends('layout.master')

@section('dyncontent')
    @if (session('success'))
        <!-- Alert for success -->
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <!-- Success message -->
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <!-- Button to close the alert -->
        </div>
    @endif

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card mx-auto">
                    <form
                        action="{{ route('user.company.name.add-company.save', ['name' => Auth::guard('companyUser')->user()->name]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header text-center">
                            <h5>Create New Listing</h5> <!-- Card title -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label for="name" class="form-label">Company Name:</label>
                                        <!-- Label for the company name input field -->
                                        <input type="text" name="name" class="form-control" id="name">
                                        <!-- Company name input field -->
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="phone" class="form-label">Phone:</label>
                                        <button type="button" onclick="CloneInputDom('phones')">Add</button>
                                        <button type="button" onclick="PopBackInputDom('phones')">Remove </button>
                                        <!-- Label for the phone input field -->
                                        <input type="text" name="phone_number[]" class="form-control phones mb-2"
                                            id="phone">
                                        <!-- Phone input field -->
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="email" class="form-label">Email:</label>
                                        <!-- Label for the email input field -->
                                        <input type="email" name="email" class="form-control" id="email">
                                        <!-- Email input field -->
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="website" class="form-label">Website:</label>
                                        <!-- Label for the website input field -->
                                        <input type="text" name="website" class="form-control" id="website">
                                        <!-- Website input field -->
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="category" class="form-label">Category:</label>
                                        <!-- Label for the website input field -->
                                        <select class="form-select" name="category" id="category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- Website input field -->
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="logo" class="form-label">Logo:</label>
                                        <!-- Label for the logo file input field -->
                                        <input type="file" name="logo" class="form-control" id="logo">
                                        <!-- Logo file input field -->
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="galleries" class="form-label">Galleries:</label>
                                        <button type="button" onclick="CloneInputDom('galleries')">Add</button>
                                        <button type="button" onclick="PopBackInputDom('galleries')">Remove </button>
                                        <!-- Label for the galleries file input field -->
                                        <input class="galleries mb-2 form-control" type="file" name="photo_url[]"
                                            class="form-control" id="galleries" multiple>
                                        <!-- Galleries file input field -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    {{-- Address --}}
                                    <div class="form-group mb-2">
                                        <div class="form-group mb-2">
                                            <label for="street" class="form-label">Street:</label>
                                            <input class="form-control" name="street" id="street"
                                                rows="3"></input>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="city" class="form-label">City:</label>
                                            <input class="form-control" name="city" id="city"
                                                rows="3"></input>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="district" class="form-label">District:</label>
                                            <input class="form-control" name="district" id="district"
                                                rows="3"></input>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="commune" class="form-label">Commune:</label>
                                            <input class="form-control" name="commune" id="commune"
                                                rows="3"></input>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="village" class="form-label">Village:</label>
                                            <input class="form-control" name="village" id="village"
                                                rows="3"></input>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="description" class="form-label">Description:</label>
                                        <!-- Label for the description textarea field -->
                                        <textarea class="form-control" id="description" rows="5" name="description"></textarea> <!-- Description textarea field -->
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="services" class="form-label">Services:</label>
                                        <button type="button" onclick="CloneInputDom('services')">Add</button>
                                        <button type="button" onclick="PopBackInputDom('services')">Remove </button>
                                        <!-- Label for the services textarea field -->
                                        <input class="form-control mb-2 services" name="service[]" id="services"
                                            rows="5"></input> <!-- Services textarea field -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">List Company</button>
                            <!-- Button to submit the form for approval -->
                        </div>
                        {{-- error style here --}}
                        @if ($errors->any())
                            <div class="error-message">
                                <ul class="error-list">
                                    @foreach ($errors->all() as $error)
                                        <!-- <li>{{ $error }}</li> -->
                                        <li><i class="fas fa-exclamation-circle error-icon"></i>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Clone the input field class
        function CloneInputDom(className) {
            const nodes = document.querySelectorAll(`.${className}`);
            const currentExistingInput = nodes.length;

            // prevent company to have more than 3 phone numbers
            if (className === 'phones' && currentExistingInput >= 3) {
                return;
            }

            // copy only one and it's the first input
            const node = nodes[0];

            // clone the node
            let clone = node.cloneNode(true);

            // reset the value for new input
            clone.value = '';
            // inrease the id for identification
            clone.id += nodes.length;

            node.parentNode.appendChild(clone);
        }

        function PopBackInputDom(className) {
            let nodes = document.querySelectorAll(`.${className}`);
            const currentExistingInput = nodes.length;

            if (currentExistingInput <= 1) {
                return;
            }

            // remove last input
            nodes[currentExistingInput - 1].remove();
        }
    </script>

@stop
