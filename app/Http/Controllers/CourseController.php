<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function search(Request $request)
    {
        $courses = \App\Course::select('*');

        if ($request->filled('name')) {
            $courses = $courses->where('name', 'like', '%' . $request->get('name') . '%');
        }

        $courses = $courses->get();
        return view('course/search', [
            'courses' => $courses,
            'parameters' => $request->all(),
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $this->create($request->all());

        return redirect('/courses')->with('success', 'Curso criado com sucesso!');
    }

    public function edit($id, Request $request) {
        $course = \App\Course::find($id);

        if (!$course) {
            return redirect('/404');
        }

        if ($request->isMethod('post')) {
            $this->validator($request->all())->validate();
            $this->update($id, $request->all());
            return redirect('/courses')->with('success', 'Curso alterado com sucesso!');
        }

        return view('course/edit', [
            'course' => $course
        ]);
    }

    public function delete($id) {
        $students = \App\Student::where('course_id', $id)->count();

        if ($students > 0) {
            return redirect('/courses')->with('error', 'Não é possível excluir o curso pois ainda existem estudantes matriculados!');
        } else {
            $course = \App\Course::find($id);
            $course->delete();
            return redirect('/courses')->with('success', 'Curso deletado com sucesso!');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
        ]);
    }

    protected function create(array $data)
    {
        return Course::create([
            'name' => $data['name'],
        ]);
    }

    protected function update($id, array $data)
    {
        $course = \App\Course::find($id);
        $course->name = $data['name'];
        return $course->save();
    }
}