@extends('frontend.main')


@section('content')
<div class="container">
    <h1>Contact Us</h1>
    <div class="row">
        <div class="col-md-6">
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name">
                </div> <br><br>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email">
                </div> <br><br>

                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" rows="4"></textarea>
                </div> <br><br>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div> <br><br>

        <div class="col-md-6">
            <h3>Our Location</h3>
            <p>Bagar-1, Pokhara</p>
            <p>Phone: 9800998076</p>
            <p>Email: healthcareclinic@gmail.com</p>
        </div>
    </div>
</div>
@endsection
