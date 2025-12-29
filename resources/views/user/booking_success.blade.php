@extends('user.layouts.app')

@section('content')

<section class="about-one">
    <div class="container text-center">
        <div class="about-one__image">
           <i class="fas fa-check-circle text-success" style="font-size: 100px; margin-bottom: 20px;"></i>
        </div>
        <h2 class="about-one__title">Thank you for your booking!</h2>
        <p>Your payment has been processed successfully. We have sent the details to your email.</p>
        <div class="mt-5">
            <a href="{{ route('welcome') }}" class="thm-btn">Return Home</a>
            <a href="{{ route('motorcycles.index') }}" class="thm-btn">Rent Another</a>
        </div>
    </div>
</section>
<br>
@endsection
