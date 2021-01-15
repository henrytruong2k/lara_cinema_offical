@extends('layout')
@section('content')
<div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h2 mb-2 text-center text-success">Nhân viên</h1>


               <!-- DataTales Example -->
               <div class="card shadow mb-4">
                    <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                   Thêm nhân viên mới
                                </h6>

                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">

                                <form  method="POST" action="{{route('employees.store')}}" enctype="multipart/form-data" >
                                    @csrf
                                     <div class="form-group">
                                        <label class="control-label"> Tài khoản </label>
                                        <input class="form-control" name="TenTK" />

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Mật khẩu </label>
                                        <input class="form-control" name="password" type="password" />

                                    </div>
                                    <div class="form-group">
                                        <label class="control-label"> Xác nhận mật khẩu </label>
                                        <input class="form-control" name="repassword" type="password" />
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Họ tên </label>
                                        <input class="form-control" name="HoTen"/>

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
                                        <label class="control-label"> Birthday </label>
                                        <input class="form-control" name="NgSinh" type="date" />

                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Địa chỉ </label>
                                        <input class="form-control" name="DiaChi"/>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label">Số điện thoại </label>
                                        <input class="form-control" name="SDT"/>


                                    </div>

                                    <div class="form-group">
                                        <label class="control-label"> Email </label>
                                        <input class="form-control" name="Email" type="email"/>

                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> Thêm nhân viên mới </button>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div>
                            <a class="btn btn-dark" href = "{{route('employees.index')}}">Danh sách nhân viên</a>
                        </div>

                    </div>
                </div>



</div>
@endsection
