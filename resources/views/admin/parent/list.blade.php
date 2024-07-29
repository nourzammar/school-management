@extends('layouts.app')
@section('content')


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Parent List (Total:{{$getRecord->total()}})</h1>
        </div>
        <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/parent/add')}}" class="btn-btn.primary">Add New Parent</a>
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
              <h3 class="card-title">Parent List</h3>
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
                  @foreach ($getRecord as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>
                        <img src="{{$user->getProfile()}}" style="height:50px; width:50%; border-radius:50px;" alt="">
                      </td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->last_name}}</td>
                      <td>{{$user->gender}}</td>
                      <td>{{$user->mobile_number}}</td>
                      <td>{{$user->address}}</td>
                      <td>{{$user->work}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{date('d-m-y h:i A', strtotime($user->created_at)) }}</td>
                      <td>
                        <a href="{{url('admin/parent/edit/'.$user->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('admin/parent/delete/'.$user->id)}}" class="btn btn-danger">Delete</a>
                        <a href="{{url('admin/parent/children/'.$user->id)}}" class="btn btn-primary">My children</a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div style="padding:10px; float:right;">
              {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
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