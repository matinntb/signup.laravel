<?php

namespace App\Http\Controllers;

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
        $managers = Manager::all();
        $colleges = College::all();
        $heads = Head::all();
        $fields = Field::all();
        $students = Student::all();
        $grades = Grade::all();
        $professors = Professor::all();
        $courses = Course::all();

        /**
         * ----Manager-College relationship----
         */
        foreach ($managers as $manager){
            dump('مدیر '.$manager->firstname.$manager->lastname.' دانشکده ' .$manager->college->name);
        }
        foreach ($colleges as $college){
            dump('دانشکده '.$college->name.' مدیر '. $college->manager->firstname.$college->manager->lastname);
        }

        /**
         * ----Head-Field relationship----
         */
        foreach ($heads as $head){
            dump('مدیرگروه '.$head->firstname.' '.$head->lastname.' رشته '. $head->field->name);
        }
        foreach ($fields as $field){
            dump('رشته '.$field->name. ' مدیرگروه'.$field->head->firstname.' '.$field->head->lastname);
        }

        /**
         * ----College-Field relationship----
         */
        foreach ($colleges as $college){
            foreach ($college->fields as $field){
                dump( '  دانشکده  '.$college->name.'  رشته  '.$field->name);
            }
        }
        foreach ($fields as $field){
            dump('رشته '.$field->name.' دانشکده '.$field->college->name);
        }

        /**
         * ----Student-Field relationship----
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
         * ----Student-Grade relationship----
         */
        foreach ($grades as $grade){
            foreach ($grade->students as $student){
                dump('مقطع '.$grade->name.' دانشجو '.$student->firstname.' '.$student->lastname);

            }
        }
        foreach ($students as $student){
            dump($student->grade);
            dump('دانشجو '.$student->firstname.' '.$student->lastname.' مقطع '.$student->grade->name);
        }

        /**
         * ----Professor-Course relationship----
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
            }

        }

        /**
         * ----Student-Course relationship----
         */
        foreach ($students as $student){
            foreach ($student->courses as $course){
                dump('دانشجو '.$student->firstname.' '.$student->lastname.' درس '.$course->name);
            }
        }
        foreach ($courses as $course){
            foreach ($course->students as $student){
                dump(' درس '.$course->name.' دانشجو '.$student->firstname.' '.$student->lastname.' نمره '.$student->pivot->score);
            }

        }
    }
}
