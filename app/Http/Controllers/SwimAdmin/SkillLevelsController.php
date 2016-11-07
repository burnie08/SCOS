<?php

namespace App\Http\Controllers\SwimAdmin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SwimAdmin\SkillLevel;
use Illuminate\Http\Request;
use Session;

class SkillLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $skilllevels = SkillLevel::paginate(25);

        return view('SwimAdmin.skill-levels.index', compact('skilllevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('SwimAdmin.skill-levels.create');
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
			'name' => 'required',
			'short_name' => 'required'
		]);
        $requestData = $request->all();
        
        SkillLevel::create($requestData);

        Session::flash('flash_message', 'SkillLevel added!');

        return redirect('SwimAdmin/skill-levels');
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
        $skilllevel = SkillLevel::findOrFail($id);

        return view('SwimAdmin.skill-levels.show', compact('skilllevel'));
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
        $skilllevel = SkillLevel::findOrFail($id);

        return view('SwimAdmin.skill-levels.edit', compact('skilllevel'));
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
			'name' => 'required',
			'short_name' => 'required'
		]);
        $requestData = $request->all();
        
        $skilllevel = SkillLevel::findOrFail($id);
        $skilllevel->update($requestData);

        Session::flash('flash_message', 'SkillLevel updated!');

        return redirect('SwimAdmin/skill-levels');
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
        SkillLevel::destroy($id);

        Session::flash('flash_message', 'SkillLevel deleted!');

        return redirect('SwimAdmin/skill-levels');
    }
}
