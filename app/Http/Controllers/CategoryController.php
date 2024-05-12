<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show($id) {
        $author = DB::table('authors')
                        ->where('id', $id)
                        ->first();

        $articles = DB::table('articles')
                        ->where('category_id', $id)
                        ->get();

        $categories = DB::table('categories')->get();
        $category = DB::table('categories')
                        ->where('id', $id)
                        ->first();

        return view('categories.show', [
            'author' => $author,
            'articles' => $articles,
            'categories' => $categories,
            'category' => $category
        ]);

    }

    public function create() {
        // resources/views/courses/create.blade.php
        $authors = DB::table('authors')->get();
        $articles = DB::table('articles')->get();
        $categories = DB::table('categories')->get();
        $roles = DB::table('roles')->get();

        return view('categories.create', [
            'authors' => $authors,
            'articles' => $articles,
            'categories' => $categories,
            'roles' => $roles
        ]);
    }

    public function store(Request $request) {
        DB::table('categories')->insert([
            'name'         => $request->name,
            'created_at'   => now(),
            'updated_at'   => now()
        ]);

        return redirect('/');
    }

    public function destroy($id) {
        $article = DB::table('categories')
                        ->where('id', $id)
                        ->delete();


        return redirect('/');
    }

    public function edit($id){
        $category = DB::table('categories')
                        ->where('id', $id)
                        ->first();

        $authors = DB::table('authors')->get();
        $articles = DB::table('articles')->get();
        $categories = DB::table('categories')->get();
        $roles = DB::table('roles')->get();

        return view ('categories.edit',[
            'category' => $category
        ]);
    }

    public function update(Request $request, $id) {
        DB::table('categories')
            ->where('id', $id)
            ->update([
                'name'         => $request->name,
                'updated_at'   => now()
            ]);

        // return redirect('/categories/' . $id);
        return redirect('/');
    }

    // FILE

    public function file($id){
        // resources/views/courses/create.blade.php
        $authors = DB::table('authors')->get();
        $articles = DB::table('articles')->get();
        $categories = DB::table('categories')->get();

        $category = DB::table('categories')
                        ->where('id', $id)
                        ->first();


        return view('categories.file', [
            'authors' => $authors,
            'articles' => $articles,
            'categories' => $categories,
            'category' => $category
        ]);
        
    }

    public function upload(Request $request, $id) {
        $request->validate([
            'file.*' => 'required|image|mimes:jpeg,jpg,png,tif|max:100000',
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

            $category = DB::table('categories')
                            ->where('id', $id)
                            ->first();

            // Concatenate filenames with a separator (e.g., comma) and save to the image field
            $category->image = implode(',', $filenames);
            
            // put image in the database with the article id
            DB::table('categories')
                    ->where('id', $id)
                    ->update([
                        'image' => $category->image
                    ]);


            // Provide success message or redirect after successful upload
            return redirect('/categories/' . $id);
        }

        // Handle case where no files were uploaded
        return redirect()->back()->with('error', 'No files were uploaded.');
    }
}
