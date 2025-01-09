@extends('frontend.main')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Our Hospital Specialities</h1>

    <div class="container my-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    <img src="{{asset('assets/images/doctors/brain.png')}}"   alt="Neurology" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><strong>Neurology</strong></h5>
                        <p class="card-text">
                            Expert treatment for brain, spine, and nervous system disorders.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    <img src="{{asset('assets/images/doctors/bones.png')}}" alt="Orthopedics" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><strong>Orthopedics</strong></h5>
                        <p class="card-text">
                            Advanced care for bone, joint, and muscle problems, including joint replacements.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    <img src="{{asset('assets/images/doctors/uterus.png')}}" alt="Gynecology" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><strong>Gynecology</strong></h5>
                        <p class="card-text">
                            Specialized women's health services, including prenatal care and reproductive health.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    <img src="{{asset('assets/images/doctors/skin.png')}}" alt="Dermatology" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><strong>Dermatology</strong></h5>
                        <p class="card-text">
                            Comprehensive skin care, including treatment for various skin conditions and cosmetic dermatology.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    <img src="{{asset('assets/images/doctors/cardiology.png')}}" alt="Cardiology" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><strong>Cardiology</strong></h5>
                        <p class="card-text">
                            Comprehensive care for heart conditions, including diagnostics, treatments, and surgeries.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm h-100">
                    <img src="{{asset('assets/images/doctors/pediatric.png')}}" alt="Pediatrics" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title text-primary"><strong>Pediatrics</strong></h5>
                        <p class="card-text">
                            Specialized care for children, including developmental, nutritional, and general health services.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

        </div>
    </div>
</div>
@endsection
