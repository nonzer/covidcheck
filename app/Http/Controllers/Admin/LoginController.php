<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view("admin.login");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function conn(Request $request)
    {

        $response = [];
        $user = User::where('username', $request->username)->first();

        //authentification de l'user
        if($user==null || empty($user)){

            $response['response'] = "Le nom d'utilisateur est incorrect !";
            $response['register'] = false;
            return response()->json($response);
        }else{

            if( auth()->attempt(['username' => $request->username, 'password'=>$request->password ]) ||
                auth()->attempt(['email' => $request->username, 'password'=>$request->password  ]))
            {
                $response['register'] = true;
                return response()->json($response);
            }else{

                $response['response'] = "Le mot de passe est incorrect !";
                $response['register'] = false;

                return response()->json($response);
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
