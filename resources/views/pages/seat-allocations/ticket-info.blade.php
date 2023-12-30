@extends('layout.master')

@section('title', 'Ticket Info')

@section('content')
    <x-main-content>
        <x-session type="success" />
        <x-session type="error" />
        <div class="col-xxl-4 col-lg-6">
            <div class="card card-body">
                <h4 class="card-title text-center headline">Ticket Info</h4>
                @if (!$userTicketInfo->isEmpty())
                    {{-- @dd($userTicketInfo) --}}
                    @foreach ($userTicketInfo as $userTicket)
                        <p class="card-text text-bold"><strong class="text-primary">Trip Name </strong>
                            :</b> {{ $userTicket->trip->name }}.</p>
                        <p class="card-text text-bold"><strong class="text-primary">Trip Departure Location </strong>
                            :</b> {{ $userTicket->trip->departureLocation->name }}.</p>
                        <p class="card-text text-bold"><strong class="text-primary">Trip Arrival Location </strong>
                            :</b> {{ $userTicket->trip->arrivalLocation->name }}.</p>
                        <p class="card-text text-bold"><strong class="text-primary">Total Seats </strong>
                            :</b> {{ $userTicket->number_of_seats }}.</p>
                        <hr>
                        <form action="{{ route('tickets.destroy', $userTicket->id) }}" method="POST"
                            class="d-flex justify-content-center">
                            @csrf
                            @method('DELETE')

                            <button class="btn w-50 btn-danger mb-3" type="submit"> Cancel Ticket</button>
                        </form>
                    @endforeach
                    <a href="{{ route('home') }}" class="btn btn-soft-primary">Back</a>
                @else
                    <p class="card-text text-bold text-center"><strong class="text-primary">No Ticket Found </strong></p>
                    <a href="{{ route('dashboard') }}" class="btn btn-soft-primary">Buy Ticket Now</a>
                @endif
            </div>
        </div>
    </x-main-content>
@endSection
