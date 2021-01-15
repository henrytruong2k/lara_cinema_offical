@extends('layout')
@section('content')
<div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h2 mb-2 text-center text-success">Employees</h1>


               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                    <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    Edit employee
                                </h6>

                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">

                                <form  method="POST" action="{{route('employees.update',$nhanvien->MaNV)}}" enctype="multipart/form-data" >
                                    @csrf
                                    @method('PUT')





                                    <div class="form-group">
                                        <label class="control-label">Họ Tên </label>
                                        <input value="{{$nhanvien->HoTen}}" class="form-control" name="HoTen"/>
                                        @error('TenNV')
                                        <div class="alert alert-danger">Họ tên không được để trống</div>
                                  @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Position </label> <br>
                                        <select name="ChucVu">
                                            @foreach ($chucvus as $chucvu)
                                                <option value="{{$chucvu->MaCV}}">
                                                    {{$chucvu->TenCV}}
                                                </option>
                                            @endforeach
                                        <select>
                                    </div>



                                    <div class="form-group">
                                        <label class="control-label"> Ảnh </label>
                                        <input class="form-control" name="Anh" type="file" />

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Ngày sinh </label>
                                        <input value="{{$nhanvien->NgSinh}}" class="form-control" name="NgSinh" type="date" />
                                        @error('NgSinh')
                                        <div class="alert alert-danger">Ngày sinh không hợp lệ</div>
                                  @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ </label>
                                        <input value="{{$nhanvien->DiaChi}}" class="form-control" name="DiaChi"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">SĐT </label>
                                        <input value="{{$nhanvien->SDT}}" class="form-control" name="SDT"/>
                                        @error('SDT')
                                        <div class="alert alert-danger">Số điện thoại không hợp lệ</div>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Email </label>
                                        <input value="{{$nhanvien->Email}}" class="form-control" name="Email" type="email"/>
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
                            <a class="btn btn-dark" href = "{{route('employees.index')}}">Danh sách sản phẩm</a>
                        </div>

                    </div>
                </div>



</div>
@endsection
