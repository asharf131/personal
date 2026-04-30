<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'experiences' => Experience::count(),
            'educations' => Education::count(),
            'skills' => Skill::count(),
            'projects' => Project::count(),
            'messages' => Message::count(),
        ];

        $recentMessages = Message::latest()->take(5)->get();

        return view('dashboard', compact('stats', 'recentMessages'));
    }
}
