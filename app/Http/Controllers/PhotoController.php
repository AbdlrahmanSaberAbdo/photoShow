<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use Session;
class PhotoController extends Controller
{
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */

   public function create($album_id){
     return view('photos.create', ['album_id'=>$album_id]);
   }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate($request, [
      'title' => 'required|min:5|max:255',
      'description_photo' => 'required|min:20|max:500',
      'photo' => 'image| max:1999'
    ]);

    // Get file name with extenstion
    $fileNameWithExt = request('photo')->getClientOriginalName();

    // Get Just the filename
    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

    // Get extension
    $extension = request('photo')->getClientOriginalExtension();

    // Create new file name
    $filenameToStore = $fileName.'_'.time().'.'.$extension;

    // upload Image
    $path = request('photo')->storeAs('public/photos/'.request('album_id'), $filenameToStore);

    $photo = new Photo;
    // title
    $photo->title = request('title');

    // description
    $photo->description = request('description_photo');

    // file name to store
    $photo->photo = $filenameToStore;

    // size photo
    $photo->size  = request('photo')->getSize();

    // albumns_id
    $photo->albums_id = request('album_id');
    // Session::flash('success', 'Photo Created');
    $photo->save();
    return redirect("albums/".request('album_id'))->with('success', 'photo created');
  }

  public function show($id, $album_id) {
    $photo = Photo::find($id);
    $album_id = $album_id;
    $data = array(
      'photo'    => $photo,
      'album_id' => $album_id
    );
    return view('photos.show', $data);
  }

  public function delete($id, $album_id) {
    $photo = Photo::find($id);
    $photo->delete();
    Session::flash('success', 'Photo #'.$id.'Deleted Successfully');
    return redirect('albums/'.$album_id);
  }
}
