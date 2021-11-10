<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // ----------- [ post listing ] -------------
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('admin/post/index', compact('posts'));
    }

    // ------------- [ store post ] -----------------
    public function store(Request $request)
    {
        $request->validate([
            'title'         =>      'required',
            'description'   =>      'required',
        ]);

        $post = Post::create($request->all());

        if (!is_null($post)) {
            return response()->json(["status" => "success", "message" => "Success! post created.", "data" => $post]);
        } else {
            return response()->json(["status" => "failed", "message" => "Alert! post not created"]);
        }
    }

    // ---------------- [ Update post ] -------------
    public function update(Request $request)
    {
        $post_id = $request->id;
        $post = Post::where("id", $post_id)->update($request->all());

        if ($post == 1) {
            return response()->json(["status" => "success", "message" => "Success! post updated"]);
        } else {
            return response()->json(["status" => "failed", "message" => "Alert! post not updated"]);
        }
    }

    // -------------- [ Delete post ] ---------------
    public function destroy($post_id)
    {
        $post = Post::where("id", $post_id)->delete();
        if ($post == 1) {
            return response()->json(["status" => "success", "message" => "Success! post deleted"]);
        } else {
            return response()->json(["status" => "failed", "message" => "Alert! post not deleted"]);
        }
    }
}
