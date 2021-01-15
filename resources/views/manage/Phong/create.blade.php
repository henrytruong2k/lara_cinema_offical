@extends('layout')
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <div class="col">
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="text-primary">THÊM PHÒNG</h1>
                </div>
                <form class="user" method="POST" action="{{url('/phong/create')}}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label class="text-dark" for="TenPhong">Tên phòng: </label>
                    <input type="text" name="TenPhong" class="form-control form-control-user" id="exampleFirstName" placeholder="Nhập tên phòng">
                    <p class="text-danger">{{ $errors->first('TenPhong') }}</p>
                    
                    <label class="text-dark" for="Day">Rạp: </label>
                    <select class="form-control" id="exampleFirstName" name="rap_id" >
                        @foreach ($data as $item)
                          <option value="{{$item->id}}">{{$item->TenRap}}</option>
                        @endforeach   
                    </select>
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
