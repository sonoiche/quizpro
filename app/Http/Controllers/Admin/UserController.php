<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Admin\UserDataTable;
use App\Http\Requests\Admin\UserRequest;
use App\Jobs\UserCreateEmailJob;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        $data['recordsTotal'] = $dataTable->recordsTotal + 1;
        return $dataTable->render('admin.users.index', $data);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(UserRequest $request)
    {
        $password               = strtoupper(Str::random(10));
        $user                   = new User();
        $user->fname            = $request['fname'];
        $user->lname            = $request['lname'];
        $user->email            = $request['email'];
        $user->password         = bcrypt($password);
        $user->role             = $request['role'];
        $user->contact_number   = $request['contact_number'];
        $user->save();

        UserCreateEmailJob::dispatch($user, $password)->delay(now()->addSeconds(5));
        return redirect()->to('admin/users')->with('success', 'User created successfully');
    }

    public function edit($id)
    {
        $data['user'] = User::find($id);
        return view('admin.users.edit', $data);
    }

    public function update(UserRequest $request, $id)
    {

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json(200);
    }
}
