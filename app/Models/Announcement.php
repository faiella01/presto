<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use App\Models\AnnouncementImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    use Searchable;

    protected $fillable = ['title','price','body','category_id','user_id','is_accepted'];

    public function toSearchableArray()
    {
        $announcement= $this->announcement;

        $announcement = [
            'id'=>$this->id,
            'title'=>$this->title,
            'price'=>$this->price,
            'body'=>$this->body,
        ];

        return $announcement;
    }

    public function getCover(){

        if (count($this->images)>0) {
           return $this->images->first()->getUrl(300,150);
        }
        return "/logo/logo-wide-pc.png";
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    static public function ToBeRevisionedCount(){
        return Announcement::where('is_accepted',null)->count();
    }

    public function images(){
        return $this->hasMany(AnnouncementImage::class);
    }

    static public function ToBeRevisionedCountId($user){
        return Announcement::where('is_accepted', null)->where('user_id', $user)->count();
    }

    static public function ToBeRevisionedCountIdAcc($user){
        return Announcement::where('is_accepted', true)->where('user_id', $user)->count();
    }

    static public function ToBeRevisionedCountAcc(){
        return Announcement::where('is_accepted',true)->count();
    }

}
