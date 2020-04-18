<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\FaqType;
use DataTables;
use Session;
use Hashids;

class FaqTypeController extends Controller
{

    protected $resource = 'admin/faq_types';
    protected $view_path = 'admin/manage_faq/faq_types';
    protected $rules     = [
                                'type_en' => 'required|max:250',
                                'type_gr' => 'required|max:250',
                                'type_ru' => 'required|max:250',
                                'type_he' => 'required|max:250',
                            ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resource = $this->resource;
        if ($request->ajax()) {
            $data  = FaqType::query();
            return Datatables::of($data, $resource)
                ->editColumn('type_en', function($data) {
                    return $data->type_en.'/'.$data->type_iw.'/'.$data->type_ru.'/'.$data->type_el;
                })
                ->addColumn('action', function($data) use ($resource) {
                    $btn = '<a '. get_tooltip('Edit') .' href="'. URL::to($resource.'/'.Hashids::encode($data->id).'/edit') .' "><i class="fa fa-edit"></i></a>';
                    $btn .= '<a '. get_tooltip('Delete') .'href="javascript:void(0)" onclick="delete_record('. $data->id .')"><i class="fa fa-trash-o"></i></a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $data['title']          = 'FAQ Types';
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
        $data['title'] = 'Add FAQ Type';
		$data['resource'] = $this->resource;
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
        FaqType::create($request->all());
        Session::flash('success_message','FAQ Type created successfully');
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
			$data['title'] = 'Edit FAQ Type';
            $data['faq']   = FaqType::findOrFail($id);
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
        FaqType::findOrFail($id)->update($request->all());
        Session::flash('success_message','FAQ Type has been successfully updated');
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
            $faq = FaqType::findOrFail($id);

            if($faq->faqs->count()>0){
                Session::flash('error_message', 'FAQ Type deleting unsuccessfull! FAQ Type belongs to one or more FAQ');
                return 'error';
            }

            $faq->delete();
			Session::flash('success_message', 'FAQ Type has been successfully deleted.');
			return 'success';
		} catch (\Exception $e) {
			return redirect($this->resource);
		}
    }
}
