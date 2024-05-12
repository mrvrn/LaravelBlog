<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class ArticleController extends Controller
{
    public function create(){
        // resources/views/courses/create.blade.php
        $authors = Author::get();
        $articles = DB::table('articles')->get();
        $categories = DB::table('categories')->get();

        return view('articles.create', [
            'authors' => $authors,
            'articles' => $articles,
            'categories' => $categories,
        ]);
        
    }

    public function show($id) {
        $article = DB::table('articles')
                        ->where('id', $id)
                        ->first();

        $articles = DB::table('articles')
                        ->get();
        
        $author = DB::table('authors')
                        ->where('id', $article->author_id)
                        ->first();
        
        $categories = DB::table('categories')->get();
        $category = DB::table('categories')
                        ->where('id', $article->category_id)
                        ->first();
        

        return view('articles.show', [
            'articles' => $articles,
            'article' => $article,
            'author' => $author,
            'categories' => $categories,
            'category' => $category
        ]);

    }

    public function store(Request $request)
    {
        DB::table('articles')->insert([
            'title'         => $request->title,
            'description'   => $request->description,
            'author_id'     => $request->author_id,
            'category_id'   => $request->category_id,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        // get the last inserted id
        $id = DB::getPdo()->lastInsertId();

        return redirect('/articles/' . $id);
    }

    public function edit($id) {
        $article = DB::table('articles')
                        ->where('id', $id)
                        ->first();

        $authors = DB::table('authors')->get();
        $categories = DB::table('categories')->get();

        return view('articles.edit', [
            'article' => $article,
            'authors' => $authors,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id) {
        DB::table('articles')
            ->where('id', $id)
            ->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'author_id'     => $request->author_id,
                'category_id'   => $request->category_id,
                'updated_at'    => now()
            ]);

        // return redirect('/articles/' . $id);
        return redirect('/articles/' . $id);
    }

    public function destroy($id) {
        $article = DB::table('articles')
                        ->where('id', $id)
                        ->delete();


        return redirect('/');
    }

    public function file($id){
        // resources/views/courses/create.blade.php
        $authors = DB::table('authors')->get();
        $articles = DB::table('articles')->get();
        $categories = DB::table('categories')->get();

        $article = DB::table('articles')
                        ->where('id', $id)
                        ->first();


        return view('articles.file', [
            'authors' => $authors,
            'articles' => $articles,
            'categories' => $categories,
            'article' => $article
        ]);
        
    }

    public function upload(Request $request, $id) {
        $request->validate([
            'file.*' => 'required|image|mimes:jpeg,jpg,png,tif|max:500000',
        ]);

        $filenames = []; // Initialize an array to store filenames

        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                // $file->storeAs('public/uploads', $filename);
                $file->move(public_path('uploads'), $filename); // Move the file to the public/uploads directory
                $filenames[] = $filename; // Store each filename in the array
            }

            $article = DB::table('articles')
                            ->where('id', $id)
                            ->first();

            // Concatenate filenames with a separator (e.g., comma) and save to the image field
            $article->image = implode(',', $filenames);
            
            // put image in the database with the article id
            DB::table('articles')
                    ->where('id', $id)
                    ->update([
                        'image' => $article->image
                    ]);


            // Provide success message or redirect after successful upload
            return redirect('/articles/' . $id);
        }

        // Handle case where no files were uploaded
        return redirect()->back()->with('error', 'No files were uploaded.');
    }
}
