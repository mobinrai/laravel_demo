<?php

namespace App\Http\Controllers\Admin;

use App\Models\Publication;
use App\Models\Country;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PublicationRequest;
use App\Http\traits\AddRemoveImageTrait;

class PublicationController extends Controller
{
    use AddRemoveImageTrait;

    private $folderPath = '/assets/images/publications/';

    private $routeName = 'admin.publications.index';
    //
    public function index()
    {
        $publications = Publication::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.publications.index', compact('publications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publication = new Publication;
        $countries = Country::all();
        return view('admin.publications.create',compact('publication', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicationRequest $request)
    {
        $data = $this->publicationValidateData($request, null);       
        Publication::create($data);
        return redirect(route($this->routeName))->with('success', 'Publication added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        return view('admin.publications.show',compact('publication'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        $countries = Country::all();
        return view('admin.publications.edit',compact('publication', 'countries'));
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
        if($request->hasFile('image')){
            if(null != $publication->image){
                $this->removeUploadImage($publication->image, public_path($this->folderPath));
            }
        }
        $data = $this->publicationValidateData($request, $publication->image);
        $publication->update($data);
        return redirect(route($this->routeName))->with('success', 'Publication updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        $type = 'success';

        if($publication->books()->count()>0) {
            $type = 'error';
            $message = 'Could not delete. Publication has '.$publication->books()->count().' number/s of book/s';
        }
        else {
            $publication->delete();
            $message = 'Publication deleted successfully';
        }

        return redirect()->route($this->routeName)->with($type, $message);
    }
    /**
     * @return array
     */
    private function publicationValidateData($request, $image=null){
        $data = $request->validated();
        $imageName = null;
        if($image!=null){
            $imageName = $image;
        }
        
        if($request->hasFile('image')) {
            $array=[
                'path'=> public_path($this->folderPath),
                'image'=>$request->file('image'),
                'title'=>$data['title']
            ];
            $imageName = $this->uploadImage($array);
        }
        $data['image'] = $imageName;
        $data['title'] = Str::title($data['title']);

        return $data;
    }
}
