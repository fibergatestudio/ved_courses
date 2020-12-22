<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProtocolController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $protocol = $request->except('_token');
        $courseId = $protocol['course_id'];
        $lessonId = $protocol['lesson_id'];
        $userId = $protocol['user_id'];
        for ($i=1; $i <= 8 ; $i++) {
            if($request->hasFile('p_add_photo'.$i) && ($request->file('p_add_photo'.$i)->isValid())) {
                $savedFile = "/storage/".$request->file('p_add_photo'.$i)->storePublicly('images', 'public');
                $protocol['p_add_photo'.$i] = $savedFile;
            }
        }
        DB::table('protocols')->updateOrInsert(['course_id' => $courseId, 'lesson_id' => $lessonId, 'user_id' => $userId], $protocol);
        return redirect()->back()->with('success', 'Протокол успішно збережено.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($course_id, $lesson_id, $user_id)
    {
        $protocol = DB::table('protocols')->where([
            'course_id' => $course_id,
            'lesson_id' => $lesson_id,
            'user_id' => $user_id,
        ])->first();
        if (is_null($protocol)) {
            abort(404);
        }
        return view('front.protocol_raiting', compact('protocol'));
    }
}
