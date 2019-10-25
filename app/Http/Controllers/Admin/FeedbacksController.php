<?php

namespace App\Http\Controllers\Admin;

use App\Feedback;
use App\Http\Requests\FeedbackGuestRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(Feedback::QUANTITY);
        return view('admin.feedbacks.index',[
            'feedbacks' => $feedbacks
        ])->with('i', (request()->input('page', 1) - 1) * Feedback::QUANTITY);
    }

    /**
     * Store a newly created resource in storage.
     * @param FeedbackGuestRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FeedbackGuestRequest $request)
    {
        $validated = $request->validated();

        Feedback::create($validated);

        return redirect()->route('home')
            ->with('success','Feedback created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
