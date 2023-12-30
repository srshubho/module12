@extends('layout.master')
@section('title', 'Product')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <x-session type="success" />
                <x-session type="error" />
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">allocatedSeatss</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    <li class="breadcrumb-item active">allocatedSeatss</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">

                    <!-- end col -->

                    <div class="col-xl-9 col-lg-8">
                        <div>
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="row g-4">
                                        <div class="col-sm-auto">

                                        </div>
                                        <div class="col-sm">
                                            <div class="d-flex justify-content-sm-end">
                                                <div class="search-box ms-2">
                                                    <input type="text" class="form-control" id="searchProductList"
                                                        placeholder="Search Products...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header">

                                </div>
                                <!-- end card header -->
                                <div class="card-body">

                                    <x-table :headers="['Name', 'departure', 'arrival', 'departure time', 'number of seats']" :actions="false">
                                        @foreach ($allocatedSeats as $allocatedSeat)
                                            <tr>
                                                <td>{{ $allocatedSeat->trip->name }}</td>
                                                <td>{{ $allocatedSeat->trip->departureLocation->name }}</td>
                                                <td>{{ $allocatedSeat->trip->arrivalLocation->name }}</td>
                                                <td>{{ $allocatedSeat->trip->departure_time }}</td>
                                                <td>
                                                    {{ $allocatedSeat->number_of_seats }}
                                                </td>


                                            </tr>
                                        @endforeach
                                    </x-table>

                                </div>
                                <!-- end card body -->
                            </div>
                            <!-- end card -->
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
    </div>
@endSection
