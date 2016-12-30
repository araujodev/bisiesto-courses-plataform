@extends('layouts.adminpanel')

@section('content')
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Courses Module - Manage Course</h3>
      </div>
      <div class="panel-body">
        <form action="{{ isset($course) ? "/courses/".$course->id : "/courses" }}" method="post" class="form-horizontal" enctype="multipart/form-data">

            <div class="form-group">
                <label for="titlelabel" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" type="text" class="form-control" id="titlelabel" placeholder="Title" value="{{ isset($course->title) ? $course->title : "" }}">
                </div>
            </div>

            <div class="form-group">
                <label for="captionlabel" class="col-sm-2 control-label">Caption</label>
                <div class="col-sm-10">
                    <input name="caption" type="text" class="form-control" id="captionlabel" placeholder="Caption" value="{{ isset($course->caption) ? $course->caption : "" }}">
                </div>
            </div>

            <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Full Text</label>
                <div class="col-sm-10">
                    <textarea name="description" class="form-control" id="description" placeholder="Full Text">{{ isset($course->description) ? $course->description : "" }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="pricelabel" class="col-sm-2 control-label">Original Price</label>
                <div class="col-sm-10">
                    <input name="price" type="text" class="form-control" id="pricelabel" placeholder="Example: $50 USD" value="{{ isset($course->price) ? $course->price : "" }}">
                </div>
            </div>

            <div class="form-group">
                <label for="pricediscountlabel" class="col-sm-2 control-label">Discount Price</label>
                <div class="col-sm-10">
                    <input name="price_discount" type="text" class="form-control" id="pricediscountlabel" placeholder="Example: $5 USD - Final Price $45." value="{{ isset($course->price_discount) ? $course->price_discount : "" }}">
                </div>
            </div>

            <div class="form-group">
                <label for="activelabel" class="col-sm-2 control-label">Active</label>
                <div class="col-sm-10">
                    <input name="active" type="checkbox" class="form-control" id="activelabel" {{ (isset($course->active) && ($course->active == 1)) ? "checked" : "" }}>
                </div>
            </div>

            <div class="form-group">
                <label for="imagelabel" class="col-sm-2 control-label">Course Image</label>
                <div class="col-sm-10">
                    <input name="image" type="file" class="form-control" id="imagelabel">
                </div>
            </div>

            {{ csrf_field() }}
            {{ isset($course) ? method_field('PUT') : "" }}
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </div>
        </form>
      </div>
    </div>

    <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Courses Module - List Courses</h3>
          </div>
          <div class="panel-body">
            List of registry courses.
          </div>
          <table class="table">
            <tr>
                <th>Img</th>
                <th>Title</th>
                <th>Price w/ Discount</th>
                <th>Active</th>
                <th></th>
            </tr>
            @foreach ($courses as $course)
                <tr>
                    <td><img src="{{URL::asset('images/courses/'. $course->image)}}" width="50"></td>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->price - $course->price_discount }}</td>
                    <td>{{ $course->active }}</td>
                    <td>

                        <form action="{{url('courses/' . $course->id)}}" method="POST">
                        <a href="/courses/{{ $course->id }}/edit" class="btn btn-primary"> Edit </a>
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" id="delete-task-{{ $course->id }}" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
          </table>
        </div>
@endsection