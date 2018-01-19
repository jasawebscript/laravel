@extends('layouts.lesson')

@section('title', 'Building Websites from Scratch')

@section('courseHeader')
    <h1>Become Web Developer</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>Learn HTML</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. Learn HTML</a></li>
        <li><a class="list-group-item" href="">2. Learn CSS</a></li>
        <li><a class="list-group-item" href="">3. Make Layout</a></li>
        <li><a class="list-group-item" href="">4. Responsive Design</a></li>
        <li><a class="list-group-item" href="">5. Solve problems</a></li>
        <li><a class="list-group-item" href="">6. Design Principles</a></li>
        <li><a class="list-group-item" href="">7. Create a website</a></li>
        <li><a class="list-group-item" href="">8. Improve with JavaScript</a></li>
    </ul>
@endsection