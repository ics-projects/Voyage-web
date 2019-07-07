<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FcmController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'FcmToken' => ['required']
        ]);

        $user_id = auth()->id();
        User::where('id', $user_id)->update(['fcm_token'=> $validated['FcmToken']]);

        return response()->json('success', 200);
    }
}
