@extends('layout')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h2 mb-2 text-center text-primary">QUẢN LÝ PHÒNG</h1>

<button onclick="roleRap()" data-toggle="modal" data-target="#add" class="btn btn-primary"><i class="fa fa-table" aria-hidden="true"> Thêm Phòng</i></button>


<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center table-stripped table-hover" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã phòng</th>
                        <th>Tên phòng</th>
                        <th>Rạp</th>
                        
                        <th>Hành động</th>
                    </tr>
                </thead>               
                <tbody id="body">
                    @foreach ($list as $item)
                        <tr id="sid{{$item->id}}">
                            <td>{{ $item->id }}</td>
                            <td>{{$item->TenPhong}}</td>
                            <td>{{$item->rap->TenRap}}</td>  
                            <td>
                                <a href="javascript:void(0)" data-toggle="modal" onclick="suaPhong({{$item->id}});eroleRap({{$item->rap_id}});" data-target="#edit" class="btn btn-info" type="submit">Chỉnh sửa</a>
                                <a href="javascript:void(0)"  class="btn btn-danger" onclick="xoaPhong({{$item->id}})" >Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> 
        </div>
    </div>
</div>
</div>
@endsection
@include('manage.Phong.add')
@include('manage.Phong.edit')


<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script>
    function roleRap() {
        $('#roleRap').empty();
        $.get('/rap/get', function(g){ 
                var array=JSON.parse(g);  
                for(var i=0;i<array.length;i++)
                {
                    $('#roleRap').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenRap+'</option>');     
                }
        });   
    }
    
</script>

<script>
    function eroleRap(id){
            $('#eroleRap').empty();
            $.get('/rap/getId/'+id, function(g){ 
                console.log(g);
                $('#eroleRap').append('<option value='+g.id+'>'+g.id+': '+g.TenRap+'</option>'); 
            });

            $.get('/rap/get/', function(g){ 
                    var array=JSON.parse(g);  
                    for(var i=0;i<array.length;i++)
                    {
                        if(array[i].id != id)
                        {
                        $('#eroleRap').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenRap+'</option>');  
                        }   
                    }
            });     
    }
</script>
<script>
    function suaPhong(id)
    { 
        
        $.get('/phong/edit/'+id, function(g){
        
        $("#MaPhong").val(g.id); 
        $("#eTenPhong").val(g.TenPhong);
        $("#edit").modal("toggle");
        });
    } 
</script>

{{-- Thêm --}}
<script>

    $(document).ready(function(){

        $("#form-add").on('submit',function(e){

                e.preventDefault();
                e.stopImmediatePropagation();
                var TenPhong = $('input[name=TenPhong]').val() 
                
                var Rap = $('select[name=selectRap]').val() 
                var token= $("input[name=_token]").val();

                $.ajax({
                        type:'POST',
                        url:"{{route('Phong.add')}}",
                        data:{
                            TenPhong:TenPhong,
                            
                            Rap:Rap,
                            _token:token
                        },
                        success:function(response){ 
                            alert("Thành công");   
                            console.log(response);
                            var array=JSON.parse(response);               
                            var string="";
                            $("#add").modal('hide');
                            $(".modal-backdrop").remove();
                            for(let i =0; i<array.length;i++)
                            {
                                
                                string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].TenPhong+"</td>";
                                string+="<td>"+array[i].rap.TenRap+"</td>";  
                                string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'sua("+array[i].id+");erole();'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>";
                                string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoa("+array[i].id+")'"+">Xóa</a>"+"</td></tr>"
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
    $('#form-edit').on('submit',function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        var id =$("input[name=MaPhong]").val();
        var TenPhong =$("input[name=eTenPhong]").val();
        var Rap = $('select[name=eselectRap]').val() 
        
        var token= $("input[name=_token]").val();
    
        $.ajax({
            type:'POST',
            url:"/phong/update/"+id,
            data:{
                TenPhong:TenPhong,
                Rap:Rap,
                _token:token
            },

            success:function(response){ 
                    
                    alert("Cập nhật thành công");               
                    var array=JSON.parse(response);               
                    var string="";
                    $("#edit").modal('hide');
                    for(let i =0; i<array.length;i++)
                    {
                        string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].TenPhong+"</td>";
                        string+="<td>"+array[i].rap.TenRap+"</td>";  
                        string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'sua("+array[i].id+");erole();'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>";
                        string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoa("+array[i].id+")'"+">Xóa</a>"+"</td></tr>"
                    }
                    $(".modal-backdrop").remove();
                    $("#body").html(string);          
            },
            error: function(error){
                alert("Cập nhật thất bại");
            }    
        });
    
});
</script>
<script>
    function xoaPhong(id)
    {
        if(confirm('Bạn có chắc muốn xóa không'))
        {
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:"/phong/delete/"+id,
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