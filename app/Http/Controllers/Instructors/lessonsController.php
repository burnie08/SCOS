<?php

namespace App\Http\Controllers\Instructors;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Instructors\lesson;
use App\Instructors\EvalClass;
use Illuminate\Http\Request;
use Session;
use App\Instructors\Swimmer;
use App\SwimAdmin\SkillCard;
use App\SwimAdmin\Skill;
use App\SwimAdmin\SkillLevel;
use App\User;
use Illuminate\Support\Facades\Auth;

class lessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $lessons = lesson::paginate(25);

        return view('Instructors.lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Instructors.lessons.create');
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
			'user_id' => 'required',
			'swimmer_id' => 'required',
			'skill_card_id' => 'required'
		]);
        $requestData = $request->all();
        
        lesson::create($requestData);

        Session::flash('flash_message', 'lesson added!');

        return redirect('Instructors/lessons');
    }

    /**
     * Show lessons for Swimmer.
     *
     * @param  int  $swimmer_id
     *
     * @return \Illuminate\View\View
     */
    public function show($swimmer_id)
    {
        $swimmer = Swimmer::findOrFail($swimmer_id);
        $cards = SkillCard::all();
        //$lessons = lesson::find(14);
        $lessons = lesson::query()->where('swimmer_id', '=', $swimmer_id)->get();
        
        
        return view('Instructors.swim-lessons.lessons',compact('swimmer','cards','lessons'));
    }
    
    public function evalsCreate($card_id,$swimmer_id)
    {
        $user_id = Auth::id();
        $user_name = Auth::user()->name;
        $levels = SkillLevel::all();
        
        $skill_card = SkillCard::findOrFail($card_id);
       
        $skills = Skill::query()->where('skill_card_id', '=', $card_id)->get();
        $swimmer = Swimmer::findOrFail($swimmer_id);
       /* return view('Instructors.swimmers.evalShow',['user_id'=>$user_id,'user_name'=>$user_name, 'skills'=>$skills, 'levels'=>$levels]);
       */
        return view('Instructors.swim-lessons.evalsCreate',compact('user_id','user_name','levels','skills','swimmer', 'skill_card'));
    }
    
    public function evalsEdit($lesson_id, Request $request)
    {
        $lesson = lesson::findOrFail($lesson_id);
        //print_r($lesson->lesson_date);
        //$lesson_date = \DateTime::createFromFormat("Y-m-d", $lesson->lesson_date);
        //$lesson_date->setTimezone(new \DateTimeZone("UTC"));
        //$lesson->lesson_date = $lesson_date->format("Y-m-d H:i:s");
        
        $levels = SkillLevel::all();
        return view('Instructors.swim-lessons.evalsEdit', compact('lesson', 'levels'));
    }
    
    public function evalsUpdate($lesson_id, Request $request)
    {
        $lesson = lesson::findOrFail($lesson_id);
        
        $lesson_date = \DateTime::createFromFormat("m/d/Y", $request->lessonDate);
        $lesson_date->setTimezone(new \DateTimeZone("UTC"));
        $lesson->lesson_date = $lesson_date->format("Y-m-d H:i:s");
        $lesson->comments =  $request->comments;
        $lesson->save();
        
        $skills = Skill::query()->where('skill_card_id', '=', $lesson->skill_card_id)->get();
        foreach ($lesson->skillcard->skills as $skill)
        {   
           
            $key = "radio-skill-".$skill->id;
           
            $skill_level_id  = $request[$key];
            $eval = EvalClass::query()->where('lesson_id',$lesson->id)->where('skill_id',$skill->id)->firstOrFail();
           
            $eval->skill_level_id = $skill_level_id;
            $eval->lesson_id = $lesson->id;
            $eval->skill_id = $skill->id;
            $eval->save();
        }
       
      
        return redirect("/lessons/".$lesson->swimmer->id."/show");
    }
    
    public function createLesson($swimmer_id, $card_id, Request $request)
    {
        $user_id = Auth::id();
        //$requestData = $request->all();
        
        $lesson = new lesson();
        //print_r($request->all());
        $lesson_date = \DateTime::createFromFormat('m/d/Y', $request->lessonDate);
        $lesson_date->setTimezone(new \DateTimeZone("UTC"));
        $lesson->lesson_date = $lesson_date->format("Y-m-d H:i:s");
        $lesson->comments = $request->comments;
        $lesson->user_id = $user_id;
        $lesson->skill_card_id = $card_id;
        $lesson->swimmer_id = $swimmer_id;
        $lesson->save();
        
        
        $skills = Skill::query()->where('skill_card_id', '=', $card_id)->get();
        foreach ($skills as $skill)
        {   
           
            $key = "radio-skill-".$skill->id;
            echo "key = {$key}";
            $skill_level_id  = $request[$key];
            $eval = new EvalClass();
            $eval->skill_level_id = $skill_level_id;
            $eval->lesson_id = $lesson->id;
            $eval->skill_id = $skill->id;
            $eval->save();
        }
        return redirect("/lessons/{$swimmer_id}/show");
       
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
        $lesson = lesson::findOrFail($id);

        return view('Instructors.lessons.edit', compact('lesson'));
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
			'user_id' => 'required',
			'swimmer_id' => 'required',
			'skill_card_id' => 'required'
		]);
        $requestData = $request->all();
        
        $lesson = lesson::findOrFail($id);
        $lesson->update($requestData);

        Session::flash('flash_message', 'lesson updated!');

        return redirect('Instructors/lessons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id,$swimmer_id)
    {
        lesson::destroy($id);

        Session::flash('flash_message', 'lesson deleted!');

        return redirect('/lessons/1/show');
    }
}
