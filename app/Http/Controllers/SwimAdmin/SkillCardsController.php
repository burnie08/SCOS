<?php

namespace App\Http\Controllers\SwimAdmin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SwimAdmin\SkillCard;
use Illuminate\Http\Request;
use Session;

class SkillCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $skillcards = SkillCard::paginate(25);

        return view('SwimAdmin.skill-cards.index', compact('skillcards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('SwimAdmin.skill-cards.create');
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
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        SkillCard::create($requestData);

        Session::flash('flash_message', 'SkillCard added!');

        return redirect('SwimAdmin/skill-cards');
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
        $skillcard = SkillCard::findOrFail($id);

        return view('SwimAdmin.skill-cards.show', compact('skillcard'));
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
        $skillcard = SkillCard::findOrFail($id);

        return view('SwimAdmin.skill-cards.edit', compact('skillcard'));
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
			'name' => 'required'
		]);
        $requestData = $request->all();
        
        $skillcard = SkillCard::findOrFail($id);
        $skillcard->update($requestData);

        Session::flash('flash_message', 'SkillCard updated!');

        return redirect('SwimAdmin/skill-cards');
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
        SkillCard::destroy($id);

        Session::flash('flash_message', 'SkillCard deleted!');

        return redirect('SwimAdmin/skill-cards');
    }
}
