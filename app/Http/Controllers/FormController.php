<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserReuest;
use Illuminate\Http\Request;
use DB;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('signup.signup');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserReuest $request)
    {

        $data = $request->only(['first_name','last_name','email','password','password_confirmation']);

        DB::table('users_data')->insert([
            [
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ]
        ]);

        $request->session()->flash('alert-success', 'Success');

        return redirect("/home2");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users_data')->find($id);

        return view('edit.edit' ,compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserReuest $request, $id)
    {
        $data = $request->only(['first_name','last_name','email','password']);

        $user = DB::table('users_data')->where('id',$id);
        $user->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'] ,
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        $request->session()->flash('alert-success', 'Success');

        return redirect("/home2");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
