@extends('layout')
@section('content')

 
    <div class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <img src="{{$phim->HinhAnh}}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-6">
              <h1 class="text-dark">{{$phim->TenPhim}}</h1>
              <h6 class="text-dark">Đạo diễn: {{$phim->DaoDien}}</h6><br>
              @if($phim->dienviens->count() > 0)
              <h6 class="text-dark">Diễn viên: 
                @foreach ($phim->dienviens as $item)
                    {{$item->TenDienVien}}
                @endforeach
             </h6>
             
              @else 
                <h6 class="text-dark">Diễn viên: Chưa có diễn viên</h6> <a class="btn btn-outline-primary" href="/phim/add_dienvien">Thêm diễn viên nha cu</a>
                <br>
                <br>
              @endif
              <h6 class="text-dark">Quốc gia: {{$phim->quocgias->TenQuocGia}}</h6><br>
              <h6 class="text-dark">Thời lượng: {{$phim->ThoiLuong}} phút</h6><br>
              <h6 class="text-dark">Thể loại: 
                @foreach ($phim->theloais as $item)
                    {{$item->TenLoaiPhim}}
                @endforeach
            
              </h6><br>
              
              <h6 class="text-dark">Độ tuổi: {{$phim->gioihantuoi->TenGioiHan}}</h6><br>
              <h6 class="text-dark">Ngày đăng kí chiếu: {{$phim->NgayDKChieu}}</h6><br>
              <h6 class="text-dark">Ngày kết thúc chiếu:{{$phim->NgayKetThuc}}</h6><br>

              @if ($phim->TrangThai==1)
                 <h6 class="text-dark">Trạng thái: Đang chiếu</h6><br>
              @else
                 <h6 class="text-dark">Trạng thái: Đã kết thúc</h6><br>
              @endif
           
           
  
            </div>
          </div>
        </div>
      </div>

@endsection