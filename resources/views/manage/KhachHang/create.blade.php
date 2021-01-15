@extends('layout')
@section('content')
<div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h2 mb-2 text-center text-success">Khách hàng</h1>


               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                    <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                   Thêm Khách hàng mới
                                </h6>

                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">

                                <form  method="POST" action="{{route('customers.store')}}" enctype="multipart/form-data" >
                                    @csrf
                                     <div class="form-group">
                                        <label class="control-label"> Tài khoản </label>
                                        <input class="form-control" name="TenTK" />
                                        @error('HoTen')
                                        <div class="alert alert-danger">Tên tài khoản không được bỏ trống</div>
                                  @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Mật khẩu </label>
                                        <input class="form-control" name="password" type="password" />
                                        @error('password')
                                        <div class="alert alert-danger">Mật khẩu không hợp lệ</div>
                                  @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Xác nhận mật khẩu </label>
                                        <input class="form-control" name="repassword" type="password" />
                                        @error('repassword')
                                        <div class="alert alert-danger">Xác nhận mật khẩu phải trùng với mật khẩu</div>
                                  @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Họ tên </label>
                                        <input class="form-control" name="HoTen"/>
                                        @error('HoTen')
                                        <div class="alert alert-danger">Họ tên không được bỏ trống</div>
                                  @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ </label>
                                        <input class="form-control" name="DiaChi"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại </label>
                                        <input class="form-control" name="SDT"/>
                                        @error('SDT')
                                              <div class="alert alert-danger">Số điện thoại không hợp lệ</div>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Email </label>
                                        <input class="form-control" name="Email" type="email"/>
                                        @error('Email')
                                        <div class="alert alert-danger">Email không hợp lệ</div>
                                  @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> Thêm Khách hàng mới </button>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div>
                            <a class="btn btn-dark" href = "{{route('customers.index')}}">Danh sách Khách hàng</a>
                        </div>

                    </div>
                </div>



</div>
@endsection
