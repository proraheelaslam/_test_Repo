<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use DataTables;
use Hashids;
use Session;
use Image;
use File;

class CategoriesController extends Controller {

	public $resource = 'admin/categories';
	public $view_path = 'admin/categories';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'categories';
		$data['title'] = 'Manage Categories';
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
		$data['title'] = 'Add Category';
		$data['class'] = 'categories';
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
		
		$rules['image'] = 'required|file|max:1024';

		$messages = array();

		$this->validate($request, $rules, $messages);
        if ($request->hasFile('image')) {

			$destinationPath = 'public/uploads/category'; // upload path
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
        $input['category_key'] = str_slug($input['name'], '-');
	
		$categories = Categories::create($input);
		
		$whereData = array(array('category_key',$input['category_key']) , array('id' ,'!=',$categories->id)); 

		$resut=Categories :: where($whereData)->first();
		if($resut){
			
			$input2['category_key']= $input['category_key'].'_'.$categories->id ;
			
			$categories->update($input2);
			
			}
	

		Session::flash('success_message', 'You have successfully added new category');

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
			$categories = Categories::findOrFail($id);

			$data['title'] = 'Update Category';
			$data['categories'] = $categories;
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

		$categories = Categories::findOrFail($id);

		$rules['name'] = 'required|string|max:255';

		$rules['name_sv'] = 'required|string|max:255';

		$rules['name_de'] = 'required|string|max:255';
		// $rules['image'] = 'required|file|max:1024';

		$messages = array();

		$this->validate($request, $rules, $messages);
		
		if ($request->hasFile('image')) {

			$image_path = "public/uploads/category/" . $categories->image;
			$thumbimage_path = "public/uploads/category/thumbs/" . $categories->image;

			if (file_exists($image_path)) {

				@unlink($image_path);
				@unlink($thumbimage_path);
			}
			$destinationPath = 'public/uploads/category'; // upload path
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
		
		 $input['category_key'] = str_slug($input['name'], '-');
		 
		 $whereData = array(array('category_key',$input['category_key']) , array('id' ,'!=',$id)); 

		 	$resut=Categories :: where($whereData)->first();
			
			
			if ( ! isset($data['is_active'])){
    $input['is_active'] = '0'; }
	else{
		$input['is_active'] = '1';
		}
		
		if($resut){
			 $input['category_key']= $input['category_key'].'_'.$id ;
			 $categories->update($input);
			}
			else{
				$categories->update($input);
				}
		 
		 
		

		Session::flash('success_message', 'Category has been successfully updated.');
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
			$categories = Categories::findOrFail($id);

			$categories->delete();
			Session::flash('success_message', 'Category has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	////
	public function getCategories(Request $request) {

		$all_data = Categories::all();

		return Datatables::of($all_data)

			->addColumn('name_en', function ($single) {
				return $single->name.'/'. $single->name_sv.'/' .$single->name_de;
			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a  href="categories/' . $id . '/edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a  href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name_en', 'action'])
			->make(true);
	}
}
