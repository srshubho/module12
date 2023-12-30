@extends('layout.master')

@section('title', 'Add trip')

@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit trip</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('trips.index') }}">trips</a></li>
                                    <li class="breadcrumb-item active">Create </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <x-session type="error" />

                <form id="createtrip-form" autocomplete="off" class="needs-validation"
                    action="{{ route('trips.update', $trip->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Add trip</h5>
                                </div>
                                <!-- end card header -->
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="addtrip-general-info" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="name">trip
                                                            Name</label>
                                                        <input type="text" class="form-control"
                                                            id="manufacturer-name-input" name="name"
                                                            value="{{ $trip->name }}" placeholder="Enter trip name">
                                                        @error('name')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="departure_location">Trip
                                                            departure Location</label>
                                                        <select class="form-select mb-3" aria-label="Default select example"
                                                            name="departure_location_id" x-on:change="filterLocations">
                                                            <option>Open this select menu</option>
                                                            @foreach ($locations as $location)
                                                                <option value="{{ $location->id }}"
                                                                    {{ $trip->departure_location_id == $location->id ? 'selected' : '' }}>
                                                                    {{ $location->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('departure_location_id')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="name">departure
                                                            Time</label>
                                                        <input type="datetime-local" class="form-control"
                                                            id="trip-departure-time-input"-input" name="departure_time"
                                                            value="{{ $trip->departure_time }}" placeholder="">
                                                        @error('departure_time')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="code">Trip
                                                            Arrival Location</label>
                                                        <select x-model="arrivalLocationId" class="form-select mb-3"
                                                            aria-label="Default select example" name="arrival_location_id">
                                                            <option value="">Select an arrival location
                                                            </option>
                                                            @foreach ($locations as $location)
                                                                <option value="{{ $location->id }}"
                                                                    {{ $trip->arrival_location_id == $location->id ? 'selected' : '' }}>
                                                                    {{ $location->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('arrival_location_id')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->


                                            <!-- end row -->
                                        </div>
                                        <!-- end tab-pane -->

                                        <div class="tab-pane" id="addtrip-metadata" role="tabpanel">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="meta-title-input">Meta
                                                            title</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter meta title" id="meta-title-input">
                                                    </div>
                                                </div>
                                                <!-- end col -->

                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="meta-keywords-input">Meta
                                                            Keywords</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter meta keywords" id="meta-keywords-input">
                                                    </div>
                                                </div>
                                                <!-- end col -->
                                            </div>
                                            <!-- end row -->

                                            <div>
                                                <label class="form-label" for="meta-description-input">Meta
                                                    Description</label>
                                                <textarea class="form-control" id="meta-description-input" placeholder="Enter meta description" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <!-- end tab pane -->
                                    </div>
                                    <!-- end tab content -->
                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                            <div class="text-end mb-3">
                                <button type="submit" class="btn btn-primary w-sm">Submit</button>

                                <a href="{{ route('trips.index') }}" class="btn btn-secondary w-sm">Back</a>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </form>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content --
    @endSection
