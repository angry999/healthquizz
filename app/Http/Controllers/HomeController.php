<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\Http\Resources\Article as ArticleResource;
use DB;
use Session;
use App\Firstpage;
use App\Email;
use App\Emailpage; 

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Excel;
use App\Http\Controllers\ExportPdfController;

class HomeController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result =  DB::select('SELECT * FROM firstpages '); 
        $index = count($result) - 1;
        $top_title = $result[$index]->top_title;

        $top_title_body = $result[$index]->top_title_body;
        $top_text1 = $result[$index]->top_text1;
        $top_text2 = $result[$index]->top_text2;
        $top_text3 = $result[$index]->top_text3;
        $top_image = $result[$index]->top_image;
        $bottom_title = $result[$index]->bottom_title;
        $bottom_text1 = $result[$index]->bottom_text1;
        $bottom_text2 = $result[$index]->bottom_text2;
        $bottom_text3 = $result[$index]->bottom_text3;
        $bottom_image = $result[$index]->bottom_image;
        $contact_us = $result[$index]->contact_us; 

        return view('/home', compact('top_title', 'top_title_body', 'top_text2', 'top_text1', 'top_text3', 'top_image', 'bottom_title', 'bottom_text1', 'bottom_text2', 'bottom_text3', 'bottom_image', 'contact_us'));
    }

    public function firstpage()
    {
        $result =  DB::select('SELECT * FROM firstpages '); 
        $index = count($result) - 1;

        $top_title = $result[$index]->top_title;

        $top_title_body = $result[$index]->top_title_body;
        $top_text1 = $result[$index]->top_text1;
        $top_text2 = $result[$index]->top_text2;
        $top_text3 = $result[$index]->top_text3;
        $top_image = $result[$index]->top_image;
        $bottom_title = $result[$index]->bottom_title;
        $bottom_text1 = $result[$index]->bottom_text1;
        $bottom_text2 = $result[$index]->bottom_text2;
        $bottom_text3 = $result[$index]->bottom_text3;
        $bottom_image = $result[$index]->bottom_image;
        $contact_us = $result[$index]->contact_us; 

        return view('pages.firstpage', compact('top_title', 'top_title_body', 'top_text2', 'top_text1', 'top_text3', 'top_image', 'bottom_title', 'bottom_text1', 'bottom_text2', 'bottom_text3', 'bottom_image', 'contact_us'));
        // return view('pages.firstpage');
    }

    public function emailpage()
    {
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

        return view('pages.emailpage',compact('phone', 'mainurlname', 'mainurladdress', 'cong', 'attention', 'resulttext', 'title', 'clickon', 'clickonfree', 'clickontext', 'download', 'downloadfree', 'downloadtext', 'question', 'these', 'thesefree', 'thesetext', 'link1text', 'link1url', 'change', 'having', 'that', 'three', 'thattext', 'link2text', 'link2url'));
    } 

    public function getEmaillist(Email $emailModel) {

        // $emaillist =  DB::table('emails')->select('email','created_at')->groupBy('email')->paginate(10);
        // return view('emails.list', compact('emaillist'));

        return view('emails.list', ['emaillist' => $emailModel->paginate(10)]);
    }

    public function deleteEmail(Email $email) {
        $email->delete();
        return redirect()->route('emaillist')->withStatus(__('Email successfully deleted.'));
    }

    public function exportemail() {
        $file_name = "EmailList(".date('Y-m-d').").csv";
        return Excel::download(new ExportPdfController(), $file_name);
    }

    public function updatefirstpage(Request $request)
    {
        $covertop_image = $request->file('top_image');

        $topimage = request('top_image_o');
        if ( $covertop_image != null ) { 
            $extension = $covertop_image->getClientOriginalExtension();                
            $topimage = $covertop_image->getClientOriginalName();
            
            // echo $covertop_image->getFilename();
            // echo $covertop_image->getClientOriginalName();
            // exit;

            Storage::disk('public')->put($topimage,  File::get($covertop_image)); 
        }

        $coverbottom_image = $request->file('bottom_image');
        $bottomimage = request('bottom_image_o');
        if ( $coverbottom_image != null ) { 
            $extension = $coverbottom_image->getClientOriginalExtension();                
            $bottomimage = $coverbottom_image->getClientOriginalName();
            Storage::disk('public')->put($bottomimage,  File::get($coverbottom_image)); 
        }

        $Firstpage = new Firstpage();
        $Firstpage->top_title = request('top_title'); 
        $Firstpage->top_title_body = request('top_title_body'); 
        $Firstpage->top_text1 = request('top_text1'); 
        $Firstpage->top_text2 = request('top_text2'); 
        $Firstpage->top_text3 = request('top_text3'); 
        $Firstpage->top_image = $topimage; 
        $Firstpage->bottom_title = request('bottom_title'); 
        $Firstpage->bottom_text1 = request('bottom_text1'); 
        $Firstpage->bottom_text2 = request('bottom_text2'); 
        $Firstpage->bottom_text3 = request('bottom_text3'); 
        $Firstpage->bottom_image = $bottomimage; 
        $Firstpage->contact_us = request('contact_us'); 

        $Firstpage->save();    
        return redirect()->route('firstpage')->withStatus(__('Firstpage content successfully modified.'));    
    }

    public function updateemailpage(Request $request)
    {
        $Emailpage = new Emailpage();

        $Emailpage->phone = request('phone');
        $Emailpage->mainurlname = request('mainurlname');
        $Emailpage->mainurladdress = request('mainurladdress');
        $Emailpage->cong = request('cong');
        $Emailpage->attention = request('attention');
        $Emailpage->resulttext = request('resulttext');
        $Emailpage->title = request('title');
        $Emailpage->clickon = request('clickon');
        $Emailpage->clickonfree = request('clickonfree');
        $Emailpage->clickontext = request('clickontext');
        $Emailpage->download = request('download');
        $Emailpage->downloadfree = request('downloadfree');
        $Emailpage->downloadtext = request('downloadtext');
        $Emailpage->question = request('question');
        $Emailpage->these = request('these');
        $Emailpage->thesefree = request('thesefree');
        $Emailpage->thesetext = request('thesetext');
        $Emailpage->link1text = request('link1text');
        $Emailpage->link1url = request('link1url');
        $Emailpage->change = request('change');
        $Emailpage->having = request('having');
        $Emailpage->that = request('that');
        $Emailpage->three = request('three');
        $Emailpage->thattext = request('thattext');
        $Emailpage->link2text = request('link2text');
        $Emailpage->link2url = request('link2url');

        $Emailpage->save();

        return redirect()->route('emailpage')->withStatus(__('Emailpage content successfully modified.'));  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
