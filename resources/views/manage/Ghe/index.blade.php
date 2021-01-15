@extends('layout')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-2 text-center text-success">QUẢN LÝ GHẾ</h1>
    
    <button onclick="roleSelect()" data-toggle="modal" data-target="#add" class="btn btn-primary">THÊM GHẾ &nbsp;<i class="fas fa-plus"></i> </button>
    
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
                            <th>Mã Ghế</th>
                            <th>Giá ghế</th>
                            <th>Phòng</th>
                            <th>Trạng Thái</th>
                            <th colspan="3">Công cụ</th>
                        </tr>
                    </thead>
                    <tbody id="body">
                        @foreach ($list as $item)
                            <tr id="sid{{$item->id}}">
                                <td>
                                    {{$item->Day.$item->sort}}
                                </td>
                                <td>{{ number_format($item->GiaGhe) }} VND</td>
                                <td>{{ $item->phong->TenPhong }}</td>
                                
                                <td>
                                    @if($item->TrangThai == 1) 
                                        <a href="{{url('/ghe/inactive/'.$item->id)}}" class="btn btn-success">Có người</a>
                                    @endif
                                    @if($item->TrangThai == 0) 
                                        <a href="{{url('/ghe/active/'.$item->id)}}" class="btn btn-warning">Trống</a>
                                    @endif
                                </td>

                                {{-- <td><a class="btn btn-primary" type="submit" href="{{url('/ghe/edit/'.$item->id)}}">Sửa</a></td>
                                <td><a class="btn btn-primary" type="submit" href="{{url('/ghe/details/'.$item->id)}}">Chi tiết</a></td>
                                <td><a class="btn btn-danger" type="submit" href="{{url('/ghe/delete/'.$item->id)}}" onclick="return confirm('Bạn muốn xóa ghế@if($item->sort < 10) {{$item->Day.'0'.$item->sort}} @else {{$item->Day.$item->sort}} @endif?')">Xóa</a></td> --}}

                                {{-- <td><a href="javascript:void(0)" data-toggle="modal" onclick="suaGhe({{$item->id}});erolePhong({{$item->phong_id}});eroleSort({{$item->sort}});eroleDay({{$item->Day}});" data-target="#edit" class="btn btn-info" type="submit">Chỉnh sửa</a></td> --}}
                                <td><a href="javascript:void(0)"  class="btn btn-danger" onclick="xoaGhe({{$item->id}})" >Xóa</a></td>
                                
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

@include('manage.Ghe.add')


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


<script>
    function roleSelect() {
        $('#rolePhong').empty();
        $.get('/phong/get', function(g){ 
            console.log(g)
                var array=JSON.parse(g);  
                for(var i=0;i<array.length;i++)
                {
                    $('#rolePhong').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenPhong+'</option>');     
                }
        });   

        //role day
        $('#roleDay').empty();
        $.get('/ghe/getDay', function(g){   
            console.log(g)
            var array=JSON.parse(g);  
            for(var i=0;i<array.length;i++)
            {
                $('#roleDay').append('<option value='+array[i]+'>'+array[i]+'</option>');     
            }
        });   

        //role sort
        $('#roleSort').empty();
        $.get('/ghe/getSort', function(g){   
            console.log(g)
            var array=JSON.parse(g);  
            for(var i=0;i<array.length;i++)
            {
                $('#roleSort').append('<option value='+array[i]+'>'+array[i]+'</option>');     
            }
        });   
    }
    
</script>

<script>

    $(document).ready(function(){

        $("#form-add").on('submit',function(e){

                e.preventDefault();
                e.stopImmediatePropagation();
                
                var Day = $('select[name=selectDay]').val() 
                var Sort = $('select[name=selectSort]').val()
                var Phong = $('select[name=selectPhong]').val() 
                var GiaGhe = $('input[name=GiaGhe]').val() 
                var token= $("input[name=_token]").val();

                $.ajax({
                        type:'POST',
                        url:"{{route('Ghe.add')}}",
                        data:{
                            Day:Day,
                            sort: Sort,
                            phong_id: Phong,    
                            GiaGhe: GiaGhe,
                            _token:token
                        },
                        success:function(response){ 
                            alert("Thành công");   
                            console.log('res: ' +  response);
                            var array=JSON.parse(response);               
                            var string="";
                            $("#add").modal('hide');
                            $(".modal-backdrop").remove();
                            for(let i =0; i<array.length;i++)
                            {
                                
                                string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].Day + array[i].sort+"</td>";
                                string+="<td>"+array[i].GiaGhe+" VND</td>";                               
                                string+="<td>"+array[i].phong.TenPhong+"</td>";
                                if(array[i].TrangThai== 1) 
                                      string+="<td><a class='btn btn-success'>Có người</a></td>"; 
                                   
                                else if(array[i].TrangThai == 0) 
                                       string+="<td><a class='btn btn-success'>Chưa có người</a></td>";
                                   
                               
                                string+="<td><a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaGhe("+array[i].id+")'"+">Xóa</a>"+"</td></tr>"
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

<script>
    function xoaGhe(id)
    {
        if(confirm('Bạn có chắc muốn xóa không'))
        {
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"/ghe/delete/"+id,
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