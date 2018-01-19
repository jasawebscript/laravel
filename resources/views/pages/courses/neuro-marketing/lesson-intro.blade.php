@extends('layouts.lesson')

@section('title', 'Neuro Marketing')

@section('courseHeader')
    <h1>Become Neuro Marketer</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>Functional neuroanatomy</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. Functional neuroanatomy</a></li>
        <li><a class="list-group-item" href="">2. Basics of brain organisation</a></li>
        <li><a class="list-group-item" href="">3. Key neuromarketing</a></li>
        <li><a class="list-group-item" href="">4. Capabilities and Limitations</a></li>
        <li><a class="list-group-item" href="">5. Consumer neuroscience research</a></li>
    </ul>
@endsection