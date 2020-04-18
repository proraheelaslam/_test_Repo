<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribers;
use DataTables;
use Session;
use Hashids;

class SubscriberController extends Controller {

	public $resource = 'admin/subscriber';
	public $view_path = 'admin/subscriber';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'subscriber';
		$data['title'] = 'Manage Subscriber';
		$data['resource'] = $this->resource;
		return view($this->view_path . '/listing', $data);
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
			$Subscribers = Subscribers::findOrFail($id);
			$Subscribers->delete();
			Session::flash('success_message', 'Subscriber has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	////
	public function getSubscriber(Request $request) {

		$all_data = Subscribers::orderBy('created_at','desc');

		return Datatables::of($all_data)

			->addColumn('email', function ($single) {
				return $single->email;
			})

			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a  '.get_tooltip('Delete Subscriber').' href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name','send', 'action'])
			->make(true);
	}
}
