@extends('layouts.lesson')

@section('title', 'Robotics')

@section('courseHeader')
    <h1>Become Robotics Developer</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>Introduction to Robotics</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. Introduction to Robotics</a></li>
        <li><a class="list-group-item" href="">2. Aerial Robotics</a></li>
        <li><a class="list-group-item" href="">3. Computational Motion Planning</a></li>
        <li><a class="list-group-item" href="">4. Mobility</a></li>
        <li><a class="list-group-item" href="">5. Perception</a></li>
        <li><a class="list-group-item" href="">6. Estimation and Learning</a></li>
        <li><a class="list-group-item" href="">7. Capstone</a></li>
    </ul>
@endsection