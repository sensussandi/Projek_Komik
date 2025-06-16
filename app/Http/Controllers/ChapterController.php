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

        return view('read', compact('chapter'));
    }
}
