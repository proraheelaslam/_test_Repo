<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use DataTables;
use Hashids;
use Session;
use Image;
use File;

class SubscriptionPlanController extends Controller {

	public $resource = 'admin/subscriptionplan';
	public $view_path = 'admin/subscriptionplan';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'subs';
		$data['title'] = 'Manage Subscription Plan';
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
		$data['title'] = 'Add Subscription Plan';
		$data['class'] = 'subs';
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

		$rules['duration'] = 'required|integer|min:1';

		$rules['fee'] = 'required|regex:/^\d*(\.\d{1,2})?$/';
		
		$rules['detail'] = 'required';

		$messages = array();

		$this->validate($request, $rules, $messages);


		$subscriptionplan = SubscriptionPlan::create($input);

		Session::flash('success_message', 'You have successfully added new Subscription Plan');

		return redirect($this->resource);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\SubscriptionPlan  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function show(SubscriptionPlan $categories) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\SubscriptionPlan  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
		try {
			$id = Hashids::decode($id)[0];
			$subscriptionplan = SubscriptionPlan::findOrFail($id);

			$data['title'] = 'Update Subscription Plan';
			$data['subscriptionplan'] = $subscriptionplan;
			$data['class'] = 'subs';
			return view($this->view_path . '/edit', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\SubscriptionPlan  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
		$input = $request->all();

		$subscriptionplan = SubscriptionPlan::findOrFail($id);

		

		$rules['name'] = 'required|string|max:255';

		$rules['duration'] = 'required|integer|min:1';

		$rules['fee'] = 'required|regex:/^\d*(\.\d{1,2})?$/';
		
		$rules['detail'] = 'required';

		$messages = array();

		$this->validate($request, $rules, $messages);
		
		$subscriptionplan->update($input);

		Session::flash('success_message', 'Subscription Plan has been successfully updated.');
		return redirect($this->resource);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\SubscriptionPlan  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
		try {
			$id = Hashids::decode($id)[0];
			$subscriptionplan = SubscriptionPlan::findOrFail($id);

			$subscriptionplan->delete();
			Session::flash('success_message', 'Subscription Plan has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	////
	public function get_SubscriptionPlan(Request $request) {

		$all_data = SubscriptionPlan::all();

		return Datatables::of($all_data)

			->addColumn('name', function ($single) {
				return $single->name;
			})
			->addColumn('duration', function ($single) {
				return $single->duration;
			})
			->addColumn('fee', function ($single) {
				return $single->fee;
			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a '.get_tooltip('Update Subscription').'  href="subscriptionplan/' . $id . '/edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a '.get_tooltip('Delete Subscription').'  href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name', 'duration','fee','action'])
			->make(true);
	}
}
