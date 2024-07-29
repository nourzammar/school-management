<?php

namespace App\Http\Controllers;

use App\models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class SubjectController extends Controller
{
    public function list()
    {
        $getRecord['getRecord']= SubjectModel::getRecord();
        $data['header_title'] = "Subject List";
        return view('admin.subject.list',$data, $getRecord);
    }
    public function add()
    {
        $data['header_title'] = "Add Subject";
        return view('admin.subject.add',$data);
    }
    public function insert(Request $request)
    {
        $subject = new SubjectModel;
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;
        $subject->created_by = Auth::user()->id;
        $subject->save();
        return redirect('admin/subject/list')->with('success', 'Subject Successfully Created');
    }
    public function edit($id)
    {
        $getRecord['getRecord'] = SubjectModel::getSingle($id);
        if(!empty($getRecord['getRecord']))
        {
            $getRecord['getRecord']= SubjectModel::getSingle($id);
            $data['header_title'] = "Edit Subject ";
            return view('admin.subject.edit', $data,$getRecord );
        }
        else
        {
            abort(404);
        }
       
    }
    public function update($id , Request $request)
    {
       
        $subject = SubjectModel::getSingle($id);
        $subject->name = $request->name;
        $subject->type = $request->type;
        $subject->status = $request->status;  
        $subject->save();
        return redirect('admin/subject/list')->with('success', 'Subject Successfully Updated');
    }
    public function delete($id)
    {
        $subject = SubjectModel::getSingle($id);
        $subject->is_delete = 1;
        $subject->save();
        return redirect()->back()->with('error', 'Subject Successfully Deleted');
    }
}

