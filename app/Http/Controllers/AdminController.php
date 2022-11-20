<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        //should set gate or pressmion
        if (!auth()->user()->is_admin) {
            abort("Can't login");
        }
        $users = User::with("score")->where("is_admin", false)->get();
        return view("admin.index", compact("users"));
    }

    public function edit(User $user) {
        if (!auth()->user()->is_admin) {
            abort("Can't login");
        }
        return view("admin.edit", compact("user"));
    }

    public function update(User $user) {
        if (!auth()->user()->is_admin) {
            abort("Can't login");
        }

        $validate = request()->validate([
            "first_name" => ["required"],
            "last_name" => ["required"],
            "score" => ["required", "int"]
        ]);

        $user->update([
            "first_name" => request()->first_name,
            "last_name" => request()->last_name
        ]);

        $user->score()->update([
            "score" => request()->score
        ]);

        toast("update success!!");
        return redirect()->route("admin.index");
    }

}
