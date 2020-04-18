<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use App\Models\BusinessImages;
use Illuminate\Http\Request;
use App\Models\Business;
use App\Models\Country;
use App\Models\Cities;
use App\Models\State;
use DataTables;
use Hashids;
use Session;
use Image;
use File;
use URL;

class BusinessController extends Controller {

	public $resource = 'admin/business';
	public $view_path = 'admin/business';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'business';
		$data['title'] = 'Manage Business';
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

		$messages = array();

		$this->validate($request, $rules, $messages);


		$categories = Categories::create($input);

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
            $business = Business::findOrFail($id);
		//	$user = User::get();
	$data['business'] = $business;
			$data['title'] = 'Update Business';
			
				$data['class'] = 'business';
			
			 $country = Country::get();
		 
		 $states = State::where('country_id',$business->country)->get();
		
		 
		 $city = Cities::where('country_id',$business->country)->get();
		         
		 $data['country'] = $country;
		 
		 $data['states'] = $states;
		 
		  $data['city']    = $city;
		  
		   if(count($data['states'])==0){
		
			$data['states'] = State::where('country_id',1)->get();
			 
			 }
		if(count($data['city'])==0){
			
				  $data['city'] = Cities::where('country_id',1)->get();
			}

			return view($this->view_path . '/edit', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}
 function getStates(Request $request){
		
		   $input = $request->all();
		        $business = Business::where('id',$input['business_id'])->first();
			$data['business']=$business;
		   $data['states'] = State::where('country_id',$input['country_id'])->get();
		    return view('admin/business/state_ajax_view',$data);
		}
		
		function getCities(Request $request){
		  
		
		   $input = $request->all();
		     $business = Business::where('id',$input['business_id'])->first();
			$data['business']=$business;
		   $data['city'] = Cities::where('state_id',$input['state_id'])->get();
		    return view('admin/business/city_ajax_view',$data);
		
		}
		
		function BusinessImages($id){
				$id = Hashids::decode($id)[0];
           
			   $data['title'] = 'All Business Images';
        $data['class'] = 'business';
        $data['images'] = BusinessImages::where('business_id',$id)->get();
	//	print_r($data['images']);
		//exit;
        $data['resource']       = $this->resource;
        return view($this->view_path.'/listing_images',$data);
			}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
public function update($id, Request $request) {

		$business = Business::findOrFail($id);
		$input = $request->all();

		$rules['name'] = 'required';

		$rules['zip_code'] = 'required';

          $rules['phone_number'] = 'required';

          $rules['address'] = 'required';

          $rules['website'] = 'required';
		  
          $rules['detail'] = 'required';
		  
		   $rules['service'] = 'required';
		  
		   $rules['email'] = 'required|string|email|max:255';

		
		$messages = array();

		$this->validate($request, $rules, $messages);

		$checkuser = Business::where(['email' => $input['email']])->where('id','!=', $id)->get()->first();

		if ($checkuser) {

			return redirect()->back()->with("error_message", "This Email Address already Exist.");

		} else {

		if ($request->hasFile('image')) {

			$image_path = "public/uploads/business/" . $business->logo;
			$thumbimage_path = "public/uploads/business/thumbs/" . $business->logo;
if($business->logo!='no_image'){
			if (file_exists($image_path)) {

				@unlink($image_path);
				@unlink($thumbimage_path);
			}}
			$destinationPath = 'public/uploads/business'; // upload path
			$image = $request->file('image'); // file
			$extension = $image->getClientOriginalExtension(); // getting image extension
			$fileName = str_random(12) . '.' . $extension; // renameing image
			$img = Image::make($image->getRealPath());
			$img->resize(200, 200, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/thumbs/' . $fileName);
			$image->move($destinationPath, $fileName); // uploading file to given path

			$input['logo'] = $fileName;
		}

			$business->update($input);

			

			Session::flash('success_message', 'You have successfully Updated Business');

			return redirect($this->resource);
		}

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
	public function BusinessImagesRemove($id) {
		//
		
		try {
		
		//	$id = Hashids::decode($id)[0];
			$business = BusinessImages::findOrFail($id);
			
			
		
            $image_path = "public/uploads/business/" . $business->file_image;
			$thumbimage_path = "public/uploads/business/thumbs/" . $business->file_image;
            if($business->file_image!='no_image'){
			if (file_exists($image_path)) {

				@unlink($image_path);
				@unlink($thumbimage_path);
			}}
			
			$business->delete();
			Session::flash('success_message', 'Business Image has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}
	
	
////upadte status of business
	public function updatestatus($id, Request $request, Business $business) {
		$id = Hashids::decode($id)[0];
		$business = Business::findOrFail($id);
		$input = $request->all();

		$business->update($input);

	
		Session::flash('success_message', 'Status successfully updated.');
		echo 1;
	}
	public function businessDetail($order_id) {

		try {
			$id = Hashids::decode($order_id)[0];

				        $business = Business::with(['city_details','state_details','country_details'])->where('id', $id)->get()->first();
						
						//print_r($business);
						//exit;


			$data['class'] = 'business';

			$data['title'] = 'Business Detail';

			$data['business'] = $business;

			return view($this->view_path . '/detail', $data);

		} catch (\Exception $e) {

			return redirect($this->resource);
		}
	}
	////
	public function getBusiness(Request $request) {

		$all_data = Business::all();
//print_r($all_data->toArray());
//echo $all_data[0]['is_active'];
//exit;
		return Datatables::of($all_data)

			->addColumn('name', function ($single) {
				return $single->name;
			})
			->addColumn('email', function ($single) {
				return $single->email;
			})
			->addColumn('phone', function ($single) {
				return $single->phone_number;
			})->addColumn('status', function ($single) {
				$id = Hashids::encode($single->id);
				$class = '';
				
				switch ($single->is_approve) {
				case 0:
					$class = 'label label-default';
					$name = 'Unapproved';
					break;
				case 1:
					$class = 'label label-primary';
					$name = 'Approved';
					break;

				default:
					$class = 'label label-info';
					$name = 'Approved';
					break;
				}
				return '<span style="cursor:pointer" data-status="' . $single->is_approve . '" onclick="update_status(\'' . $id . '\',this)" class="' . $class . '">' . $name . '</span>';

			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a '.get_tooltip('Update Business').'  href="business/' . $id . '/edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a '.get_tooltip('Business Details').'  href="' . URL::to('admin/business/business_detail/' . $id . '') . '" ><i class="fa fa-bars"></i></a>&nbsp;&nbsp;<a '.get_tooltip('Business Images').' href="' . URL::to('admin/business/images/' . $id . '') . '"><i class="fa fa-folder"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name','email','phone','status', 'action'])
			->make(true);
	}
}
