@extends('user.layouts.app')

@section('content')

<section class="about-one">
    <div class="container text-center">
        <div class="about-one__image">
           <i class="fas fa-times-circle text-danger" style="font-size: 100px; margin-bottom: 20px;"></i>
        </div>
        <h2 class="about-one__title">Payment Failed or Cancelled</h2>
        <p>We could not process your payment, or the transaction was cancelled. Please try again.</p>
        <div class="mt-5">
            <a href="{{ route('motorcycles.index') }}" class="thm-btn">Try Again</a>
            <a href="{{ route('welcome') }}" class="thm-btn">Return Home</a>
        </div>
    </div>
</section>
<br>
@endsection
