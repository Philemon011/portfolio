<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Project;
use App\Models\Testimonial;
use App\Models\Setting;
use App\Models\Tool;

class HomeController extends Controller
{
    public function index()
    {
        $settings     = Setting::getSettings();
        $services     = Service::actifs()->get();
        $projects     = Project::actifs()->get();
        $testimonials = Testimonial::actifs()->get();
        $tools        = Tool::actifs()->get();

        return view('home', compact(
            'settings',
            'services',
            'projects',
            'testimonials',
            'tools'
        ));
    }
}