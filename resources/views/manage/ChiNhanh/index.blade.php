@extends('layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-2 text-center text-success">QUẢN LÝ CHI NHÁNH</h1>
    

    <a href="{{url('/chinhanh/create')}}" class="btn btn-primary">THÊM CHI NHÁNH &nbsp;<i class="fas fa-plus"></i> </a>
    <br/>
    <br/>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-stripped table-hover" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã chi nhánh</th>
                            <th>Tên chi nhánh</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Trạng thái</th>
                            <th colspan="3">Công cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->TenChiNhanh }}</td>
                                <td>{{ $item->DiaChi }}</td>
                                <td>{{ $item->SDT }}</td>
                                <td>
                                    @if($item->TrangThai == 1) 
                                        <a href="{{url('/chinhanh/inactive/'.$item->id)}}" class="btn btn-success">Đang hoạt động</a>
                                    @endif
                                    @if($item->TrangThai == 0) 
                                        <a href="{{url('/chinhanh/active/'.$item->id)}}" class="btn btn-warning">Ngưng hoạt động</a>
                                    @endif
                                </td>

                                <td><a class="btn btn-primary" type="submit" href="{{url('/chinhanh/edit/'.$item->id)}}">Sửa</a></td>
                                <td><a class="btn btn-primary" type="submit" href="{{url('/chinhanh/details/'.$item->id)}}">Chi tiết</a></td>
                                <td><a class="btn btn-danger" type="submit" href="{{url('/chinhanh/delete/'.$item->id)}}" onclick="return confirm('Bạn muốn xóa {{$item->TenChiNhanh}}?')">Xóa</a></td>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            {{ $list->links() }}
        </div>
        
    </div>

</div>
@endsection