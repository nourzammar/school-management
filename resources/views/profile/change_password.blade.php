@extends('layouts.app')
@section('content')

<div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Add New Class</h1>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
                @include('message')
              <form method="POST" action="">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group">
                        <label >Old Password</label>
                        <input type="password" class="form-control" name="old_password" required placeholder="old password">
                      </div>
                      
                
                    <div class="form-group">
                        <label >new Password</label>
                        <input type="password" class="form-control" name="new_password" required placeholder="new Password">
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