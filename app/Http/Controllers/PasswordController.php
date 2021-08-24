<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {   $user = DB::table('users_data')->find($id);
        return view('edit-password',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ChangePasswordRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse

     */
    public function update(ChangePasswordRequest $request, $id)
    {
        $user = DB::table('users_data')->where('id', $id);

        $user_password = DB::table('users_data')->select('password')->where('id', $id)->get();

        if ( Hash::check($request->current_password, $user_password[0]->password)){
            echo 'ok';

            $user->update(
                [
                    'password' => Hash::make($request->new_password
                    )
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
            echo 'false';
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
