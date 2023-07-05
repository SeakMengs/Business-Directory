@extends('layout.master')

@section('dyncontent')
    @if (session('success'))
        <!-- Alert for success -->
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <!-- Success message -->
            <button type="button" class="btn-close alert-success" data-bs-dismiss="alert" aria-label="Close"></button>
            <!-- Button to close the alert -->
        </div>
    @elseif ($errors->any())
        <!-- Alert for error -->
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> {{ $errors->first() }}
            <!-- Error message -->
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <!-- Button to close the alert -->
        </div>
    @endif
    @if ($company)
        <div class="container my-5 custom-listing-form">
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <div class="card mx-auto">
                        <form
                            action="{{ route('user.company.name.id.edit-company.save', [
                                'name' => Auth::guard('companyUser')->user()->name,
                                'id' => Auth::guard('companyUser')->user()->company_user_id,
                                'company_id' => $company->company_id,
                            ]) }}"
                            method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="card-header text-center">
                                <h5>Edit Listing</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-2">
                                            <label for="name" class="form-label">Company Name:</label>
                                            <!-- Label for the company name input field -->
                                            <input type="text" name="name" class="form-control" id="name"
                                                value="{{ $company->name }}">
                                            <!-- Company name input field -->
                                        </div>
                                        <div class="form-group mb-2" id="phone-parent">
                                            <label for="phone" class="form-label">Phone:</label>
                                            <button type="button" onclick="addInput('new-phones')"
                                                class="add-rem-button">Add</button>
                                            <button type="button" onclick="PopBackInputDom('new-phones')"
                                                class="add-rem-button">Remove </button>
                                            <!-- Label for the phone input field -->

                                            @if ($company->contacts->isNotEmpty())
                                                @foreach ($company->contacts as $contact)
                                                    <div class="input-delete phones-check"
                                                        id="phone-id-{{ $contact->contact_id }}">
                                                        <input type="text"
                                                            name="phone_number[{{ $contact->contact_id }}]"
                                                            class="form-control mb-2" id="phone"
                                                            value="{{ $contact->phone_number }}">
                                                        <i onclick="removeInputById('phone-id-{{ $contact->contact_id }}', 'phones-check')"
                                                            class="fa-solid fa-trash-can mb-2" style="color: #ff0026;"></i>
                                                    </div>
                                                @endforeach
                                            @else
                                                <input type="text" name="add_phone_number[]"
                                                    class="form-control phones mb-2" id="phone">
                                            @endif
                                            <!-- Phone input field -->
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="email" class="form-label">Email:</label>
                                            <!-- Label for the email input field -->
                                            <input type="email" name="email" class="form-control" id="email"
                                                value="{{ $company->email }}">
                                            <!-- Email input field -->
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="website" class="form-label">Website:</label>
                                            <!-- Label for the website input field -->
                                            <input type="text" name="website" class="form-control" id="website"
                                                value="{{ $company->website }}">
                                            <!-- Website input field -->
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="category" class="form-label">Category:</label>
                                            <!-- Label for the website input field -->
                                            <select class="form-select" name="category" id="category">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->category_id }}"
                                                        {{ $company->category_id == $category->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <!-- Website input field -->
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="logo" class="form-label">Logo:</label>
                                            <!-- Label for the logo file input field -->
                                            <input type="file" name="logo" class="form-control mb-2" id="logo">
                                            <img src="{{ $company->logo }}" class="card-img-top company-logo"
                                                alt="Company Logo">
                                            <!-- Logo file input field -->
                                        </div>
                                        <div class="form-group mb-2" id="gallery-parent">
                                            <label for="galleries" class="form-label">Galleries:</label>
                                            <button type="button" onclick="addInput('new-galleries')"
                                                class="add-rem-button">Add</button>
                                            <button type="button" onclick="PopBackInputDom('new-galleries')"
                                                class="add-rem-button">Remove </button>
                                            <!-- Label for the galleries file input field -->
                                            @if ($company->galleries->isNotEmpty())
                                                @foreach ($company->galleries as $gallery)
                                                    <div class="input-delete galleries-check"
                                                        id="gallery-id-{{ $gallery->gallery_id }}">
                                                        {{-- we will never update the image, we only allow user to delete the old one and update a new one --}}
                                                        <input style="display: none" type="text"
                                                            name="photo_url[{{ $gallery->gallery_id }}]"
                                                            class="form-control mb-2" id="galleries"
                                                            value="{{ $gallery->photo_url }}">
                                                        <img src="{{ $gallery->photo_url }}"
                                                            class="card-img-top company-logo" alt="Company Gallery">
                                                        <i onclick="removeInputById('gallery-id-{{ $gallery->gallery_id }}', 'galleries-check')"
                                                            class="fa-solid fa-trash-can mb-2"
                                                            style="color: #ff0026;"></i>
                                                    </div>
                                                @endforeach
                                            @else
                                                <input class="galleries mb-2 form-control" type="file"
                                                    name="add_gallery[]" class="form-control" id="galleries" multiple>
                                            @endif
                                            <!-- Galleries file input field -->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        {{-- Address --}}
                                        <div class="form-group mb-2">
                                            <div class="form-group mb-2">
                                                <label for="street" class="form-label">Street:</label>
                                                <input class="form-control" name="street" id="street" rows="3"
                                                    value="{{ $company->street }}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="city" class="form-label">City:</label>
                                                <input class="form-control" name="city" id="city" rows="3"
                                                    value="{{ $company->city }}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="district" class="form-label">District:</label>
                                                <input class="form-control" name="district" id="district"
                                                    rows="3" value="{{ $company->district }}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="commune" class="form-label">Commune:</label>
                                                <input class="form-control" name="commune" id="commune" rows="3"
                                                    value="{{ $company->commune }}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="village" class="form-label">Village:</label>
                                                <input class="form-control" name="village" id="village" rows="3"
                                                    value="{{ $company->village }}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="description" class="form-label">Description:</label>
                                            <!-- Label for the description textarea field -->
                                            <textarea class="form-control" id="description" rows="5" name="description">{{ $company->description }}</textarea> <!-- Description textarea field -->
                                        </div>
                                        <div class="form-group mb-2" id="service-parent">
                                            <label for="services" class="form-label">Services:</label>
                                            <button type="button" onclick="addInput('new-services')"
                                                class="add-rem-button">Add</button>
                                            <button type="button" onclick="PopBackInputDom('new-services')"
                                                class="add-rem-button">Remove </button>
                                            <!-- Label for the services textarea field -->
                                            @if ($company->services->isNotEmpty())
                                                @foreach ($company->services as $service)
                                                    <div class="input-delete services-check"
                                                        id="service-id-{{ $service->service_id }}">
                                                        <input type="text" name="services[{{ $service->service_id }}]"
                                                            class="form-control mb-2" id="services"
                                                            value="{{ $service->name }}">
                                                        <i onclick="removeInputById('service-id-{{ $service->service_id }}', 'services-check')"
                                                            class="fa-solid fa-trash-can mb-2"
                                                            style="color: #ff0026;"></i>
                                                    </div>
                                                @endforeach
                                            @else
                                                <input type="text" name="add_service[]"
                                                    class="form-control services mb-2" id="services" value="">
                                            @endif
                                            <!-- Services textarea field -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Save Changes button -->
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <a href="/user/company/{{ Auth::guard('companyUser')->user()->name }}/{{ Auth::guard('companyUser')->user()->company_user_id}}/profile">
                                    <button type="button" class="btn btn-primary">Cancel</button>
                                </a>
                            </div>
                            {{-- error style here --}}
                            @if ($errors->any())
                                <div class="error-message">
                                    <ul class="error-list">
                                        @foreach ($errors->all() as $error)
                                            <!-- <li>{{ $error }}</li> -->
                                            <li><i class="fas fa-exclamation-circle error-icon"></i>{{ $error }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    @else
        <h1 class="not-company">The company that you are looking for doesn't belong to your account :(</h1>
    @endif
    </div>

    <!-- Include the JavaScript file -->
    <script src="{{ asset('assets/js/edit-company.js') }}"></script>
@stop
