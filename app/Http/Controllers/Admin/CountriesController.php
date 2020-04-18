<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Cities;
use App\Models\State;
use DataTables;
use Redirect;
use Hashids;
use Session;
use Image;
use File;
use URL;

class CountriesController extends Controller {

	public $resource = 'admin/countries';
	public $view_path = 'admin/countries';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'country';
		$data['title'] = 'Manage Countries';
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
		$data['title'] = 'Add Country';
		$data['class'] = 'country';
		$data['resource'] = $this->resource;
		return view($this->view_path . '/add', $data);
	}

		public function create_city($state_id) {
		//

		$state_id = Hashids::decode($state_id)[0];
			$state = State::findOrFail($state_id);
		$data['title'] = 'Add City';
		$data['class'] = 'country';

			$data['state'] = $state;


		$data['resource'] = $this->resource;
		return view($this->view_path . '/add_city', $data);
	}

		public function create_state($country_id) {

			$country_id = Hashids::decode($country_id)[0];
				$country = Country::findOrFail($country_id);
		//
		$data['title'] = 'Add State';
		$data['class'] = 'country';
		$data['country'] = $country;
		$data['resource'] = $this->resource;
		return view($this->view_path . '/add_state', $data);
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
		$messages = array();

		$this->validate($request, $rules, $messages);


		$categories = Country::create($input);




		Session::flash('success_message', 'You have successfully added new country');

		return redirect($this->resource);
	}

	public function store_city(Request $request) {
		$input = $request->all();

		$rules['name'] = 'required|string|max:255';
		$messages = array();

		$this->validate($request, $rules, $messages);
       $input['code']='aa';
        $input['city_key'] = str_slug($input['name']);
		$categories = Cities::create($input);




		$message_success=Session::flash('success_message', 'You have successfully added new city');
$idss = Hashids::encode($categories->state_id);
			return Redirect('admin/countries/get_cities/'.$idss);
	}

	public function store_state(Request $request) {
		$input = $request->all();

		$rules['name'] = 'required|string|max:255';
		$messages = array();

		$this->validate($request, $rules, $messages);


		$categories = State::create($input);
		$id=$input['country_id'];
       $id = Hashids::encode($id);


		$message_success=Session::flash('success_message', 'You have successfully added new State');


			return Redirect('admin/countries/get_states/'.$id);
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
			$countries = Country::findOrFail($id);

			$data['title'] = 'Update Country';
			$data['countries'] = $countries;
			   $data['class'] = 'country';
			return view($this->view_path . '/edit', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	public function edit_city($id) {
		//
		try {
			$id = Hashids::decode($id)[0];
			$cities = Cities::findOrFail($id);

			$data['title'] = 'Update City';
			$data['cities'] = $cities;
			   $data['class'] = 'country';
			return view($this->view_path . '/edit_city', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	public function edit_state($id) {
		//
		try {
			$id = Hashids::decode($id)[0];
			$state = State::findOrFail($id);

			$data['title'] = 'Update State';
			$data['country'] = $state;
			$data['class'] = 'country';
			$data['edit']='set';

			//$data['country_id'] = $state->country_id;
			return view($this->view_path . '/edit_state', $data);
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

		$countries = Country::findOrFail($id);

		$rules['name'] = 'required|string|max:255';


		$messages = array();

		$this->validate($request, $rules, $messages);



			 $countries->update($input);

		Session::flash('success_message', 'Country has been successfully updated.');
		return redirect($this->resource);

	}

	public function updateState($id,Request $request) {
		//
		$input = $request->all();

		$states = State::findOrFail($id);

		$rules['name'] = 'required|string|max:255';


		$messages = array();

		$this->validate($request, $rules, $messages);



			 $states->update($input);

		Session::flash('success_message', 'States has been successfully updated.');
		$idss = Hashids::encode($states->country_id);
		return Redirect('admin/countries/get_states/'.$idss);

	}

	public function updateCity($id,Request $request) {
		//
		$input = $request->all();

		$countries = Cities::findOrFail($id);

		$rules['name'] = 'required|string|max:255';


		$messages = array();

		$this->validate($request, $rules, $messages);



			 $countries->update($input);

		Session::flash('success_message', 'City has been successfully updated.');

		$idss = Hashids::encode($countries->state_id);
			return Redirect('admin/countries/get_cities/'.$idss);

	}



function GetStates($id){
				$id = Hashids::decode($id)[0];

			   $data['title'] = 'States';
        $data['class'] = 'country';

		    $data['country_id'] = $id;

        $data['states'] = State::where('country_id',$id)->get();
	//	print_r($data['images']);
		//exit;
        $data['resource']       = $this->resource;
        return view($this->view_path.'/listing_states',$data);
			}
////////////////////////////////////////////////////////////////
			function GetCities($id){
				$id = Hashids::decode($id)[0];

			   $data['title'] = 'Cities';
              $data['class'] = 'country';

		    $data['state_id'] = $id;

        $data['cities'] = Cities::where('state_id',$id)->get();
	//	print_r($data['images']);
		//exit;
        $data['resource']       = $this->resource;
        return view($this->view_path.'/listing_cities',$data);
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
	public function getCountries(Request $request) {

		$all_data = Country::all();

		return Datatables::of($all_data)

			->addColumn('name', function ($single) {
				return $single->name;
			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a  '.get_tooltip('Update Country').' href="countries/' . $id . '/edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name', 'action'])
			->make(true);
	}


		////
	public function getStatesAll(Request $request) {



		   $input=$request->all();
			$all_data = State::where('country_id',$input['country_id'])->get();

		return Datatables::of($all_data)

			->addColumn('name', function ($single) {
				return $single->name;
			})
			->addColumn('cities', function ($single) {
				$id = Hashids::encode($single->id);
				return '<a  href="' . URL::to('admin/countries/get_cities/' . $id . '') . '"><i>Manage Cities</i></a>';
			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a  '.get_tooltip('Update State').'  href="' . URL::to('admin/states/edit_state/' . $id . '') . '"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name','cities', 'action'])
			->make(true);
	}


		////
	public function getCitiesAll(Request $request) {



		   $input=$request->all();
			$all_data = Cities::where('state_id',$input['state_id'])->get();

		return Datatables::of($all_data)

			->addColumn('name', function ($single) {
				return $single->name;
			})

			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a   '.get_tooltip('Edit City').' href="' . URL::to('admin/city/edit_city/' . $id . '') . '"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name', 'action'])
			->make(true);
	}
}
