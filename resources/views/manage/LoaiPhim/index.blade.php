@extends('layout')
@section('content')

  
  <!-- Modal -->
  <div class="modal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="fasle">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">Thêm thể loại phim</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="form-add" >
          @csrf
          @method('POST')
             <div class="form-group">
                    <label class="text-dark">Tên thể loại </label>
                    <input id="TenTheLoai" type="text" name="TenLoaiPhim" class="form-control form-control-user" >
                    <p class="text-danger">{{ $errors->first('TenLoaiPhim') }}</p>
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

  <div class="modal fade" id="edit" role="dialog" aria-hidden="false">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thể loại thể loại</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="form-edit">
             @csrf
             <div class="form-group">
                    <label class="text-dark" for="id">Mã thể loại</label>
                    <input disabled=true type="text" id="id" name="id" class="form-control form-control-user">
             </div>
             <div class="form-group">
                    <label class="text-dark" for="TenLoaiPhim">Tên thể loại </label>
                    <input type="text" id="TenLoaiPhim" name="TenLoaiPhim" class="form-control form-control-user">
                    <p class="text-danger">{{ $errors->first('TenLoaiPhim') }}</p>
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
    <h1 class="h2 mb-2 text-center text-primary">QUẢN LÝ THỂ LOẠI PHIM</h1>

    <button data-toggle="modal" data-target="#add" class="btn btn-primary"><i class="fa fa-film" aria-hidden="false"> Thêm mới</i></button>

    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-stripped table-hover" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã loại</th>
                            <th>Tên thể loại</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>               
                    <tbody id="body">
                        @foreach ($list as $item)
                            <tr id="sid{{$item->id}}">
                                <td>{{ $item->id }}</td>
                                <td>{{$item->TenLoaiPhim}}</td>
                                <td>
                                    @php
                                    if($item->TrangThai==1){
                                     echo'Sử dụng';
                                    }
                                    else{
                                        echo'Đã loại bỏ';
                                       }
                                   @endphp
                                </td>
                                   
                                 <td>
                                     <a href="javascript:void(0)" data-toggle="modal" onclick="suaLoaiPhim({{$item->id}})" data-target="#edit" class="btn btn-info" type="submit">Chỉnh sửa</a>|
                                     <a href="javascript:void(0)"  class="btn btn-danger" onclick="xoaLoaiPhim({{$item->id}})" >Xóa thể loại</a>
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


{{-- Thêm thể loại phim --}}
<script>

   $(document).ready(function(){

          $("#form-add").on('submit',function(e){

                  e.preventDefault();
                  e.stopImmediatePropagation();
                  var TenTheLoai= $("input[name=TenLoaiPhim]").val();
                  var token= $("input[name=_token]").val();

                  $.ajax({
                        type:'POST',
                        url:"{{route('LoaiPhim.add')}}",
                        data:$("#form-add").serialize(),
                        success:function(response){    
                          var array=JSON.parse(response);               
                          var string="";
                          $("#add").modal('hide');
                          for(let i =0; i<array.length;i++)
                          {
                            string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].TenLoaiPhim+"</td>";
                            if(array[i].TrangThai==1)
                            {
                              string+="<td>"+"Đang sử dụng"+"</td>"
                            }
                            else
                            { 
                              string+="<td>"+"Không sử dụng"+"</td>"
                            }
                            string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaLoaiPhim("+array[i].id+")'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                            string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaLoaiPhim("+array[i].id+")'"+">Xóa thể loại</a>"+"</td></tr>"
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


{{-- Xóa thể loại phim --}}
<script>
   function xoaLoaiPhim(id)
   {
      if(confirm('Bạn có chắc muốn xóa không'))
      {
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url:"/LoaiPhim/delete/"+id,
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


{{-- Chỉnh sửa thể loại phim --}}
<script>

    function suaLoaiPhim(id)
    { 
      $.get('/LoaiPhim/edit/'+id, function(LoaiPhim){  
        $("#id").val(LoaiPhim.id); 
        $("#TenLoaiPhim").val(LoaiPhim.TenLoaiPhim);
        $("#edit").modal("toggle");
      });
    } 

    $(document).ready(function(){
        $('#form-edit').on('submit',function(e){
              e.preventDefault();
              var id= $("#id").val();
            
             $.ajax({
                    type:'POST',
                    url:"/LoaiPhim/update/"+id,
                    data: $("#form-edit").serialize(),
                    success:function(response){       
                      
                      var array=JSON.parse(response);
                      
                      var string="";
   
                      $("#edit").modal('hide');

                      for(let i =0; i<array.length;i++)
                      {
                          string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].TenLoaiPhim+"</td>";
                          if(array[i].TrangThai==1)
                          {
                            string+="<td>"+"Đang sử dụng"+"</td>"
                          }
                          else
                          { 
                            string+="<td>"+"Không sử dụng"+"</td>"
                          }
                          string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaLoaiPhim('"+array[i].id+"')"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                          string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaLoaiPhim("+array[i].id+")'"+">Xóa thể loại</a>"+"</td></tr>"
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



