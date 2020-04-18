<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Grades;
use DataTables;
use Session;
use Hashids;
use Image;
use File;

class GradesController extends Controller {

	public $resource = 'admin/grades';
	public $view_path = 'admin/grades';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'grades';
		$data['title'] = 'Manage Grades';
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
		$data['title'] = 'Add Grade';
		$data['class'] = 'grades';
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
		

		$messages = array();

		$this->validate($request, $rules, $messages);
       
        $input['grade_key'] = str_slug($input['name'], '-');
	
		$grades = Grades::create($input);
		
		$whereData = array(array('grade_key',$input['grade_key']) , array('id' ,'!=',$grades->id)); 

		$resut=Grades :: where($whereData)->first();
		if($resut){
			
			$input2['grade_key']= $input['grade_key'].'_'.$grades->id ;
			
			$grades->update($input2);
			
			}
	

		Session::flash('success_message', 'You have successfully added new Grade');

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
			$grades = Grades::findOrFail($id);

			$data['title'] = 'Update Grade';
			$data['class'] = 'grades';
			$data['grades'] = $grades;
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

		$grades = Grades::findOrFail($id);

		$rules['name'] = 'required|string|max:255';

		$rules['name_ru'] = 'required|string|max:255';

		$rules['name_iw'] = 'required|string|max:255';
		
		$rules['name_el'] = 'required|string|max:255';
		// $rules['image'] = 'required|file|max:1024';

		$messages = array();

		$this->validate($request, $rules, $messages);
		
		
		 $input['grade_key'] = str_slug($input['name'], '-');
		 
		 $whereData = array(array('grade_key',$input['grade_key']) , array('id' ,'!=',$id)); 

		 	$resut=Grades :: where($whereData)->first();
			
			
		
		
		if($resut){
			 $input['grade_key']= $input['grade_key'].'_'.$id ;
			 $grades->update($input);
			}
			else{
				$grades->update($input);
				}
		 
		 
		

		Session::flash('success_message', 'Grade has been successfully updated.');
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
			$grades = Grades::findOrFail($id);

			$grades->delete();
			Session::flash('success_message', 'Grade has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	////
	public function getGrades(Request $request) {

		$all_data = Grades::all();

		return Datatables::of($all_data)

			->addColumn('name_en', function ($single) {
				return $single->name.'/'. $single->name_iw.'/' .$single->name_ru.'/' .$single->name_el;
			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a '.get_tooltip('Edit Grade').'  href="grades/' . $id . '/edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a '.get_tooltip('Delete Grade').'  href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name_en', 'action'])
			->make(true);
	}
}
