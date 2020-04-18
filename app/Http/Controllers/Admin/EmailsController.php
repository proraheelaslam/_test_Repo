<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;
use Datatables;
use Validator;
use Hashids;
use Session;

class EmailsController extends Controller
{
    public $resource = 'admin/emails';
    public $view_path = 'admin/manage_emails';
    public $class_name = 'email';
    
    protected $rules =[
        'content' => 'required',
        'name' => 'required',
        'subject' => 'required',
    ];
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']          = 'All System Emails';
		 $data['class'] = $this->class_name;
        $data['resource']       = $this->resource;
        $data['all_emails']     =  Email::orderBy('created_at','desc')->get();
        return view($this->view_path.'/listing',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
		 $data['class'] = $this->class_name;
        $data['title']          = 'Create Email';
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
        $rules = $this->rules;

        $this->validate($request,$rules);

        $input = $request->all();
        $admin = Email::create($input);
        Session::flash('success_message', 'Email has been successfully created.');
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
        $email     = Email::findOrFail($id);
		 $data['class'] = $this->class_name;
        $data['title']          = 'Edit System Email';
        $data['email']          = $email;

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
        $input = $request->all();
        $rules = $this->rules;
        $this->validate($request,$rules);

        $com    =   Email::findOrFail($id);
        $com->update($input);

        Session::flash('success_message', 'Email has been successfully updated.');
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
