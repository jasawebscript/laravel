@extends('layouts.lesson')

@section('title', 'Deep Learning')

@section('courseHeader')
    <h1>Become Deep Learning Professional</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>What is Deep Learning?</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. What is Deep Learning?</a></li>
        <li><a class="list-group-item" href="">2. Course Overview</a></li>
        <li><a class="list-group-item" href="">3. Neural Networks and Deep Learning</a></li>
        <li><a class="list-group-item" href="">4. Hyperparameter tuning</a></li>
        <li><a class="list-group-item" href="">5. Regularization and Optimization</a></li>
        <li><a class="list-group-item" href="">6. Structuring Machine Learning Projects</a></li>
        <li><a class="list-group-item" href="">7. Convolutional Neural Networks</a></li>
        <li><a class="list-group-item" href="">8. Sequence Models</a></li>
    </ul>
@endsection