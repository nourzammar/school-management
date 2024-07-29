@extends('layouts.app')
@section('content')


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Parent Children List (Total:{{$getRecord->total()}})</h1>
        </div>
     
        <div class="col-sm-6">
         
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      
        
      
      
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          @include('message')
          <!-- /.card -->

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Student List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Profile Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
             
                </tbody>
              </table>
              <div style="padding:10px; float:right;">
      
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Parent Children List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Profile Picture</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Mobile Number</th>
                    <th>Address</th>
                    <th>Work</th>
                    <th>Email</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
             
                </tbody>
              </table>
              <div style="padding:10px; float:right;">
      
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
@endsection 