<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use DataTables;
use Hashids;
use Illuminate\Support\Facades\URL;
use Session;
use Image;

class CategoriesController extends Controller {

	protected $resource = 'admin/categories';
	protected $view_path= 'admin/categories';
	protected $rules 	= [
							'name' => 'required|string|max:250',
							'name_ru' => 'required|string|max:250',
							'name_he' => 'required|string|max:250',
							'name_gr' => 'required|string|max:250',
						];
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
	public function create(){
		$data['title'] = 'Add Category';
		$data['class'] = 'categories';
		$data['resource'] = $this->resource;
		return view($this->view_path . '/add', $data);
	}

	public function subcatCreate($id){
		$data['title'] = 'Add Subcategory';
		$data['class'] = 'categories';
		$data['resource']    = $this->resource;
		$data['category_id'] = $id;
		return view($this->view_path . '/subcat_add', $data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$input = $request->all();
		$this->validate($request, array_merge($this->rules,['image'=> 'required|file|max:1024']));
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

	public function subcatPost(Request $request) {
		$input = $request->all();

		$this->validate($request, array_merge($this->rules,
			['parent_id'=>'required|integer|gt:0','image'=> 'required|file|max:1024']),
			['parent_id.required'=>'The category field is required.']
		);

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


		Session::flash('success_message', 'You have successfully added new subcategory');

		return redirect($this->resource. '/' . Hashids::encode($input['parent_id']));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request, $id){

		$category = Categories::find(Hashids::decode($id)[0]);
		$data['category'] = $category;
		$subcat = $category->childs();

		if ($request->ajax()) {
			return Datatables::of($subcat)
				->addColumn('name_en', function ($single) {
					return $single->name.'/'. $single->name_he.'/' .$single->name_ru.'/' .$single->name_gr;
				})
                ->addColumn('is_popular', function ($single) {
                    if ($single->is_popular == 1) {
                        return '<span data-category-popular="1" class="label label-default cate_popular_btn" data-id="'.$single->id.'">Popular</span>';
                    }else {
                        return '<span data-category-popular ="0" class="label label-default cate_popular_btn" data-id="'.$single->id.'">Not Popular</span>';
                    }

                })
				->addColumn('action', function ($single) {
					$url = URL::to('/') . '/admin/subcategories/' . Hashids::encode($single->id) . '/edit';
					return '<a '.get_tooltip('Edit').'  href="'.$url.'"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;<a '.get_tooltip('Delete Subcategory').'  href="javascript:void(0);" onclick="delete_record(\'' . $single->id . '\')"><i class="fa fa-trash-o"></i></a>';
				})
				->rawColumns(['name_en', 'action', 'is_popular'])
				->make(true);
		}

		$data['category_id'] = $id;
		$data['title']       = 'Category('.$category->name.') => Sub Categories';
		$data['resource']    = $this->resource;

        return view($this->view_path.'/subcat_listing',$data);
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
			$data['class'] = 'categories';
			$data['categories'] = $categories;
			return view($this->view_path . '/edit', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	public function subcatEdit($id) {
		try {
			$id = Hashids::decode($id)[0];
			$category = Categories::findOrFail($id);
			$data['title'] = 'Update Category';
			$data['class'] = 'categories';
			$data['subcategory'] = $category;
			$data['category_id'] = Hashids::encode($category->parent_id);
			return view($this->view_path . '/subcat_edit', $data);
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
		$input = $request->all();
		$categories = Categories::findOrFail($id);
		$this->validate($request, $this->rules);

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

		if($resut){
			 $input['category_key']= $input['category_key'].'_'.$id ;
			 $categories->update($input);
		}else{
			$categories->update($input);
		}

		Session::flash('success_message', 'Category has been successfully updated.');
		return redirect($this->resource);
	}

	public function subcatUpdate(Request $request, $id) {
		$input = $request->all();
		$categories = Categories::findOrFail($id);
		$this->validate($request, array_merge($this->rules,
			['parent_id'=>'required|integer|gt:0']),
			['parent_id.required'=>'The category field is required.']
		);

		if ($request->hasFile('image')) {

			$image_path = "public/uploads/category/" . $categories->image;
			$thumbimage_path = "public/uploads/category/thumbs/" . $categories->image;

			if (file_exists($image_path)) {
				@unlink($image_path);
				@unlink($thumbimage_path);
			}
			$destinationPath = 'public/uploads/category';
			$image = $request->file('image');
			$extension = $image->getClientOriginalExtension();
			$fileName = str_random(12) . '.' . $extension;
			$img = Image::make($image->getRealPath());
			$img->resize(200, 200, function ($constraint) {
				$constraint->aspectRatio();
			})->save($destinationPath . '/thumbs/' . $fileName);
			$image->move($destinationPath, $fileName);

			$input['image'] = $fileName;
		}

		$input['category_key'] = str_slug($input['name'], '-');
		$whereData = array(array('category_key',$input['category_key']) , array('id' ,'!=',$id));
		$resut=Categories :: where($whereData)->first();

		if($resut){
			$input['category_key']= $input['category_key'].'_'.$id ;
			$categories->update($input);
		}else{
			$categories->update($input);
		}

		Session::flash('success_message', 'Subcategory has been successfully updated.');
		return redirect($this->resource. '/' . Hashids::encode($input['parent_id']));

	}
	// function removeImage(Request $request){

	// 	$input = $request->all();

	// 	$ig= Categories::where('id',$input['image_id'])->first();

	// 	$image_path2      = "public/uploads/category/" . $ig->image;
	// 	$thumbimage_path2 = "public/uploads/category/thumbs/" . $ig->image;

	// 	if (file_exists($image_path2)) {

	// 		@unlink($image_path2);
	// 		@unlink($thumbimage_path2);
	// 	}
	// 	// $ig->delete();
	// 	$inp['image']='';
	// 	$ig->update($inp);
	// 	echo 1;
	// 	exit;

	// }
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		try {
			$id = Hashids::decode($id)[0];
			$categories = Categories::findOrFail($id);
			if($categories->courses->count()>0){
				Session::flash('error_message', 'Category deleting unsuccessfull! Category has to one or more cources');
				return 'error';
			}
			$categories->delete();
			Session::flash('success_message', 'Category has been successfully deleted.');
			return 'success';
		} catch (\Exception $e) {
			Session::flash('error_message', $e->getMessage());
			return 'error';
		}
	}

	public function subcatDestroy($id) {
		try{
			$categories = Categories::findOrFail($id);
			if($categories->subcat_courses->count()>0){
				Session::flash('error_message', 'Subcategory deleting unsuccessfull! Subcategory has to one or more cources');
				return 'error';
			}
			$categories->delete();
			Session::flash('success_message', 'Subcategory has been successfully deleted.');
			return 'success';
		}catch(\Exception $e) {
			Session::flash('error_message', $e->getMessage());
			return 'error';
		}
	}

	////
	public function getCategories(Request $request) {

		$all_data = Categories::where('parent_id',0);

		return Datatables::of($all_data)
			->addColumn('name_en', function ($single) {
				return $single->name.'/'. $single->name_he.'/' .$single->name_ru.'/' .$single->name_gr;
			})
            ->addColumn('is_featured', function ($single) {
                if ($single->is_featured == 1) {
                    return '<span data-category-feature="1" class="label label-default cate_feature_btn" data-id="'.$single->id.'">Feature</span>';
                }else {
                    return '<span data-category-feature="0" class="label label-default cate_feature_btn" data-id="'.$single->id.'">Not Feature</span>';
                }

            })
			->addColumn('action', function ($single) {
				$id = Hashids::encode($single->id);
				$action_html = '<a '.get_tooltip('Edit Category').'  href="categories/' . $id . '/edit"><i class="fa fa-edit"></i></a>';
				$action_html .= '<a '.get_tooltip('Delete Category').'  href="javascript:void(0);" onclick="delete_record(\'' . $id . '\')"><i class="fa fa-trash-o"></i></a>';
				$action_html .= '<a '.get_tooltip('Sub Categories').'  href="categories/' . $id . '"><i class="fa fa-bars"></i></a>';
				return $action_html;

			})
			->editColumn('id', 'ID: {{$id}}')
			->rawColumns(['name_en', 'action','is_featured'])
			->make(true);
	}

    /**
     * @param Request $request
     * @return array
     */
    public function makeFeature(Request $request)
    {

        if ($request->is_feature == 1) {

            Categories::where('id', $request->id)->update(['is_featured' => 0]);
            $status = 0;
        } else {
            Categories::where('id', $request->id)->update(['is_featured' => 1]);
            $status = 1;
        }
        return [
            'message' => 'Success',
            'status' => $status
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function makePopular(Request $request)
    {

        if ($request->is_popular == 1) {

            Categories::where('id', $request->id)->update(['is_popular' => 0]);
            $status = 0;
        } else {
            Categories::where('id', $request->id)->update(['is_popular' => 1]);
            $status = 1;
        }
        return [
            'message' => 'Success',
            'status' => $status
        ];
    }
}
