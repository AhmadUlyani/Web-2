<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Experience;

class PageController extends Controller
{
    public function home()
    {
        $profile = Profile::first();

        return view('home', compact('profile'));
    }

    public function profile()
    {
        $profile = Profile::first();
        $experiences = Experience::all();

        return view('profile', compact('profile', 'experiences'));
    }

    public function detailExperience($id)
    {
        $experience = Experience::findOrFail($id);

        return view('detail-experience', compact('experience'));
    }
}
