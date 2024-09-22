<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AccountRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $data['user']   = auth()->user();
        $role           = strtolower(auth()->user()->role);
        return view($role . '.accounts.index', $data);
    }

    public function store(Request $request)
    {
        $user_id    = auth()->user()->id;
        $user       = User::find($user_id);
        $user->fname            = $request['fname'];
        $user->lname            = $request['lname'];
        $user->contact_number   = $request['contact_number'];
        if(isset($request['password']) && !is_null($request['password'])) {
            $user->password     = bcrypt($request['password']);
        }
        if($user->role === User::ROLE_ADMIN) {
            $user->email    = $request['email'];
            $user->role     = $request['role'];
        }
        $user->save();

        return redirect()->back()->with('success', 'User account has been updated.');
    }
}
