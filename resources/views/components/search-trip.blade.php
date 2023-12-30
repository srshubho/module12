<div>
    <form id="createtrip-form" autocomplete="off" class="needs-validation" action="{{ route('trips.search') }}"
        method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Search trips</h5>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="addtrip-general-info" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label" for="departure_location">Trip
                                                departure Location</label>
                                            <select class="form-select mb-3" aria-label="Default select example"
                                                name="departure_location_id" x-on:change="filterLocations">
                                                <option>Open this select menu</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">
                                                        {{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('departure_location_id')
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
                                                    <option value="{{ $location->id }}">
                                                        {{ $location->name }}</option>)
                                                @endforeach
                                            </select>
                                            @error('arrival_location_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end mb-3">
                <button type="submit" class="btn btn-primary w-sm">Submit</button>

                <a href="{{ route('trips.index') }}" class="btn btn-secondary w-sm">Back</a>
            </div>
        </div>




    </form>

</div>
