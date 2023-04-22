<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request ,User $user): RedirectResponse
    {

       $data=$request->validate([
           'avatar'=>['nullable','image','max:255'],
           'name'=>['required','string','max:255'],
           'email'=>['required','email',Rule::unique('users')->ignore(\auth()->user()->id)],

       ]);
       if($request->hasFile('avatar')){
           $file=$request->file('avatar');
           $ext=$file->getClientOriginalExtension();
           $filename=\auth()->user()->id.'_'.time().'.'.$ext;
           $file->storeAs('images/avatar',$filename,'public_files');
           $data['avatar']=$filename;
       }else unset($data['avatar']);

       if (isset($request->old_password)){
           if (Hash::check($request->old_password,\auth()->user()->password)){
               $data=$request->validate([
                   'password'=>'required|string|confirmed'
               ]);
               $data['password']=Hash::make($request->password);
               session()->flash('status','رمز عبور تغیر کرد');
           }else{ unset($data['password']);
               session()->flash('status','رمز اشتباه');
           }
       }
       \auth()->user()->update(
           $data
       );

       return back();

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
