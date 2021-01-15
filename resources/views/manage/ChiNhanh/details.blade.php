@extends('layout')
@section('content')

 
<div class="site-section">
<div class="container">
    <div class="row">
    
    <div class="col-md-6">
        <h1 class="text-dark">Mã chi nhánh: {{$data->id}}</h1>
        <h3 class="text-dark">Tên chi nhánh: {{$data->TenChiNhanh}}</h3>
        
        <h6 class="text-dark">Địa chỉ: {{$data->DiaChi}}</h6>
        <h6 class="text-dark">SĐT liên hệ: {{$data->SDT}}</h6>
        <h6 class="text-dark">Danh sách <a href="{{url('/rap/')}}">rạp</a> thuộc chi nhánh {{$data->TenChiNhanh}}:</h6>
        
            @if($data->raps->count() > 0) 
            <ul>
                @foreach($data->raps as $item) 
                    <li class="text-dark">{{$item->TenRap}}</li>
                @endforeach
            </ul>
            @else 
                <h6 class="text-dark">Chưa có rạp nào. Vui lòng <a class="btn btn-outline-primary" href="{{url('/rap/create-thuoc')}}">thêm rạp</a> thuộc chi nhánh này</h6>
            @endif
        
        

    </div>
    </div>
</div>
</div>

@endsection