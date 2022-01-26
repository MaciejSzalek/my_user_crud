<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
use App\Models\MyUser;
use App\Services\UserService;
use Illuminate\Http\Request;

class MyUserController extends Controller
{

    private $userInterface;

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
                var_dump('login');
                break;
            case 'signup':
                return $this->userInterface->createUser($request);
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


    private function createMyUser(Request $request)
    {
        $myUser = new MyUser();
        $userService = new UserService($request);
        $userService->createUser($myUser);
//        $user = MyUser::where('email', $request['email'])->first();
//        if(empty($user))
//        {
//            MyUser::create($request->all());
//            return redirect()->route('users.index')
//                ->with('success','New user created successfully.');
//        } else {
//            return redirect()->back()->withErrors('User with email "' . $request['email'] . '"" exists');
//        }
    }
}
