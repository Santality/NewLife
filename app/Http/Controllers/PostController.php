<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Comment;
use App\Models\Kind;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(){
        $data = Kind::all();
        $data2 = Area::all();
        $post = Post::where('status', 2)->orderBy('created_at', 'DESC')->limit(5)->get();
        $post2 = Post::where('status', 2)->orderBy('created_at', 'ASC')->limit(6)->get();
        $comm = Comment::paginate(3);
        return view('index', ['areas'=>$data2, 'kinds'=>$data, 'posts'=>$post2, 'carousel'=>$post, 'comments'=>$comm]);
    }

    public function addPost(){
        $data = Kind::all();
        $data2 = Area::all();
        return view('addPost', ['areas'=>$data2, 'kinds'=>$data]);
    }

    public function storePost(Request $request){
        if(Auth::user() !== null){
            $request->validate([
                "kind" => "required",
                "photo" => "required",
                "description" => "required",
                "mark" => "required",
                "area" => "required",
                "find_date" => "required",
            ], [
                    "kind.required" => "Поле обязательно для заполнения",
                    "photo.required" => "Поле обязательно для заполнения",
                    "description.required" => "Поле обязательно для заполнения",
                    "mark.required" => "Поле обязательно для заполнения",
                    "area.required" => "Поле обязательно для заполнения",
                    "find_date.required" => "Поле обязательно для заполнения",
                ]
            );

            $photo = $request->file('photo');
            $name = $photo->hashName();
            $patch = $photo->store('public/images');
            $user = Post::create([
                "contact_email" => Auth::user()->email,
                "contact_number" => Auth::user()->phone,
                "kind" => $request['kind'],
                "photo" => $name,
                "description" => $request['description'],
                "mark" => $request['mark'],
                "area" => $request['area'],
                "status" => 1,
                "find_date" => $request['find_date'],
                "id_user" => Auth::user()->id,
            ]);
            return redirect("/addPost")->with("succes", "Успех");
        }else{
            $request->validate([
                "email" => "required",
                "phone" => "required",
                "kind" => "required",
                "photo" => "required",
                "description" => "required",
                "mark" => "required",
                "area" => "required",
                "find_date" => "required",
            ], [
                    "email.required" => "Поле обязательно для заполнения",
                    "phone.required" => "Поле обязательно для заполнения",
                    "kind.required" => "Поле обязательно для заполнения",
                    "photo.required" => "Поле обязательно для заполнения",
                    "description.required" => "Поле обязательно для заполнения",
                    "mark.required" => "Поле обязательно для заполнения",
                    "area.required" => "Поле обязательно для заполнения",
                    "find_date.required" => "Поле обязательно для заполнения",
                ]
            );
            $photo = $request->file('photo');
            $name = $photo->hashName();
            $patch = $photo->store('public/images');
            $user = Post::create([
                "contact_email" => $request['email'],
                "contact_number" => $request['phone'],
                "kind" => $request['kind'],
                "photo" => $name,
                "description" => $request['description'],
                "mark" => $request['mark'],
                "area" => $request['area'],
                "status" => 1,
                "find_date" => $request['find_date'],
                "id_user" => null,
            ]);
            return redirect("/addPost")->with("succes", "Успех");
        }
    }

    public function findPost(Request $request){
        $data = Kind::all();
        $data2 = Area::all();
        $post = Post::where('kind', $request['kind'])->where('area', $request['area'])->where('status', 2)->paginate(2);
        return view('findPost', ['posts' => $post, 'kinds'=>$data, 'areas'=>$data2]);
    }

    public function detailPost(Post $id){
        return view('detailPost', ['post' => $id]);
    }

    public function postDelete(Post $id){
        $id->delete();
        return redirect()->back();
    }

    public function postEdit(Post $id){
        $data = Kind::all();
        $data2 = Area::all();
        return view('editPost', ['post' => $id, 'kinds'=>$data, 'areas'=>$data2]);
    }

    public function updatePost(Request $request){
        $request->validate([
            "kind" => "required",
            "description" => "required",
            "mark" => "required",
            "area" => "required",
            "find_date" => "required",
        ], [
                "kind.required" => "Поле обязательно для заполнения",
                "description.required" => "Поле обязательно для заполнения",
                "mark.required" => "Поле обязательно для заполнения",
                "area.required" => "Поле обязательно для заполнения",
                "find_date.required" => "Поле обязательно для заполнения",
            ]
        );

        $proc = Post::find($request['id']);
        $photo = $request->file('photo');
        if(!empty($photo)){
            $name = $photo->hashName();
            $patch = $photo->store('public/images');
            $proc->photo = $name;
        }
        $proc->kind = $request['kind'];
        $proc->description = $request['description'];
        $proc->mark = $request['mark'];
        $proc->area = $request['area'];
        $proc->find_date = $request['find_date'];
        $proc->save();
        return redirect()->back();
    }
}
