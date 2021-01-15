@extends('layout')
@section('content')
  <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h2 mb-2 text-center text-success">Chức vụ</h1>

        <br>
        <br>

        <div class="col-sm-6">
            <a onclick="event.preventDefault();addChucVu();" href="#" class="btn btn-success" data-toggle="modal" data-target="#addTaskModal" ><i class="fas fa-plus"></i></a>
        </div>



        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> --}}
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center table-stripped table-hover" id="dataTable" width="100%"
                        cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên chức vụ</th>
                                <th > </th>
                            </tr>
                        </thead>

                        <tbody id="body">
                            @foreach ($chucvus as $chucvu)

                                <tr>
                                    <td>{{ $chucvu->TenCV }}</td>

                                    <td>
                                    <a onclick="event.preventDefault();editChucVu({{$chucvu->MaCV}});" href="#" class="edit open-modal btn btn-warning" data-toggle="modal" data-target="#editTaskModal" value="{{$chucvu->MaCV}}"><i class="fas fa-user-edit"></i></a>


                                    <a onclick="event.preventDefault();deleteChucVu({{$chucvu->MaCV}});" href="#" class="delete btn btn-danger" data-toggle="modal" data-target="#deleteTaskModal" value="{{$chucvu->MaCV}}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>



                    </div>
                </div>
        </div>

    </div>
    @include('manage.ChucVu.create')
    @include('manage.ChucVu.edit')
    @include('manage.ChucVu.delete')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('js/chucvu.js')}}"></script>
    
   
@endsection

