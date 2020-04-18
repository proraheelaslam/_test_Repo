<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use DataTables;
use Hashids;
use Session;
use Image;
use File;

class SliderController extends Controller {

	public $resource = 'admin/slider';
	public $view_path = 'admin/slider';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'slider';
		$data['title'] = 'Manage Slider';
		$data['resource'] = $this->resource;
		return view($this->view_path . '/listing', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		$data['title'] = 'Add Slider';
		$data['class'] = 'slider';
		$data['resource'] = $this->resource;
		return view($this->view_path . '/add', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$input = $request->all();

		$rules['name'] = 'required|string|max:255';
		$rules['name_sv'] = 'required|string|max:255';
		$rules['name_de'] = 'required|string|max:255';

		$rules['descrip'] = 'required';
		$rules['descrip_sv'] = 'required';
		$rules['descrip_de'] = 'required';

		
		$rules['image'] = 'required|file|max:1024';

		$messages = array();

		$this->validate($request, $rules, $messages);
        if ($request->hasFile('image')) {

			$destinationPath = 'public/uploads/slider'; // upload path
			$image = $request->file('image'); // file
			$extension = $image->getClientOriginalExtension(); // getting image extension
			$fileName = str_random(12) . '.' . $extension; // renameing image
			$img = Image::make($image->getRealPath());
			$img->resize(200, 200, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/thumbs/' . $fileName);
			$image->move($destinationPath, $fileName); // uploading file to given path
			$input['image'] = $fileName;
		}
      
	
		$categories = Slider::create($input);
		
		

		Session::flash('success_message', 'You have successfully added new slider');

		return redirect($this->resource);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function show(Categories $categories) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
		try {
			$id = Hashids::decode($id)[0];
			$slider = Slider::findOrFail($id);

			$data['title'] = 'Update Category';
			$data['slider'] = $slider;
			$data['class'] = 'slider';
			return view($this->view_path . '/edit', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
		$input = $request->all();

		$slider = Slider::findOrFail($id);

		$rules['name'] = 'required|string|max:255';

		$rules['name_sv'] = 'required|string|max:255';
		$rules['name_de'] = 'required|string|max:255';

		$rules['descrip'] = 'required';
		$rules['descrip_sv'] = 'required';
		$rules['descrip_de'] = 'required';

		
		//$rules['image'] = 'required|file|max:1024';

		$messages = array();

		$this->validate($request, $rules, $messages);
		
		if ($request->hasFile('image')) {

			$image_path = "public/uploads/slider/" . $slider->image;
			$thumbimage_path = "public/uploads/slider/thumbs/" . $slider->image;

			if (file_exists($image_path)) {

				@unlink($image_path);
				@unlink($thumbimage_path);
			}
			$destinationPath = 'public/uploads/slider'; // upload path
			$image = $request->file('image'); // file
			$extension = $image->getClientOriginalExtension(); // getting image extension
			$fileName = str_random(12) . '.' . $extension; // renameing image
			$img = Image::make($image->getRealPath());
			$img->resize(200, 200, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/thumbs/' . $fileName);
			$image->move($destinationPath, $fileName); // uploading file to given path

			$input['image'] = $fileName;
		}
	
		 	
				$slider->update($input);
			

		Session::flash('success_message', 'Slider has been successfully updated.');
		return redirect($this->resource);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		try {
			$id = Hashids::decode($id)[0];
			$slider = Slider::findOrFail($id);

			$slider->delete();
			Session::flash('success_message', 'Slider has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	////
	public function getSlider(Request $request) {

		$all_data = Slider::all();

		return Datatables::of($all_data)

			->addColumn('name', function ($single) {
				return $single->name;
			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a '.get_tooltip('Update Slider').'  href="slider/' . $id . '/edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a  '.get_tooltip('Delete Slider').' href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name', 'action'])
			->make(true);
	}
}
