<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Language;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Message;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Helper to get settings as a key-value array
     */
    private function getSettings()
    {
        return Setting::pluck('value', 'key')->toArray();
    }

    public function index()
    {
        $settings = $this->getSettings();
        $recentProjects = Project::latest()->take(3)->get();
        $skills = Skill::all();
        return view('personal.index', compact('settings', 'recentProjects', 'skills'));
    }

    public function contact()
    {
        $settings = $this->getSettings();
        return view('personal.contact', compact('settings'));
    }

    /**
     * Handle contact form submission
     */
    public function storeMessage(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function projects()
    {
        $settings = $this->getSettings();
        $projects = Project::latest()->get();
        return view('personal.projects', compact('settings', 'projects'));
    }

    public function resume()
    {
        $settings = $this->getSettings();
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $educations = Education::orderBy('start_date', 'desc')->get();
        $skills = Skill::all();
        $languages = Language::all();
        return view('personal.resume', compact('settings', 'experiences', 'educations', 'skills', 'languages'));
    }
}
