<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Resources\Comment as CommentResource;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Article $article
     * @return \Illuminate\Http\Response
     */
    public function index(Article $article)
    {
        return response() -> json(CommentResource::collection($article->comments), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @param  \App\Comment  $comment
     * @return void
     */
    public function show(Article $article, Comment $comment)
    {
        $comment = $article->comments()->where('id', $comment->id)->firstOrFail();
        return response()->json($comment, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Article $article
     * @return \Illuminate\Http\Response
     */     

    public function store(Request $request, Article $article)
    {
        $request->validate([
            'text' => 'required|string'
        ]);

        $comment = $article->comments()->save(new Comment($request->all()));
        return response()->json($comment, 201);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function delete(Comment $comment)
    {
        //
    }
}
