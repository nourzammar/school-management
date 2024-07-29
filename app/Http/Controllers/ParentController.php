<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ParentController extends Controller
{
    public function list()
    {
        $data['getRecord']= User::getParent();
        $data['header_title'] = "Parent List";
        return view('admin.parent.list', $data);
    }
    public function add()
    {
        $data['getRecord']= User::getParent();
        $data['header_title'] = "Parent List";
        return view('admin.parent.add', $data);
    }
    public function insert(Request $request)
    {
        $parent = new User;
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->user_type = 4;
        $parent->gender = trim($request->gender);
        $parent->address = trim($request->address);
        $parent->work = trim($request->work);
        $parent->mobile_number = trim($request->mobile_number);
        if(!empty($request->file('profile_pic')))
       {
          $ext=$request->file('profile_pic')->getClientOriginalExtension();
          $file=$request->file('profile_pic');
          $randomStr = str::random(20);
          $fileName= strtolower($randomStr).'.'.$ext;
          $file->move('upload/profile/', $fileName);
          $parent->profile_pic = $fileName;
       }
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        $parent->password= Hash::make($request->password);
        $parent->save();
        return redirect('admin/parent/list')->with('success', 'Parent Successfuly Created');
    }
    public function edit($id)
    {
        $data['getRecord']=User::getSingle($id);
        $data['header_title'] = "Parent List";
        return view('admin.parent.edit', $data);

    }
    
    public function update($id, Request $request)
    {
        $parent =  User::getSingle($id);
        $parent->name = trim($request->name);
        $parent->last_name = trim($request->last_name);
        $parent->gender = trim($request->gender);
        $parent->address = trim($request->address);
        $parent->work = trim($request->work);
        $parent->mobile_number = trim($request->mobile_number);
        if(!empty($request->file('profile_pic')))
       {
          $ext=$request->file('profile_pic')->getClientOriginalExtension();
          $file=$request->file('profile_pic');
          $randomStr = str::random(20);
          $fileName= strtolower($randomStr).'.'.$ext;
          $file->move('upload/profile/', $fileName);
          $parent->profile_pic = $fileName;
       }
        $parent->status = trim($request->status);
        $parent->email = trim($request->email);
        if(!empty($request->password))
        {
            $parent->password= Hash::make($request->password);
        }
        $parent->save();
        return redirect('admin/parent/list')->with('success', 'Parent Successfuly Updated');
    }
    
    public function delete($id)
    {
        $parent = User::getSingle($id);
        $parent->is_delete = 1;
        $parent->save();
        return redirect('admin/parent/list')->with('error', 'Parent Successfully Deleted');
    }
    public function children($id)
    {
        $data['getRecord']= User::getParent();
        $data['header_title'] = "Parent Children List";
        return view('admin.parent.children', $data);
    }
}
