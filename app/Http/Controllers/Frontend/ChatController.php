<?php
namespace App\Http\Controllers\Frontend;

use App\Events\ClientChatEvent;
use App\Http\Controllers\Controller;
use App\Model\Chat;
use App\Model\JobPost;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function show(JobPost $project,$receiver)
    {
        $receiver = User::findOrFail($receiver);
       return view('messages.chatbox', compact('project','receiver'));
    }
    public function clientData(JobPost $project,$receiver)
    {
        if(Auth::user()->id == $project->user_id)
        {
            return response()->json(
                Chat::where('job_post_id', $project->id)
                ->where('reciver_id',$receiver)
                ->orWhere('reciver_id',$project->user_id)
                ->get()
            );
        }
       return;
    }

    public function freelancerView(JobPost $project)
    {
       return view('messages.freelencerChatbox', compact('project'));
    }
    public function freelancerData(Jobpost $project)
    {
        return response()->json(
            Chat::where('job_post_id',$project->id)
            ->where('user_id',Auth::user()->id)
            ->orWhere('reciver_id',Auth::user()->id)
            ->get()
        );
    }

    protected function brodcastAndStore(Request $request, JobPost $project, $receiver)
    {
    	$user = $project->jobpostclient;
    	if($request->user()->id != $user->id)
    		return 'not you';

    	$this->store($user, $project->id, $receiver, $request->message);
        event(new ClientChatEvent(User::find($receiver),$user, $project->id, $request->message));
    }

    public function freelancerBrodcastMessage(Request $request,JobPost $project)
    {
        $user = Auth::user();
        $user->senderChat()->create([
            'job_post_id' => $project->id,
            'reciver_id' => $project->user_id,
            'message' => $request->message,
            ]);
        event(new ClientChatEvent($project->jobpostclient, $user, $project->id, $request->message));
    }

    public function store($user, $project,$receiver,$message)
    {
    	return $user->senderChat()->create([
    		'job_post_id' => $project,
    		'reciver_id' => $receiver,
    		'message' => $message,
    		]);
    }

    public function chat()
    {
        event(new ClientChatEvent(Auth::user(),4, 'hello'));
    }
}
