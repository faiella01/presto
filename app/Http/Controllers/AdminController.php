<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::all();
        return view('admin.panel', compact('users'));
    }
    public function deleteUser ($user_id){
        $user = User::find($user_id);
        $user->delete();
        return redirect()->route('admin.panel');
    }

    public function setRevisorStatus($user_id, $value){
        $user = User::find($user_id);
        $user->is_revisor = $value;
        $user->save();
        return redirect()->route('admin.panel');
    }

    public function addRevisor($user_id){
        return $this->setRevisorStatus($user_id, true);
    }

    public function deleteRevisor($user_id){
        return $this->setRevisorStatus($user_id, false);
    }

    public function autore(){
        $announcements=Announcement::all()->where('is_accepted', true);
        return view('admin.autore',compact('announcements'));
    }

    public function edit(Announcement $announcement, $id)
    {
        $category=Category::all();
        $announcement=Announcement::find($id);
        return view('admin.edit',compact('announcement','category'));
    }

    public function show($id){

        $ogg= Announcement::find($id);
        return view('admin.detail', compact('ogg'));
    }


    public function delete(Announcement $announcement, $id)
    {
        $announcement=Announcement::find($id);
        $announcement->delete();

        return redirect()->back();
    }

}
