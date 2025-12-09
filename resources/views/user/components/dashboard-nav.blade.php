{{-- resources/views/user/components/dashboard-nav.blade.php --}}

<div class="list-group user-dashboard-nav">
    <h5 class="mb-3">Dashboard Menu</h5>
    <a href="{{ route('user.dashboard') }}" 
       class="list-group-item list-group-item-action {{ Request::routeIs('user.dashboard') ? 'active' : '' }}">
        <i class="fas fa-home me-2"></i> Dashboard Overview
    </a>
    <a href="{{ route('user.profile.edit') }}" 
       class="list-group-item list-group-item-action {{ Request::routeIs('user.profile.edit') ? 'active' : '' }}">
        <i class="fas fa-user-circle me-2"></i> Edit Profil
    </a>
    <a href="{{ route('user.bookings') }}" 
       class="list-group-item list-group-item-action {{ Request::routeIs('user.bookings') ? 'active' : '' }}">
        <i class="fas fa-car me-2"></i> Riwayat Pemesanan
    </a>
    <a href="{{ route('user.notifications') }}" 
       class="list-group-item list-group-item-action {{ Request::routeIs('user.notifications') ? 'active' : '' }}">
        <i class="fas fa-bell me-2"></i> Notifikasi
    </a>
    <a href="{{ route('logout') }}" 
       class="list-group-item list-group-item-action text-danger"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt me-2"></i> Logout
    </a>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>