<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserEditRequest;
use App\Role;
use Illuminate\Http\Request;
use App\User;
use File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showProfile($id)
    {
        $user = User::withTrashed()->find($id);

        return view('users.showProfile', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.editProfile', ['user' => $user]);
    }

    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $input = $request->all();
        //загрузка изображения
        if ($request->hasFile('picture')) {
            $imagePath = "images/users/";
            $imageName = $request->file('picture')->getClientOriginalName();
            //перемещение изображения из временного места хранения в определенный каталог
            $request->file('picture')->move($imagePath, $imageName);
            $input['image'] = $imagePath . $imageName;
            //удаление старого изображения из каталога
            File::delete($request->image);
        }
        $user->update($input);

        return redirect()->route('showProfile', ['user' => $user]);
    }

    public function showList()
    {
        $users = User::paginate(10);
        $rank = 0;
        foreach ($users as $user) {
            $user->rank = ++$rank;
            foreach ($user->roles as $role) {
                switch ($role->id) {
                case 1:
                    $user->admin = 1;
                    break;
                case 2:
                    $user->employee = 1;
                    break;
                case 3:
                    $user->user = 1;
                    break;
                }
            }
        }

        return view('users.showList', ['users' => $users]);
    }

    public function editRoles(Request $request)
    {
        $user = User::find($request->id);
        // Отсоединить все роли от пользователя
        $user->roles()->detach();
        if ($request->admin) {
            $user->roles()->attach(1);
        }
        if ($request->employee) {
            $user->roles()->attach(2);
        }
        if ($request->user) {
            $user->roles()->attach(3);
        }

        return back()->with('message', __('users.messages.change_roles'));
    }

    public function delete($id)
    {
        $user = User::find($id)->delete();

        return back();
    }

    public function deleteAccount($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('home')->with('message', __('users.messages.delete_account'));
    }

    public function showDeleted()
    {
        $users = User::latest('deleted_at')->onlyTrashed()->paginate(10);
        $rank = 0;
        foreach ($users as $user) {
            $user->rank = ++$rank;
        }

        return view('users.showDeleted', ['users' => $users]);
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->find($id)->restore();

        return back();
    }

    public function getChangePassword()
    {
        return view('users.changePassword');
    }

    public function postChangePassword($id, PasswordRequest $request)
    {
        $user = User::find($id);

        if (Hash::check($request->oldPassword, $user->password)) {
            $user->password = bcrypt($request->newPassword);
            $user->save();
            return redirect()->route('home')->with('message', __('users.messages.change_password'));
        } else {
            return back()->with('error', __('users.messages.not_change_password'));
        }

    }

    public function setRole($role, $userId) 
    {
        $user = User::find($userId);
        $role = Role::where('name', $role)->first();
        dd($user, $role);
        $user->roles()->sync($role->id);
        return ['success' => true];
    }
}
