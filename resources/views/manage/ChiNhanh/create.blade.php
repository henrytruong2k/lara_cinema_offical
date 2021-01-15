@extends('layout')
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <div class="col">
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="text-primary">THÊM CHI NHÁNH</h1>
                </div>
                <form class="user" method="POST" action="{{url('/chinhanh/create')}}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="text-dark" for="TenChiNhanh">Tên chi nhánh</label>
                    <input type="text" name="TenChiNhanh" class="form-control form-control-user" id="exampleFirstName"  placeholder="Điền tên chi nhánh">
                    <p class="text-danger">{{ $errors->first('TenChiNhanh') }}</p>

                    <label class="text-dark" for="DiaChi">Địa chỉ</label>
                    <input type="text" name="DiaChi" class="form-control form-control-user" id="exampleFirstName"  placeholder="Điền địa chỉ">
                    <p class="text-danger">{{ $errors->first('DiaChi') }}</p>

                    <label class="text-dark" for="DiaChi">SDT</label>
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
