<?php

namespace App\Http\Controllers;

use Zipper;
use File;
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
		$imageURL = 'public/'.$newFinvId.'/'.'files';
		@mkdir($imageURL);
		Storage::putFileAs($imageURL, $imageFile, $imageName);


		// Subir Archivos para el funcionamiento del FINV
		$finvFiles = $request->file('files-input');
		foreach($finvFiles as $finvFile){
			$finvFileName = $finvFile->getClientOriginalName();
			$finvFileURL = 'public/'.$newFinvId.'/'.'files';
			Storage::putFileAs($finvFileURL, $finvFile, $finvFileName);
		}
		
		// Actualizar registro del FINV subido con las URLs
		Finv_Information::where('id','=',$newFinvId)->update(['image_url' => 'storage/'.$newFinvId.'/'.'files'.'/'.$imageName]);
		Finv_Information::where('id','=',$newFinvId)->update(['files_url' => 'storage/'.$newFinvId.'/'.'files'.'/']);
		
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
	}

	public function getFinvSourceCode($id){
		$finv_url = Finv_Information::find($id)->files_url;
		$indexASPcontent = File::get($finv_url.'/'.'index.asp');
		$indexLESScontent = File::get($finv_url.'/'.'main-home.less');
		$codeCollection = collect(['indexASP' => $indexASPcontent, 'indexLESS' => $indexLESScontent]);
		return $codeCollection;
	}

	public function downloadSourceCode($id){
		$finv_url = Finv_Information::find($id)->files_url;
		$files = glob($finv_url.'/'.'*');
		Zipper::make($finv_url.'/finv_code.zip')->add($files)->close();
		return response()->download($finv_url.'/finv_code.zip')->deleteFileAfterSend();
	}

	public function visibilityTest(){
		$visibility = Storage::getVisibility('/public/storage/14/files/14.png');
		dd($visibility);
	}

}