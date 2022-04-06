<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function home(){

        $announcements = Announcement::where('is_accepted',null)
            ->orderby ('created_at','ASC')
            ->get();
        return view('revisor.home',compact('announcements'));

    }

    public function detail($id){

        $announcement= Announcement::find($id);
        return view('revisor.detail',compact('announcement'));
    }

    private function setAccepted($announcement_id, $value){

        $announcement = Announcement::find($announcement_id);
        $announcement ->is_accepted = $value;
        $announcement ->save();
        return redirect(route('revisor.home'));
    }

    public function accept ($announcement_id){

        $announcement=Announcement::find($announcement_id);
        $category = Category::find($announcement->category->id);
        $category->increment('announcement_count',1);

        return $this->setAccepted($announcement_id, true);
    }
    
    public function reject ($announcement_id){

        return $this->setAccepted($announcement_id, false);
    }

}
