<?php

namespace App\Http\Controllers;

use App\Interfaces\UserInterface;
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
        \session(['login' => false]);
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
            case 'logout':
                return $this->logoutUser();
                break;
            case 'signup':
                return $this->registerMyUser($request);
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        if(\session('login'))
        {
            $myUser = $this->userInterface->getUser($id);
            return view('MyUser.account', ['user' => $myUser]);
        }
        return redirect()->route('users.index')->with('error', 'User not login');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try {
            $this->userInterface->updateUser($request->all());
            return redirect()->route('users.show', $request['id'])
                ->with('success','User edited successfully.');
        } catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $this->userInterface->updateUser($request->all());
        } catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            return redirect()->route('users.index')
                ->with('success','User "' . $request['email'] . '" deleted successfully"');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }

        return null;
    }


    private function registerMyUser(Request $request)
    {
        try {
            $this->userInterface->registerUser($request->all());
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
            if(session('login'))
            {
                return redirect()->route('users.show', $user->id);
            }
            return redirect()->route('users.index');
        } catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    private function logoutUser()
    {
        session(['login' => false]);
        return redirect()->route('users.index')
            ->with('success','User logout');
    }
}
