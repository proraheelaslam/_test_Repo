<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\AdsImages;
use App\Models\Review;
use App\Models\Ads;
use DataTables;
use Hashids;
use Session;
use Image;
use File;
use URL;

class AdsController extends Controller {

	public $resource = 'admin/ads';
	public $view_path = 'admin/ads';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'ads';
		$data['title'] = 'Manage Ads';
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
		$data['title'] = 'Create AD';
		$data['class'] = 'ads';
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
	public function show(ADS $ads) {
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
		     $ads=Ads :: with(['ads_images'])->where('id',$id)->first();

			$data['title'] = 'Update Ad';
			$data['ads'] = $ads;
				$data['class'] = 'ads';
			 $cat = Categories::get();
		  
		     $data['cat_data']=$cat;
			return view($this->view_path . '/edit', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}
	
	public function edit_review($id) {
		//
		try {
			$id = Hashids::decode($id)[0];
		     $reviews=Review :: findOrFail($id);

			$data['title'] = 'Update Review';
			$data['review'] = $reviews;
				$data['class'] = 'ads';
			 $cat = Categories::get();
		  
		     $data['cat_data']=$cat;
			return view($this->view_path . '/edit_review', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}
public function update_review($id, Request $request) {

		$rev = Review::findOrFail($id);
		
		  $input = $request->all();

	   	  $rules['review_title'] = 'required';

          $rules['rating'] = 'required';

          $rules['rating_professionalism'] = 'required';
		  
		
          $rules['rating_expertise'] = 'required';
		  
		   $rules['review'] = 'required';
		  
		  

		
		$messages = array();

		$this->validate($request, $rules, $messages);

			
			$rev->update($input);

				$idss = Hashids::encode($rev->ad_id);
			Session::flash('success_message', 'You have successfully Updated Review');

			return redirect('admin/ads/reviews/'.$idss);
		

	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function update($id, Request $request) {

		$ads = Ads::findOrFail($id);
		
		  $input = $request->all();

	   	  $rules['name'] = 'required';

          $rules['ad_location'] = 'required';

          $rules['ad_url'] = 'required';
		  
		  $rules['ad_price'] = 'required|regex:/^\d*(\.\d{1,2})?$/';
		  
		  $rules['ad_disc_price'] = 'required|regex:/^\d*(\.\d{1,2})?$/';
		  
          $rules['description'] = 'required';
		  
		   $rules['start_date'] = 'required';
		  
		   $rules['end_date'] = 'required';
		  
		   $rules['tag'] = 'required';
		   
		    $rules['category_id'] = 'required';

		
		$messages = array();

		$this->validate($request, $rules, $messages);

			$input['start_date'] =date('Y-m-d', strtotime($input['start_date']));

			$input['end_date'] = date('Y-m-d', strtotime($input['end_date']));

		

			$ads->update($input);

			

			Session::flash('success_message', 'You have successfully Updated Ad Details');

			return redirect($this->resource);
		

	}
	
	///Ads Images
		function AdImages($id){
				$id = Hashids::decode($id)[0];
           
			   $data['title'] = 'All Ads Images';
        $data['class'] = 'ads';
        $data['images'] = AdsImages::where('ad_id',$id)->get();
	//	print_r($data['images']);
		//exit;
        $data['resource']       = $this->resource;
        return view($this->view_path.'/listing_images',$data);
			}
			
			
			///Ads Rviewsss
		function AdReviews($id){
				$id = Hashids::decode($id)[0];
           
			   $data['title'] = 'All Ads Comments';
        $data['class'] = 'ads';
        $data['reviews'] = Review::with(['user_details'])->where('ad_id',$id)->get();
	
        $data['resource']       = $this->resource;
        return view($this->view_path.'/listing_reviews',$data);
			}
			
			function getAllReviews(Request $request){
				
		   $input=$request->all();
			$all_data = Review::with(['user_details'])->where('ad_id',$input['ad_id'])->get();

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
				$action_html = '<a   href="' . URL::to('admin/states/edit_state/' . $id . '') . '"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a  href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name','cities', 'action'])
			->make(true);
				}
			
			
			/////////////////////////
			 public function AdReviewRemove($id) {
		//
		
		try {
		
		//	$id = Hashids::decode($id)[0];
			$review = Review::findOrFail($id);
			
			

			$review->delete();
			Session::flash('success_message', 'Ad Review has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}
	////////////////////////////////
	    public function AdImagesRemove($id) {
		//
		
		try {
		
		//	$id = Hashids::decode($id)[0];
			$business = AdsImages::findOrFail($id);
			
			
		
            $image_path = "public/uploads/ads/" . $business->file_image;
			$thumbimage_path = "public/uploads/ads/thumbs/" . $business->file_image;
            if($business->file_image!='no_image'){
			if (file_exists($image_path)) {

				@unlink($image_path);
				@unlink($thumbimage_path);
			}}
			
			$business->delete();
			Session::flash('success_message', 'Ads Image has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
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
			$ads = Ads::findOrFail($id);

			$ads->delete();
			Session::flash('success_message', 'Ad has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

////upadte status of client
	public function FeatureStatus($id, Request $request, Ads $ads) {
		$id = Hashids::decode($id)[0];
		$ads = Ads::findOrFail($id);
		$input = $request->all();

		$ads->update($input);

	
		Session::flash('success_message', 'Status successfully updated.');
		echo 1;
	}
	////
	public function getAds(Request $request) {

		//$all_data = Ads::all();
		 $all_data = Ads::with(['category_details','business_details'])->withCount(['ads_likes','ads_views','ads_reviews']);

		return Datatables::of($all_data)

			->addColumn('name_en', function ($single) {
				return $single->name;
			})
				->addColumn('status', function ($single) {
				$id = Hashids::encode($single->id);
				$class = '';
				switch ($single->is_featured) {
				case 1:
					$class = 'label label-default';
					$name = 'Normal';
					break;
				case 2:
					$class = 'label label-primary';
					$name = 'Featured';
					break;
                case 3:
					$class = 'label label-info';
					$name = 'Higligted';
					break;
				default:
					$class = 'label label-default';
					$name = 'Normal';
					break;
				}
				return '<span style="cursor:pointer"  class="' . $class . '">' . $name . '</span>&nbsp;&nbsp;&nbsp;&nbsp;<select name="" onchange=update_status(\'' . $id . '\',this.value)><option value="">Change Status</option><option value="1">Normal</option><option value="2">Featured</option><option value="3">Highlighted</option></select>';
				
				return '';

			})
			->addColumn('comments', function ($single) {
				$id = Hashids::encode($single->id);
				return '<a  href="' . URL::to('admin/ads/reviews/' . $id . '') . '">Click To View Reviews('.$single->ads_reviews_count.')</a>&nbsp;&nbsp;';
			})
			->addColumn('ratings', function ($single) {
			   return ceil($single->avg_ratings);
			})
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '';
				$action_html = '<a '.get_tooltip('Update Ad').'  href="ads/' . $id . '/edit"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a  href="javascript:void(0);" '.get_tooltip('Delete Ad').' onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>&nbsp;&nbsp;<a '.get_tooltip('Ad Images').' href="' . URL::to('admin/ads/images/' . $id . '') . '"><i class="fa fa-folder"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name_en', 'status','comments','ratings','action'])
			->make(true);
	}
}
