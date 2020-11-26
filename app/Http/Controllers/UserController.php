<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    public function permission()
    {
        $user_id = \Auth::user()->id;
        $Users = DB::table('users')->select('ID', 'name', 'email')->where('ID', '<>', $user_id)->get();  
        return view('users.permission', compact('Users'));
    }

    public function permissionUpdate(Request $request)
    {
        request()->validate([
            'username' => 'required',
        ]);
        $username = $request->username;

        $emaillist = $request->emaillist;
        $questions = $request->questions;
        $answers = $request->answers;
        $results = $request->results;
        $firstpage = $request->firstpage;
        $emailpage = $request->emailpage;

        if ($emaillist == "on") 
            $emaillist = 1;
        else
            $emaillist = 0;

        if ($questions == "on") 
            $questions = 1;
        else
            $questions = 0; 

        if ($answers == "on") 
            $answers = 1;
        else
            $answers = 0; 

        if ($results == "on") 
            $results = 1;
        else
            $results = 0; 

        if ($firstpage == "on") 
            $firstpage = 1;
        else
            $firstpage = 0; 

        if ($emailpage == "on") 
            $emailpage = 1;
        else
            $emailpage = 0; 
 
        // exit();
        $datetime = date("Y-m-d H:i:s");
        DB::update('UPDATE permissions  SET permission_value = ?, modify_on = ? 
            WHERE user_id = ? AND permission_name = ?', [$emaillist, $datetime, $username, "emaillist"]);

        DB::update('UPDATE permissions  SET permission_value = ?, modify_on = ? 
            WHERE user_id = ? AND permission_name = ?', [ $questions, $datetime, $username, "questions"]);
        
        DB::update('UPDATE permissions  SET permission_value = ?, modify_on = ? 
            WHERE user_id = ? AND permission_name = ?', [ $answers, $datetime, $username, "answers"]);
        DB::update('UPDATE permissions  SET permission_value = ?, modify_on = ? 
            WHERE user_id = ? AND permission_name = ?', [ $results, $datetime, $username, "results"]);
        DB::update('UPDATE permissions  SET permission_value = ?, modify_on = ? 
            WHERE user_id = ? AND permission_name = ?', [ $firstpage, $datetime, $username, "firstpage"]);
        DB::update('UPDATE permissions  SET permission_value = ?, modify_on = ? 
            WHERE user_id = ? AND permission_name = ?', [ $emailpage, $datetime, $username, "emailpage"]);

        return redirect()->route('user.permission')->withStatus(__('User Permission successfully modified.'));

    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }

    public function fetch(Request $request){

        $user_id = $request->get('user_id');

        $data = DB::table('permissions')->select('permission_name', 'permission_value')

        ->where('user_id', '=', $user_id)

        ->get();        
 
        echo json_encode($data);    

    }  
}
