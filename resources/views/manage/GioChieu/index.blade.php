@extends('layout')
@section('content')

  
  <!-- Modal -->
  <div class="modal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">Thêm giờ chiếu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="form-add" >
          @csrf
            <div class="form-group">
              <label class="text-dark">Chọn buổi chiếu: </label>
               <select name="select" id="role">
                 <option value="">option</option>
               </select>
             </div>
             <div class="form-group">
                    <label class="text-dark">Giờ chiếu</label>     
                    <select name="GioChieu" id="">
                      @for ($i = 7; $i <= 23; $i++)
                       <option value="{{$i}}:00:00">{{$i}}:00</option>
                      @endfor            
                    </select>
                    <p class="text-danger">{{ $errors->first('GioChieu') }}</p>
             </div>
             <button type="submit" id="add-data" class="btn btn-primary">Thêm mới</button>
         </form>
         <div class="alert alert-success" style="display: none"></div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">Chỉnh sửa giờ chiếu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="form-edit">
             @csrf
             <div class="form-group">
                    <label class="text-dark" for="id">Mã giờ chiếu</label>
                    <input disabled=true type="text" id="eid" name="eid" class="form-control form-control-user">
             </div>
             <div class="form-group">
               <label class="text-dark">Chọn buổi chiếu: </label>   
                <select name="eselect" id="erole">
                  <option value="">option</option>
                </select>
            </div>   
            <div class="form-group">
              <label class="text-dark">Giờ chiếu</label>     
              <select name="eGioChieu" id="eGioChieu">
                @for ($i = 7; $i <= 23; $i++)
                 <option value="{{$i}}:00:00">{{$i}}:00</option>
                @endfor            
              </select>
              <p class="text-danger">{{ $errors->first('GioChieu') }}</p>
       </div>
             <button type="submit" id="edit-data" class="btn btn-primary">Lưu lại</button>
         </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h2 mb-2 text-center text-primary">QUẢN LÝ GIỜ CHIẾU</h1>

    <button onclick="loadRole()" data-toggle="modal" data-target="#add" class="btn btn-primary"><i class="fa fa-film" aria-hidden="true"> Thêm mới</i></button>

    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-stripped table-hover" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã giờ chiếu</th>
                            <th>Giờ bắt đầu</th>
                            <th>Loại TG chiếu</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>               
                    <tbody id="body">
                        @foreach ($list as $item)
                            <tr id="sid{{$item->id}}">
                                <td>{{ $item->id }}</td>
                                <td>{{$item->GioBatDau}}</td>
                                <td>{{$item->loaitgchieu->TenLoaiTGChieu}}</td>     
                                 <td>
                                     <a href="javascript:void(0)" data-toggle="modal" onclick="suaGioChieu({{$item->id}});erole({{$item->loaitgchieu_id}});" data-target="#edit" class="btn btn-info" type="submit">Chỉnh sửa</a>|
                                     <a href="javascript:void(0)"  class="btn btn-danger" onclick="xoaGioChieu({{$item->id}})" >Xóa giờ chiếu</a>
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

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>




<script>
  function loadRole()
  {      
          $('#role').empty();
          $.get('/GioChieu/get', function(g){ 
                  var array=JSON.parse(g);  
                  for(var i=0;i<array.length;i++)
                  {
                      $('#role').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenLoaiTGChieu+'</option>');     
                  }
          });   
  }

</script>
{{-- Thêm giờ chiếu--}}
<script>

   $(document).ready(function(){

          $("#form-add").on('submit',function(e){

                  e.preventDefault();
                  e.stopImmediatePropagation();
                  var GioChieu= $('select[name=GioChieu]').val()
                  var LoaiTGChieu= $('select[name=select]').val() 
                  var token= $("input[name=_token]").val();

                  $.ajax({
                        type:'POST',
                        url:"{{route('GioChieu.add')}}",
                        data:{
                            GioBatDau:GioChieu,
                            loaitgchieu_id:LoaiTGChieu,
                            _token:token
                        },
                        success:function(response){ 
                          alert("Thành công");   
                          var array=JSON.parse(response);               
                          var string="";
                          $("#add").modal('hide');
                          for(let i =0; i<array.length;i++)
                          {
                            string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].GioBatDau+"</td>";
                            string+="<td>"+array[i].loaitgchieu.TenLoaiTGChieu+"</td>";
                            string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaGioChieu("+array[i].id+");erole("+array[i].loaitgchieu_id+");'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                            string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaGioChieu("+array[i].id+")'"+">Xóa loại TG</a>"+"</td></tr>"
                          }
                            $(".modal-backdrop").remove();
                            $("#body").html(string);
                        },
                        error: function(error){
                          alert("Thêm thất bại");
                        }            
                 });
          });  

           
  
 });

</script>


{{-- Xóa loại TG Chiếu --}}
<script>
   function xoaGioChieu(id)
   {

      if(confirm('Bạn có chắc muốn xóa không'))
      {
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url:"/GioChieu/delete/"+id,
          type:'GET',
          data:{
              _token:_token,
          },
          success:function(response)
          {
            console.log('thanh cong');
              // window.location.reload();
              $('#sid'+id).remove();
          } 
        });
      }
   }
  
</script> 


{{-- Chỉnh sửa giờ chiếu --}}

<script>

  function erole(id){
          $('#erole').empty();

          $.get('/GioChieu/getId/'+id, function(a){ 
             $('#erole').append('<option value='+a.id+'>'+a.id+': '+a.TenLoaiTGChieu+'</option>');              
           });   

          $.get('/GioChieu/get', function(g){ 
                  var array=JSON.parse(g);  
                  for(var i=0;i<array.length;i++)
                  {
                    if(array[i].id != id)
                    {
                      $('#erole').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenLoaiTGChieu+'</option>');     
                    }
                      
                  }
         }); 


  }
</script>
<script>

    function suaGioChieu(id)
    { 
      $.get('/GioChieu/edit/'+id, function(g){  
        $("#eid").val(g.id); 
        $("#eGioChieu").val(g.GioBatDau);
        $("#edit").modal("toggle");
      });
    } 

    $(document).ready(function(){
        $('#form-edit').on('submit',function(e){
              e.preventDefault();
              e.stopImmediatePropagation();
              var id =$("input[name=eid]").val();
              var GioChieu=  $('select[name=eGioChieu]').val() 
              var LoaiTGChieu= $('select[name=eselect]').val() 
              var token= $("input[name=_token]").val();
            
             $.ajax({
                    type:'POST',
                    url:"/GioChieu/update/"+id,
                    data:{
                            GioBatDau:GioChieu,
                            loaitgchieu_id:LoaiTGChieu,
                            _token:token
                    },

                    success:function(response){ 
                         alert("Cập nhật thành công");               
                         var array=JSON.parse(response);               
                          var string="";
                          $("#edit").modal('hide');
                          for(let i =0; i<array.length;i++)
                          {
                            string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].GioBatDau+"</td>";
                            string+="<td>"+array[i].loaitgchieu.TenLoaiTGChieu+"</td>";
                            string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaGioChieu("+array[i].id+");erole("+array[i].loaitgchieu_id+");'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                            string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaGioChieu("+array[i].id+")'"+">Xóa loại TG</a>"+"</td></tr>"
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



