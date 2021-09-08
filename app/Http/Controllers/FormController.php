<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\College;
use App\Models\Course;
use App\Models\Field;
use App\Models\Grade;
use App\Models\Head;
use App\Models\Manager;
use App\Models\Professor;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\StudentBachlor;
use App\Models\StudentMaster;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('user.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\UserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        try {
             User::create([

                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
            ]);

            $alert = [
                [
                    'type' => 'success',
                    'msg' => 'عملیات با موفقیت انجام شد'
                ]
            ];
        } catch (\Exception $e) {
            $alert = [
                [
                    'type' => 'error',
                    'msg' => 'عملیات با خطا مواجه شد'
                ]
            ];
        }

        $request->session()->flash('alert', $alert);

        return redirect('/user');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        try {
            $user->update(
                [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email
                ]
            );

            $alert = [
                [
                    'type' => 'success',
                    'msg' => 'عملیات با موفقیت انجام شد'
                ]
            ];
        } catch (\Exception $e) {

            $alert = [
                [
                    'type' => 'error',
                    'msg' => 'عملیات با خطا مواجه شد'
                ]
            ];
        }
        $request->session()->flash('alert', $alert);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        try{
            $user->delete();
            $alert = [
                [
                    'type' => 'success',
                    'msg' => 'عملیات حذف با موفقیت انجام شد'
                ]
            ];
        }
        catch (\Exception $e){
            $alert = [
                [
                    'type' => 'error',
                    'msg' => 'عملیات حذف با خطا مواجه شد'
                ]
            ];
        }

        session()->flash('alert', $alert);
        return back();

    }
    public function showEditForm($id)
    {
        $user = User::find($id);
        return view('password.edit-password',compact('user'));

    }

    public function changePassword(ChangePasswordRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user_password = User::select('password')->where('id', $id)->get();

        if ( Hash::check($request->current_password, $user_password[0]->password)){

            $user->update(
                [
                    'password' => Hash::make($request->new_password)
                ]
            );
            $alert = [
                [
                    'type' => 'success',
                    'msg' => 'تغییر رمز عبور با موفقیت انجام شد'
                ]
            ];

        }
        else{
            $alert = [
                [
                    'type' => 'error',
                    'msg' => 'رمز عبور فعلی صحیح نیست'
                ]
            ];
        }

        $request->session()->flash('alert', $alert);

        return back();

    }

    public function university()
    {
        $managers = Manager::with('college')->get();
        $colleges = College::with('manager','fields')->get();
        $heads = Head::with('field')->get();
        $fields = Field::with('head','college','students')->get();
        $students = Student::with('field','grade','professorCourses.course','professorCourses.term')->get();
        $grades = Grade::with('students')->get();
        $professors = Professor::with('courses','professorCourse.students')->get();
        $courses = Course::with('professors','professorCourses.students')->get();

        /**
         * ----Manager-College relationship---->one to one
         */
        foreach ($managers as $manager){
            dump('مدیر '.$manager->firstname.' '.$manager->lastname.' دانشکده ' .$manager->college->name);
        }
        foreach ($colleges as $college){
            dump('دانشکده '.$college->name.' مدیر '. $college->manager->firstname.' '.$college->manager->lastname);
        }

        /**
         * ----Head-Field relationship---->one to one
         */
        foreach ($heads as $head){
            dump('مدیرگروه '.$head->firstname.' '.$head->lastname.' رشته '. $head->field->name);
        }
        foreach ($fields as $field){
            dump('رشته '.$field->name. ' مدیرگروه '.$field->head->firstname.' '.$field->head->lastname);
        }

        /**
         * ----College-Fields relationship---->one to many
         */
        foreach ($colleges as $college){
            foreach ($college->fields as $field){
                dump( '  دانشکده  '.$college->name.'  رشته  '.$field->name);
            }
        }
        foreach ($fields as $field){
            dump('رشته '.$field->name.' دانشکده '.$field->college->name);
        }
//
        /**
         * ----Students-Field relationship---->one to many
         */
        foreach ($fields as $field){
            foreach ($field->students as $student){
                dump('رشته '.$field->name.' دانشجو '.$student->firstname.' '.$student->lastname);

            }
        }
        foreach ($students as $student){
            dump('دانشجو '.$student->firstname.' '.$student->lastname.' رشته '.$student->field->name);
        }

        /**
         * ----Students-Grade relationship---->one to many
         */
        foreach ($grades as $grade){
            foreach ($grade->students as $student){
                dump('مقطع '.$grade->name.' دانشجو '.$student->firstname.' '.$student->lastname);

            }
        }
        foreach ($students as $student){
            dump('دانشجو '.$student->firstname.' '.$student->lastname.' مقطع '.$student->grade->name);
        }

        /**
         * ----Professor-Course relationship---->many to many
         */
        foreach ($professors as $professor){
            foreach ($professor->courses as $course){
                dump('استاد '.$professor->firstname.' '.$professor->lastname.' درس '.$course->name);
                dump($course->pivot->term_id);
            }
        }
        foreach ($courses as $course){
            foreach ($course->professors as $professor){
                dump(' درس '.$course->name.' استاد '.$professor->firstname.' '.$professor->lastname);
                dump($professor->pivot->term_id);

            }

        }

        /**
         * ----Student-Course relationship---->many to many
         */
        foreach ($students as $student){
            foreach ($student->professorCourses as $professorCourse){
                dump('دانشجو '.$student->firstname.' '.$student->lastname.' درس '.$professorCourse->course->name. ' ترم '.$professorCourse->term->TermDate);
            }
        }
        foreach ($courses as $course){
            foreach ($course->professorCourses as $professorCourse){
                foreach ($professorCourse->students as $student)
                dump(' درس '.$course->name.' دانشجو '.$student->firstname.' '.$student->lastname.' نمره '.$student->pivot->score);
            }

        }

        /**
         * ----Professor-Student relationship----
         */
        foreach ($professors as $professor){
            dump(' استاد '.$professor->firstname.' '.$professor->lastname);
            foreach ($professor->courses as $course){
                foreach ($course->professorCourses as $professorCourse){
                    foreach ($professorCourse->students as $student){
                        dump(' درس '.$course->name.' دانشجو '.$student->firstname.' '.$student->lastname);
                    }
                }

            }
        }
        foreach ($professors as $professor){
            dump(' استاد '.$professor->firstname.' '.$professor->lastname);
            foreach ($professor->professorCourse as $professorCourse){
                foreach ($professorCourse->students as $student){
                   dump( ' دانشجو '.$student->firstname.' '.$student->lastname);
                }
            }
        }
        /**
         * ----Students have course----
         */
            foreach ($students as $student){
                dump($student->professorCourses);

            }
            $students = Student::has('professorCourses')->get();

            foreach ($students as $student) {

                dump($student->firstname . ' ' . $student->lastname);
            }
        /**
         * ----Students have more than one course----
         */
            $students = Student::has('professorCourses', '>', 1)->get();

            foreach ($students as $student){

                dump($student->firstname.' '.$student->lastname);
            }

            $students = Student::whereHas('professorCourses', function (Builder $query) {
                $query->where('course_id', 'like', '3');
            })->get();

            foreach ($students as $student){
                dump($student);
            }
    }

    public function polymorph(){
        /**
         * ----StudentBachlor-course----
         */
        $StudentBachlor = StudentBachlor::all();
        foreach ($StudentBachlor as $studentB) {
            foreach ($studentB->course as $course) {
                dump($studentB->firstname . ' ' . $studentB->lastname . ' ' . $course->name);
            }
        }

        $courses = Course::all();
        foreach ($courses as $course) {
            foreach ($course->studentBachlor as $studentB) {
                dump($studentB->firstname . ' ' . $studentB->lastname . ' ' . $course->name);
            }

        }
        $StudentBachlor = StudentBachlor::withCount(['course'=>function($query){
            $query->where('name','like','ریاضی مهندسی');
        }])->get();

        foreach ($StudentBachlor as $studentB) {
            dump($studentB->course_count);
        }
    }
}
