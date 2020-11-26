<?php

namespace App\Http\Controllers;

use DB;
use App\Diet;
use App\Answer;
use App\Http\Requests\DietRequest;
use Illuminate\Http\Request;

class DietController extends Controller
{
    public function index() {
        return view("home");
    }
    
    public function dietvalidate(Request $request) {
        // $result = "success";
        $fail = "Your height and weight ratio seems invalid. Please double-check. You might have used metric system (kg) instead of imperial. You can change preferred unit system at the top of this page.";
        $success = 0;
        $requestlist = $request->all();
        $toggle_unit = $requestlist['toggle_unit'];
        if($toggle_unit == "metric")
            $height = $requestlist['height'];
        else {
            $feet = $requestlist['feet'];
            $inch = $requestlist['inch'];
            $height = $feet/3.2808*100 + $inch/0.39370;
        }
            
        $age = $requestlist['age'];
        $weight = $requestlist['weight'];
        $targetWeight = $requestlist['targetWeight'];
        
        //temp algorithm
        if($age > 0 || $age <100)
            $result = "success";
        else 
            return response()->json($fail);
            
        if($height > 100 && $height <220)
            $result = "success";
        else 
            return response()->json($fail);
            
        if($weight > 35 && $weight <120)
            $result = "success";
        else 
            return response()->json($fail);
            
        if($targetWeight > 40 && $targetWeight <120)
            $result = "success";
        else 
            return response()->json($fail);
                
        return response()->json($result);
    }
    
    public function show()
    {
        $sql = "SELECT * FROM diets";
        $diet_list =  DB::select($sql);
        
        $resultList = array();
        for($i = 0; $i < count($diet_list); $i++) {
            
            $sql = "SELECT answers.diet_id, answers.answer FROM answers LEFT JOIN diets ON answers.diet_id = diets.id WHERE answers.diet_id = ".$diet_list[$i]->id;
            $answer_list =  DB::select($sql);
            
            $diet = array();
            $answer = array();
            $subtitle = array();
			$description = array();
			
			$diet['diet'] = $diet_list[$i]->diet;
			
			if(!empty($diet_list[$i]->next_button))
                $diet['answers'] = $diet_list[$i]->next_button;	

			if(!empty($diet_list[$i]->multi_selects))
                $diet['multi_selects'] = $diet_list[$i]->multi_selects;	
			
			for($j = 0; $j < count($answer_list); $j++) {
                array_push($answer, $answer_list[$j]->answer);
            }
            
            
            $sql = "SELECT sub_answers.* FROM sub_answers LEFT JOIN diets ON sub_answers.diet_id = diets.id WHERE sub_answers.diet_id = ".$diet_list[$i]->id;
            $sub_answers_list =  DB::select($sql);
            $subanswer_id = 0;
            for($j = 0; $j < count($sub_answers_list); $j++) {
                //tempcode
                $subtitle["subtitle"] = $sub_answers_list[$j]->subtitle;
                $subanswer_id = $sub_answers_list[$j]->id;
            }
            
            $sql = "SELECT descriptions.sub_id, descriptions.descriptions FROM descriptions LEFT JOIN sub_answers ON descriptions.sub_id = sub_answers.id WHERE descriptions.sub_id = ".$subanswer_id;
            $description_list =  DB::select($sql);
            for($j = 0; $j < count($description_list); $j++) {
                array_push($description, $description_list[$j]->descriptions);
            }
            if(!empty($answer))
                $diet['answers'] = $answer;	
            if(count($description) > 0) {
                $subtitle["descriptions"] = $description;
                array_push($answer, $subtitle);
            }
            
			$diet['answers'] = $answer;	
		
            array_push($resultList, $diet);
            
        }

        return response()->json($resultList);
    }
    public function addiet(Diet $model){
        return view('diets.index', ['diets' => $model->paginate(15)]);
    }
       /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('diets.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\DietRequest  $request
     * @param  \App\Diet  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DietRequest $request, Diet $model,Answer $answersss)
    {

        $answers=$request->get('answers');
        $id=$model->create($request->all());
        return redirect()->route('diets')->withStatus(__('Diet successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\Diet  $diet
     * @return \Illuminate\View\View
     */
    public function edit(Diet $diet,Answer $answers)
    {
        $answerss=$answers::where('diet_id',$diet->id)->get();
        
        return view('diets.edit', compact('diet','answerss'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\DietRequest  $request
     * @param  \App\Diet  $diet
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DietRequest $request, Diet  $diet,Answer $answersss)
    {
        //var_dump($request);
        $diet->update(
            ['name' => $request->get('name')]
        );
        $answersss::where('diet_id', $diet->id)->delete();
        return redirect()->route('diets')->withStatus(__('Diet successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\Diet  $diet
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Diet  $diet)
    {
        $diet->delete();

        return redirect()->route('diets')->withStatus(__('Diet successfully deleted.'));
    }
}
