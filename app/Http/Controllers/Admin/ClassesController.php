<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classes;
use DataTables;
use Hashids;
use Session;
use Image;
use File;

class ClassesController extends Controller {

	public $resource = 'admin/classes';
	public $view_path = 'admin/classes';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'classes';
		$data['title'] = 'Manage Classes';
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
		$data['title'] = 'Add Class';
		$data['class'] = 'classes';
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

		$rules['name_ru'] = 'required|string|max:255';

		$rules['name_iw'] = 'required|string|max:255';
		
		$rules['name_el'] = 'required|string|max:255';
		
        $rules['class_code'] = 'required|string|max:255';
		
		$messages = array();

		$this->validate($request, $rules, $messages);
       
        $input['class_key'] = str_slug($input['name'], '-');
	
		$classes = Classes::create($input);
		
		$whereData = array(array('class_key',$input['class_key']) , array('id' ,'!=',$classes->id)); 

		$resut=Classes :: where($whereData)->first();
		if($resut){
			
			$input2['class_key']= $input['class_key'].'_'.$classes->id ;
			
			$classes->update($input2);
			
			}
	

		Session::flash('success_message', 'You have successfully added new Class');

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
			$classes = Classes::findOrFail($id);

			$data['title'] = 'Update Class';
			$data['class'] = 'classes';
			$data['classes'] = $classes;
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

		$classes = Classes::findOrFail($id);

		$rules['name'] = 'required|string|max:255';

		$rules['name_ru'] = 'required|string|max:255';

		$rules['name_iw'] = 'required|string|max:255';
		
		$rules['name_el'] = 'required|string|max:255';
		
		$rules['class_code'] = 'required|string|max:255';
		// $rules['image'] = 'required|file|max:1024';

		$messages = array();

		$this->validate($request, $rules, $messages);
		
		
		 $input['class_key'] = str_slug($input['name'], '-');
		 
		 $whereData = array(array('class_key',$input['class_key']) , array('id' ,'!=',$id)); 

		 	$resut=Classes :: where($whereData)->first();
			
			
		
		
		if($resut){
			 $input['class_key']= $input['class_key'].'_'.$id ;
			 $classes->update($input);
			}
			else{
				$classes->update($input);
				}
		 
		 
		

		Session::flash('success_message', 'Class has been successfully updated.');
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
			$classes = Classes::findOrFail($id);

			$classes->delete();
			Session::flash('success_message', 'Class has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	////
	public function getClasses(Request $request) {

		$all_data = Classes::all();

		return Datatables::of($all_data)

			->addColumn('name_en', function ($single) {
				return $single->name.'/'. $single->name_iw.'/' .$single->name_ru.'/' .$single->name_el;
			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a '.get_tooltip('Edit Classs').'  href="classes/' . $id . '/edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a '.get_tooltip('Delete Class').'  href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name_en', 'action'])
			->make(true);
	}
}
