@php
    $trips = \App\Models\Trip::all();
@endphp
@extends('layout.master')

@section('title', 'Add trip')

@section('content')
    <div class="main-content" x-data="{
        showTrips: false
    
    }">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Create trip</h4>

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
                <form id="createtrip-form" autocomplete="off" class="needs-validation" action="{{ route('tickets.store') }}"
                    method="POST">
                    @csrf
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
                                                        <label class="form-label" for="name">Trip
                                                            Name: <span
                                                                class="text-primary">{{ $trip->name }}</span></label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="departure_location">Trip
                                                            departure Location :
                                                            <span
                                                                class="text-primary">{{ $trip->departureLocation->name }}</span></label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="name">departure
                                                            Time : <span
                                                                class="text-primary">{{ $trip->departure_time }}</span></label>

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="code">Trip
                                                            Arrival Location : <span
                                                                class="text-primary">{{ $trip->arrivalLocation->name }}</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label" for="name">Number of Seats : </label>

                                                        <input type="number" class="form-control"
                                                            placeholder="Enter number of seats" name="number_of_seats"
                                                            id="number_of_seats">
                                                        @error('number_of_seats')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <input type="hidden" name="trip_id" value="{{ $trip->id }}">
                                                        <input type="hidden" name="user_id"
                                                            value="{{ auth()->user()->id }}">
                                                    </div>
                                                </div>
                                            </div>

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
                <button class="btn btn-warning w-sm mb-3" x-on:click="showTrips = !showTrips">Show Trips</button>
                <div class="card-body" x-show="showTrips">

                    <x-table :headers="['Name', 'departure', 'arrival', 'departure time']">
                        @foreach ($trips as $trip)
                            <tr>
                                <td>{{ $trip->name }}</td>
                                <td>{{ $trip->departureLocation->name }}</td>
                                <td>{{ $trip->arrivalLocation->name }}</td>
                                <td>{{ $trip->departure_time }}</td>
                                <td>
                                    <a href="{{ route('tickets.create', $trip->id) }}" class="btn btn-md btn-primary">Buy
                                        Ticket</a>

                                </td>

                            </tr>
                        @endforeach
                    </x-table>

                </div>

            </div>
            <!-- container-fluid -->
        </div>
    </div>

@endSection
