<?php

namespace App\Http\Controllers\Instructors;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\eval;
use Illuminate\Http\Request;
use Session;

class evalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $evals = eval::paginate(25);

        return view('Instructors.evals.index', compact('evals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Instructors.evals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'lesson_id' => 'required',
			'skill_id' => 'required',
			'skill_level_id' => 'required'
		]);
        $requestData = $request->all();
        
        eval::create($requestData);

        Session::flash('flash_message', 'eval added!');

        return redirect('Instructors/evals');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $eval = eval::findOrFail($id);

        return view('Instructors.evals.show', compact('eval'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $eval = eval::findOrFail($id);

        return view('Instructors.evals.edit', compact('eval'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'lesson_id' => 'required',
			'skill_id' => 'required',
			'skill_level_id' => 'required'
		]);
        $requestData = $request->all();
        
        $eval = eval::findOrFail($id);
        $eval->update($requestData);

        Session::flash('flash_message', 'eval updated!');

        return redirect('Instructors/evals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        eval::destroy($id);

        Session::flash('flash_message', 'eval deleted!');

        return redirect('Instructors/evals');
    }
}
