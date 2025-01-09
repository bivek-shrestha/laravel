<nav class="sticky-top">

    <a href="{{route('frontend.home') }}">Home</a>
    <a href="{{ route('frontend.about') }}">About Us</a>
    <a href="{{ route('frontend.services') }}">Services</a>
    <a href="{{ route('frontend.contact') }}"Contact>Contact</a>
    <a href="{{ route('frontend.specialities') }}">Specialities</a>
    <a href="{{ route('frontend.doctor')}}">Doctors</a>
    <a href="{{ route('admin.appointment') }}">Appointment</a>
    @if (auth()->check())
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
    @else
        <a href="{{ route('login') }}">Login</a>
    @endif
</nav>
