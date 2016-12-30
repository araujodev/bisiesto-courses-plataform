@extends('layouts.app')
@section('title', $course->title)

@section('content')
    <div class="course-presentation">
        <div class="container">
            <div class="col-md-8 infos">
                <h1> {{ $course->title }} </h1>
                <h3> {{ $course->caption }} </h3>
                <div class="col-md-4">
                    Create by Leandro S.A
                </div>
                <div class="col-md-4">
                    Created {{ date_format($course->created_at, "Y/m/d") }}
                </div>

                <div class="col-md-4">
                    Last Updated {{ date_format($course->updated_at, "Y/m/d") }}
                </div>

            </div>
            <div class="col-md-4">
                <div class="image-course-info">
                    <img src="{{URL::asset('images/courses/'. $course->image)}}" width="100%">
                    <div class="price">
                        @if($course->price_discount > 0)
                            <p class="lead"><s>${{ $course->price }}</s> ${{ $course->price - $course->price_discount }} <b>OFF!</b></p>
                        @else
                            <p class="lead">${{ $course->price }}</p>
                        @endif
                        <a href="/cart/{{ $course->id }}" class="btn btn-primary btn-block" role="button"><span class="glyphicon glyphicon-shopping-cart"></span> Buy Now!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-md-8">
            <p class="description-text">
                {{ $course->description }}
            </p>
        </div>
    </div>

@endsection