@extends('layout')
@section('content')
<div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h2 mb-2 text-center text-success">Khách hàng</h1>


               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                    <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                  Sửa khách hàng
                                </h6>

                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">

                                <form  method="POST" action="{{route('customers.update',$khachhang->id)}}" enctype="multipart/form-data" >
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label class="control-label">Họ tên </label>
                                        <input value="{{$khachhang->HoTen}}" class="form-control" name="HoTen"/>
                                        @error('HoTen')
                                        <div class="alert alert-danger">Họ tên không được để trống</div>
                                  @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Address </label>
                                        <input value="{{$khachhang->DiaChi}}" class="form-control" name="DiaChi"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Phone </label>
                                        <input value="{{$khachhang->SDT}}" class="form-control" name="SDT"/>
                                        @error('SDT')
                                        <div class="alert alert-danger">Số điện thoại không hợp lệ</div>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Email </label>
                                        <input value="{{$khachhang->Email}}" class="form-control" name="Email" type="email"/>
                                        @error('Email')
                                              <div class="alert alert-danger">Email không hợp lệ</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> Cập nhật </button>
                                    </div>

                                </form>


                            </div>
                        </div>

                        <div>
                            <a class="btn btn-dark" href = "{{route('customers.index')}}">Danh sách khách hàng</a>
                        </div>

                    </div>
                </div>



</div>
@endsection
