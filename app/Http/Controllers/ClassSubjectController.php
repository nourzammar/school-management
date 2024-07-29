<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ClassSubjectModel;
use App\Models\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassSubjectController extends Controller
{
    public function list()
    {
        $getRecord['getRecord'] = ClassSubjectModel::getRecord();
        $data['header_title'] = " Subject Assign List";
        return view('admin.assign_subject.list', $data, $getRecord);
    }
    public function add()
    {
        $getClassSubject['getSubject'] = SubjectModel::getSubject();
        $getClassSubject['getClass'] = ClassModel::getClass();
        $data['header_title'] = "Add New  Subject Assign";
        return view('admin.assign_subject.add', $data, $getClassSubject);
    }
    public function insert(Request $request)
    {
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new ClassSubjectModel;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
            return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assign To Class');
        } else {
            return redirect()->back()->with('error', 'You Do Some Error Pls Try Agin');
        }
    }
    public function delete($id)
    {
        $class = ClassSubjectModel::getSingle($id);
        $class->is_delete = 1;
        $class->save();
        return redirect()->back()->with('error', 'Record Successfully Deleted');
    }
    public function edit($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $data['getAssignSubjectID'] = ClassSubjectModel::getAssignSubjectID($getRecord->class_id);
            $getClassSubject['getSubject'] = SubjectModel::getSubject();
            $getClassSubject['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit Subject Assign";
            return view('admin.assign_subject.edit', $data, $getClassSubject);
        } else {
            abort(404);
        }
    }
    public function update(Request $request)
    {
        ClassSubjectModel::deleteSubject($request->class_id);
        if (!empty($request->subject_id)) {
            foreach ($request->subject_id as $subject_id) {
                $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $subject_id);
                if (!empty($getAlreadyFirst)) {
                    $getAlreadyFirst->status = $request->status;
                    $getAlreadyFirst->save();
                } else {
                    $save = new ClassSubjectModel;
                    $save->class_id = $request->class_id;
                    $save->subject_id = $subject_id;
                    $save->status = $request->status == true;
                    $save->created_by = Auth::user()->id;
                    $save->save();
                }
            }
        }
        return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assign To Class');
    }
    public function edit_single($id)
    {
        $getRecord = ClassSubjectModel::getSingle($id);
        if (!empty($getRecord)) {
            $data['getRecord'] = $getRecord;
            $getClassSubject['getSubject'] = SubjectModel::getSubject();
            $getClassSubject['getClass'] = ClassModel::getClass();
            $data['header_title'] = "Edit Subject Assign";
            return view('admin.assign_subject.edit_single', $data, $getClassSubject);
        } else {
            abort(404);
        }
    }
    public function update_single(Request $request, $id)
    {

        $getAlreadyFirst = ClassSubjectModel::getAlreadyFirst($request->class_id, $request->subject_id);
        if (!empty($getAlreadyFirst)) {
            $getAlreadyFirst->status = $request->status;
            $getAlreadyFirst->save();
            return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Updated');
        }
         else 
        {
            $save = ClassSubjectModel::getSingle($id);
            $save->class_id = $request->class_id;
            $save->subject_id = $request->subject_id;
            $save->status = $request->status;
            $save->created_by = Auth::user()->id;
            $save->save();
            return redirect('admin/assign_subject/list')->with('success', 'Subject Successfully Assign To Class');
        }
    }
}
