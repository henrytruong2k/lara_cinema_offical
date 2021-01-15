@extends('layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-2 text-center text-success">QUẢN LÝ RẠP</h1>
    
    <button data-toggle="modal" data-target="#add" class="btn btn-primary">THÊM RẠP &nbsp;<i class="fas fa-plus"></i></button>
    
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
                            <th>Mã Rạp</th>
                            <th>Tên rạp</th>
                            <th>Địa chỉ</th>
                            <th>SĐT</th>
                            <th>Trạng thái</th>
                            <th colspan="2">Công cụ</th>
                        </tr>
                    </thead>
                    <tbody id="body">
                        @foreach ($list as $item)

                            <tr id="sid{{$item->id}}">
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->TenRap }}</td>
                                <td>{{ $item->DiaChi }}</td>
                                <td>{{ $item->SDT }}</td>
                                {{-- <td>
                                    @if($item->TrangThai == 1) 
                                        <a href="{{url('/rap/inactive/'.$item->id)}}" class="btn btn-success">Đang hoạt động</a>
                                    @else 
                                        <a href="{{url('/rap/active/'.$item->id)}}" class="btn btn-warning">Ngưng hoạt động</a>
                                    @endif
                                </td> --}}
                                {{-- <td><a class="btn btn-primary" type="submit" href="{{url('/rap/details/'.$item->id)}}">Chi tiết</a></td> --}}
                                {{-- <td><a class="btn btn-primary" type="submit" href="{{url('/rap/edit/'.$item->id)}}">Sửa</a></td>
                                <td><a class="btn btn-danger" type="submit" href="{{url('/rap/delete/'.$item->id)}}" onclick="return confirm('Bạn muốn xóa {{$item->TenRap}}?')">Xóa</a></td> --}}

                                <td><a href="javascript:void(0)" data-toggle="modal" onclick="suaRap({{$item->id}})" data-target="#edit" class="btn btn-info" type="submit">Chỉnh sửa</a></td>
                                <td><a href="javascript:void(0)"  class="btn btn-danger" onclick="xoaRap({{$item->id}})" >Xóa</a></td>
                                
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
            {{-- {{ $list->links() }} --}}
        </div>
        
    </div>

</div>
@endsection
@include('manage.rap.add')
@include('manage.rap.edit')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

{{-- Thêm --}}
<script>
    $(document).ready(function(){
        $("#form-add").on('submit',function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                var TenRap = $('input[name=TenRap]').val();
                var DiaChi = $('input[name=DiaChi]').val(); 
                var SDT = $('input[name=SDT]').val(); 
                var token= $("input[name=_token]").val();

                $.ajax({
                        type:'POST',
                        url:"{{route('Rap.add')}}",
                        data:{
                            TenRap:TenRap,
                            DiaChi: DiaChi,
                            SDT: SDT,
                            _token:token,
                        },
                        success:function(response){ 
                            // alert("Thành công");   
                            console.log(response);
                            var array=JSON.parse(response);               
                            var string="";
                            $("#add").modal('hide');
                            $(".modal-backdrop").remove();
                            for(let i =0; i<array.length;i++)
                            {
                                
                                string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].TenRap+"</td>"+"<td>"+array[i].DiaChi+"</td>"+"<td>"+array[i].SDT+"</td>";
                                
                                string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaRap("+array[i].id+")'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a></td>";
                                string+="<td><a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaRap("+array[i].id+")'"+">Xóa</a>"+"</td></tr>"
                            }
                            $("#body").html(string);
                            
                        },
                        error: function(error){
                            alert("Thêm thất bại");
                        }            
                });
        });  
    });
</script>

{{-- Chỉnh sửa --}}
<script>
function suaRap(id)
{ 
    $.get('/rap/edit/'+id, function(g){  
        console.log(g)
        $("#MaRap").val(g.id); 
        $("#eTenRap").val(g.TenRap);
        $("#eDiaChi").val(g.DiaChi);
        $("#eSDT").val(g.SDT);
        $("#edit").modal("toggle");
    });
} 

$(document).ready(function(){
    $('#form-edit').on('submit',function(e){
            e.preventDefault();
            var id= $("#MaRap").val();
            console.log($("#form-edit").serialize());       
            $.ajax({
                type:'POST',
                url:"/rap/update/"+id,
                data: $("#form-edit").serialize(),
                success:function(response){       
                    console.log(response)
                    var array=JSON.parse(response);
                    
                    var string="";

                    $("#edit").modal('hide');

                    for(let i =0; i<array.length;i++)
                    {
                        string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].TenRap+"</td>"+"<td>"+array[i].DiaChi+"</td>"+"<td>"+array[i].SDT+"</td>";
                                
                        string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaRap("+array[i].id+")'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a></td>";
                        string+="<td><a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaRap("+array[i].id+")'"+">Xóa</a>"+"</td></tr>"
                    }
                    $(".modal-backdrop").remove();
                    $("#body").html(string);
                    
                },
                error: function(error){
                    alert("Cập nhật thất bại");
                }    
            });

        });
    });
    
</script>
<script>
    function xoaRap(id)
    {
        if(confirm('Bạn có chắc muốn xóa không'))
        {
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"/rap/delete/"+id,
                type:'GET',
                data:{
                    _token:_token,
                },
                success:function(response)
                {
                    alert('thanh cong');
                    console.log('thanh cong');
                    // window.location.reload();
                    $('#sid'+id).remove();
                } 
            });
        }
}

</script> 