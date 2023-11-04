<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\Course\DestroyRequest;
    use App\Http\Requests\Course\StoreRequest;
    use App\Http\Requests\Course\UpdateRequest;
    use App\Models\Course;

    use http\Client\Request;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;

    class CourseController extends Controller
    {

        public function index(\Illuminate\Http\Request $request)
        {
            $search = $request->get('q');

            $data = Course::query()->where('name', 'like', '%'.$search.'%')->paginate(2);
            $data->appends(['q' => $search]);
            return view('course.index', data: [
                'data' => $data,
                'search' => $search,
            ]);
        }

        public function create()
        {
            return view('course.create');
        }


        public function store(StoreRequest $request)
        {
            $object = new Course();

//        $object->name = $request->get('name');
            $object->fill($request->validated());
            $object->save();

            return redirect()->route('course.index');
        }


        public function edit(Course $course)
        {
            return view('course.edit', data: [
                'each' => $course,
            ]);
        }

        public function update(UpdateRequest $request, Course $course)
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

            return redirect()->route('course.index');

        }

        public function destroy(DestroyRequest $request, $course)
        {
            Course::destroy($course);
//            $course->delete();

            return redirect()->route('course.index');
        }
    }
