<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
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
        $users = DB::table('users_data')->get();
        return view('index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('create');

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
            DB::table('users_data')->insert([
                [
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]
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
        $user = DB::table('users_data')->find($id);

        return view('edit', compact('user'));
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
        $user = DB::table('users_data')->where('id', $id);
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
        $user = DB::table('users_data')->where('id', $id);
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
}
