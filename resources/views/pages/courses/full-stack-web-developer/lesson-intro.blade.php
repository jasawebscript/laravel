@extends('layouts.lesson')

@section('title', 'Coding Fundamentals')

@section('courseHeader')
    <h1>Learn Coding Fundamentals</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>Introduction to HTML and CSS</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. Introduction to HTML and CSS</a></li>
        <li><a class="list-group-item" href="">2. HTML</a></li>
        <li><a class="list-group-item" href="">3. CSS</a></li>
        <li><a class="list-group-item" href="">4. JavaScript</a></li>
        <li><a class="list-group-item" href="">5. CSS Layout</a></li>
        <li><a class="list-group-item" href="">6. Responsive Layouts</a></li>
        <li><a class="list-group-item" href="">7. HTML Forms</a></li>
        <li><a class="list-group-item" href="">8. JavaScript Loops, Arrays and Objects</a></li>
    </ul>
@endsection