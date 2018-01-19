@extends('layouts.lesson')

@section('title', 'Digital Graphics')

@section('courseHeader')
    <h1>Become Digital Graphics Professional</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>Introduction to Graphic design</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. Introduction to Graphic design</a></li>
        <li><a class="list-group-item" href="">2. Layout and Composition</a></li>
        <li><a class="list-group-item" href="">3. Typography</a></li>
        <li><a class="list-group-item" href="">4. Colors for Design</a></li>
        <li><a class="list-group-item" href="">5. Introduction to Photoshop</a></li>
        <li><a class="list-group-item" href="">6. Logo Design</a></li>
        <li><a class="list-group-item" href="">7. Branding</a></li>
    </ul>
@endsection