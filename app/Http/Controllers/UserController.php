<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Session;
class UserController extends Controller
{
  public function index(){
      //fetch all users data
      $users = User::orderBy('created_at','desc')->get();

      //pass users data to view and load list view
      return view('users.index', ['users' => $users]);
  }

  public function details($id){
      //fetch user data
      $user = User::find($id);

      //pass users data to view and load list view
      return view('users.details', ['user' => $user]);
  }

  public function add(){
      //load form view
      return view('users.add');
  }

  public function insert(Request $request){
      //validate user data
      $this->validate($request, [
          'name' => 'required',
          'email' => 'required',
          'password'=> 'required'
      ]);

      //get user data
      $userData = $request->all();

      //insert user data
      User::create($userData);

      //store status message
      Session::flash('success_msg', 'User added successfully!');

      return redirect()->route('users.index');
  }

  public function edit($id){
      //get user data by id
      $user = User::find($id);

      //load form view
      return view('users.edit', ['user' => $user]);
  }

  public function update($id, Request $request){
      //validate user data
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required',
        'password'=> 'required'
      ]);

      //get user data
      $userData = $request->all();

      //update user data
      User::find($id)->update($userData);

      //store status message
      Session::flash('success_msg', 'User updated successfully!');

      return redirect()->route('users.index');
  }

  public function delete($id){
      //update user data
      User::find($id)->delete();

      //store status message
      Session::flash('success_msg', 'User deleted successfully!');

      return redirect()->route('users.index');
  }
}
