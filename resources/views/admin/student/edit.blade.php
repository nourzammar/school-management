@extends('layouts.app')
@section('content')

<div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit Student</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <form method="POST" action="" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-6" >
                            <label >First Name</label>
                            <input type="text" class="form-control" name="name"   value="{{old('name',$getRecord->name)}}" placeholder="First Name">
                            <div style="color: red">{{$errors->first('name')}}</div>
                          </div>
                        <div class="form-group col-md-6">
                            <label >Last Name </label>
                            <input type="text" class="form-control" name="last_name"   value="{{old('last_name',$getRecord->last_name)}}" placeholder="Last Name">
                            <div style="color: red">{{$errors->first('last_name')}}</div>
                          </div>
                          <div class="form-group col-md-6">
                            <label >Admissign Nubmer</label>
                            <input type="text" class="form-control" name="admissign_number"   value="{{old('admissign_number',$getRecord->admissign_number)}}" placeholder="Admissign Number">
                          </div>
    
                        <div class="form-group col-md-6 ">
                            <label >Roll Nubmer</label>
                            <input type="text" class="form-control" name="roll_nubmer"   value="{{old('roll_nubmer',$getRecord->roll_number)}}" placeholder="Roll Nubmer">
                          </div>
    
                        <div class="form-group col-md-6  ">
                            <label >Class <span style="color: red;"></span> </label>
                            <select class="form-control"   name="class_id">
                            <option value="">Select Class</option>
                            @foreach ($getClass as $value )
                            <option {{(old('class_id',$getRecord->class_id)==$value->id)? 'selected':''}} value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                            </select>
                          </div>
    
                        <div class="form-group col-md-6">
                            <label >Gender <span style="color: red;"></span> </label>
                            <select class="form-control"   name="gender">
                            <option value="">Select Genderr</option>
                            <option {{(old('gender',$getRecord->gender)=='male')? 'selected':''}}value="male">Male</option>
                            <option {{(old('gender',$getRecord->gender)=='female')? 'selected':''}} value="female">Female</option>
                            </select>
                          </div>
    
                          <div class="form-group col-md-6">
                            <label >Birthday</label>
                            <input type="date" class="form-control" name="birthday"   value="{{old('birthday',$getRecord->birthday)}}" placeholder="birthday">
                          </div>


                          <div class="form-group col-md-6">
                            <label >Caste</label>
                            <input type="text" class="form-control" name="caste"   value="{{old('caste',$getRecord->cast)}}" placeholder="Caste">
                          </div>

                          <div class="form-group col-md-6">
                            <label >Address</label>
                            <input type="text" class="form-control" name="address"   value="{{old('address',$getRecord->address)}}" placeholder="Address">
                          </div>

                          <div class="form-group col-md-6">
                            <label >Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number"   value="{{old('mobile_number',$getRecord->mobile_number)}}" placeholder="Mobile Number">
                          </div>

                          <div class="form-group col-md-6">
                            <label >Admissign Date</label>
                            <input type="date" class="form-control" name="admissign_date"   value="{{old('admissign_date',$getRecord->admissign_date)}}"  >
                          </div>

                          <div class="form-group col-md-6">
                            <label >Profile Pic</label>
                            <input type="file" class="form-control" name="profile_pic"    placeholder="Profile Pic">
                          </div>

                          <div class="form-group col-md-6">
                            <label >Blood Group</label>
                            <input type="text" class="form-control" name="blood_group"   value="{{old('blood_group',$getRecord->blood_group)}}" placeholder="Blood Group">
                          </div>

                          <div class="form-group col-md-6">
                            <label >Height</label>
                            <input type="text" class="form-control" name="height"   value="{{old('height',$getRecord->height)}}" placeholder="Height">
                          </div>  

                          <div class="form-group col-md-6">
                            <label >Weight</label>
                            <input type="text" class="form-control" name="weight"   value="{{old('weight',$getRecord->weight)}}" placeholder="Weight">
                          </div>
                          <div class="form-group col-md-6">
                            <label >Statuse <span style="color: red;"></span> </label>
                            <select class="form-control"   name="status">
                            <option value="">Select Statuse</option>
                            <option {{(old('status',$getRecord->status)=='0')? 'selected':''}} value="0">Active</option>
                            <option {{(old('status',$getRecord->status)=='1')? 'selected':''}} value="1">inactive</option>
                            </select>
                          </div>
    
                    </div>
                  <div class="form-group">
                    <label >Email address</label>
                    <input type="email" class="form-control" name="email" value="{{old('email',$getRecord->email)}}"   placeholder="Email">
                    <div style="color: red">{{$errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="password"   placeholder="Password">
                    <p>Due You Want To Change Password?</p>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection 