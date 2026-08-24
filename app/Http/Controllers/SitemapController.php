<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $events = Event::where('is_published', true)->latest()->get();

        $content = view('sitemap', compact('events'))->render();

        return response($content, 200)
            ->header('Content-Type', 'text/xml; charset=utf-8');
    }
}
