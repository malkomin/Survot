<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;


class PostController extends Controller
{
    public function getDashboard()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('dashboard', ['posts' => $posts]);
    }

    public function postCreateVote(Request $request)
    {
        $this->validate($request, [
            'body' => 'required|max:1000',
            'option_1' => 'required',
            'option_2' => 'required'
        ]);
        $post = new Post();
        $post->body = $request['body'];
        if($request['option_1'] != null) $post->option_1 = $request['option_1'];
        if($request['option_2'] != null) $post->option_2 = $request['option_2'];
        if($request['option_3'] != null) $post->option_3 = $request['option_3'];
        if($request['option_4'] != null) $post->option_4 = $request['option_4'];
        if($request['option_5'] != null) $post->option_5 = $request['option_5'];
        $message = 'There was an error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post successfully created!';
        }
        return redirect()->route('dashboard')->with(['message' => $message]);
    }

    public function getDeletePost($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully deleted!']);
    }

    public function postEditPost(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        $post = Post::find($request['postId']);
        if (Auth::user() != $post->user) {
            return redirect()->back();
        }
        $post->body = $request['body'];
        $post->update();
        return response()->json(['new_body' => $post->body], 200);
    }

    public function postVotePost(Request $request)
    {
        $post_id = $request['postId'];
        $vote = $request['vote'];
        $post = Post::find($post_id);
        if (!$post) {
            return null;
        }
        $user = Auth::user();
        $voteObj = $user->votes()->where('post_id', $post_id)->first();
        if ($voteObj) {
            $update = true;
            if($vote == $voteObj->vote)
            {
                $voteObj->delete();
                $voteObj->vote = $vote;
                $voteObj->save();
                return null;
            }
        } else {
            $voteObj = new Vote();
            $user->points += 1;
            $user->save();
        }
        $voteObj->vote = $vote;
        $voteObj->user_id = $user->id;
        $voteObj->post_id = $post->id;
        $voteObj->save();
        return null;
    }

    public function getLeaderboard()
    {
        $users = User::all();
        return view('leaderboard' , ['users' => $users]);
    }
}
