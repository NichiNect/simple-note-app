<?php

namespace App\Http\Controllers\Notes;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SubjectResource;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::get();
        return SubjectResource::collection($subjects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'subject' => 'required'
        ]);

        $subject = Subject::create([
            'name' => request()->subject,
            'slug' => \Str::slug(request()->subject)
        ]);

        return response()->json([
            'message' => 'New subject was added',
            'subject' => $subject
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return SubjectResource::make($subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Subject $subject)
    {
        request()->validate([
            'subject' => 'required'
        ]);
        
        $subject = Subject::where('slug', $subject->slug)->update([
            'name' => request()->subject,
            'slug' => \Str::slug(request()->subject)
        ]);

        return response()->json([
            'message' => 'New subject was added',
            'subject' => $subject
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return response()->json([
            'message' => 'Subject was success deleted',
        ]);
    }
}
