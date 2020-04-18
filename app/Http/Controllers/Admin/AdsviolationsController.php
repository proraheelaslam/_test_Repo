<?php

use Illuminate\Support\Facades\Response;
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdViolation;
use App\Models\Ads;
use DataTables;
use Hashids;
use Session;
use Image;
use File;



class AdsviolationsController extends Controller {

	public $resource = 'admin/adsviolation';
	public $view_path = 'admin/adsviolation';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'ads_v';
		$data['title'] = 'Manage Ads Violations';
		$data['resource'] = $this->resource;
		return view($this->view_path . '/listing', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		
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
		

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	 
	 public function update_ad_status($ad_id) {
		 	
			$ad_id = Hashids::decode($ad_id)[0];
		    
			$ads = Ads::findOrFail($ad_id);
			
			if($ads->is_active==1){
				
				$input['is_active']=0;
				
				}
			else{
				
				$input['is_active']=1;
				
				}
		    
			//$input = $request->all();

		    $ads->update($input);
	
		   Session::flash('success_message', 'Status successfully updated.');
		  
		    echo 1;
	
		 }
	 
	public function destroy($id) {
		//
		try {
			$id = Hashids::decode($id)[0];
			$ads = AdViolation::findOrFail($id);

			$ads->delete();
			Session::flash('success_message', 'Ad Violation has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	////
	public function getAdsviolation(Request $request) {

		$all_data = AdViolation::with(['ads_details','user_details'])->get();

		return Datatables::of($all_data)

			->addColumn('name', function ($single) {
				return $single['ads_details']['name'];
			})
			->addColumn('user_name', function ($single) {
				return $single['user_details']['first_name'].' '.$single['user_details']['last_name'];
			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$ad_id = Hashids::encode($single->ad_id);
				$action_html = '';
				switch ($single['ads_details']['is_active']) {
				case 0:
					$class = 'label label-default';
					$name = 'Inactive';
					break;
				case 1:
					$class = 'label label-primary';
					$name = 'Active';
					break;

				default:
					$class = 'label label-info';
					$name = 'Active';
					break;
				}
				
				
				$action_html = '<a '.get_tooltip('Update Ad Status').'  class="'.$class.'" href="javascript:void(0);" onclick="update_record(\'' . $ad_id . '\')"><i>'.$name.'</i></a>&nbsp;&nbsp;<a  '.get_tooltip('Delete Violation').' href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name','user_name', 'action'])
			->make(true);
	}
}
