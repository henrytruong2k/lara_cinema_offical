@extends('layout')
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <div class="col">
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="text-primary">THÊM RẠP MỚI</h1>
                </div>
                <form class="user" method="POST" action="{{url('/rap/create')}}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="text-dark" for="TenRap">Tên rạp: </label>
                    <input type="text" name="TenRap" class="form-control form-control-user" id="exampleFirstName"  placeholder="Điền tên rạp">
                    <p class="text-danger">{{ $errors->first('TenRap') }}</p>

                    <label class="text-dark" for="DiaChi">Địa chỉ: </label>
                    <input type="text" name="DiaChi" class="form-control form-control-user" id="exampleFirstName"  placeholder="Điền địa chỉ">
                    <p class="text-danger">{{ $errors->first('DiaChi') }}</p>

                    <label class="text-dark" for="SDT">SĐT: </label>
                    <input type="text" name="SDT" class="form-control form-control-user" id="exampleFirstName"  placeholder="Điền số điện thoại">
                    <p class="text-danger">{{ $errors->first('SDT') }}</p>
                  </div>
                  <button class="btn btn-primary btn-user btn-block">Thêm mới</button>
                </form>
                <hr>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
