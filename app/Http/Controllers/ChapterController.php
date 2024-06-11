<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function tambah(Request $request) {
        $new_chapter = new Chapter();
        $new_chapter->name = $request->name;
        $new_chapter->course_id = $request->course_id;
        $new_chapter->video = $request->video;
        $new_chapter->youtube_url = $request->youtube_url;
        $new_chapter->save();

        return response()->json(['message'=> 'success added new couse', 'new_course'=> $new_chapter], 200);
    }
    public function hapus($id)
    {
        $chapter = Chapter::where('video_id',$id);
        $chapter->delete();
        return response()->json(['message'=>'danger', 'alert'=>'Chapter is deleted!'], 200);
    }
}