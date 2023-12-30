@php
    $locations = \App\Models\Location::all();
    $trips = $trips ?? [];
    $countTrips = $countTrips ?? 0;
    $bookedSeats = $bookedSeats ?? 0;
@endphp

@extends('layout.master')
@section('title', 'StoreKeeper')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
                <x-admin>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted mb-0">Total Booked Trips</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">

                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                {{ $countTrips }}</h4>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <!-- card -->
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="text-uppercase fw-medium text-muted mb-0">Total Booked Seats</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <h5 class="text-success fs-14 mb-0">

                                            </h5>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">
                                                {{ $bookedSeats }}</h4>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-admin>

                <x-user>
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                <h4 class="mb-sm-0">Store Dashboard</h4>


                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <x-session type="success" />
                    <x-session type="error" />
                    <div class="row">
                        <x-search-trip :locations="$locations" />

                        <div class="card-body">

                            <x-table :headers="['Name', 'departure', 'arrival', 'departure time']">
                                @foreach ($trips as $trip)
                                    <tr>
                                        <td>{{ $trip->name }}</td>
                                        <td>{{ $trip->departureLocation->name }}</td>
                                        <td>{{ $trip->arrivalLocation->name }}</td>
                                        <td>{{ $trip->departure_time }}</td>
                                        <td>
                                            <a href="{{ route('tickets.create', $trip->id) }}"
                                                class="btn btn-md btn-primary">Buy
                                                Ticket</a>

                                        </td>

                                    </tr>
                                @endforeach
                            </x-table>

                        </div>
                </x-user>




            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endSection
