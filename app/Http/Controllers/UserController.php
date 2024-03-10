<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect("/");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ], [
            "email.required" => "Поле обязательно для заполнения",
            "email.email" => "Введите правильный адрес",
            "password.required" => "Поле обязательно для заполнения",
        ]);

        $user = $request->only("email", "password");

        if (Auth::attempt([
            "email" => $user['email'],
            "password" => $user['password']
        ])) {
            if(Auth::user()->role == 1){
                return redirect('/moder')->with("succes", "Успех");
            }else{
                return redirect("/")->with("succes", "Успех");
            }
        }else{
            return redirect()->back()->with("error", "Неверный логин или пароль!!!");
        }

    }

    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "lastname" => "required",
            "phone" => "required|unique:users",
            "email" => "required|unique:users|email",
            "password" => "required",
            "confirm_password" => "required|same:password",
        ], [
                "name.required" => "Поле обязательно для заполнения",
                "lastname.required" => "Поле обязательно для заполнения",
                "phone.required" => "Поле обязательно для заполнения",
                "phone.unique" => "Данный телефон занят",
                "email.required" => "Поле обязательно для заполнения",
                "email.email" => "Введите правильный адрес",
                "email.unique" => "Данный адрес занят",
                "password.required" => "Поле обязательно для заполнения",
                "confirm_password.required" => "Поле обязательно для заполнения",
                "confirm_password.same" => "Пароли должны совпадать"
            ]
        );

        $userInfo = $request->all();

        $user = User::create([
            "name" => $userInfo['name'],
            "lastname" => $userInfo['lastname'],
            "phone" => $userInfo['phone'],
            "email" => $userInfo['email'],
            "role" => 2,
            "password" => Hash::make($userInfo['password']),
        ]);
        Auth::login($user);
        return redirect("/")->with("succes", "Успех");
    }

    public function moder(Request $request){
        $sort = $request->input('sort', null);
        if ($sort !== null) {
            $post = $this->sortGenres($sort);
        } else {
            $post = Post::orderBy('created_at', 'DESC')->paginate(3);
        }
        return view('moder.index', ['posts'=>$post]);
    }

    protected function sortGenres($sort){
        $post = Post::where('status', $sort)->paginate(3);
        return $post;
    }

    public function acceptPost(Post $id){
        $id->status = 2;
        $id->save();
        return redirect()->back();
    }

    public function offPost(Post $id){
        $id->status = 3;
        $id->save();
        return redirect()->back();
    }

    public function arhivePost(Post $id){
        $id->status = 4;
        $id->save();
        return redirect()->back();
    }

    public function profile(){
        $startDate = Auth::user()->created_at;
        $currentDate = Carbon::now();
        $daysPassed = $startDate->diffInDays($currentDate);
        $posts = Post::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(3);
        $find = Post::where('id_user', Auth::user()->id)->where('status', 2)->get();
        return view('profile', ['daysPassed'=>$daysPassed, 'posts' => $posts, 'find' => $find]);
    }

    public function editPhone(Request $request){
        $request->validate([
            "phone" => "required|unique:users",
        ], [
                "phone.required" => "Поле обязательно для заполнения",
                "phone.unique" => "Данный телефон занят",
            ]
        );
        $updateInfo = User::find(Auth::user()->id);
        $updateInfo->phone = $request['phone'];
        $updateInfo->save();
        return redirect()->back();
    }

    public function editEmail(Request $request){
        $request->validate([
            "email" => "required|unique:users|email",
        ], [
                "email.required" => "Поле обязательно для заполнения",
                "email.email" => "Введите правильный адрес",
                "email.unique" => "Данный адрес занят",
            ]
        );
        $updateInfo = User::find(Auth::user()->id);
        $updateInfo->email = $request['email'];
        $updateInfo->save();
        return redirect()->back();
    }

    public function addComment(Request $request){
        $request->validate([
            "photo" => "required",
            "comment_text" => "required",
        ], [
                "photo.required" => "Поле обязательно для заполнения",
                "comment_text.required" => "Поле обязательно для заполнения",
            ]
        );

        $photo = $request->file('photo');
        $name = $photo->hashName();
        $patch = $photo->store('public/images');
        Comment::create([
            "photo" => $name,
            "comment_text" => $request['comment_text'],
            "id_user" => Auth::user()->id,
        ]);

        return redirect('/');
    }
}
