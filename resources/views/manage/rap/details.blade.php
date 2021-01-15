@extends('layout')
@section('content')

 
<div class="site-section">
<div class="container">
    <div class="row">
    
    <div class="col-md-6">
        <h1 class="text-dark">Mã rạp: {{ $data->id }}</h1>
        <h3 class="text-dark">Tên rạp: {{$data->TenRap}}</h3>
        
        <h6 class="text-dark">Địa chỉ: {{$data->DiaChi}}</h6>
        <h6 class="text-dark">SĐT liên hệ: {{$data->SDT}}</h6>
        <h6 class="text-dark">Danh sách <a href="{{url('/phong/')}}">phòng</a> thuộc rạp {{$data->TenRap}}:</h6>
            @if($data->phongs->count() > 0) 
            <ul>
                @foreach($data->phongs as $item) 
                    <li class="text-dark">{{$item->TenPhong}}</li>
                @endforeach
            </ul>
            @else 
                <h6 class="text-dark">Chưa có phòng nào. Vui lòng <a class="btn btn-outline-primary" href="{{url('/rap/create-thuoc')}}">thêm rạp</a> thuộc chi nhánh này</h6>
            @endif
        
        

    </div>
    </div>
</div>
</div>

@endsection