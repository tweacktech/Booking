<?php

namespace App\Http\Controllers;

use DB;
use Hash;
use Auth;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function manage_users()
    {

         $Auth=Auth::user()->type;
        if ($Auth=='Supper') {
          //get users
        $users = DB::table('users')
            ->where('status', '<>', '2')
            ->orderBy('created_at', 'desc')
            ->get();
        }elseif ($Auth=='Owner') {
           $users = DB::table('users')
            ->where('status', '<>', '2')
            ->where('type',  'Staff')
            ->orderBy('created_at', 'desc')
            ->get();
        }
        

        //view
        return view('users.manage_users', compact('users'));
    }

    public function register_user(Request $req)
    {
        //get ur credentials
        // return $req->input('type');
        $fields =  $req->validate([
            'name' => ['required', 'string'],
            'type' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'max:16', 'confirmed'],
            'email' => ['required', 'unique:users,email', 'email']
        ]);

        $data = [
            'name' => $fields['name'],
            'email' => $fields['email'],
            'company_id'=>$req->input('company_id'),
            'type'=>$req->input('type'),
            'password' => Hash::make($fields['password']),
        ];

        //add the credentials to database
        $user = DB::table('users')
            ->insert($data);

        if ($user) {

            DB::table('activities')
                ->insert([
                    'activity' => 'A User Was Added By' . Auth()->user()->id,
                    'activity_type' => 'add'
                ]);

            return redirect()->back()->with('alert', 'User Added Successfully');
        }
        return redirect()->back()->with('alert', 'Failed To Add User  ');
    }

    public function suspend_user($id)
    {
        if (DB::table('users')->where(DB::raw('md5(id)'), $id)->update(['status' => '0'])) {
            DB::table('activities')
                ->insert([
                    'activity' => 'A User Was Suspended By' . Auth::user()->name,
                    'activity_type' => 'Edit'
                ]);
            return redirect()->back()->with('alert', 'User Suspended Sucessfully ');
        }
        return redirect()->back()->with('alert', 'Failed To Suspend This Suspended  ');
    }

    public function unsuspend_user($id)
    {
        if (DB::table('users')->where(DB::raw('md5(id)'), $id)->update(['status' => '1'])) {
            DB::table('activities')
                ->insert([
                    'activity' => 'A User Was Unuspended by' . Auth::user()->name,
                    'activity_type' => 'Edit'
                ]);
            return redirect()->back()->with('alert', 'User Unuspended Sucessfully ');
        }
        return redirect()->back()->with('alert', 'Failed To Unsuspend This Suspended  ');
    }

    public function delete_user($id)
    {
        if (DB::table('users')->where(DB::raw('md5(id)'), $id)->update(['status' => '2'])) {

            DB::table('activities')
                ->insert([
                    'activity' => 'A User Deleted By' . Auth::user()->name,
                    'activity_type' => 'deleted'
                ]);

            return redirect()->back()->with('alert', 'User Deleted Sucessfully ');
        }
        return redirect()->back()->with('alert', 'Failed To Delete This Suspended  ');
    }

    public function edit_user_page($id)
    {
        //get user info by id sent 
        $user = DB::table('users')->where(DB::raw('md5(id)'), $id)->first();

        return view('users.edit_user', compact('user'));
    }

    public function edit_user(Request $req)
    {
        //get ur credentials
        $fields =  $req->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);



        $data = [
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password'])
        ];

        //add the credentials to database
        $user = DB::table('users')
            ->where('id', $req->id)
            ->update($data);

        if ($user) {

            DB::table('activities')
                ->insert([
                    'activity' => 'A User' . $data['email'] . ' Was Edited By' . Auth::user()->name,
                    'activity_type' => ''
                ]);

            return redirect()->back()->with('message', 'User Updated Successfully');
        }
        return redirect()->back()->with('message', 'Failed To Update User  ');
    }

    public function user_role($id)
    {

        //get user info by id sent 
        $user = DB::table('users')->where(DB::raw('md5(id)'), $id)->first();

        //get user menu
        $user_menu = DB::table('user_menu')
            ->where('user_id', 'user_menu.user_id')
            ->first();

        //get menu
        $menus = DB::table('menu')
            ->get();

        return view('users.user_role', compact('user_menu', 'user', 'menus'));
    }

    public function add_user_menu(Request $req, $id)
    {

        //insert menu_id into user_menu by current user_id

        $add = DB::table('user_menu')
            ->insert([
                'user_id' => $req->user_id, 'menu_id' => $id
            ]);

        //check if menu added
        if ($add) {

            DB::table('activities')
                ->insert([
                    'activity' => 'User Menu Was Added by' . Auth::user()->name,
                    'activity_type' => 'Added'
                ]);

            return redirect()->back()->with('alert', 'Menu Added Successfully');
        }
        return redirect()->back()->with('alert', 'Failed To Add Menu');
    }

    public function remove_user_menu(Request $req, $id)
    {
        //insert menu_id into user_menu by current user_id

        $remove = DB::table('user_menu')
            ->where('menu_id', $id)
            ->where('user_id', $req->user_id)
            ->delete();


        //check if menu removed
        if ($remove) {

            DB::table('activities')
                ->insert([
                    'activity' => 'User Menu Removed Successfully  by' . Auth::user()->name,
                    'activity_type' => 'delete'
                ]);

            return redirect()->back()->with('alert', 'Menu Removed Successfully');
        }
        return redirect()->back()->with('alert', 'Failed To Remove Menu');
    }

    public function reset_password()
    {
        return view('auth.passwords.email');
    }
}
