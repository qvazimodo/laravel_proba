<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function update(Request $request) {
        $user = Auth::user();

        $errors = [];
        if ($request->isMethod('post')) {
            $this->validate($request, $this->validateRules(), [], $this->attributeNames());

            if (Hash::check($request->post('password'), $user->password)) {
                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ]);
            } else {
                $errors['password'][] = 'Неверно введен пароль';
                return redirect()->route('userprofile')->withErrors($errors);
            }

            $user->save();
            return redirect()->route('userprofile')->with('success', 'Профиль успешно изменен!');
        }

        return view('user.user_profile', [
            'user' => $user
        ]);
    }


    protected function validateRules() {
        return [
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3'
        ];
    }

    protected function attributeNames() {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }
}
