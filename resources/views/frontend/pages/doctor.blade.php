@extends('frontend.main')

@section('content')
<div class="container my-5">
    <h1 class="text-center mb-4">Meet Our Doctors</h1>
    <div class="row g-4">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <img src="{{asset('assets/images/doctors/1736154575.jpg')}}" alt="">
                <div class="card-body">
                    <h5 class="card-title text-primary"><strong>Dr. Rammaya Gurung</strong></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Cardiologist</h6>
                    <p class="card-text">
                        Specializes in heart conditions, including diagnostics, treatments, and surgery.<br>
                        <strong>Experience:</strong> 15+ years<br>
                        <strong>Contact:</strong> <a href="mailto:rammayagurung@gmail.com">ramgurung@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <img src="{{asset('assets/images/doctors/1736154603.jpg')}}" alt="">
                <div class="card-body">
                    <h5 class="card-title text-primary"><strong>Dr. Hari Shrestha</strong></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Neurologist</h6>
                    <p class="card-text">
                        Expert in brain, spine, and nervous system disorders.<br>
                        <strong>Experience:</strong> 10+ years<br>
                        <strong>Contact:</strong> <a href="mailto:hareestha@gmail.com">seetastha@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <img src="{{asset('assets/images/doc2.jpg')}}" alt="">
                <div class="card-body">
                    <h5 class="card-title text-primary"><strong>Dr. Ram Thapa</strong></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Oncologist</h6>
                    <p class="card-text">
                        Specializes in cancer diagnosis and treatment.<br>
                        <strong>Experience:</strong> 12+ years<br>
                        <strong>Contact:</strong> <a href="mailto:raamthapa@gmail.com">reetathapa@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <img src="{{asset('assets/images/doc3.jpg')}}" alt="">
                <div class="card-body">
                    <h5 class="card-title text-primary"><strong>Dr. Hari Bhattarai</strong></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Pediatrician</h6>
                    <p class="card-text">
                        Provides care for infants, children, and adolescents.<br>
                        <strong>Experience:</strong> 8+ years<br>
                        <strong>Contact:</strong> <a href="mailto:bhattaraihari12@gmail.com">bhattaraihari12@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <img src="{{asset('assets/images/doc 4.jpg')}}" alt="">
                <div class="card-body">
                    <h5 class="card-title text-primary"><strong>Dr. Shyam Stha</strong></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Orthopedic Surgeon</h6>
                    <p class="card-text">
                        Specializes in bone, joint, and muscle treatments.<br>
                        <strong>Experience:</strong> 18+ years<br>
                        <strong>Contact:</strong> <a href="mailto:shresthashaym123@gmail.com">shresthashaym123@gmail.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
