<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Question;
use App\Answer;
use App\Result;
use App\Email;
use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\SendFreeMail;
// use Mail;

class QuestionController extends Controller
{
    public function index() {
        return view("home");
    }
    
    public function questionvalidate(Request $request) {
        $requestlist = $request->all();
        $sendmail = $requestlist['email'];
        $aparams = $requestlist['aparams'];
        
        $temperatureNeutral = 0;
        $temperatureCold = 0;
        $temperatureHot = 0;
        for($i = 0; $i < 9; $i++) {
            if($aparams[$i] == 0)
                $temperatureNeutral++;
            else if($aparams[$i] == 1)
                $temperatureCold++;
            else if($aparams[$i] == 2)
                $temperatureHot++;
        }

        $humidityNeutral = 0;
        $humidityDamp = 0;
        $humidityDry = 0;
        for($i = 9; $i < 18; $i++) {
            if($aparams[$i] == 0)
                $humidityNeutral++;
            else if($aparams[$i] == 1)
                $humidityDamp++;
            else if($aparams[$i] == 2)
                $humidityDry++;
        }

        $adversityNeutral = 0;
        $adversityWeak = 0;
        $adversityOverly = 0;
        for($i = 18; $i < 27; $i++) {
            if($aparams[$i] == 0)
                $adversityNeutral++;
            else if($aparams[$i] == 1)
                $adversityWeak++;
            else if($aparams[$i] == 2)
                $adversityOverly++;
        }

        
        $QUIZ1 = "Mixed";
        $QUIZ2 = "Mixed";
        $QUIZ3 = "Mixed";
        if ($temperatureNeutral > 6) 
            $QUIZ1 = "Neutral";
        else if ($temperatureCold > 6) 
            $QUIZ1 = "Cold";
        else if ($temperatureHot > 6) 
            $QUIZ1 = "Hot"; 
        
        if ($humidityNeutral > 6) 
            $QUIZ2 = "Neutral";
        else if ($humidityDamp > 6) 
            $QUIZ2 = "Damp";
        else if ($humidityDry > 6) 
            $QUIZ2 = "Dry";

        if ($adversityNeutral > 6) 
            $QUIZ3 = "Neutral";
        else if ($adversityWeak > 6) 
            $QUIZ3 = "Weak";
        else if ($adversityOverly > 6) 
            $QUIZ3 = "Overly";

        

        //////////////////////////////////////////
        if ($QUIZ1 == "Neutral" && $QUIZ2 == "Neutral" && $QUIZ3 == "Neutral") {
            $content = "Normal constitution";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Neutral" && $QUIZ3 == "Weak") {
            $content = "Qi deficency constitution";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Neutral" && $QUIZ3 == "Overly") {
            $content = "Special constitution";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Neutral" && $QUIZ3 == "Mixed") {
            $content = "Normal constitution minus";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Damp" && $QUIZ3 == "Neutral") {
            $content = "phlegm-dampness constitution";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Dry" && $QUIZ3 == "Neutral") {
            $content = "Yin deficiency minus constitution";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Mixed" && $QUIZ3 == "Neutral") {
            $content = "Normal constitution minus";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Damp" && $QUIZ3 == "Weak") {
            $content = "phlegm-dampness and qi deficiency constitution";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Dry" && $QUIZ3 == "Weak") {
            $content = "Yin deficiency and Qi deficiency constitution";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Mixed" && $QUIZ3 == "Weak") {
            $content = "Qi deficiency puls constitution ";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Damp" && $QUIZ3 == "Overly") {
            $content = "phlegm-dampness and special constituion";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Dry" && $QUIZ3 == "Overly") {
            $content = "Yin deficency minus and special constituion";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Mixed" && $QUIZ3 == "Overly") {
            $content = "Special constituion with phlegm-dampness minus";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Damp" && $QUIZ3 == "Mixed") {
            $content = "phlegm-dampness and qi deficency minus constitution";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Dry" && $QUIZ3 == "Mixed") {
            $content = "Yin and qi deficiency minus constitution";
        } else if ($QUIZ1 == "Neutral" && $QUIZ2 == "Mixed" && $QUIZ3 == "Mixed") {
            $content = "phlegm-dampness minus and qi deficency minus constitution";
        }


        if ($QUIZ1 == "Cold" && $QUIZ2 == "Neutral" && $QUIZ3 == "Neutral") {
            $content = "Yang deficiency constitution";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Neutral" && $QUIZ3 == "Weak") {
            $content = "Yang deficiency constitution plus";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Neutral" && $QUIZ3 == "Overly") {
            $content = "Yang deficiency and spiecal constitution";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Neutral" && $QUIZ3 == "Mixed") {
            $content = "Yang deficiency constitution";

        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Damp" && $QUIZ3 == "Neutral") {
            $content = "Cold dampness constitution";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Dry" && $QUIZ3 == "Neutral") {
            $content = "Yang deficiency constitution";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Mixed" && $QUIZ3 == "Neutral") {
            $content = "Cold dampness constitution minus";

        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Damp" && $QUIZ3 == "Weak") {
            $content = "Cold dampness and qi deficiency constitution";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Dry" && $QUIZ3 == "Weak") {
            $content = "Yang deficiency constuituion plus";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Mixed" && $QUIZ3 == "Weak") {
            $content = "Yang deficiency constuituion plus with phlegm-dampness minus";

        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Damp" && $QUIZ3 == "Overly") {
            $content = "Cold dampness constitution with special constitution";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Dry" && $QUIZ3 == "Overly") {
            $content = "Yang deficiency constuituion with special constitution";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Mixed" && $QUIZ3 == "Overly") {
            $content = "Yang deficiency and special consitution";

        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Damp" && $QUIZ3 == "Mixed") {
            $content = "Cold dampness constitution";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Dry" && $QUIZ3 == "Mixed") {
            $content = "Yang deficiency constitution";
        } else if ($QUIZ1 == "Cold" && $QUIZ2 == "Mixed" && $QUIZ3 == "Mixed") {
            $content = "Yang deficiency constitution minus";
        }


        if ($QUIZ1 == "Hot" && $QUIZ2 == "Neutral" && $QUIZ3 == "Neutral") {
            $content = "Hot constitution";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Neutral" && $QUIZ3 == "Weak") {
            $content = "Hot and qi deficiency constitution";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Neutral" && $QUIZ3 == "Overly") {
            $content = "Hot and special constitution";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Neutral" && $QUIZ3 == "Mixed") {
            $content = "Hot constitution with qi deficiency minus";

        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Damp" && $QUIZ3 == "Neutral") {
            $content = "Hot dampness constitution";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Dry" && $QUIZ3 == "Neutral") {
            $content = "Hot and yin constitution plus";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Mixed" && $QUIZ3 == "Neutral") {
            $content = "Hot dampness constitution minus";

        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Damp" && $QUIZ3 == "Weak") {
            $content = "Hot dampness and qi deficiency constitution";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Dry" && $QUIZ3 == "Weak") {
            $content = "Yin deficiency constitution";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Mixed" && $QUIZ3 == "Weak") {
            $content = "Yin and qi deficiency constitution";

        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Damp" && $QUIZ3 == "Overly") {
            $content = "Hot dampness and special constitution ";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Dry" && $QUIZ3 == "Overly") {
            $content = "Hot and qi deficiency constitution with special constitution ";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Mixed" && $QUIZ3 == "Overly") {
            $content = "Hot dampness constitution minus with special constitution ";

        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Damp" && $QUIZ3 == "Mixed") {
            $content = "Hot dampness constitution plus";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Dry" && $QUIZ3 == "Mixed") {
            $content = "Hot constitution with yin and qi deficiency minus";
        } else if ($QUIZ1 == "Hot" && $QUIZ2 == "Mixed" && $QUIZ3 == "Mixed") {
            $content = "Hot dampness constitution minus with qi deficiency minus";
        }

        

        if ($QUIZ1 == "Mixed" && $QUIZ2 == "Neutral" && $QUIZ3 == "Neutral") {
            $content = "Normal constitution minus";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Neutral" && $QUIZ3 == "Weak") {
            $content = "Qi deficiency plus";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Neutral" && $QUIZ3 == "Overly") {
            $content = "Qi deficiency and special constitution ";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Neutral" && $QUIZ3 == "Mixed") {
            $content = "Qi deficiency";

        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Damp" && $QUIZ3 == "Neutral") {
            $content = "Qi deficiency and phlegm-dampness constitution ";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Dry" && $QUIZ3 == "Neutral") {
            $content = "Qi and yin deficiency minus";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Mixed" && $QUIZ3 == "Neutral") {
            $content = "Qi deficiency constitution with phlegm-dampness minus";

        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Damp" && $QUIZ3 == "Weak") {
            $content = "Qi deficiency and phlegm-dampness constitution ";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Dry" && $QUIZ3 == "Weak") {
            $content = "Qi deficiency with yin deficiency minus";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Mixed" && $QUIZ3 == "Weak") {
            $content = "Qi deficiency plus with phlegm-dampness minus";

        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Damp" && $QUIZ3 == "Overly") {
            $content = "Qi deficiency minus and phlegm-dampness constitution with special constitution";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Dry" && $QUIZ3 == "Overly") {
            $content = "Qi and yin deficiency minus and special constitution ";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Mixed" && $QUIZ3 == "Overly") {
            $content = "Qi deficiency and  phlegm-dampness minus constitution with special constitution";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Damp" && $QUIZ3 == "Mixed") {
            $content = "Qi deficiency and phlegm-dampness constitution ";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Dry" && $QUIZ3 == "Mixed") {
            $content = "Qi and yin deficiency minus";
        } else if ($QUIZ1 == "Mixed" && $QUIZ2 == "Mixed" && $QUIZ3 == "Mixed") {
            $content = "Qi deficiency plus with phlegm-dampness minus constitution";
        }
        

        // get email template content
        $result =  DB::select('SELECT * FROM emailpages '); 
        $index = count($result) - 1;

        $phone = $result[$index]->phone;
        $mainurlname = $result[$index]->mainurlname;
        $mainurladdress = $result[$index]->mainurladdress;
        $cong = $result[$index]->cong;
        $attention = $result[$index]->attention;
        $resulttext = $result[$index]->resulttext;
        $title = $result[$index]->title;
        $clickon = $result[$index]->clickon;
        $clickonfree = $result[$index]->clickonfree;
        $clickontext = $result[$index]->clickontext;
        $download = $result[$index]->download;
        $downloadfree = $result[$index]->downloadfree;
        $downloadtext = $result[$index]->downloadtext;
        $question = $result[$index]->question;
        $these = $result[$index]->these;
        $thesefree = $result[$index]->thesefree;
        $thesetext = $result[$index]->thesetext;
        $link1text = $result[$index]->link1text;
        $link1url = $result[$index]->link1url;
        $change = $result[$index]->change;
        $having = $result[$index]->having;
        $that = $result[$index]->that;
        $three = $result[$index]->three;
        $thattext = $result[$index]->thattext;
        $link2text = $result[$index]->link2text;
        $link2url = $result[$index]->link2url;

        // send email
        Mail::to($sendmail)->send(new SendMail($content, $phone, $mainurlname, $mainurladdress, $cong, $attention, $resulttext, $title, $clickon, $clickonfree, $clickontext, $download, $downloadfree, $downloadtext, $question, $these, $thesefree, $thesetext, $link1text, $link1url, $change, $having, $that, $three, $thattext, $link2text, $link2url));
        Mail::to("support@radiantshentiquiz.com")->send(new SendMail($content, $phone, $mainurlname, $mainurladdress, $cong, $attention, $resulttext, $title, $clickon, $clickonfree, $clickontext, $download, $downloadfree, $downloadtext, $question, $these, $thesefree, $thesetext, $link1text, $link1url, $change, $having, $that, $three, $thattext, $link2text, $link2url));
        // Mail::to($sendmail)->send(new SendFreeMail($content));
        
        $result = "success";

        // save to emails table
        $Email = new Email();
        $Email->email = $sendmail;
        $Email->content = $content;
        $Email->created_at = date('Y-m-d');
        $Email->save();

        return response()->json($result);
       
    }
    
    public function show()
    {
        $sql = "SELECT * FROM questions";
        $question_list =  DB::select($sql);
        
        $resultList = array();
        for($i = 0; $i < count($question_list); $i++) {
            
            $sql = "SELECT answers.question_id, answers.answer FROM answers LEFT JOIN questions ON answers.question_id = questions.id WHERE answers.question_id = ".$question_list[$i]->id;
            $answer_list =  DB::select($sql);
            
            $question = array();
            $answer = array();
            $subtitle = array();
			$description = array();
			
            $question['question'] = $question_list[$i]->question;
			$question['ltitle'] = $question_list[$i]->logotitle;
			
			if(!empty($question_list[$i]->next_button))
                $question['answers'] = $question_list[$i]->next_button;	

			if(!empty($question_list[$i]->multi_selects))
                $question['multi_selects'] = $question_list[$i]->multi_selects;	
			
			for($j = 0; $j < count($answer_list); $j++) {
                array_push($answer, $answer_list[$j]->answer);
            }
            
            
            $sql = "SELECT sub_answers.* FROM sub_answers LEFT JOIN questions ON sub_answers.question_id = questions.id WHERE sub_answers.question_id = ".$question_list[$i]->id;
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
                $question['answers'] = $answer;	
            if(count($description) > 0) {
                $subtitle["descriptions"] = $description;
                array_push($answer, $subtitle);
            }
            
			$question['answers'] = $answer;	
		
            array_push($resultList, $question);
            
        }
        
        // print_r($resultList);
        return response()->json($resultList);
    }
    
    public function getQuestions(Question $model){

        
        $user_id = \Auth::user()->id;
        $user_permission =  DB::select('SELECT permissions.* FROM permissions    
            LEFT JOIN users ON users.ID = permissions.user_id    
            WHERE users.ID = ? ORDER BY permissions.permission_name', [$user_id]); 

        for($i = 0; $i < count($user_permission); $i++) {
            if($user_permission[$i]->permission_name == 'admin') Session::put('admin', $user_permission[$i]->permission_value);
            if($user_permission[$i]->permission_name == 'emaillist') Session::put('emaillist', $user_permission[$i]->permission_value);
            if($user_permission[$i]->permission_name == 'questions') Session::put('questions', $user_permission[$i]->permission_value); 
            if($user_permission[$i]->permission_name == 'answers') Session::put('answers', $user_permission[$i]->permission_value); 
            if($user_permission[$i]->permission_name == 'results') Session::put('results', $user_permission[$i]->permission_value); 
            if($user_permission[$i]->permission_name == 'firstpage') Session::put('firstpage', $user_permission[$i]->permission_value); 
            if($user_permission[$i]->permission_name == 'emailpage') Session::put('emailpage', $user_permission[$i]->permission_value); 
        }

        return view('questions.index', ['questions' => $model->paginate(6)]);

    }

    public function getResutls(Result $resultModel) {
        return view('results.index', ['results' => $resultModel->paginate(6)]);

    }

    public function getAnwers(Answer $model){ 

        $answers = Answer::leftJoin('questions', 'answers.question_id', '=', 'questions.id')
            ->select('answers.id', 'questions.question', 'answers.answer')
            ->orderBy('answers.id')
            ->paginate(6);

        return view('answers.index', compact('answers')); 

    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('questions.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\QuestionRequest  $request
     * @param  \App\Question  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(QuestionRequest $request, Question $model, Answer $answersss)
    {

        $answers = $request->get('answers');
        $id = $model->create($request->all());
        foreach ($answers as $key => $value) {
            # code...
            if($value != "")
                $answersss->create(['answer'=>$value,'question_id'=>$id->id]);
        }
        return redirect()->route('questions')->withStatus(__('Question successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\Question  $question
     * @return \Illuminate\View\View
     */
    public function edit(Question $question,Answer $answers)
    {
        $answerss=$answers::where('question_id',$question->id)->get();
        
        return view('questions.edit', compact('question','answerss'));
    }

    public function editAnswer($id) {

        $question = Answer::FindOrFail($id);  
        
        $answerss = Answer::where('question_id',$question->id)->get();

        return view('questions.edit', compact('question','answerss'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\QuestionRequest  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(QuestionRequest $request, Question  $question,Answer $answersss)
    {
        //var_dump($request);
        $question->update(
            ['question' => $request->get('question'),'next_button' => $request->get('next_button'),'multi_selects' => $request->get('multi_selects'),]
        );
        $answersss::where('question_id', $question->id)->delete();
        $answers=$request->get('answers');
        foreach ($answers as $key => $value) {
            # code...
            $answersss->create(['answer'=>$value,'question_id'=>$question->id]);
        }
        return redirect()->route('questions')->withStatus(__('Question successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Question  $question)
    {
        $question->delete();

        return redirect()->route('questions')->withStatus(__('Question successfully deleted.'));
    }
}