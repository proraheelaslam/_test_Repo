<?php

namespace App\Http\Controllers\Admin;

use App\Models\MenuCat;
use App\Models\MenuLink;
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

class MenuCategoryController extends Controller {

	public $resource = 'admin/menu_category';
	public $view_path = 'admin/menu_category';
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//

		$data['class'] = 'menu_category';
		$data['title'] = 'Manage Menu Category';
		$data['resource'] = $this->resource;
		return view($this->view_path . '/listing', $data);
	}

    ////
    public function getMenuCategories(Request $request) {

        $all_data = MenuCat::all();

        return Datatables::of($all_data)

            ->addColumn('name', function ($single) {
                return $single->name_en;
            })
            ->addColumn('links', function ($single) {
                $cat_key = $single->cat_key;
                return '<a  href="' . URL::to('admin/menu_category/get_menu_links/' . $cat_key . '') . '"><i>Manage Links</i></a>';
            })
            ->addColumn('action', function ($single) {
                $id = Hashids::encode($single->id);
                $action_html = '';
                $action_html = '<a  '.get_tooltip('Update Menu Category').' href="'. URL::to('admin/menu_category/' . $id . '/edit'). '"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
                return $action_html;

            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['name','links', 'action'])
            ->make(true);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
		$data['title'] = 'Add Menu Category';
		$data['class'] = 'menu_category';
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

        $rules['name_en'] = 'required|string|max:255';
        $rules['name_gr'] = 'required|string|max:255';
        $rules['name_ru'] = 'required|string|max:255';
        $rules['name_he'] = 'required|string|max:255';
        $messages = array();

        $this->validate($request, $rules, $messages);

        $input['cat_key'] = str_slug($input['name_en'], '-');
        $categories = MenuCat::create($input);

        Session::flash('success_message', 'You have successfully added new menu category');

        return redirect($this->resource);
    }

	public function create_link($cat_key) {

            $cat_key = $cat_key;
            $menu_category = MenuCat::where('cat_key', $cat_key)->first();
            //

            $data['title'] = 'Add Link';
            $data['class'] = 'menu_category';
            $data['category'] = $menu_category;
            $data['resource'] = $this->resource;

            return view($this->view_path . '/add_menu_link', $data);
	}


	public function store_link(Request $request) {
		$input = $request->all();

		$rules['name_en'] = 'required|string|max:255';
        $rules['name_ru'] = 'required|string|max:255';
        $rules['name_he'] = 'required|string|max:255';
        $rules['name_gr'] = 'required|string|max:255';
        $rules['link'] = 'required|string|max:255';
		$messages = array();

		$this->validate($request, $rules, $messages);

		$links = MenuLink::create($input);
		$cat_key=$input['cat_key'];
		$message_success=Session::flash('success_message', 'You have successfully added new Link');
        return Redirect('admin/menu_category/get_menu_links/'.$cat_key);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Categories  $categories
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
        $id = Hashids::decode($id)[0];
		//
		try {
			$categories = MenuCat::findOrFail($id);

			$data['title'] = 'Update Menu Category';
			$data['categories'] = $categories;
			$data['class'] = 'menu_category';
			return view($this->view_path . '/edit', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}

	public function edit_link($id) {

		//
		try {
			$id = Hashids::decode($id)[0];

			$menu_link = MenuLink::findOrFail($id);

			$data['title'] = 'Update Link';
			$data['menu_link'] = $menu_link;
			$data['class'] = 'menu_category';
			$data['edit']='set';

			return view($this->view_path . '/edit_link', $data);
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

		$categories = MenuCat::findOrFail($id);

		$rules['name_en'] = 'required|string|max:255';
        $rules['name_ru'] = 'required|string|max:255';
        $rules['name_gr'] = 'required|string|max:255';
        $rules['name_he'] = 'required|string|max:255';

		$messages = array();

		$this->validate($request, $rules, $messages);

        $categories->update($input);

		Session::flash('success_message', 'Menun Category has been successfully updated.');
		return redirect($this->resource);

	}

	public function updateLink($id,Request $request) {
		//
		$input = $request->all();

		$links = MenuLink::findOrFail($id);

		$rules['name_en'] = 'required|string|max:255';
        $rules['name_gr'] = 'required|string|max:255';
        $rules['name_ru'] = 'required|string|max:255';
        $rules['name_he'] = 'required|string|max:255';
        $rules['link'] = 'required|string|max:255';
		$messages = array();

		$this->validate($request, $rules, $messages);
        $cat_key = $links->cat_key;
		$links->update($input);

		Session::flash('success_message', 'Link has been successfully updated.');
		$idss = Hashids::encode($links->id);
        return Redirect('admin/menu_category/get_menu_links/'.$cat_key);

	}


    function GetLinks($cat_key){
           $cat_key = $cat_key;

            $data['title'] = 'Links';
            $data['class'] = 'menu_category';

            $data['category_key'] = $cat_key;

            $data['menu_links'] = MenuLink::where('cat_key',$cat_key)->get();

            $data['resource']       = $this->resource;
            return view($this->view_path.'/listing_links',$data);
    }


    ////
    public function getMenuLinksAll($cat_key, Request $request) {

        $input=$request->all();

        $all_data = MenuLink::where('cat_key',$cat_key)->get();

        return Datatables::of($all_data)

            ->addColumn('name', function ($single) {
                return $single->name_en;
            })

            ->addColumn('action', function ($single) {
                $id = Hashids::encode($single->id);
                $action_html = '';
                $action_html = '<a  '.get_tooltip('Update Link').'  href="' . URL::to('admin/menu_category/edit_menu_link/' . $id . '') . '"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;';
                return $action_html;

            })
            ->editColumn('id', 'ID: {{$id}}')
            ->rawColumns(['name', 'action'])
            ->make(true);
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
			$categories = MenuCat::findOrFail($id);

			$categories->delete();
			Session::flash('success_message', 'Category has been successfully deleted.');
			$response = 'success';
			return $response;
			// echo 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
	}


}
