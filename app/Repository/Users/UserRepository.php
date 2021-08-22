<?php

namespace App\Repository\Users;

use App\Repository\Repository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository extends Repository
{
    public function model()
    {
        return User::class;
    }

    public function store($request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
    }
}
