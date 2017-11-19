<?php

namespace App\Http\Controllers;
use App\NewsEventsArticle;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\NewsRepository;

class NewsController extends Controller
{
    /**
     * The news repository instance.
     *
     * @var NewsRepository
     */
    protected $news;
    /**
     * Create a new controller instance.
     *
     * @param  NewsRepository  $news
     * @return void
     */
    // public function __construct(newsRepository $news)
    // {
    //     $this->middleware('auth');
    //     $this->news = $news;
    // }

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a list of all of the user's new articles.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
        // return view('news.index', [
        //     'news' => $this->news->forUser($request->user()),
        //
        return view('news.index');
    }
    /**
     * Create a new news article.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        $request->user()->news()->create([
            'name' => $request->name,
        ]);
        return redirect('/news');
    }
    /**
     * Destroy the given news item.
     *
     * @param  Request  $request
     * @param  News_article $news_article
     * @return Response
     */
    public function destroy(Request $request, News_article $news_article)
    {
        $this->authorize('destroy', $news_article);
        $task->delete();
        return redirect('/news');
    }
}
