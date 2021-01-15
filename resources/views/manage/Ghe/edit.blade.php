@extends('layout')
@section('content')

<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
    <div class="col">
        <div class="col-lg-6">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="text-primary" style="text-transform: uppercase">SỬA GHẾ</h1>
                </div>
                    <form class="user" method="POST" action="{{url('/ghe/update/'.$data->id)}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                        
                        <label class="text-dark" for="Day">Dãy: </label>
                        <select class="form-control" id="exampleFirstName" name="Day" >
                            @foreach ($day as $item)
                                @if($data->Day == $item)
                                    <option value="{{$item}}" selected>{{$item}}</option>
                                @else 
                                    <option value="{{$item}}">{{$item}}</option>
                                @endif

                            @endforeach
                        </select>

                        <br>
                        <label class="text-dark" for="sort">Vị trí ghế: </label>
                        <select class="form-control" id="exampleFirstName" name="sort" >
                            @foreach ($vitri as $item)
                            @if($data->sort == $item)
                                    <option value="{{$item}}" selected>{{$item}}</option>
                                @else 
                                    <option value="{{$item}}">{{$item}}</option>
                                @endif
                            @endforeach   
                        </select>
                        
                        <br>
                        <label class="text-dark" for="Day">Phòng: </label>
                        <select class="form-control" id="exampleFirstName" name="phong_id" >
                            @foreach ($phong as $item)
                            @if($item->id == $data->phong->id)
                                    <option value="{{$item->id}}" selected>{{$item->TenPhong}}</option>
                                @else 
                                    <option value="{{$item->id}}">{{$item->TenPhong}}</option>
                                @endif
                            @endforeach   
                        </select>
                        <br>
                        <label class="text-dark" for="GiaGhe">Giá: </label>
                        <input type="number" name="GiaGhe" class="form-control form-control-user" id="exampleFirstName" min="30000" value="{{$data->GiaGhe}}">
                 
                        
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
