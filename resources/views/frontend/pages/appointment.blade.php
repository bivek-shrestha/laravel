@extends('frontend.main')
@section('content')

<div class="container">
    <h1>Book an Appointment</h1>
    <form action="/submit_appointment" method="post">
        @csrf
        <label for="patientName">Patient Name:</label><br>
        <input type="text" id="patientName" name="patientName" required><br><br>

        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone Number:</label><br>
        <input type="tel" id="phone" name="phone" required><br><br>

        <label for="doctor">Select Doctor:</label><br>
        <select id="doctor" name="doctor" required>
            <option value="Dr.1">Dr.1</option>
            <option value="Dr.2">Dr.2</option>
            <option value="Dr.3">Dr.3</option>
        </select><br><br>

        <label for="date">Appointment Date:</label><br>
        <input type="date" id="date" name="date" required><br><br>

        <label for="time">Preferred Time:</label><br>
        <input type="time" id="time" name="time" required><br><br>

        <label for="department">Department:</label><br>
        <input type="text" id="department" name="department" required><br><br>

        <input type="submit" value="Book Appointment">
    </form>
