<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chapter;

class ChapterController extends Controller
{
    public function show($id) {
        $chapter = Chapter::where('video_id', intval($id))->get();
        return response()->json(['message'=> 'success get chapter', 'chapter'=> $chapter], 200);
    }
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
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'nama_field1' => 'required', // Ganti dengan validasi yang diperlukan
        //     'nama_field2' => 'required',
        // ]);
        $chapterId = intval($id);
        $chapter = Chapter::where('video_id', $chapterId)->first();
        $chapter->name = $request->name;
        $chapter->course_id = $request->course_id;
        $chapter->video = $request->video;
        $chapter->youtube_url = $request->youtube_url;
        $chapter->created_at = $chapter->created_at;
        $chapter->updated_at = $chapter->updated_at;
        // Tambahkan field lain sesuai kebutuhan
        $chapter->save();

        return response()->json(["message" => "data berhasil diperbarui"], 200);
    }
}