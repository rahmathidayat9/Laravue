<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
	public function index()
	{
		$posts = Post::all();

		return response()->json([
			'data' => $posts,
			'message' => 'Data retrieve successfully',
		]);
	}

	public function store(Request $request)
	{
		$request->validate([
			'title' => 'required|unique:posts',
			'body' => 'required',
		]);

		$post = Post::create([
			'title' => $request->title,
			'slug' => Str::slug($request->title),
			'body' => $request->body,
			'user_id' => 1,
		]);

		return response()->json([
			'data' => $post,
			'message' => 'Data created successfully',
		]);
	}

	public function edit($id)
	{
		$post = Post::findOrFail($id);

		return response()->json([
			'data' => $post,
			'message' => 'Data retrieved successfully',
		]);
	}

	public function update(Request $request, $id)
	{
		$request->validate([
			'title' => 'required|unique:posts',
			'body' => 'required',
		]);

		$post = Post::findOrFail($id)->update([
			'title' => $request->title,
			'slug' => Str::slug($request->title),
			'body' => $request->body,
			'user_id' => 1,
		]);

		return response()->json([
			'data' => $post,
			'message' => 'Data updated successfully',
		]);
	}

	public function destroy($id)
	{
		Post::findOrFail($id)->delete();

		return response()->json([
			'message' => 'Data deleted successfully',
		]);
	}
}
