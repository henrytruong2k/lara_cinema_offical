@extends('layout')
@section('content')

  
  <!-- Modal -->
  <div class="modal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">Thêm loại TG chiếu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="form-add" >
          @csrf
             <div class="form-group">
                    <label class="text-dark">Tên loại TG chiếu</label>
                    <input id="TenLoaiTGChieu" type="text" name="TenLoaiTGChieu" class="form-control form-control-user" >
                    <p class="text-danger">{{ $errors->first('TenLoaiTGChieu') }}</p>
             </div>
             <div class="form-group">
                <label class="text-dark">Giá TG chiếu</label>
                <input id="GiaTGChieu" type="number" name="GiaTGChieu" class="form-control form-control-user" >
                <p class="text-danger">{{ $errors->first('GiaTGChieu') }}</p>
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
          <h5  class="modal-title" id="exampleModalLongTitle">Chỉnh sửa loại TG chiếu</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="form-edit">
             @csrf
             <div class="form-group">
                    <label class="text-dark" for="id">Mã loại</label>
                    <input disabled=true type="text" id="eid" name="eid" class="form-control form-control-user">
             </div>
             <div class="form-group">
                    <label class="text-dark" for="TenLoaiPhim">Tên loại TG chiếu</label>
                    <input type="text" id="editTenLoaiTGChieu" name="editTenLoaiTGChieu" class="form-control form-control-user">
                    <p class="text-danger">{{ $errors->first('TenLoaiTGChieu') }}</p>
             </div>
             <div class="form-group">
                <label class="text-dark" for="TenLoaiPhim">Giá TG chiếu</label>
                <input type="number" id="editGiaTGChieu" name="editGiaTGChieu" class="form-control form-control-user">
                <p class="text-danger">{{ $errors->first('GiaTGChieu') }}</p>
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
    <h1 class="h2 mb-2 text-center text-primary">QUẢN LÝ LOẠI THỜI GIAN CHIẾU</h1>

    <button data-toggle="modal" data-target="#add" class="btn btn-primary"><i class="fa fa-film" aria-hidden="true"> Thêm mới</i></button>

    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-stripped table-hover" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã loại</th>
                            <th>Tên loại TG chiếu</th>
                            <th>Giá TG chiếu</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>               
                    <tbody id="body">
                        @foreach ($list as $item)
                            <tr id="sid{{$item->id}}">
                                <td>{{ $item->id }}</td>
                                <td>{{$item->TenLoaiTGChieu}}</td>
                                <td>{{$item->Gia_TG}}</td>     
                                 <td>
                                     <a href="javascript:void(0)" data-toggle="modal" onclick="suaLoaiTG({{$item->id}})" data-target="#edit" class="btn btn-info" type="submit">Chỉnh sửa</a>|
                                     <a href="javascript:void(0)"  class="btn btn-danger" onclick="xoaLoaiTG({{$item->id}})" >Xóa loại TG</a>
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


{{-- Thêm loại TG chiếu--}}
<script>

   $(document).ready(function(){

          $("#form-add").on('submit',function(e){

                  e.preventDefault();
                  e.stopImmediatePropagation();
                  var TenLoaiTGChieu= $("input[name=TenLoaiTGChieu]").val();
                  var GiaTGChieu= $("input[name=GiaTGChieu]").val();
                  var token= $("input[name=_token]").val();

                  $.ajax({
                        type:'POST',
                        url:"{{route('LoaiTGChieu.add')}}",
                        data:{
                            TenLoaiTGChieu:TenLoaiTGChieu,
                            Gia_TG:GiaTGChieu,
                            _token:token
                        },
                        success:function(response){    
                          var array=JSON.parse(response);               
                          var string="";
                          $("#add").modal('hide');
                          for(let i =0; i<array.length;i++)
                          {
                            string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].TenLoaiTGChieu+"</td>";
                            string+="<td>"+array[i].Gia_TG+"</td>";
                            string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaLoaiTG("+array[i].id+")'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                            string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaLoaiTG("+array[i].id+")'"+">Xóa loại TG</a>"+"</td></tr>"
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
   function xoaLoaiTG(id)
   {

      if(confirm('Bạn có chắc muốn xóa không'))
      {
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url:"/LoaiTGChieu/delete/"+id,
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

    function suaLoaiTG(id)
    { 
      $.get('/LoaiTGChieu/edit/'+id, function(LoaiTGChieu){  
        $("#eid").val(LoaiTGChieu.id); 
        $("#editTenLoaiTGChieu").val(LoaiTGChieu.TenLoaiTGChieu);
        $("#editGiaTGChieu").val(LoaiTGChieu.Gia_TG);
        $("#edit").modal("toggle");
      });
    } 

    $(document).ready(function(){
        $('#form-edit').on('submit',function(e){
              e.preventDefault();
              e.stopImmediatePropagation();
              var id= $("#eid").val();
              var TenLoaiTGChieu= $("input[name=editTenLoaiTGChieu]").val();
              var GiaTGChieu= $("input[name=editGiaTGChieu]").val();
              var token= $("input[name=_token]").val();
            
             $.ajax({
                    type:'POST',
                    url:"/LoaiTGChieu/update/"+id,
                    data:{
                           TenLoaiTGChieu:TenLoaiTGChieu,
                            Gia_TG:GiaTGChieu,
                           _token:token,
                    },

                    success:function(response){                
                         var array=JSON.parse(response);               
                          var string="";
                          $("#edit").modal('hide');
                          for(let i =0; i<array.length;i++)
                          {
                            string+="<tr id='sid"+array[i].id +"'"+"><td>"+array[i].id+"</td>"+"<td>"+array[i].TenLoaiTGChieu+"</td>";
                            string+="<td>"+array[i].Gia_TG+"</td>";
                            string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaLoaiTG("+array[i].id+")'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                            string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaLoaiTG("+array[i].id+")'"+">Xóa thể loại</a>"+"</td></tr>"
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



