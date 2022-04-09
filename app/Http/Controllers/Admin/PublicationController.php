<?php

namespace App\Http\Controllers\Admin;

use App\Models\Publication;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PublicationRequest;
use App\Http\traits\AddRemoveImageTrait;

class PublicationController extends Controller
{
    use AddRemoveImageTrait;

    private $folderPath = '/assets/images/publication/';
    //
    public function index()
    {
        # code...
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationRequest $request)
    {
        $data = $this->publicationValidateData($request);
        if(key_exists('publication_image', $data)){
            unset($data['publication_image']);
        }
        Publication::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(PublicationRequest $request, Publication $publication)
    {
        $data = $this->publicationValidateData($request);

        if($request->hasFile('publication_image')){
            if(null != $publication->image){
                $this->removeUploadImage($publication->image, public_path($this->folderPath));
            }
        }
        if(key_exists('publication_image', $data)){
            unset($data['publication_image']);
        }
        $publication->update($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $type = 'error';

        if($publication->books()->count()>0) {
            $message = 'Could not delete. Publication has '.$publication->books()->count().' number/s of book/s';
        }
        else {
            $publication->delete();
            $message = 'Publication deleted successfully';
        }

        // return redirect()->route($this->routeName)
        //     ->with($type, $message);
    }
    /**
     * @return array
     */
    private function publicationValidateData($request){
        $data = $request->validated();
        $imageName = null;
        if($request->hasFile('publication_image')) {
            $array=[
                'path'=> public_path($this->folderPath),
                'image'=>$request->file('publication_image'),
                'title'=>$data['title']
            ];
            $imageName = $this->uploadImage($array);
        }
        $data['image'] = $imageName;
        $data['title'] = Str::title($data['title']);

        return $data;
    }
}
