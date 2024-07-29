@extends('layouts.app')
@section('content')

<div class="content-wrapper" style="min-height: 1345.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Edit Subject</h1>
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
                        <label >Subject Name</label>
                        <input type="text" class="form-control" name="name"  value="{{$getRecord->name}}" placeholder="Subject Name">
                      </div>
                      <div class="form-group">
                        <label >Subject Type</label>
                        <select class="form-control" name="type" >
                        <option value=""> Select Type</option>
                        <option  {{($getRecord->type==1)?'selected' :''}} value="Theory">Theory</option>
                        <option  {{($getRecord->type==1)?'selected' :''}} value="Practical">Practical</option>
                       
                      </select>
                </div>
                <div class="form-group">
                        <label >Status</label>
                        <select class="form-control" name="status">
                            <option value="0">Active</option>
                            <option value="1">Inactive</option>
                      </select>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Uodate</button>
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