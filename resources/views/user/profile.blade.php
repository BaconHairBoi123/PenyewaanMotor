@extends('user.layouts.app')

@section('content')
    <div class="container py-5">
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="mb-3">User Profile</h3>

                <p><strong>Name:</strong> {{ Auth::user()->name ?? '-' }}</p>
                <p><strong>Email:</strong> {{ Auth::user()->email ?? '-' }}</p>

                <p><strong>License Verification Status:</strong>
                    @if (Auth::user() && (Auth::user()->verification_status ?? 'unverified') === 'verified')
                        <span class="badge bg-success">Verified</span>
                    @else
                        <span class="badge bg-warning text-dark">Not Verified</span>
                    @endif
                </p>

                @if (Auth::user() && (Auth::user()->verification_status ?? 'unverified') !== 'verified')
                    <div class="mt-4 alert alert-info">
                        Your driving license has not been verified by an administrator.<br>
                        Please wait a few minutes. If verification does not occur, please contact the administrator.
                    </div>
                @endif

                <a href="/motorcycles" class="btn btn-primary mt-3">Back to Motorcycles</a>
            </div>
        </div>
    </div>
@endsection
