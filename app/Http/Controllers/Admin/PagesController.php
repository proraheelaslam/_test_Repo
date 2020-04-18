<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Page;
use DataTables;
use Validator;
use Response;
use Session;
use Crypt;
use DB;

class PagesController extends Controller
{
    public $resource = 'admin/content_pages';
    public $view_path = 'admin/manage_pages';
    public $class_name = 'pages';

    protected $rules =
    [
        'page_title' => 'required',
        'page_description' => 'required',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Pages';
        $data['class'] = $this->class_name;
        $data['all_pages'] = Page::all();
        $data['resource']       = $this->resource;
        return view($this->view_path.'/listing',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Page';
        $data['class'] = $this->class_name;
        $data['resource']       = $this->resource;
        return view($this->view_path.'/add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

		$input = $request->all();

		$rules['name'] = 'required|string|max:255';

		$rules['meta_title'] = 'required|string|max:255';

		$rules['meta_description'] = 'required|string';

		$rules['content'] = 'required|string';

		$messages = array();

		$this->validate($request, $rules, $messages);



        $input['key'] = str_slug($input['name']);
        $event = Page::create($input);

        Session::flash('success_message', 'Content Page has been successfully added.');
        return redirect($this->resource);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event         = Page::findOrFail($id);
        $data['class']  = $this->class_name;
        $data['title']          = 'Edit Page';
        $data['page']  = $event;

        return view($this->view_path.'/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

		$rules['name'] = 'required|string|max:255';

		$rules['name_ru'] = 'required|string|max:255';

		$rules['name_he'] = 'required|string|max:255';

		$rules['name_gr'] = 'required|string|max:255';

		$rules['meta_title'] = 'required|string|max:255';

		$rules['meta_title_ru'] = 'required|string|max:255';

		$rules['meta_title_he'] = 'required|string|max:255';

			$rules['meta_title_gr'] = 'required|string|max:255';

		$rules['meta_description'] = 'required|string';

		$rules['meta_description_ru'] = 'required|string';

		$rules['meta_description_he'] = 'required|string';

		$rules['meta_description_gr'] = 'required|string';

		$rules['content'] = 'required|string';

		$rules['content_ru'] = 'required|string';

		$rules['content_he'] = 'required|string';

		$rules['content_gr'] = 'required|string';


		$messages = array();

		$this->validate($request, $rules, $messages);



        $input = $request->all();
        $com    =   Page::findOrFail($id);
        $com->update($input);


        Session::flash('success_message', 'Content Page has been successfully updated.');
        return redirect($this->resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
