<div class="col-xl-4 col-lg-6 col-md-6 mb-4">
    <div class="listing-one__single">
        <div class="listing-one__img">
            <img src="{{ asset($motorcycle->image_path && file_exists(public_path('storage/motorcycles/' . $motorcycle->image_path)) ? 'storage/motorcycles/' . $motorcycle->image_path : 'assets/images/resources/RIDEnotrasparan.png') }}" alt="{{ $motorcycle->category }}">
            <div class="listing-one__brand-name">
                <p>{{ strtoupper($motorcycle->brand) }}</p>
            </div>
        </div>
        <div class="listing-one__content">
            <h3 class="listing-one__title"><a href="#">{{ $motorcycle->category }}</a></h3>
            <div class="listing-one__meta-box-info">
                <ul class="list-unstyled listing-one__meta">
                    <li style="display: flex; align-items: center; gap: 8px;">
                        <div class="icon"><span class="icon-manual"></span></div>
                        <div class="text"><p>{{ ucfirst($motorcycle->transmission) }}</p></div>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px;">
                        <div class="icon"><span class="icon-mileage"></span></div>
                        <div class="text"><p>{{ $motorcycle->cc }} CC</p></div>
                    </li>
                    <li style="display: flex; align-items: center; gap: 8px;">
                        <div class="icon"><span class="icon-fuel-type"></span></div>
                        <div class="text"><p>{{ $motorcycle->fuel_configuration }}</p></div>
                    </li>
                </ul>
            </div>
            <div class="listing-one__car-rent-box">
                <p class="listing-one__car-rent">Starting From <span>Rp {{ number_format($motorcycle->price, 0, ',', '.') }}/</span> Day</p>
            </div>
            <div class="listing-one__btn-box">
                <a href="{{ route('login') }}" class="thm-btn">Details Now<span class="fas fa-arrow-right"></span></a>
            </div>
        </div>
    </div>
</div>