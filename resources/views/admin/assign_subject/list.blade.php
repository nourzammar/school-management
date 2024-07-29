@extends('layouts.app')
@section('content')


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            {{-- (Total:{{$getRecord->total()}}) --}}
          <h1>Subject Assign List </h1>
        </div>
        <div class="col-sm-6" style="text-align:right;">
          <a href="{{url('admin/assign_subject/add')}}" class="btn-btn.primary">Add New Subject Assign</a>
        </div>
        <div class="col-sm-6">
       
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Search Subject Assign</h3>
            </div>
            <form method="get" action="">
              <div class="card-body">
                <div class="row">
                
                  <div class="form-group col-md-3">
                      <label> Class Name</label>
                      <input type="text" class="form-control" name="class_name" value="{{ Request::get('class_name')}}" placeholder="Class_name">
                    </div>
                  <div class="form-group col-md-3">
                      <label> Subject Name</label>
                      <input type="text" class="form-control" name="subject_name" value="{{ Request::get('subject_name')}}" placeholder="Subject_name">
                    </div>
                <div class="form-group col-md-3">
                  <label >Date</label>
                  <input type="date" class="form-control" name="date" value="{{ Request::get('date')}}"  placeholder="date">
                  <div style="color: red">{{$errors->first('email')}}</div>
                </div>
                   <div class="form-group col-md-3">
                    <button class="btn btn-primary" type="submit" style="margin-top: 30px"> Search</button>
                    <a  href="{{url('admin/assign_subject/list')}}" class="btn btn-success"  style="margin-top: 30px"> Reset</a>
                    </div>
              
              </div>
              </div>
            </form>
          </div>
      
      
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        
      <div class="row">
    
        <!-- /.col -->    @include('message')
        <div class="col-md-12">
         
         

          <div class="card">
          
            <div class="card-header">
                
              <h3 class="card-title">Subject Assign List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Class Name</th>
                    <th>Subject Name</th>
                    <th>Subject Type</th>
                    <th>Status</th>
                    <th>Created By</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($getRecord as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->class_name}}</td>
                        <td>{{$value->subject_name}}</td>
                        <td>{{$value->subject_type}}</td>
                        <td>@if ($value->status==0)
                            Active
                        @else
                        Inactive
                        @endif</td>
                        <td>{{$value->created_by_name}}</td>
                        <td>{{date('d-m-y h:i A', strtotime($value->created_at)) }}</td>
                        {{-- <td>{{$value->}}</td> --}}
                        <td>
                            <a href="{{url('admin/assign_subject/edit/'.$value->id)}}" class="btn btn-primary">Edit</a>
                            <a href="{{url('admin/assign_subject/edit_single/'.$value->id)}}" class="btn btn-primary">Edit Single</a>
                            <a href="{{url('admin/assign_subject/delete/'.$value->id)}}" class="btn btn-danger">Delete</a>
                          </td>
                    </tr>
                        
                    @endforeach
                  </tbody>
              </table>
              <div style="padding:10px; float:right;">
                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                </div>
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