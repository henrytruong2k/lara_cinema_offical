@extends('layout')
@section('content')
<div class="container-fluid">

<h1 class="h3 mb-2 text-gray-800">Employee</h1>



<div >
    <span> Image :</span> </div>
    <img width="auto" height="100px" src="{{asset('images/nhanviens/'.$nhanvien->Anh)}}" />

<br>
<br>
          <div class="card bg-light mb-4">
                <span> FirstName : {{$nhanvien->HoNV}} </span>

          </div>

          <div class="card bg-light mb-4">
            <span> LastName : {{$nhanvien->TenNV}} </span>

         </div>

          <div class="card bg-light mb-4">
            <span> Position : {{$chucvu->TenCV}}  </span>


          </div>

           <div class="card bg-light mb-4">
              <span> Birthday :  {{$nhanvien->NgSinh}}  </span>
         </div>

         <div class="card bg-light mb-4">
          <span> Phone :  {{$nhanvien->SDT}}  </span>
        </div>

            <div class="card bg-light mb-4">
                <span> Email:  {{$nhanvien->Email}}  </span>
            </div>

        <div> <a class="btn btn-warning text-white" href = "{{route('employees.edit',$nhanvien->MaNV)}}"> Edit </a> </div>

       <div> <a class="btn btn-dark" href="{{route('employees.index')}}">List of employees</a> </div>
</div>
@endsection
