<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Mail\MailContact;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\CustomRequestMail;

class HomeController extends Controller
{
    public function home() {
        $announcements = Announcement::where('is_accepted',true)
            ->orderBy('ID', 'DESC')
            ->limit(5)
            ->get();

        $categories=Category::orderBy('announcement_count', 'DESC')->limit(4)->get();
        // dd($categories);
        return view('welcome', compact(['announcements','categories']));
    }

    public function aboutus() {

        return view('about-us');
    }

    public function send(Request $request){

        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');

        $informazioni= compact('name', 'email', 'message');

        Mail::to('bradipifoundation@bradipi.com')->send(new MailContact($informazioni));

        return redirect()->back()->with('message','Grazie per il tuo messaggio');
    }

    public function search(Request $req) {

        $q=$req->input('q');

        $announcements = Announcement::search($q)->where('is_accepted', true)->orderby('ID', 'DESC')->get();

        return view('search_results', compact(['q','announcements']));
    }

    public function category(Category $category) {
        
        $announcements = $category->announcements()
        ->where('is_accepted',true)
        ->orderby('ID', 'DESC')
        ->paginate(6);
        return view('announcement.category', compact(['announcements', 'category']));
    }

    public function locale($locale){
        session()->put('locale', $locale);
        return redirect()->back();

    }
}
