@extends('layouts.app')
@section('content')

<div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Add New Parent</h1>
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
                            <input type="text" class="form-control" name="name" required value="{{old('name')}}" placeholder="First Name">
                            <div style="color: red">{{$errors->first('name')}}</div>
                          </div>
                        <div class="form-group col-md-6">
                            <label >Last Name </label>
                            <input type="text" class="form-control" name="last_name" required value="{{old('last_name')}}" placeholder="Last Name">
                            <div style="color: red">{{$errors->first('last_name')}}</div>
                          </div>
                          
    
                        <div class="form-group col-md-6">
                            <label >Gender <span style="color: red;"></span> </label>
                            <select class="form-control" required name="gender">
                            <option value="">Select Genderr</option>
                            <option {{(old('gender')=='Male')? 'selected':''}}value="male">Male</option>
                            <option {{(old('gender')=='Female')? 'selected':''}} value="female">Female</option>
                            </select>
                          </div>

                          <div class="form-group col-md-6">
                            <label >Address</label>
                            <input type="text" class="form-control" name="address" required value="{{old('address')}}" placeholder="Address">
                          </div>

                          <div class="form-group col-md-6">
                            <label >Mobile Number</label>
                            <input type="text" class="form-control" name="mobile_number" required value="{{old('mobile_number')}}" placeholder="Mobile Number">
                          </div>

                          <div class="form-group col-md-6">
                            <label >Profile Pic</label>
                            <input type="file" class="form-control" name="profile_pic" required  placeholder="Profile Pic">
                          </div>

                          <div class="form-group col-md-6">
                            <label >Work</label>
                            <input type="text" class="form-control" name="work" required value="{{old('work')}}" placeholder="work">
                        </div>

                          <div class="form-group col-md-6">
                            <label >Statuse <span style="color: red;"></span> </label>
                            <select class="form-control" required name="status">
                            <option value="">Select Statuse</option>
                            <option {{(old('status')=='0')? 'selected':''}} value="0">Active</option>
                            <option {{(old('status')=='1')? 'selected':''}} value="1">inactive</option>
                            </select>
                          </div>
    
                    </div>
                  <div class="form-group">
                    <label >Email address</label>
                    <input type="email" class="form-control" name="email" value="{{old('email')}}" required placeholder="Email">
                    <div style="color: red">{{$errors->first('email')}}</div>
                  </div>
                  <div class="form-group">
                    <label >Password</label>
                    <input type="password" class="form-control" name="password" required placeholder="Password">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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