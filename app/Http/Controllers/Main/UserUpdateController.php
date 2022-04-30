<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
        $user = User::find($data['user_id']);

        if($data['password'] != null) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('login');
    }
}
