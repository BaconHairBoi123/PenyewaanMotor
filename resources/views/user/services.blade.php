@extends('user.layouts.app') 

@section('content')
    
    <!-- Service Search Section -->
    <section class="service-search py-5" style="background-color: #f9f9f9;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h2 class="mb-4">Check Motorcycle Service History</h2>
                    <form action="{{ route('services') }}" method="GET" class="d-flex justify-content-center">
                        <input type="text" name="license_plate" class="form-control me-2" placeholder="Enter License Plate (e.g. B 1234 CD)" value="{{ request('license_plate') }}" style="max-width: 400px;">
                        <button type="submit" class="btn btn-primary">Check History</button>
                    </form>
                </div>
            </div>

            @if(isset($searchPerformed) && $searchPerformed)
                <div class="row mt-5">
                    <div class="col-12">
                        @if($motorcycle)
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h4 class="mb-0 text-white">Service History for {{ $motorcycle->brand }} {{ $motorcycle->type }} ({{ $motorcycle->license_plate }})</h4>
                                </div>
                                <div class="card-body">
                                    @if($serviceHistory && $serviceHistory->count() > 0)
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th>Kilometer</th>
                                                        <th>Notes (Stub)</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($serviceHistory as $history)
                                                    <tr>
                                                        <td>{{ \Carbon\Carbon::parse($history->service_date)->format('d M Y') }}</td>
                                                        <td>{{ number_format($history->kilometer, 0, ',', '.') }} km</td>
                                                        <td>-</td> {{-- Add notes column if available later --}}
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @else
                                        <div class="alert alert-info">No service records found for this motorcycle.</div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="alert alert-danger text-center">
                                Motorcycle with license plate "<strong>{{ request('license_plate') }}</strong>" not found.
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Company Services Start (Static/Dynamic Offerings) -->
    <section class="services-one">
        <div class="container">
            <div class="section-title text-center sec-title-animation animation-style1">
                <div class="section-title__tagline-box justify-content-center">
                    <span class="section-title__tagline">Our Services</span>
                </div>
                <h2 class="section-title__title title-animation">What We Offer</h2>
            </div>
            
            <div class="row">
                @foreach($companyServices as $service)
                <!--Services One Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6">
                    <div class="services-one__single">
                        <div class="services-one__icon">
                            <span class="{{ $service->icon }}"></span>
                        </div>
                        <h3 class="services-one__title"><a href="#">{{ $service->title }}</a></h3>
                        <p class="services-one__text">{{ $service->description }}</p>
                    </div>
                </div>
                <!--Services One Single End-->
                @endforeach
            </div>
        </div>
    </section>
    <!-- Services One End -->

@endsection