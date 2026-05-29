<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Setting;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        $settings = Setting::getSettings();

        $filtre = $request->query('filtre', 'all');

        $query = Project::actifs();

        if ($filtre !== 'all') {
            $query->where('filtre', $filtre);
        }

        $projects = $query->paginate(4)->withQueryString();

        return view('projects', compact(
            'settings',
            'projects',
            'filtre'
        ));
    }
}