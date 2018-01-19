@extends('layouts.lesson')

@section('title', 'VR Development')

@section('courseHeader')
    <h1>Become VR Developer</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>Introduction to VR</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. Introduction to VR</a></li>
        <li><a class="list-group-item" href="">2. Develop VR</a></li>
        <li><a class="list-group-item" href="">3. Interaction in VR</a></li>
        <li><a class="list-group-item" href="">4. User Interfaces for VR</a></li>
        <li><a class="list-group-item" href="">5. Movement in VR</a></li>
        <li><a class="list-group-item" href="">6. Deploying Your VR Project</a></li>
        <li><a class="list-group-item" href="">7. Optimization for VR in Unity</a></li>
    </ul>
@endsection