<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    public function create() {
        // resources/views/courses/create.blade.php
        $authors = DB::table('authors')->get();
        $articles = DB::table('articles')->get();
        $categories = DB::table('categories')->get();
        $roles = DB::table('roles')->get();

        return view('authors.create', [
            'authors' => $authors,
            'articles' => $articles,
            'categories' => $categories,
            'roles' => $roles
        ]);
    }

    public function show($id) {
        $author = DB::table('authors')
                        ->where('id', $id)
                        ->first();

        $authors = DB::table('authors')
                        ->get();
        
        $roles = DB::table('roles')->get();

        $articles = DB::table('articles')
                        ->where('author_id', $id)
                        ->get();

        $role = DB::table('roles')
                        ->where('id', $author->role_id)
                        ->first();

        $categories = DB::table('categories')->get();

        return view('authors.show', [
            'author' => $author,
            'role' => $role,
            'articles' => $articles,
            'categories' => $categories
        ]);

    }

    public function store(Request $request) {
        \DB::table('authors')->insert([
            'firstname'     => $request->firstname,
            'infix'         => $request->infix,
            'lastname'      => $request->lastname,
            'biography'     => $request->biography,
            'role_id'       => $request->role_id,
            'created_at'    => now(),
            'updated_at'    => now()
        ]);

        return redirect('/');
    }

    public function edit($id) {
        $author = DB::table('authors')
                        ->where('id', $id)
                        ->first();

        $roles = DB::table('roles')->get();
        $categories = DB::table('categories')->get();

        return view('authors.edit', [
            'author' => $author,
            'roles' => $roles,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, $id) {
        DB::table('authors')
            ->where('id', $id)
            ->update([
                'firstname'     => $request->firstname,
                'infix'         => $request->infix,
                'lastname'      => $request->lastname,
                'biography'     => $request->biography,
                'role_id'       => $request->role_id,
                'updated_at'    => now()
            ]);

        // return redirect('/articles/' . $id);
        return redirect('/');
    }

    public function destroy($id) {
        $article = DB::table('authors')
                        ->where('id', $id)
                        ->delete();


        return redirect('/');
    }

    // FILE

    public function file($id){
        // resources/views/courses/create.blade.php
        $authors = DB::table('authors')->get();
        $articles = DB::table('articles')->get();
        $categories = DB::table('categories')->get();

        $author = DB::table('authors')
                        ->where('id', $id)
                        ->first();


        return view('authors.file', [
            'authors' => $authors,
            'articles' => $articles,
            'categories' => $categories,
            'author' => $author
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

            $author = DB::table('authors')
                            ->where('id', $id)
                            ->first();

            // Concatenate filenames with a separator (e.g., comma) and save to the image field
            $author->image = implode(',', $filenames);
            
            // put image in the database with the article id
            DB::table('authors')
                    ->where('id', $id)
                    ->update([
                        'image' => $author->image
                    ]);


            // Provide success message or redirect after successful upload
            return redirect('/authors/' . $id);
        }

        // Handle case where no files were uploaded
        return redirect()->back()->with('error', 'No files were uploaded.');
    }
}
