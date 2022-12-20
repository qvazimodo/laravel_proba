<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $users = User::query()->paginate(5);

        return view('admin.users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $user = new User();



        return view('admin.user_create', [
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
            $user = new User();

            $this->validate($request, $this->validateRules(), [], $this->attributeNames());

            $requestUser = [
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'email' => $request->email
            ];
            $dataUser = array_merge($requestUser,["is_admin" => isset($request->isAdmin)]);

            $user->fill($dataUser);

            $user->save();
            return redirect()->route('admin.users.create')->with('success', 'Профиль успешно изменен!');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(User $user)
    {
        return view('admin.user_create', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function update(Request $request, User $user)
    {
        if(!$user->is_super_admin) {
            $user->fill($request->all());
            $user->is_admin = isset($request->isAdmin);
            $user->save();
            return redirect()->route('admin.users.index')->with('success', 'Данные пользователя успешно изменены!');
        } else{
            return redirect()->route('admin.users.index')->with('error', 'Данные суперпользователя не изменны!');
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if(!$user->is_super_admin) {
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'Пользователь удален успешно!');
        } else{
            return redirect()->route('admin.users.index')->with('error', 'Суперпользователь не может быть удален!');
        }

    }

    protected function validateRules() {
        return [
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,'.Auth::id(),
            'password' => 'required|string|min:3',
            'is_admin' => 'sometimes|in:1',

        ];
    }

    protected function attributeNames() {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }
}
