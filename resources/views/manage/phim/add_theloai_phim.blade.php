

  @extends('layout')
  @section('content')
      
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="col">
          {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
          <div class="col-lg-6">
              <div class="p-5">
                  <div class="text-center">
                        <h3>Chọn thể loại phim</h3>
                  </div>
                  @if(request()->session()->get('error_exist')!=null)
                  
                    <h4 class="text-danger">Thể loại này đã tồn tại</h4>
                  
                  @endif
                  <form class="user" method="POST" action="{{url('phim/create/add_theloai/'.request()->session()->get('id_phim_new'))}}">
                    @csrf
                    <div class="form-group">
                      <label class="text-dark" for="TenPhim">Thể loại</label>
                      <select name="TenTheLoai" id="">
                        @foreach ($loaiphim as $item)
                             <option  name="TenTheLoai">{{$item->TenLoaiPhim}} </option>
                        @endforeach
                      </select>                 
                     </div>
                      <button class="btn btn-primary btn-user btn-block">Thêm</button>
                      
                  </form>
                 
                  <hr>

              </div>

              <a id="add-data" type="submit" class="btn btn-primary btn-user btn-block" href="/phim/index">Kết thúc</a>
          </div>
      </div>
  </div>
</div>


  @endsection
  
 