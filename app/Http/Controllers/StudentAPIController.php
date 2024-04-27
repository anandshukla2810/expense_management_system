<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\Level;
use App\Models\StudentScore;
use App\Models\StudentLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class StudentAPIController extends Controller
{
    public function user($user_id)
    {
        $data = User::where('id', $user_id)->first();
        $message = 'Success';
        $status = 1;
        return response()->json(compact('data', 'message', 'status'));
    }

    public function levels()
    {
        $data = Level::where('status', 1)->with('list', 'list.list_items', 'activity_instance')->get();
        $message = 'Success';
        $status = 1;
        return response()->json(compact('data', 'message', 'status'));
    }

    public function level($level_id)
    {
        $data = Level::where('id', $level_id)->with('list', 'list.list_items', 'activity_instance')->first();
        $message = 'Success';
        $status = 1;
        return response()->json(compact('data', 'message', 'status'));
    }

    public function user_top_scores($user_id)
    {
        $data = StudentScore::where('user_id', $user_id)->orderBy('score', 'desc')->take(1)->get();

        if(count($data)){
            $message = 'Success';
            $status = 1;    
        }
        else{
            $message = 'Data not found';
            $status = 0;
        }
        return response()->json(compact('data', 'message', 'status'));
    }

    public function user_top_scores_current_month($user_id)
    {
        $data = StudentScore::where('user_id', $user_id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->orderBy('score', 'desc')->take(20)->get();

        if(count($data)){
            $message = 'Success';
            $status = 1;
        }
        else{
            $message = 'Data not found';
            $status = 0;
        }
        return response()->json(compact('data', 'message', 'status'));
    }

    public function user_top_scores_current_and_previous_month($user_id)
    {
        $current_month = StudentScore::where('user_id', $user_id)->whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->orderBy('score', 'desc')->take(20)->get();
        $previous_month = StudentScore::where('user_id', $user_id)->whereMonth('created_at', date('m', strtotime('last month')))->whereYear('created_at', date('Y', strtotime('last month')))->orderBy('score', 'desc')->take(20)->get();

        $data = compact('current_month', 'previous_month');

        if(count($data)){
            $message = 'Success';
            $status = 1;
        }
        else{
            $message = 'Data not found';
            $status = 0;
        }
        return response()->json(compact('data', 'message', 'status'));
    }

    public function start_level(Request $request)
    {
        $data = StudentScore::create([
            'level_id' => $request->level_id,
            'user_id' => $request->user_id,
            'score' => 0,
            'status' => 0
        ]);
        
        $message = 'Success';
        $status = 1;
        
        return response()->json(compact('data', 'message', 'status'));
    }

    public function send_score(Request $request)
    {
        StudentScore::where('id', $request->score_id)->update([
                            'status' => 1,
                            'score' => $request->score
                        ]);

        $user_id = StudentScore::where('id', $request->score_id)->value('user_id');

        $highest_score = StudentScore::where('user_id', $user_id)->max('score');
        
        $count_student_level = StudentLevel::where('user_id', $user_id)->count();
        if($count_student_level > 0)
        {
            StudentLevel::where('user_id', $user_id)->update([
                'highest_score' => $highest_score,
            ]);
        }
        else
        {
            StudentLevel::create([
                'user_id' => $user_id,
                'score' => $highest_score,
                'status' => 1,
            ]);
        }
        
        

        $data = [];
        $message = 'Success';
        $status = 1;
        
        return response()->json(compact('data', 'message', 'status'));
    }
}