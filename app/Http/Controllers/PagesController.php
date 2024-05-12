<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function home() {
        $articles = DB::table('articles')->get();
        // $articles = Article::with('author')->get();
        $authors = DB::table('authors')->get();
        $roles = DB::table('roles')->get();
        $categories = DB::table('categories')->get();

        // get all articles written today
        $recent_articles = DB::table('articles')
                            ->whereDate('created_at', date('Y-m-d'))
                            ->orderBy('created_at', 'desc')
                            ->get();


        $auth = DB::table('authors')
                        ->where('id', $articles->first()->author_id)
                        ->get();

        // // get previous written article
        // $previous_article = DB::table('articles')
        //                     ->where('id', $articles->first()->id - 1)
        //                     ->get();

        // // get next written article
        // $next_article = DB::table('articles')
        //                     ->where('id', $articles->first()->id + 1)
        //                     ->get();





        return view('dashboard', [
            'articles' => $articles,
            'roles' => $roles,
            'authors' => $authors,
            'categories' => $categories,
            'recent_articles' => $recent_articles,
            'auth' => $auth
        ]);
    }
}
