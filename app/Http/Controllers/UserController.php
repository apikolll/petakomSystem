<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    { //register user (CREATE)


        $id = Auth::user()->id;
        $userData = DB::table('users')->select(
            'id',
            'email',
            'password',
            'confirmPass',
            'Fname',
            'Lname',
            'phoneNum',
            'category',
            'address',
        )->where('users.id', '=', $id)->first();

        return view('register.myProfile', compact('userData'));
    }

    //display new user 
    public function userList()
    { //
        $userRecord = DB::table('users')
            ->select(
                'id',
                'Fname',
                'Lname',
                'email',
                'phoneNum',
                'category',
            )
            ->orderBy('Fname', 'asc')
            ->get();
        return view('register.userList', compact('userRecord'));
    }

    public function registerUser()
    { //
        return view('register.registerUser');
    }

    //store new user into database
    public function addUser(Request $request)
    {


        $email = $request->input('email');
        $password = $request->input('password');
        $confirmPass = $request->input('confirmPass');
        $Fname = $request->input('Fname');
        $Lname = $request->input('Lname');
        $phoneNum = $request->input('phoneNum');
        $category = $request->input('category');
        $address = $request->input('address');


        $data = array(


            'email' => $email,
            'password' => Hash::make($password),
            'confirmPass' => Hash::make($confirmPass),
            'Fname' => $Fname,
            'Lname' => $Lname,
            'phoneNum' => $phoneNum,
            'category' => $category,
            'address' => $address,
            'picture' => 'pp.png',

        );

        //dd($data);

        DB::table('users')->insert($data);


        return redirect('/registerUser')->with('success', 'User successfully registered');
    }

    //to delete selected record
    public function deleteUser(Request $request, $id)
    {
        if ($request->ajax()) {

            User::where('id', '=', $id)->delete();
            return response()->json(array('success' => true));
        }
    }

    //view page edit

    public function editUser(Request $request, $id)
    {
        $register = DB::table('users')->select(
            'id',
            'email',
            'password',
            'confirmPass',
            'Fname',
            'Lname',
            'phoneNum',
            'category',
            'address',
        )->where('users.id', '=', $request->id)->first();

        return view('register.updateList', compact('register'));
    }

    //to update activity record
    public function updateUser(Request $request, $id)
    {
        if ($request->ajax()) {
            DB::table('users')->where('users.id', '=', $id)
                ->update([
                    'users.email' => $request->email,
                    'users.Fname' => $request->Fname,
                    'users.Lname' => $request->Lname,
                    'users.phoneNum' => $request->phoneNum,
                    'users.category' => $request->category,
                    'users.address' => $request->address,
                ]);

            return response()->json(array('success' => true));
        }
    }

    public function updateAvatar(Request $request)
    {

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        $avatarName = $user->id . '.' . request()->avatar->getClientOriginalExtension();

        $request->avatar->move(public_path('uploads'), $avatarName);
        $user->avatar = $avatarName;
        User::where('id', '=', $user->id)->update(['picture' => $avatarName]);

        return back()
            ->with('success', 'You have successfully upload image.');
    }

    public function updateProfile(Request $request, $id)
    {
        if ($request->ajax()) {
            DB::table('users')->where('users.id', '=', $id)
                ->update([
                    'users.Fname' => $request->Fname,
                    'users.Lname' => $request->Lname,
                    'users.phoneNum' => $request->phoneNum,
                    'users.address' => $request->address,
                ]);

            return response()->json(array('success' => true));
        }
    }

    public function updatePassword(Request $request)
    {

        $user = Auth::user();

        
        User::where('id', '=', $user->id)->update([

        'users.password' => Hash::make($request->password),
        'users.confirmPass' =>Hash::make($request->confirmPass),
    
        ]);
        return back()
        ->with('success', 'You have successfully change password.');
}
}