<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PharIo\Manifest\Email;

class StudentController extends Controller
{
    public function list()
    {
        $data['getRecord']= User::getStudent();
        $data['header_title'] = "Student List";
        return view('admin.student.list', $data);
    }
    public function add()
    {

        $data['getClass']= ClassModel::getClass();
        $data['header_title'] = "Add New Student ";
        return view('admin.student.add', $data);
    }
    public function insert(Request $request)
    {
      $student = new User;
      $student->name = trim($request->name);
      $student->last_name = trim($request->last_name);
      $student->user_type = 3;
      $student->admissign_number = trim($request->admissign_number);
      $student->roll_number = trim($request->roll_number);
      $student->class_id = trim($request->class_id);
      $student->gender = trim($request->gender);
      $student->birthday = trim($request->birthday);
      $student->address = trim($request->address);
      $student->caste = trim($request->caste);
      $student->mobile_number = trim($request->mobile_number);
      $student->admissign_date = trim($request->admissign_date);
     if(!empty($request->file('profile_pic')))
     {
        $ext=$request->file('profile_pic')->getClientOriginalExtension();
        $file=$request->file('profile_pic');
        $randomStr = Str::random(20);
        $fileName= strtolower($randomStr).'.'.$ext;
        $file->move('upload/profile/', $fileName);
        $student->profile_pic = $fileName;
     }
      $student->blood_group = trim($request->blood_group);
      $student->height = trim($request->height);
      $student->weight = trim($request->weight);
      $student->status = trim($request->status);
      $student->email = trim($request->email);
      $student->password= Hash::make($request->password);
      $student->save();
      return redirect('admin/student/list')->with('success', 'Student Successfuly Created');
    }
    public function edit($id)
    {
        $data['getRecord']= User::getSingle($id);
       if(!empty($data['getRecord']))
       {
        $data['getClass']= ClassModel::getClass();
        $data['header_title'] = "Edit Student ";
        return view('admin.student.edit', $data);
       } 
       else
       {
        abort(404);
       }
    }
    public function update($id , Request $request)
    {
        $student =  User::getSingle($id);
        $student->name = trim($request->name);
        $student->last_name = trim($request->last_name);
        $student->admissign_number = trim($request->admissign_number);
        $student->roll_number = trim($request->roll_number);
        $student->class_id = trim($request->class_id);
        $student->gender = trim($request->gender);
        $student->birthday = trim($request->birthday);
        $student->address = trim($request->address);
        $student->caste = trim($request->caste);
        $student->mobile_number = trim($request->mobile_number);
        $student->admissign_date = trim($request->admissign_date);
       if(!empty($request->file('profile_pic')))
       {
          $ext=$request->file('profile_pic')->getClientOriginalExtension();
          $file=$request->file('profile_pic');
          $randomStr = Str::random(20);
          $fileName= strtolower($randomStr).'.'.$ext;
          $file->move('upload/profile/', $fileName);
          $student->profile_pic = $fileName;
       }
        $student->blood_group = trim($request->blood_group);
        $student->height = trim($request->height);
        $student->weight = trim($request->weight);
        $student->status = trim($request->status);
        $student->email = trim($request->email);
        if(!empty($request->password))
        {
            $student->password= Hash::make($request->password);
        }
        
        $student->save();
        return redirect('admin/student/list')->with('success', 'Student Successfuly Update');
    }
    public function delete($id)
    {
        $student = User::getSingle($id);
        $student->is_delete = 1;
        $student->save();
        return redirect('admin/student/list')->with('error', 'Student Successfully Deleted');
    }
}
