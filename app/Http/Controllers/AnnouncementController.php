<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Http\Requests\CustomRequest;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $uniqueSecret = $request->old(
            'uniqueSecret',
            base_convert(sha1(uniqid(mt_rand())), 16, 36)
        );
        
        
        return view('announcement/create', compact('uniqueSecret'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomRequest $req)
    {
        $announcement=Announcement::create([

            'title'=>$req->input('title'),
            'price'=>$req->input('price'),
            'body'=>$req->input('body'),
            'category_id'=>$req->input('category'),
            'user_id'=>Auth::user()->id,
            'is_accepted' =>null
        ]);

        $uniqueSecret = $req->input('uniqueSecret');
        // dd($uniqueSecret);

        $images = session()->get("images.{$uniqueSecret}",[]);
        $removedImages= session()->get("removedImages.{$uniqueSecret}",[]);

        $images = array_diff($images, $removedImages);


        foreach ($images as $image){
            $i= new AnnouncementImage();

            $fileName=basename($image);
            $newFileName="public/announcements/{$announcement->id}/{$fileName}";

            Storage::move($image,$newFileName);


            $i->file = $newFileName;
            $i->announcement_id=$announcement->id;

            $i->save();

            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file, 300,200),
                new ResizeImage($i->file, 600,400),
                new ResizeImage($i->file, 120,120),
                new ResizeImage($i->file, 350,230)
            ])->dispatch($i->id);  
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect()->route('home')->with('message', 'Annuncio inserito');

    }

    public function uploadImage(Request $req){

        $uniqueSecret = $req->input('uniqueSecret');
        $fileName = $req->file('file')->store("public/temp/{$uniqueSecret}");
        session()->push("images.{$uniqueSecret}", $fileName);

        dispatch(new ResizeImage(

            $fileName,
            120,
            120

        ));

        return response()->json(
            [
                'id' =>$fileName
            ]
        );
    }


    public function removeImage(Request $req){

        $uniqueSecret = $req->input('uniqueSecret');
        $fileName=$req->input('id');

        session()->push("removedImages.{$uniqueSecret}", $fileName);
        Storage::delete($fileName);
        return response()->json('ok');
    }


    public function getImages(Request $req){

        $uniqueSecret = $req->input('uniqueSecret');
        // dd($uniqueSecret);

        $images = session()->get("images.{$uniqueSecret}",[]);
        $removedImages= session()->get("removedImages.{$uniqueSecret}",[]);

        $images = array_diff($images, $removedImages);

        $data=[];

        foreach($images as $image){
            $data[]=[
                'id' => $image,
                'src'=> AnnouncementImage::getUrlByFilePath($image, 120, 120)
            ];
        }

        return response()->json($data);

    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $ogg= Announcement::find($id);
        $relatedAnnouncement=Announcement::where('category_id',$ogg->category->id)
        ->where('is_accepted',true)
        ->orderby('ID', 'DESC')
        ->limit(6)
        ->get()
        ->filter(function($announcement)use($ogg){
            return $announcement->id != $ogg->id;  
           });
     
        return view('announcement.detail', compact(['ogg','relatedAnnouncement']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement, $id, Request $request)
    {
        $uniqueSecret = $request->old(
            'uniqueSecret',
            base_convert(sha1(uniqid(mt_rand())), 16, 36)
        );
        $category=Category::all();
        $announcements=Announcement::all();
        $announcement=Announcement::find($id);
        return view('auth.edit',compact('announcement','announcements','category','uniqueSecret'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $announcement=Announcement::find($id);

        $category=Category::find($announcement->category_id);
        $category->decrement('announcement_count', 1);
        $category->save();

        $announcement->update([
            'title'=>$req->input('title'),
            'price'=>$req->input('price'),
            'body'=>$req->input('body'),
            'category_id'=>$req->input('category'),
            'is_accepted'=>null,
        ]);

        $uniqueSecret = $req->input('uniqueSecret');

        $images = session()->get("images.{$uniqueSecret}",[]);
        $removedImages= session()->get("removedImages.{$uniqueSecret}",[]);

        $images = array_diff($images, $removedImages);


        foreach ($images as $image){
            $i= new AnnouncementImage();

            $fileName=basename($image);
            $newFileName="public/announcements/{$announcement->id}/{$fileName}";
            Storage::move($image,$newFileName);

            $i->file = $newFileName;
            $i->announcement_id=$announcement->id;

            $i->save();

            GoogleVisionSafeSearchImage::withChain([
                new GoogleVisionLabelImage($i->id),
                new GoogleVisionRemoveFaces($i->id),
                new ResizeImage($i->file, 300,200),
                new ResizeImage($i->file, 600,400),
                new ResizeImage($i->file, 120,120),
                new ResizeImage($i->file, 350,230)
            ])->dispatch($i->id);
        }

        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect(route("home"))->with('message', 'Annuncio modificato');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function delete(Announcement $announcement, $id)
    {
        $announcement=Announcement::find($id);
        $announcement->delete();
        $category=$announcement->category;
        $category->announcement_count--;
        $category->save();

        return redirect()->back();
    }

    public function autore(User $autore){
/*         $announcements= Announcement::all(); */
        $announcements=$autore->announcements->where('is_accepted', true);
        return view('auth.autore',compact('announcements'));
    }
    
    public function deleteImage($id){

        $image=AnnouncementImage::find($id);
        $image->deleteImage();
        return redirect()->route('announcement.edit', $image->announcement->id);
    
    }
}
