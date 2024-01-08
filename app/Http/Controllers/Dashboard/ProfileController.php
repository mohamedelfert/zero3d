<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;

class ProfileController extends Controller
{
    public function edit()
    {
        $title = trans('main.edit_profile');
        $user = Auth::user();
        $countries = Countries::getNames();
        $languages = Languages::getNames();
        return view('dashboard.users.profile', compact('title', 'user', 'countries', 'languages'));
    }

    public function update(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'birthday' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'country' => 'required|string|size:2',
        ]);

        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $user = $request->user();

        $user->profile->fill($request->all())->save();

        toastr()->warning(trans('main.data_updated_successfully'));
        return redirect()->back();
    }
}
