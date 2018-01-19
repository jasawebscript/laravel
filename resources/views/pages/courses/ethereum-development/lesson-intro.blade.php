@extends('layouts.lesson')

@section('title', 'Ethereum Development')

@section('courseHeader')
    <h1>Become Ethereum Developer</h1>
    <p class="subtitle" style="color:#fff;">Prepare for a data science career. Learn to use Python, R, SQL, and Tableau to uncover insights, communicate critical findings, and create data-driven solutions.</p>
    <p>Enrollment date <b>coming soon</b></p>
@endsection

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson 1:</span>
        <span>Introduction to Ethereum</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        <li><a class="list-group-item active" href="">1. Introduction to Ethereum</a></li>
        <li><a class="list-group-item" href="">2. Blockchain, Ethereum & Smart Contract</a></li>
        <li><a class="list-group-item" href="">3. Solidity & Ethereum Virtual Machine</a></li>
        <li><a class="list-group-item" href="">4. Building A New Cryptocurrency</a></li>
        <li><a class="list-group-item" href="">5. Introduction To Truffle</a></li>
        <li><a class="list-group-item" href="">6. Installing Truffle Framework</a></li>
        <li><a class="list-group-item" href="">7. Introduction to Open Zeppelin</a></li>
        <li><a class="list-group-item" href="">8. Build an ICO crowdsale with Open Zeppelin</a></li>
    </ul>
@endsection