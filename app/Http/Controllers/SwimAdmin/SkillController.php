<?php

namespace App\Http\Controllers\SwimAdmin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SwimAdmin\Skill;
use App\SwimAdmin\SkillCard;
use Illuminate\Http\Request;
use Session;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function showAll($skill_card_id)
    {
        //$skill = Skill::paginate(25);

        $card = SkillCard::findOrFail($skill_card_id);
        //$skills = Skill::CardId($id)->get();
        return view('admin.skill.index',compact('card'));


        //return view('admin.skill.index', compact('skill'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($skill_card_id)
    {
        $card = SkillCard::findOrFail($skill_card_id);
        return view('admin.skill.create',compact('card'));
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
        
        Skill::create($requestData);

        Session::flash('flash_message', 'Skill added!');

        return redirect('admin/skill/'.$request->input('skill_card_id').'/showAll');
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
        $skill = Skill::findOrFail($id);

        return view('admin.skill.show', compact('skill'));
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
        $skill = Skill::findOrFail($id);

        return view('admin.skill.edit', compact('skill'));
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
        
        $skill = Skill::findOrFail($id);
        $skill->update($requestData);

        Session::flash('flash_message', 'Skill updated!');

        return redirect('admin/skill/'.$skill->skill_card_id.'/showAll');
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
        $skill = Skill::findOrFail($id);

        Skill::destroy($id);

        Session::flash('flash_message', 'Skill deleted!');

        return redirect('admin/skill/'.$skill->skill_card_id.'/showAll');
    }
}
