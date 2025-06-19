<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Komik;
use App\Models\Chapter;
use App\Models\ChapterImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChapterImageController extends Controller
{
    public function index(Komik $komik, Chapter $chapter)
    {
        return view('admin.chapterImage', compact('komik','chapter'));
    }

    public function store(Request $r, Komik $komik, Chapter $chapter)
{
    $files = $r->file('images');
    if (!$files || !is_array($files)) {
        return back()->with('error', 'Tidak ada gambar dipilih!');
    }

    $lastOrder = $chapter->images()->max('urutan') ?? 0;

    foreach ($files as $file) {
        $path = $file->store('halmanan', 'public');

        $chapter->images()->create([
            'image_url' => $path,         // gunakan kolom image_url
            'urutan'    => ++$lastOrder,  // kolom urutan
        ]);
    }
    return back()->with('success', 'Gambar berhasil di-upload!');
}

public function updateOrder(Request $r)
{
    foreach ($r->order as $idx => $id) {
        ChapterImage::whereId($id)->update(['urutan' => $idx+1]);
    }
    return response()->json(['ok'=>true]);
}


    public function destroy(ChapterImage $image)
    {
        Storage::disk('public')->delete($image->image_url);
        $image->delete();
        return back()->with('success','Gambar dihapus!');
    }
}
