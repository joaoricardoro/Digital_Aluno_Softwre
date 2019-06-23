<?php

namespace App\Http\Controllers;

use App\Course;
use App\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    private $courses;

    public function __construct() {
        $this->courses = \App\Course::select('*')->get();
    }

    public function search(Request $request)
    {
        $students = \App\Student::select('*');

        if ($request->filled('name')) {
            $students = $students->where('name', 'like', '%' . $request->get('name') . '%');
        }
        if ($request->filled('course_id')) {
            $students = $students->where('course_id', $request->get('course_id'));
        }
        if ($request->filled('cpf')) {
            $students = $students->where('cpf', $request->get('cpf'));
        }
        if ($request->filled('email')) {
            $students = $students->where('email', $request->get('email'));
        }

        $students = $students->get();
        return view('student/search', [
            'students' => $students,
            'courses' => $this->courses,
            'parameters' => $request->all(),
        ]);
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validator($request->all())->validate();
            $this->create($request->all());
    
            return redirect('/students')->with('success', 'Estudante criado com sucesso!');
        } else {
            return view('student/register', [
                'courses' => $this->courses
            ]);
        }
    }

    public function edit($id, Request $request) {
        $student = \App\Student::find($id);

        if (!$student) {
            return redirect('/404');
        }

        if ($request->isMethod('post')) {
            $this->validator($request->all(), $id)->validate();
            $this->update($id, $request->all());
            return redirect('/students')->with('success', 'Estudante alterado com sucesso!');
        }

        return view('student/edit', [
            'student' => $student,
            'courses' => $this->courses
        ]);
    }

    public function delete($id) {
        $student = \App\Student::find($id);
        $student->delete();
        return redirect('/students')->with('success', 'Estudante deletado com sucesso!');
    }

    protected function validator(array $data, $id = null)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'cpf' => ['required', 'string', 'cpf', 'max:255', 'unique:students,cpf' . ($id ? ",$id" : '') ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students,email' . ($id ? ",$id" : '') ],
            'phone' => ['required', 'string', 'celular_com_ddd'],
            'birthday' => ['required', 'date'],
            'course_id' => ['required', 'integer', 'exists:courses,id'],
            'period' => ['required', 'integer', 'between:1,12'],
        ]);
        $validator->setAttributeNames([
            'name' => 'Nome',
            'cpf' => 'CPF',
            'email' => 'Email',
            'phone' => 'Telefone',
            'birthday' => 'Data de Nascimento',
            'course_id' => 'Curso',
            'period' => 'Periodo',
        ]);

        return $validator;
    }

    protected function create(array $data)
    {
        return Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'birthday' => $data['birthday'],
            'phone' => $data['phone'],
            'course_id' => $data['course_id'],
            'period' => $data['period'],
        ]);
    }

    protected function update($id, array $data)
    {
        $student = \App\Student::find($id);
        $student->name = $data['name'];
        $student->email = $data['email'];
        $student->cpf = $data['cpf'];
        $student->birthday = $data['birthday'];
        $student->phone = $data['phone'];
        $student->course_id = $data['course_id'];
        $student->period = $data['period'];
        return $student->save();
    }
}