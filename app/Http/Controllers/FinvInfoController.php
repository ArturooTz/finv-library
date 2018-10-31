<?php

namespace App\Http\Controllers;

use Storage;
use App\Finv_Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class FinvInfoController extends Controller
{
    public function store(Request $request)
    {
        // Crear registro de informacion del nuevo FINV
        $newFinvId = Finv_Information::insertGetId([
			'shortname'=>request('shortname'),
			'site_url'=>request('site_url'),
            'description'=>request('description'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s") 
        ]);
        
        // Subir imagen de preview al servidor
        $imageFile = $request->file('image-input');
        $imageName = $newFinvId.".".$imageFile->getClientOriginalExtension();
        $imageURL = 'storage/'.$newFinvId.'/'.'files';
        Storage::putFileAs($imageURL, $imageFile, $imageName);

        // Subir Archivos para el funcionamiento del FINV
        $finvFiles = $request->file('files-input');
        foreach($finvFiles as $finvFile){
            $finvFileName = $finvFile->getClientOriginalName();
            $finvFileURL = 'storage/'.$newFinvId.'/'.'files';
            Storage::putFileAs($finvFileURL, $finvFile, $finvFileName);
        }

        // Actualizar registro del FINV subido con las URLs
        Finv_Information::where('id','=',$newFinvId)->update(['image_url' => $imageURL."/".$imageName]);
        Finv_Information::where('id','=',$newFinvId)->update(['files_url' => $finvFileURL]);
    
        Session::flash('message', 'success');
        return Redirect::back();
    }

    public function show(){
        $finvList = Finv_Information::all();
        return view('main', ["finvList" => $finvList]);
    }

    public function display($id){
        $finv_info = Finv_Information::find($id);
        return $finv_info;
        //return json_encode($finv_info);
        //dd($finv_id);
    }
}