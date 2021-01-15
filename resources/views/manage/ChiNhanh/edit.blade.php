@extends('layout')
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <div class="col">
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="text-primary" style="text-transform: uppercase">SỬA {{$data->TenChiNhanh}}</h1>
                </div>
                  <form class="user" method="POST" action="{{url('/chinhanh/update/'.$data->id)}}">
                    {{ csrf_field() }}
                      <div class="form-group">
                        <label class="text-dark" for="TenChiNhanh">Tên chi nhánh: </label>
                        <input type="text" name="TenChiNhanh" class="form-control form-control-user" id="exampleFirstName"  value="{{$data->TenChiNhanh}}">
                        <p class="text-danger">{{ $errors->first('TenChiNhanh') }}</p>
                        
                        <label class="text-dark" for="DiaChi">Địa chỉ: </label>
                        <input type="text" name="DiaChi" class="form-control form-control-user" id="exampleFirstName"  value="{{$data->DiaChi}}">
                        <p class="text-danger">{{ $errors->first('DiaChi') }}</p>

                        <label class="text-dark" for="SDT">SĐT: </label>
                        <input type="text" name="SDT" class="form-control form-control-user" id="exampleFirstName"  value="{{$data->SDT}}">
                        <p class="text-danger">{{ $errors->first('SDT') }}</p>
                        

                        
                      </div>
                      <button class="btn btn-primary btn-user btn-block">Cập nhật</button>
                  </form>
                  <hr>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
