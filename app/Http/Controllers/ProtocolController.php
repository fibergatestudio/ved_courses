<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProtocolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
            if($request->hasFile('p-add-photo'.$i) && ($request->file('p-add-photo'.$i)->isValid())) {
                $savedFile = "/storage/".$request->file('p-add-photo'.$i)->storePublicly('images', 'public');
                $protocol['p-add-photo'.$i] = $savedFile;
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
