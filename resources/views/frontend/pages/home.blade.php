@extends('frontend.main')

@push('css')
<style>
    img {
        object-fit: cover;
    }
</style>
@endpush

@section('header')
    <header>
        <h1>Welcome to Our Hospital Management System</h1>
    </header>
@endsection

@section('content')

    <section>
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="100">
                <img src="{{asset('assets/images/stethoscope-4280497_1280.jpg')}}" class="d-block w-100" height="500" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="{{asset('assets/images/woman-2141808_640.jpg')}}" class="d-block w-100" height="600" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{asset('assets/images/laboratory-563423_640.jpg')}}" class="d-block w-100" height="500" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </section>


    <section class="hms">
        <h1>Your Health, Our Priority</h1>
        <p>We provide the best medical services with advanced technology.</p>

    </section>
    <section class="hospital">
        <div>
            <h3>Patient Management</h3>
            <p>Efficiently manage patient records and appointments.</p>
        </div>
        <div>
            <h3>Doctor Scheduling</h3>
            <p>Keep track of doctor availability and schedules.</p>
        </div>
        <div>
            <h3>Billing & Payments</h3>
            <p>Streamline hospital billing and payment processes.</p>
        </div>

    </section>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3514.818914924989!2d83.98137417454146!3d28.24317550165694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399595fb3df356a9%3A0x6214dced5f040c97!2sHari%20chowk!5e0!3m2!1sen!2snp!4v1735897825191!5m2!1sen!2snp" width="1400" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
@endsection
