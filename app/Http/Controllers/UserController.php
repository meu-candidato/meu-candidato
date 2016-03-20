<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

class UserController extends Controller
{

    public function get($facebookId)
    {
        $user = User::facebook($facebookId)->first();
        if (is_null($user)) {
            return response()->json(['status' => false]);
        }

        return response()->json([
            'status' => true,
            'user' => $user->toArray()
        ]);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'facebook_id' => 'required'
        ]);

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->facebook_id = $data['facebook_id'];
        $user->save();

        $data['id'] = $user->id;

        return response()->json([
            'user' => $data
        ]);
    }
}
