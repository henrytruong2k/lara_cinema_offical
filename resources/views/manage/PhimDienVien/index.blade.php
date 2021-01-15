@extends('layout')
@section('content')

 <!-- Modal -->
 <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">Thêm diễn viên cho phim</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="form-add" >
               @csrf
                <div class="form-group">
                        <label class="text-dark">Chọn phim cần thêm diễn viên:</label><br>
                        <select class="phim" name="phim" id="roleType"  >
                            <option value="s">Chọn phim</option>
                        </select>
                        <p class="text-danger">{{ $errors->first('TenLoaiPhim') }}</p>
                </div>
                <div class="form-group">
                    <label class="text-dark">Nhập tên diễn viên</label>
                    <input id="DienVien" type="text" name="DienVien" class="form-control form-control-user" >
                    <p class="text-danger">{{ $errors->first('TenDienVien') }}</p>
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
  


  {{-- edit phim dien vien --}}
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5  class="modal-title" id="exampleModalLongTitle">Chỉnh sửa loại TG chiếu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form  id="form-edit">
              @csrf
              <div class="form-group">
                <label class="text-dark" for="id">Mã diễn viên phim</label>
                <input disabled=true type="text" id="eid" name="eid" class="form-control form-control-user">
            </div>
              <div class="form-group">
                    <label class="text-dark">Chọn phim cần thêm diễn viên:</label><br>
                    <select name="eselect" id="editload"  >
                         <option value="s">Chọn phim</option>
                    </select>
                    <p class="text-danger">{{ $errors->first('TenLoaiPhim') }}</p>
                </div>
                <div class="form-group">
                    <label class="text-dark">Nhập tên diễn viên</label>
                    <input id="eTenDienVien" type="text" name="eTenDienVien" class="form-control form-control-user" >
                    <p class="text-danger">{{ $errors->first('TenDienVien') }}</p>
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
    <h1 class="h2 mb-2 text-center text-primary">QUẢN LÝ PHIM DIỄN VIÊN</h1>
    <button onclick="loadRoleTypes()"data-toggle="modal" data-target="#add" class="btn btn-primary"><i class="fas fa-user" aria-hidden="true"> Thêm diễn viên</i></button>
   
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
                            <th>Tên phim</th>
                            <th>Tên diễn viên</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                  
                    <tbody id="body">
                        @foreach ($list as $item)
                            <tr id="sid{{$item->id}}">
                                <td>{{ $item->phim->TenPhim }}</td>
                                <td>{{$item->dienvien->TenDienVien}}</td>             
                                 <td>
                                    <a href="javascript:void(0)" data-toggle="modal" onclick="suaDienVien({{$item->id}});edit_role({{$item->phim_id}});" data-target="#edit" class="btn btn-info" type="submit">Chỉnh sửa</a>|
                                     <a href="javascript:void(0)"  class="btn btn-danger" onclick="xoaDienVien({{$item->id}})" >Xóa diễn viên</a>
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
  function edit_role(id)
  {      
          $('#editload').empty();
          $.get('/Phim/edit/'+id, function(Phim){ 
                  // var array = JSON.parse(Phim);  
                      $('#editload').append('<option value='+Phim.id+'>'+Phim.id+': '+Phim.TenPhim+'</option>');         
          });   

          $.get('/Phim/get/',function(p){
               var array = JSON.parse(p); 
               for(var i=0; i<array.length; i++)
               {
                   if(array[i].id != id)
                   {
                    $('#editload').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenPhim+'</option>');  
                   }
               }
          });
  }
</script>

{{-- Xóa loại TG Chiếu --}}
<script>
  function xoaDienVien(id)
   {

      if(confirm('Bạn có chắc muốn xóa không'))
      {
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url:"/Phim_DienVien/delete/"+id,
          type:'GET',
          data:{
              _token:_token,
          },
          success:function(response)
          {
              $('#sid'+id).remove();
          } 
        });
      }
   }
</script> 

{{-- Thêm dien vien phim--}}
<script>
    $(document).ready(function(){

           $("#form-add").on('submit',function(e){
 
                   e.preventDefault();
                   e.stopImmediatePropagation();

                   var phim = $('select[name=phim]').val()                
                   var TenDienVien= $("input[name=DienVien]").val();
                   var token= $("input[name=_token]").val();
 
                   $.ajax({
                         type:'POST',
                         url:"{{route('Phim_DienVien.add')}}",
                         data: {
                             TenDienVien:TenDienVien,
                             phim_id:phim,
                            _token : token
                         },

                         success:function(response){    
                                alert("Thêm thành công");
                                var array=JSON.parse(response);               
                                var string="";
                                $("#add").modal('hide');
                                for(let i =0; i<array.length;i++)
                                {
                                  string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].phim.TenPhim+"</td>"+"<td>"+array[i].dienvien.TenDienVien+"</td>";
                                  string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaDienVien("+array[i].id+");edit_role("+array[i].phim_id+");'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                                  string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaDienVien("+array[i].id+")'"+">Xóa diễn viên</a>"+"</td></tr>"
                                }
                                  $(".modal-backdrop").remove();
                                  $("#body").html(string);
                         },
                         error: function(error){
                           alert("Yeu em vy");
                         }            
                  });
           });  
  });


</script>

{{-- Chinh sua dien vien --}}
<script>

  function suaDienVien(id)
  { 
    $.get('/Phim_DienVien/edit/'+id, function(g){  
      $("#eid").val(g.id); 
      $("#eTenDienVien").val(g.dienvien.TenDienVien);
      $("#edit").modal("toggle");
    });
  } 

  $(document).ready(function(){
      $('#form-edit').on('submit',function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            var id =$("input[name=eid]").val();
            var phim = $('select[name=eselect]').val()                
            var TenDienVien= $("input[name=eTenDienVien]").val();
            var token= $("input[name=_token]").val();
          
           $.ajax({
                  type:'POST',
                  url:"/Phim_DienVien/update/"+id,
                  data:{
                           TenDienVien:TenDienVien,
                           phim_id:phim,
                          _token : token
                  },

                  success:function(response){ 
                       alert("Cập nhật thành công");               
                       var array=JSON.parse(response);               
                       var string="";
                       $("#edit").modal('hide');
                       for(let i =0; i<array.length;i++)
                        {
                            string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].phim.TenPhim+"</td>"+"<td>"+array[i].dienvien.TenDienVien+"</td>";
                            string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaDienVien("+array[i].id+");edit_role("+array[i].phim_id+");'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                            string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaDienVien("+array[i].id+")'"+">Xóa diễn viên</a>"+"</td></tr>"
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
  function loadRoleTypes()
  {      
          $('#roleType').empty();
          $.get('/Phim/get', function(Phim){ 
                  var array=JSON.parse(Phim);  
                  for(var i=0;i<array.length;i++)
                  {
                      $('#roleType').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenPhim+'</option>');     
                  }
          });   
  }

</script>