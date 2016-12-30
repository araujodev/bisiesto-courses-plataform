@extends('layouts.app')
@section('title', 'Courses All')

@section('content')
    <div class="container">
    <div class="row">

    @foreach ($courses as $course)
      <div class="col-sm-6 col-md-4">
        <div class="thumbnail course-item">
          <a href="/courses/{{ $course->id }}">
            <img src="{{URL::asset('images/courses/'. $course->image)}}" width="100%" alt="{{ $course->title }}">
          </a>
          <div class="caption">
            <h3>{{ $course->title }}</h3>
            <p class="caption-course">{{ $course->caption }}</p>
            @if($course->price_discount > 0)
                <p class="lead price-course"><s>${{ $course->price }}</s> ${{ $course->price - $course->price_discount }} <b>OFF!</b></p>
            @else
                <p class="lead price-course">${{ $course->price }}</p>
            @endif
            <p>
                <a href="/cart/{{ $course->id }}" class="btn btn-primary" role="button">Buy Now!</a>
                <a href="/courses/{{ $course->id }}" class="btn btn-success" role="button">More Details</a>
            </p>
          </div>
        </div>
      </div>
    @endforeach
    </div>
    </div>
@endsection