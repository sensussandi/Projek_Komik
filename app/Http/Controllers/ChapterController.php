<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function show($id)
    {
        $chapter = Chapter::with(['comic', 'pages' => function($query) {
            $query->orderBy('urutan','desc');
        }])->findOrFail($id);

        // return view('read', compact('chapter'));
            
        $previousChapter = Chapter::where('komik_id', $chapter->komik_id)
            ->where('nomor_chapter', '<', $chapter->nomor_chapter)
            ->orderBy('nomor_chapter', 'desc')
            ->first();

        $nextChapter = Chapter::where('komik_id', $chapter->komik_id)
            ->where('nomor_chapter', '>', $chapter->nomor_chapter)
            ->orderBy('nomor_chapter', 'asc')
            ->first();

         return view('read', compact('chapter', 'previousChapter', 'nextChapter'));

    }



}
