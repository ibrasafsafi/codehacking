<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use App\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $postcount = Post::count();
        $usercount = User::count();
        $commentcount = Comment::count();
        $categorycount = Category::count();

        return view('admin.index',compact('postcount','usercount','commentcount','categorycount'));
    }
}
