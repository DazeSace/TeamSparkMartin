<?php


namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Project;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('profiles.index', compact('users'));
    }


    public function show(User $user)
    {
        return view('profiles.show', compact('user'));
    }


    public function edit()
    {
        $tags = \App\Tag::all();
        $skills = \App\Skill::all();
        $user = Auth::user();
        return view('profiles.edit', compact(['user', 'tags', 'skills']));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        $user->fill($request->all());
        $user->showMail = $request->showMail;
        if(request('avatar') == '1' ){
            $user->avatar = "/uploads/user/profil1.png";
        }
        if(request('avatar') == '2' ){
            $user->avatar = "/uploads/user/profil2.png";
        }
        if(request('avatar') == '3' ){
            $user->avatar = "/uploads/user/profil3.png";
        }
        if(request('avatar') == '4' ){
            $user->avatar = "/uploads/user/profil4.png";
        }
        if(request('avatar') == '5' ){
            $user->avatar = "/uploads/user/profil5.png";
        }
        if(request('avatar') == '6' ){
            $user->avatar = "/uploads/user/profil6.png";
        }
        if(request('avatar') == '7' ){
            $user->avatar = "/uploads/user/profil7.png";
        }
        if(request('avatar') == '8' ){
            $user->avatar = "/uploads/user/profil8.png";
        }
        if(request('avatar') == '9' ){
            $user->avatar = "/uploads/user/profil9.png";
        }
        if(request('avatar') == '10' ){
            $user->avatar = "/uploads/user/profil10.png";
        }
        if(request('avatar') == '11' ){
            $user->avatar = "/uploads/user/profil11.png";
        }
        if(request('avatar') == '12' ){
            $user->avatar = "/uploads/user/profil12.png";
        }
        if(request('avatar') == '13' ){
            $user->avatar = "/uploads/user/profil13.png";
        }
        if(request('avatar') == '14' ){
            $user->avatar = "/uploads/user/profil14.png";
        }
        if(request('avatar') == '15' ){
            $user->avatar = "/uploads/user/profil15.png";
        }
        $user->tags()->sync(request('tags'));
        $user->skills()->sync(request('skills'));
        $user->save();
        return redirect(route('profiles.show', $user->username));
        //return $input = $request;
    }

    public function updateAvatar(AvatarRequest $request)
    {
        $image = User::uploadImage(request('avatar'), 'public/uploads/avatar');
        $user = Auth::user();
        $user->deleteImage();
        $user->avatar = $image;
        $user->save();
        return redirect(route('profiles.edit', $user->username));
    }

    public function destroy(User $user)
    {
        $user->delete();
    }

    public function invite(User $user, Project $project)
    {
        if (!$project->users()->where('role', 'creator')->firstOrFail()->is(Auth::user())) {
            abort(403, 'Unauthorized action.');
        }
        $user->invite($project);
        return redirect(route('profiles.show', $user->username));
    }
}
