<?php

namespace App\Http\Controllers;

use App\Pagoda;
use App\Founder;
use Illuminate\Http\Request;
use App\Http\Requests\PagodaEditRequest;
use App\Http\Requests\PagodaCreateRequest;

use App\Traits\ManagesImages;
use App\PagodaImage;

class PagodaController extends Controller
{
    use ManagesImages;

    // public function __construct()
    // {
    //     $this->setImageDefaultsFromConfig('pagodaImage');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagodas = Pagoda::orderBy('name')->get();
        return view('admin.pagoda.index',compact('pagodas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $founders = Founder::pluck('name','id');
        return view('admin.pagoda.create',compact('founders'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PagodaCreateRequest $request)
    {   
        $pagodaImage = $this::storeImage($request);
        
        $request->request->add([ 'image_id' => $pagodaImage->id ]);
        $pagoda = Pagoda::create($request->all());

        return redirect()->route('pagoda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pagoda  $pagoda
     * @return \Illuminate\Http\Response
     */
    public function show(Pagoda $pagoda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pagoda  $pagoda
     * @return \Illuminate\Http\Response
     */
    public function edit(Pagoda $pagoda)
    {
        $founders = Founder::pluck('name','id');
        $image = $pagoda->image()->first();
        $image = 'thumb-'. $image->image_name . '.' . $image->image_extension;
        return view('admin.pagoda.edit',compact('pagoda','founders','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pagoda  $pagoda
     * @return \Illuminate\Http\Response
     */
    public function update(PagodaEditRequest $request,Pagoda $pagoda)
    {
        if ($request->hasFile('image')) {
             $this::updateImage($request,$pagoda);
        }

        $pagoda->update($request->all());

        return redirect()->route('pagoda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pagoda  $pagoda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pagoda $pagoda)
    {
        $pagoda->delete();

        return redirect()->back();
    }

    private function generateRandomString($length = 5) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function storeImage($request)
    {
        $this->setImageDefaultsFromConfig('pagodaImage');
        
        $pagodaImage = new PagodaImage([
            'image_name'        =>  $this::generateRandomString().'-'. mt_rand(10,10000),
            'image_extension'   => $request->file('image')->getClientOriginalExtension(),
            ]);
        
        $pagodaImage->save();

        // get instance of file
        $file = $this->getUploadedFile();

        // pass in the file and the model
        $this->saveImageFiles($file, $pagodaImage);

        return $pagodaImage;
    }


    private function updateImage($request, $pagoda)
    {
        $this->setImageDefaultsFromConfig('pagodaImage');

        if ($pagoda->image()->first()) {
            $pagodaImage = PagodaImage::find($pagoda->image_id);

            // if file, we have additional requirements before saving
            if ($this->newFileIsUploaded()) {
                $this->deleteExistingImages($pagodaImage);
                $this->setNewFileExtension($request, $pagodaImage);
            }

            $pagodaImage->save();

            // check for file, if new file, overwrite existing file
            if ($this->newFileIsUploaded()){                
                $file = $this->getUploadedFile();                
                $this->saveImageFiles($file, $pagodaImage);
            }
        }
        else
        {
            $this::storeImage($request);
        }
    }

     /**
     * @param EditImageRequest $request
     * @param $marketingImage
     */

    private function setNewFileExtension($request,$pagodaImage)
    { 
        $pagodaImage->image_extension = $request->file('image')->getClientOriginalExtension();
    }
}
