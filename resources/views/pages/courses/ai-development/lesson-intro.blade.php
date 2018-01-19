@extends('layouts.lesson')

@section('title', 'AI Development')

@section('courseHeader')
    <h1>Become AI Developer</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>Introduction to AI</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. Introduction to AI</a></li>
        <li><a class="list-group-item" href="">2. Machine learning</a></li>
        <li><a class="list-group-item" href="">3. Logic and planning</a></li>
        <li><a class="list-group-item" href="">4. Applications of AI</a></li>
        <li><a class="list-group-item" href="">5. Image processing and computer vision</a></li>
        <li><a class="list-group-item" href="">6. Natural language processing and information retrieval</a></li>
    </ul>
@endsection