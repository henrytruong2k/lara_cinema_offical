@extends('layout')
@section('content')

  
  <!-- Modal -->
  <div class="modal" id="add" data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">Thêm suất chiếu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="form-add" >
          @csrf
            <div class="form-group">
              <label class="text-dark">Chọn phim: </label>
               <select name="selectPhim" id="rolePhim">
                 <option value="">option</option>
               </select>
             </div>
             <div class="form-group">
              <label class="text-dark">Chọn rạp: </label>
               <select name="selectRap" id="roleRap">
                 <option value="">option</option>
               </select>
             </div>
             <div class="form-group">
                <label class="text-dark">Chọn giờ chiếu: </label>
                 <select name="selectGioChieu" id="roleGioChieu">
                   <option value="">option</option>
                 </select>
               </div>

             <div class="form-group">
                    <label class="text-dark">Ngày chiếu</label>
                    <input  type="date"  name="NgayChieu" class="form-control form-control-user" >
                    <p class="text-danger">{{ $errors->first('NgayChieu') }}</p>
             </div>
             
             <div class="form-group">
              <a onclick="getPhong()" id="btnGetPhong" class="btn btn-success">Xem phòng chiếu</a>:
               <select name="selectPhong" id="rolePhong">
                 <option value="">Trống</option>
               </select>
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

  <div class="modal fade" id="edit" data-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                <label class="text-dark">Mã suất chiếu</label>
                <input disabled=true type="text" id="MaSuatChieu" name="MaSuatChieu" class="form-control form-control-user" >
                <p class="text-danger">{{ $errors->first('MaSuatChieu') }}</p>
            </div>
             <div class="form-group">
                <label class="text-dark">Chọn phim: </label>
                 <select name="eselectPhim" id="erolePhim">
                   <option value="">option</option>
                 </select>
               </div>
               <div class="form-group">
                <label class="text-dark">Chọn rạp: </label>
                 <select name="eselectRap" id="eroleRap">
                   <option value="">option</option>
                 </select>
               </div>
               <div class="form-group">
                  <label class="text-dark">Giờ chiếu: </label>
                   <select name="eselectGioChieu" id="eroleGioChieu">
                     <option value="">option</option>
                   </select>
                 </div>
               <div class="form-group">
                      <label class="text-dark">Ngày chiếu</label>
                      <input  type="date" id="eNgayChieu" name="eNgayChieu" class="form-control form-control-user" >
                      <p class="text-danger">{{ $errors->first('NgayChieu') }}</p>
               </div>
               <div class="form-group">
                <a onclick="egetPhong()" id="btnGetPhong" class="btn btn-success">Xem phòng chiếu</a>:
                 <select name="eselectPhong" id="erolePhong">
                   <option value="">Trống</option>
                 </select>
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
    <h1 class="h2 mb-2 text-center text-primary">QUẢN LÝ SUẤT CHIẾU</h1>

    <button onclick="rolePhim_GioChieu()" data-toggle="modal"  id="minhhai" class="btn btn-primary"><i class="fa fa-film" aria-hidden="true"> Thêm mới</i></button>

    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-stripped table-hover" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã suất chiếu</th>
                            <th>Tên phim</th>
                            <th>Rạp</th>
                            <th>Ngày chiếu</th>
                            <th>Giờ chiếu</th>                 
                            <th>Giá suất chiếu</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>               
                    <tbody id="body">
                        @foreach ($list as $item)
                            <tr id="sid{{$item->id}}">
                                <td>{{ $item->id }}</td>
                                <td>{{$item->phim->TenPhim}}</td>
                                <td>{{$item->phong->rap->TenRap}}</td>
                                <td>{{$item->NgayChieu}}</td>  
                                <td>{{$item->giochieu->GioBatDau}}</td>  
                                <td>{{number_format($item->GiaSuatChieu)}} VND  </td>      
                                 <td>
                                     <a href="javascript:void(0)" data-toggle="modal" onclick="suaSuatChieu({{$item->id}});erolePhim({{$item->phim_id}});eroleGioChieu({{$item->giochieu_id}});eroleRap({{$item->phong->rap_id}});" id="trong" class="btn btn-info" type="submit">Chỉnh sửa</a>|
                                     <a href="javascript:void(0)"  class="btn btn-danger" onclick="xoaSuatChieu({{$item->id}})" >Xóa suất chiếu</a>
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
  function getPhong()
  {   
        $('#rolePhong').empty();
        var GioChieu = $('select[name=selectGioChieu]').val() 
        var Phim = $('select[name=selectPhim]').val() 
        var NgayChieu = $('input[name=NgayChieu]').val();
        var Rap = $('select[name=selectRap]').val() 
        var token= $("input[name=_token]").val();
       
        $.ajax({
                        type:'POST',
                        url:"{{route('SuatChieu.getPhong')}}",
                        data:{
                            GioChieu:GioChieu,
                            Phim:Phim,
                            Rap:Rap,
                            NgayChieu:NgayChieu,
                            _token:token
                        },
                        success:function(response){ 
                            $('#rolePhong').empty();
                            var temp = parseInt(response);
                            console.log(response);
                             
                            if(temp==1)
                            {
                              alert('Suất chiếu đã tồn tại! Không có phòng trống');
                            }
                            else
                            {
                              var array=JSON.parse(response);  
                              for(let i = 0; i<array.length;i++)
                              {
                                if(array[i]==null)
                                {

                                }
                                else
                                {
                                  $('#rolePhong').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenPhong+'</option>');
                                }
                                
                              }
                            }
                  
                  
                        },
                        error: function(error){
                          alert("Thêm thất bại");
                        }            
                 });
    
  }
  function egetPhong()
  {   
        $('#erolePhong').empty();
        var GioChieu = $('select[name=eselectGioChieu]').val() 
        var Phim = $('select[name=eselectPhim]').val() 
        var NgayChieu = $('input[name=eNgayChieu]').val();
        var Rap = $('select[name=eselectRap]').val() 
        var token= $("input[name=_token]").val();
       
        $.ajax({
                        type:'POST',
                        url:"{{route('SuatChieu.getPhong')}}",
                        data:{
                            GioChieu:GioChieu,
                            Phim:Phim,
                            Rap:Rap,
                            NgayChieu:NgayChieu,
                            _token:token
                        },
                        success:function(response){ 
                            $('#erolePhong').empty();
                            var temp = parseInt(response);
                            console.log(response);
                             
                            if(temp==1)
                            {
                              alert('Suất chiếu đã tồn tại! Không có phòng trống');
                            }
                            else
                            {
                              var array=JSON.parse(response);  
                              for(let i = 0; i<array.length;i++)
                              {
                                if(array[i]==null)
                                {

                                }
                                else
                                {
                                  $('#erolePhong').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenPhong+'</option>');
                                }
                                
                              }
                            }
                  
                  
                        },
                        error: function(error){
                          alert("Thêm thất bại");
                        }            
                 });
    
  }


</script>

<script>
  function rolePhim_GioChieu()
  {      
         
          $('#rolePhim').empty();
          $.get('/Phim/get', function(g){ 
                  var array=JSON.parse(g);  
                  for(var i=0;i<array.length;i++)
                  {
                      $('#rolePhim').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenPhim+'</option>');     
                  }
          });   

          $('#roleGioChieu').empty();
          $.get('/GioChieu/getGioChieu', function(g){ 
                  var array=JSON.parse(g);  
                  for(var i=0;i<array.length;i++)
                  {
                      $('#roleGioChieu').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].GioBatDau+'</option>');     
                  }
          });   

          $('#roleRap').empty();
          $.get('/rap/get', function(g){ 
                  var array=JSON.parse(g);  
                  for(var i=0;i<array.length;i++)
                  {
                      $('#roleRap').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenRap+'</option>');     
                  }
          });   

          $("#minhhai").attr("data-target", "#add");
  }

</script>
{{-- Thêm loại TG chiếu--}}
<script>

   $(document).ready(function(){

          $("#form-add").on('submit',function(e){
                  e.preventDefault();
                  e.stopImmediatePropagation();
                  var GioChieu = $('select[name=selectGioChieu]').val() 
                  var Phim = $('select[name=selectPhim]').val() 
                  var NgayChieu = $('input[name=NgayChieu]').val();
                  // var Rap = $('select[name=selectRap]').val() 
                  var Phong = $('select[name=selectPhong]').val() 
                  var token= $("input[name=_token]").val();

                  $.ajax({
                        type:'POST',
                        url:"{{route('SuatChieu.add')}}",
                        data:{
                            GioChieu:GioChieu,
                            Phim:Phim,
                            NgayChieu:NgayChieu,
                            // Rap:Rap,
                            Phong:Phong,
                            _token:token
                        },
                        success:function(response){ 
                             
                            // alert('Thành công')
                           
                            console.log(response);
                            if(response == "")  
                            {
                               alert('Suất chiếu đã tồn tại');
                            }  
                            else
                            {
                              var array=JSON.parse(response); 
                              var string="";
                              $('#rolePhong').empty();
                              $("#add").modal('hide');
                            
                              $(".modal-backdrop").remove();  
                              for(let i =0; i<array.length;i++)
                              {
                              // var gia = array[i].giochieu.loaitgchieu.Gia_TG + array[i].phim.GiaPhim;
                              string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].phim.TenPhim+"</td>";
                              string+="<td>"+array[i].phong.rap.TenRap+"</td>";
                              string+="<td>"+array[i].NgayChieu+"</td>";
                              string+="<td>"+array[i].giochieu.GioBatDau+"</td>";
                              string+="<td>"+array[i].GiaSuatChieu+"</td>";
                              string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaSuatChieu("+array[i].id+");eroleRap("+array[i].phong.rap.id+");erolePhim("+array[i].phim_id+");eroleGioChieu("+array[i].giochieu_id+");'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                              string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaSuatChieu("+array[i].id+")'"+">Xóa suất chiếu</a>"+"</td></tr>"
                              }           
                              $(".modal-backdrop").remove();                                 
                              $("#body").html(string);
                       
                            }      
                           
                          
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
   function xoaSuatChieu(id)
   {

      if(confirm('Bạn có chắc muốn xóa không'))
      {
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url:"/SuatChieu/delete/"+id,
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
  function erolePhim(id){
  
         $('#erolePhim').empty();
          $.get('/Phim/edit/'+id, function(g){ 
                //   var array=JSON.parse(g);  
                $('#erolePhim').append('<option value='+g.id+'>'+g.id+': '+g.TenPhim+'</option>'); 
          });

          $.get('/Phim/get/', function(g){ 
            var array=JSON.parse(g);  
            for(var i=0;i<array.length;i++)
            {
                if(array[i].id != id)
                {
                  $('#erolePhim').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenPhim+'</option>');  
                }   
            }
          });     
  }
</script>

<script>
    function eroleGioChieu(id)
    {
        $('#eroleGioChieu').empty();
          $.get('/GioChieu/getGioChieuID/'+id, function(g){ 
                $('#eroleGioChieu').append('<option value='+g.id+'>'+g.id+': '+g.GioBatDau+'</option>'); 
          });

          $.get('/GioChieu/getGioChieu', function(g){ 
                  var array=JSON.parse(g);  
                  for(var i=0;i<array.length;i++)
                  {
                      if(array[i] != id)
                      {
                        $('#eroleGioChieu').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].GioBatDau+'</option>');     
                      }
                  }
          });   
    }
     
</script>

<script>
  function eroleRap(id)
  {
      $('#eroleRap').empty();
        $.get('/rap/getId/'+id, function(g){ 
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

    function suaSuatChieu(id)
    {   
       $.get('/SuatChieu/edit/'+id, function(g){  
        $("#MaSuatChieu").val(g.id); 
        $("#eNgayChieu").val(g.NgayChieu);
        $('#erolePhong').empty();
        $("#edit").modal("toggle");
        $("#trong").attr("data-target", "#edit");
      });
    } 

    $(document).ready(function(){
        $('#form-edit').on('submit',function(e){
              e.preventDefault();
              e.stopImmediatePropagation();      
              var id =$("input[name=MaSuatChieu]").val();
              var GioChieu = $('select[name=eselectGioChieu]').val() 
              var Phong = $('select[name=eselectPhong]').val();
              var Phim = $('select[name=eselectPhim]').val();
              var NgayChieu = $('input[name=eNgayChieu]').val();
              var token= $("input[name=_token]").val();
            
             $.ajax({
                    type:'POST',
                    url:"/SuatChieu/update/"+id,
                    data:{
                         GioChieu:GioChieu,
                         Phim:Phim,
                         NgayChieu:NgayChieu,
                         Phong:Phong,
                        _token:token
                    },

                    success:function(response){ 
                         alert("Cập nhật thành công");               
                         var array=JSON.parse(response);               
                          var string="";
                          $('#erolePhong').empty();
                          $("#edit").modal('hide');
                          for(let i =0; i<array.length;i++)
                          {
                            string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].phim.TenPhim+"</td>";
                            string+="<td>"+array[i].phong.rap.TenRap+"</td>";
                            string+="<td>"+array[i].NgayChieu+"</td>";
                            string+="<td>"+array[i].giochieu.GioBatDau+"</td>";
                            string+="<td>"+array[i].GiaSuatChieu+"</td>";
                            string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaSuatChieu("+array[i].id+");eroleRap("+array[i].phong.rap.id+");erolePhim("+array[i].phim_id+");eroleGioChieu("+array[i].giochieu_id+");'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                            string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaSuatChieu("+array[i].id+")'"+">Xóa suất chiếu</a>"+"</td></tr>"
                          }  
                            $(".modal-backdrop")
                            $("#body").html(string);          
                    },
                    error: function(error){
                      alert("Cập nhật thất bại");
                    }    
                });
          });
      });
    
</script>



