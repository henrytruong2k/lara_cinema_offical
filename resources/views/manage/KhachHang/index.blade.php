@extends('layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-2 text-center text-success">Khách hàng</h1>

    <br>
    <br>

    <a type="button" href="{{route('customers.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary" ><i class="fas fa-plus"></i> </a>

    <br>
    <br>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-stripped table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Họ tên</th>
                            <th>Tên tài khoản</th>
                            <th>SĐT</th>
                            <th >Email</th>
                            <th >DiaChi</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($khachhangs as $khachhang)

                            <tr>
                                <td>{{$khachhang->HoTen}}</td>
                                <td>{{$khachhang->TenTK}}</td>

                                <td>{{$khachhang->SDT}}</td>
                                <td>{{$khachhang->Email}}</td>
                                <td>{{$khachhang->DiaChi}}</td>


                           <td>    <a class="btn btn-success" href="{{route('customers.edit',$khachhang->id)}}"> <i class="fas fa-user-edit"></i> </a> </td>
                         <td>   <form method="POST" action="{{route('customers.destroy',$khachhang->id)}}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> </button> </form></td>


                            </tr>
                        @endforeach

                        {{ $khachhangs->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>



@endsection
