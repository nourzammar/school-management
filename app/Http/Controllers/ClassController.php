<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function list()
    {
        $getRecord['getRecord']= ClassModel::getRecord();
        $data['header_title'] = "class List";
        return view('admin.class.list',$data, $getRecord);
    }
    public function add()
    {
        $data['header_title'] = "Add New class";
        return view('admin.class.add',$data);
    }
    public function insert(Request $request)
    {
        $class = new ClassModel;
        $class->name = $request->name;
        $class->status = $request->status;
        $class->created_by = Auth::user()->id;
        $class->save();
        return redirect('admin/class/list')->with('success', 'Class Successfully Created');
    }
    public function edit($id)
    {
        $getRecord['getRecord'] = ClassModel::getSingle($id);
        if(!empty($getRecord['getRecord']))
        {
            $getRecord['getRecord']= ClassModel::getSingle($id);
            $data['header_title'] = "Edit Class ";
            return view('admin.class.edit', $data,$getRecord );
        }
        else
        {
            abort(404);
        }
       
    }
    public function update($id , Request $request)
    {
       
        $class = ClassModel::getSingle($id);
        $class->name = $request->name;
        $class->status = $request->status;  
        $class->save();
        return redirect('admin/class/list')->with('success', 'Class Successfully Updated');
    }
    public function delete($id)
    {
        $class = ClassModel::getSingle($id);
        $class->is_delete = 1;
        $class->save();
        return redirect()->back()->with('error', 'class Successfully Deleted');
    }
    
}
