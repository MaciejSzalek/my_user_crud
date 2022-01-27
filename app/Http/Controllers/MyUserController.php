<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use App\Models\MyUser;
use Illuminate\Http\Request;

class MyUserController extends Controller
{

    private UserInterface $userInterface;

    /**
     * MyUserController constructor.
     * @param UserInterface $userInterface
     */
    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('MyUser.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('MyUser.signup');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch ($request['action'])
        {
            case 'login':
                return $this->loginUser($request);
                break;
            case 'signup':
                return $this->registerMyUser($request);
                break;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyUser  $myUser
     * @return \Illuminate\Http\Response
     */
    public function show(MyUser $myUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyUser  $myUser
     * @return \Illuminate\Http\Response
     */
    public function edit(MyUser $myUser)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyUser  $myUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyUser $myUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyUser  $myUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyUser $myUser)
    {
        //
    }


    private function registerMyUser(Request $request)
    {
        try {
            $this->userInterface->registerUser($request);
            return redirect()->route('users.index')
                ->with('success','New user created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    private function loginUser($request)
    {
        try {
            $user = $this->userInterface->loginUser($request);

            return redirect()->route('users.account')->with(['user' => $user]);
        } catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
