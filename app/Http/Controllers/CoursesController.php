<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Model\Course;

class CoursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all Actives Courses.
        $courses = Course::where('active', 1)->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('courses.create-edit', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $imageName = $this->removeSpecialChars($request->title) .'.'. $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            base_path() . '/public/images/courses/', $imageName
        );

        $course = new Course;
        $course->title = $request->title;
        $course->caption = $request->caption;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->price_discount = $request->price_discount;
        $course->active = $request->active == "on" ? 1 : 0;
        $course->image = $imageName;
        $course->save();
        return redirect()->action('CoursesController@create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('courses.view', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::all();
        $course = Course::find($id);
        return view('courses.create-edit', compact('courses', 'course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);

        $imageFile = $request->file('image');
        if(isset($imageFile) && !empty($imageFile)){

            //Remove old image.
            if(!empty($course->image)){
                $imageWithPath = base_path() . '/public/images/courses/'. $course->image;
                unlink($imageWithPath);
            }

            $imageName = $this->removeSpecialChars($request->title) .'.'. $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(
                base_path() . '/public/images/courses/', $imageName
            );

            $course->image = $imageName;
        }

        $course->title = $request->title;
        $course->caption = $request->caption;
        $course->description = $request->description;
        $course->price = $request->price;
        $course->price_discount = $request->price_discount;
        $course->active = $request->active == "on" ? 1 : 0;
        $course->save();
        return redirect()->action('CoursesController@create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        $imageWithPath = base_path() . '/public/images/courses/'. $course->image;
        unlink($imageWithPath);

        return redirect()->action('CoursesController@create');
    }

    private function removeSpecialChars($string){
        $string = preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/", "/( )/"),explode(" ","a A e E i I o O u U n N -"),$string);
        $string = strtolower($string);
        return $string;
    }
}
