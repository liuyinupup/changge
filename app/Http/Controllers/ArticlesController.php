<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = article::orderBy('created_at', 'desc')->paginate(12);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Article $article)
    {
        $this->authorize('content_management',\Auth::user());
        return view('articles.edit',compact('article'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('content_management',\Auth::user());
        
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);
        $data = $request->all();
        
        
        Article::create($data);
       
       
        session()->flash('success', '文章添加成功');
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
         // 获取 上一篇 的 ID
         $previous = Article::where('id', '<', $article->id)->max('id');
         // 同理，获取 下一篇 的 ID
         $next = Article::where('id', '>', $article->id)->min('id');
         // 如果没有上一篇，则选最后一篇
         if (!$previous) {
             $previous = Article::max('id');
         }
          // 如果没有下一篇，则选第一篇
         if (!$next) {
             $next = Article::min('id');
         }
         if (!$previous) {
             $previous = $article;
         }
         if (!$next) {
             $next = $article;
         }
         
        return view('articles.show', compact('article', 'previous', 'next'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $this->authorize('content_management',\Auth::user());
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $this->authorize('content_management',\Auth::user());
        $data = $request->all();
        
        
        $article->update($data);
       
       
        return redirect()->route('articles.show', $article->id)->with('success', '文章更新成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        if($article->id==1){
            session()->flash('danger', '此文章不可删除！');
        }
        else{
            session()->flash('success', '文章添加成功');
        }
        $article->delete();
        return redirect()->route('articles.index');
    }
}
