<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqType;
use DataTables;
use Session;
use Hashids;

class FaqController extends Controller
{

    protected $resource  = 'admin/faq';
    protected $view_path = 'admin/manage_faq';
    protected $rules     = [
        'question' => 'required|max:250',
        'answer'   => 'required',
        'type_id'  => 'required|integer|gt:0'
     ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resource   = $this->resource;
        if ($request->ajax()) {
            $data  =  Faq::with('author')->select('faqs.*');
            return Datatables::of($data, $resource)
                ->addColumn('author', function($data) {
                    $authorName = "";
                    if ($data->author != null) {
                        $authorName =  $data->author->name;
                    }
                    return $authorName;
                })
                ->editColumn('answer', function($data) {
                    return $data->answer;
                })
                ->addColumn('action', function($data) use ($resource) {
                    $btn = '<a '. get_tooltip('Edit') .' href="'. URL::to($resource.'/'.Hashids::encode($data->id).'/edit') .' "><i class="fa fa-edit"></i></a>';
                    $btn .= '<a '. get_tooltip('Delete') .'href="javascript:void(0)" onclick="delete_record('. $data->id .')"><i class="fa fa-trash-o"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action','answer'])
                ->make(true);
        }

        $data['title']          = 'FAQ';
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
        $data['resource'] = $this->resource;
        $data['title'] = 'Add FAQ';
        $data['types'] = array_replace([''=>'Select Type'],FaqType::pluck('type_en','id')->toArray());
		return view($this->view_path . '/add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);
        $request['user_id'] = Auth::user()->id;

        Faq::create($request->all());
        Session::flash('success_message','FAQ created successfully');
        return redirect($this->resource);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
			$id = Hashids::decode($id)[0];
			$data['title'] = 'Edit FAQ';
            $data['faq']   = Faq::findOrFail($id);
            $data['types'] = array_replace([''=>'Select Type'],FaqType::pluck('type_en','id')->toArray());
            $data['resource'] = $this->resource;
            return view($this->view_path . '/edit', $data);
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->rules);
        $request['user_id'] = Auth::user()->id;
        Faq::findOrFail($id)->update($request->all());
        Session::flash('success_message','FAQ has been successfully updated');
        return redirect($this->resource);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
			Faq::destroy($id);
			Session::flash('success_message', 'FAQ has been successfully deleted.');
			return 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
    }
}
