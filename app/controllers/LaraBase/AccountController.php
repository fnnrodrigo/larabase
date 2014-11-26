<?php

class AccountController extends \BaseController {

    //  Show Account Settings

    public function settings()
    {
        $user = Auth::user();
        $security_settings = [];
        $personal_settings = [$user->timezone, 'Value', 'Value', 'Value', 'Value'];
        return View::make('user.settings', compact('user', 'security_settings', 'personal_settings'));
    }


    public function settingsEdit()
    {
        $user = Auth::user();
        // Use a helper function to get list of timezones
        $timezones = getTimezones();
        return View::make('user.settings-edit', compact('user', 'timezones'));
    }


    public function settingsSave()
    {
        $user = Auth::user();
        $data = Input::all();
        $user->timezone = Input::get('timezone');
        $user->save();
        return Redirect::to('settings/edit')->withSuccess(Lang::get('larabase.settings_saved'));
    }


    //  Show User Dashboard

    public function dashboard()
    {
        $user = Auth::user();
        $users = DB::table('users')->count();
        $user_posts = $user->posts->count();
        $posts = Post::all()->count();
        $feedback = Feedback::all()->count();
        return View::make('user.dashboard', compact('user','posts','users','user_posts', 'feedback'));
    }

    // Show Public Profile of user

    public function profilePublic($username)
    {
        $user = User::whereUsername($username)->firstOrFail();
        $posts = $user->posts()->get(['id', 'title']);
        return View::make('user.profile-public', compact('user', 'posts'));
    }


    //  Show Account Profile of User

    public function profile()
    {
        $user = Auth::user();
        return View::make('user.profile', compact('user'));

    }


    // Edit User Profile

    public function profileEdit()
    {
        $user = Auth::user();
        return View::make('user.profile-edit', compact('user'));
    }


    // Save Changes to User Profile

    public function profileSave()
    {
        $user = Auth::user();
        $data = Input::all();
        $validator = User::validate_profile($data, $user);
        if ($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $user->update($data);
        return Redirect::to('profile')->withSuccess(Lang::get('larabase.profile_updated'));
    }


    // Change Account Password

    public function passwordChange()
    {
        return View::make('user.password-change');
    }


    // Save new Password

    public function passwordSave()
    {
        $data = Input::all();
        $validator = User::validate_change_password($data);
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $user = Auth::user();
            $current_password = $data['current_password'];
            $new_password = $data['new_password'];
            if(Hash::check($current_password, $user->getAuthPassword()))
            {
                if ($current_password == $new_password) {
                    return Redirect::back()->withWarning(Lang::get('larabase.unique_password_required'));
                }
                $user->password = Hash::make($new_password);
                $user->save();
                return Redirect::to('profile')->withSuccess(Lang::get('larabase.profile_changed'));
            }
            return Redirect::back()->withError(Lang::get('larabase.password_incorrect'));
        }
    }


    public function deleteAccount()
    {
        $user = Auth::user();
        Post::whereUserId($user->id)->delete();
        Auth::logout();
        if($user->delete())
        return Redirect::to('login')->withInfo(Lang::get('larabase.account_deleted'));
    }

}