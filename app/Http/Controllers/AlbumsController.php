<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albums;
use Session;
class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Albums::with('photos')->get();
        return view('albums.index', ['albums'=>$albums]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
    }

    public function createPhot($album_id)
    {
        return view('albums.create', ['album_id'=>$album_id]);
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
        'name' => 'required|min:5|max:255',
        'description' => 'required|min:20|max:500',
        'cover' => 'image| max:1999'
      ]);

      // Get file name with extenstion
      $fileNameWithExt = request('cover')->getClientOriginalName();

      // Get Just the filename
      $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

      // Get extension
      $extension = request('cover')->getClientOriginalExtension();

      // Create new file name
      $filenameToStore = $fileName.'_'.time().'.'.$extension;

      // upload Image
      $path = request('cover')->storeAs('public/album_covers', $filenameToStore);

      $album = new Albums;
      $album->name = request('name');
      $album->description = request('description');
      $album->cover = $filenameToStore;
      Session::flash('success', 'Albums Created');
      $album->save();
      return redirect('albums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id){
       $album = Albums::with('Photos')->find($id);
       // $album = Albums::find($id);
       $photos = $album->photos;
       $data = array(
         'album'=>$album,
         'photos'=>$photos
       );
       return view('albums.show', $data);
     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $photo = Albums::find($id);
      $photo->delete();
      Session::flash('success', 'Photo #'.$id.'Deleted Successfully');
      return redirect('albums');
    }
}
