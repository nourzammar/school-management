@extends('layouts.app')
@section('content')

<div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit Admin</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <form method="POST" action="">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control" name="name" value="{{old('name',$getRecord->name)}}" required placeholder="Name">
                      </div>
                  <div class="form-group">
                    <label >Email address</label>
                    <input type="email" class="form-control" name="email" value="{{old('email',$getRecord->email)}}" required placeholder="Email">
                    <div style="color: red">{{$errors->first('email')}}</div>
                  </div>
                  
                  <div class="form-group">
                    <label >Password</label>
                    <input type="text" class="form-control" name="password"  placeholder="Password">
                    <p> Do You Want To Change Password So Please Add New Password</p> 
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
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