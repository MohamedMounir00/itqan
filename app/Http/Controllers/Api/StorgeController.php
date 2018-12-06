<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\Api\StorgeCollection;
use App\Storge;
use Illuminate\Support\Facades\File;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StorgeController extends Controller
{
    //
    public function upload(Request $request) {

        if ($request->hasFile('url')) {
            $files= $request->file('url');
            foreach ($files as $file){
                $logo_rename =time().'-'.rand(999,999999).$file->getClientOriginalExtension();

               // $file->move(public_path('uploads/orders'), $logo_rename);
                $img = Image::make($file)->resize(300,200)->save(public_path('uploads/orders'), $logo_rename,60);

                $db_name = 'uploads/orders/' . $logo_rename;

                $saveFiles = Storge::create([
                    'path' => $db_name,
                    //'item_id' => $answer_id,
                   // 'type' => 'offer',
                ]);

            }


        }


    }
    public function store(Request $request)
    {


        $originalImage= $request->file('url');
        $thumbnailImage = Image::make($originalImage);
        $RandomAccountNumber = time() . rand(99999, 999999999);
        $originalPath = public_path('/images/'.$RandomAccountNumber.'/');
        File::makeDirectory($originalPath, $mode = 0777, true, true);
        $newFileName = $originalPath;
        $name=time() . rand(99999, 999999999).'.'.$originalImage->getClientOriginalExtension();
        $thumbnailImage->save($newFileName.$name);
        $thumbnailImage->resize(200, 200, function($constraint)
        {
            $constraint->aspectRatio();
        },100);
        $thumbnailImage->save($newFileName.'thumbnail'.'-'.$name);
        $fileName=pathinfo($originalImage->getClientOriginalName(),PATHINFO_FILENAME);
         $extion =$originalImage->getClientOriginalExtension();
        $namefile=pathinfo($name,PATHINFO_FILENAME);
        $path='/images/'.$RandomAccountNumber;
         $size= $thumbnailImage->filesize();
        $imagemodel= new Storge();
        $imagemodel->file_name= $fileName;
        $imagemodel->extention= $extion;
        $imagemodel->path= $path;
        $imagemodel->size= $size;
        $imagemodel->name= $namefile;
        $imagemodel->save();
     return new StorgeCollection($imagemodel);
    }



}
