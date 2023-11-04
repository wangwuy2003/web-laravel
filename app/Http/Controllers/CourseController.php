<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use http\Env\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CourseController extends Controller
{

    public function index()
    {
        $data = Course::get();

        return  view('course.index', data: [
            'data' => $data,
        ]);
    }

    public function create()
    {
        return view('course.create');
    }


    public function store(\Illuminate\Http\Request $request)
    {
        $object = new Course();

//        $object->name = $request->get('name');
        $object->fill($request->except('_token'));
        $object->save();

        return redirect()->route('course.index');
    }


    public function edit(Course $course)
    {
        return view('course.edit', data: [
           'each' => $course,
        ]);
    }

    public function update(\Illuminate\Http\Request $request, Course $course)
    {
//        Course::where('id', $course->id )->update(
//            $request->except([
//                '_token',
//                '_method',
//            ])
//        );

        $course->update(
            $request->except([
                '_token',
                '_method',
            ])
        );

    }

    public function destroy(Course $course)
    {
//        Course::destroy($course);
        $course->delete();

        return redirect()->route('course.index');
    }
}
