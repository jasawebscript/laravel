@extends('layouts.lesson')

@section('title', $course['title'])

@section('currentStep')
    <div class="current-lesson-title-content">
        <span>Lesson {{ $lessonNumber }}:</span>
        <span>{{ $lesson['title'] }}</span>
    </div>
@endsection

@section('steps')
    <ul class="nav ">
        @foreach($course['lessons'] as $index => $l)
            <li><a class="list-group-item {{ $index + 1 == $lessonNumber ? "active" : "" }}" href="{{ route('lesson', [$courseKey, $l['key']]) }}">{{ $index + 1 }}. {{ $l['title'] }}</a></li>
        @endforeach
    </ul>
@endsection

@section('content')

    @forelse($lesson['materials'] ?? [] as $index => $item)
        <div class="material material-{{ $item['type'] }}">
            @switch($item['type'])
                @case('video')
                    <iframe src="https://www.youtube-nocookie.com/embed/{{ $item['videoId'] }}?rel=0&amp;showinfo=0" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                @break
                @case('pdf')
                @case('text')
                @case('slides')
                    <div class="list-group">
                        <a class="list-group-item" href="{{ route('lesson-attachment', [$courseKey, $lessonKey, $index]) }}">
                            <i class="fa"></i>
                            {{ $item['title'] }}
                        </a>
                    </div>
                @break
            @endswitch
        </div>
    @empty
        <div class="well">No materials have been added to this lesson.</div>
    @endforelse

@endsection