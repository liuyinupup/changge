<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PharData;
use App\Handlers\ImageUploadHandler;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = photo::orderBy('created_at', 'desc')->get();

        return view('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageUploadHandler $uploader, Photo $photo)
    {

        $this->validate($request, [
            'title' => 'required',
            'src' => 'required',
        ]);
        $data = $request->all();
        if ($request->src) {
            $result = $uploader->save($request->src, 'photos', 'c');
            if ($result) {
                $data['src'] = $result['path'];
            }
        }

        Photo::create($data);


        session()->flash('success', '图片添加成功');
        return redirect()->route('photos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        return view('photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        return view('photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageUploadHandler $uploader, Photo $photo)
    {

        $data = $request->all();

        if ($request->src) {
            $result = $uploader->save($request->src, 'photos', $photo->id);
            if ($result) {
                $data['src'] = $result['path'];
            }
        }
        $photo->update($data);
        return redirect()->route('photos.show', $photo->id)->with('success', '图片更新成功！');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->route('photos.index');
    }
}
