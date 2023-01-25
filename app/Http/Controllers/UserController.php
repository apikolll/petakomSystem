<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index()
    { //register user (CREATE)
        return view('register.myProfile');
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
            "password" => $password,
            "confirmPass" => $confirmPass,
            "Fname" => $Fname,
            "Lname" => $Lname,
            "phoneNum" => $phoneNum,
            "category" => $category,
            "address" => $address,
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
       
    
}
