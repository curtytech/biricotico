<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\News;
use App\Models\Advertisement;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function home() {
        $users = User::where('id', '>', 2)->get();
        $events = Event::with('user')->orderByDesc('date_open')->take(9)->get();
        $news = News::with('user')->latest()->take(9)->get();
        $advertisements = Advertisement::all();

        return view('welcome', compact('users', 'events', 'news', 'advertisements'));
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        $user->load(['advertisements', 'events', 'news']);

        $template = $user->template ?: 'default';
        $template = Str::of($template)->lower()->slug('-');

        $view = "users.templates.$template";
        if (! view()->exists($view)) {
            $view = 'show';
        }

        // dump($user);
        return view($view, compact('user'));
    }
}
