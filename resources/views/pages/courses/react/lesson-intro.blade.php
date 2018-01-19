@extends('layouts.lesson')

@section('title', 'React')

@section('courseHeader')
    <h1>Become React Developer</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>Introduction to React</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. Introduction to React</a></li>
        <li><a class="list-group-item" href="">2. React and Redux</a></li>
        <li><a class="list-group-item" href="">3. React Native</a></li>
    </ul>
@endsection