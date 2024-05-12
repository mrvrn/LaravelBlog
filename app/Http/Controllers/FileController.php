<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request) {
        $request->validate([
            'file.*' => 'required|mimes:pdf,doc,docx,xls,xlsx,jpeg,jpg,png,tif|max:10000000000000000000000000',
        ]);

        if ($request->hasFile('file')) {
            $files = $request->file('file');
            foreach ($files as $file) {
                $filename = $file->getClientOriginalName();
                $file->storeAs('public/uploads', $filename);
            }

            $article = DB::table('articles')
                            ->where('id', $request->article_id)
                            ->first();
            $article->image = $filename;
            $article->save();

            // test

            // Provide success message or redirect after successful upload
            return redirect()->back()->with('success', 'Files uploaded successfully!');
        }

        // Handle case where no files were uploaded
        return redirect()->back()->with('error', 'No files were uploaded.');
    }
}
