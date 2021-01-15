@extends('layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-2 text-center text-success">Nhân viên</h1>

    <br>
    <br>

    <a type="button" href="{{route('employees.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary" ><i class="fas fa-plus"></i> </a>

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
                            <th>Ảnh</th>

                            <th>Tên</th>
                            <th>Vị trí</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($nhanviens as $nhanvien)


                            <tr>
                            <td>
                                 <img width="auto" height="30px" src="{{asset('images/nhanviens/'.$nhanvien->Anh)}}" />
                             </td>

                                <td>{{$nhanvien->HoTen}}</td>
                                <td>{{$nhanvien->TenCV}}</td>

                                <td>


                               <a class="btn btn-success" href="{{route('employees.edit',$nhanvien->MaNV)}}"> <i class="fas fa-user-edit"></i> </a> </td>
                               <td>   <form method="POST" action="{{route('employees.destroy',$nhanvien->MaNV)}}"> @csrf @method('DELETE') <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> </button> </form></td>


                            </tr>
                        @endforeach

                        {{ $nhanviens->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


    @include('manage.NhanVien.delete')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('js/nhanvien.js')}}"></script>
@endsection
