<?php

namespace App\Http\Controllers\SwimAdmin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SwimAdmin\ProficiencyLevel;
use Illuminate\Http\Request;
use Session;

class ProficiencyLevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $proficiencylevels = ProficiencyLevel::paginate(25);

        return view('SwimAdmin.proficiency-levels.index', compact('proficiencylevels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('SwimAdmin.proficiency-levels.create');
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
        
        ProficiencyLevel::create($requestData);

        Session::flash('flash_message', 'ProficiencyLevel added!');

        return redirect('proficiency-levels');
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
        $proficiencylevel = ProficiencyLevel::findOrFail($id);

        return view('SwimAdmin.proficiency-levels.show', compact('proficiencylevel'));
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
        $proficiencylevel = ProficiencyLevel::findOrFail($id);

        return view('SwimAdmin.proficiency-levels.edit', compact('proficiencylevel'));
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
			'Name' => 'required'
		]);
        $requestData = $request->all();
        
        $proficiencylevel = ProficiencyLevel::findOrFail($id);
        $proficiencylevel->update($requestData);

        Session::flash('flash_message', 'ProficiencyLevel updated!');

        return redirect('proficiency-levels');
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
        ProficiencyLevel::destroy($id);

        Session::flash('flash_message', 'ProficiencyLevel deleted!');

        return redirect('proficiency-levels');
    }
}
