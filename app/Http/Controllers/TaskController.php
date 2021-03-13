<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleTaskMail;
use Carbon\Carbon;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        return view('task');
    }

    public function schedule(){
        $date = request('task');
        $time = request('time');
        $description = request('description');
        $email_to = auth()->user()->email;

        $task = new Task();
        $task->description = $description;
        $task->user_id = auth()->user()->id;
        $task->save();

        $res = Carbon::parse($date.' '.$time);
        
        $current = Carbon::now()->addHours(6);

        $message = 'Task scheduled at '.$date.' '.$time.' has reached deadline.';
        $details = [
            'message' => $message
        ];

        Mail::to($email_to)->later($res->diffInSeconds($current), new ScheduleTaskMail($details));

        return redirect('/home')->with('status', 'Task Added and Mail sent successfully');
    }

    public function complete($id){
        $task = Task::find($id);
        $task->status = 'completed';
        $task->save();

        return redirect('/home');
    }
}
