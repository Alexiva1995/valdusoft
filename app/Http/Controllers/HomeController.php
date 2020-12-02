<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Ally;
use App\Models\Contact;
use App\Models\Tag;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageReceived;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function landing()
    {
        $tags = Tag::all();
        $projects_all = Project::orderByRaw('RAND()')->take(8)->get();
        $projects = Project::with('tag')->get();
        $allies = Ally::with('projects')->take(7)->get();
        return view('landing.index', compact('projects','projects_all','allies', 'tags'));
    }
    public function contactUs(Request $request)
    {
       // return $request->all();
        $msg = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:7',
            'phone' => 'required|min:13',
            'message' => 'required|min:26',

        ]);
        Contact::create($request->all());

      Mail::to('crisleivysngil@gmail.com')->queue(new MessageReceived($msg));
      // Mail::to('alexisjoseva95@gmail.com')->queue(new MessageReceived($msg));
      return back()->with('success', 'Su mensaje se ha enviado ¡Gracias por contactarnos!');
    }

}
