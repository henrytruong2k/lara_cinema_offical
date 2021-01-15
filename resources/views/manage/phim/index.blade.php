@extends('layout')
@section('content')

<!-- Modal add -->
<div class="modal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">THÊM PHIM MỚI</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" id="form-add" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group">
                     <label class="text-dark" for="TenPhim">Tên phim:</label>
                     <input type="text" name="TenPhim" class="form-control form-control-user"  >
                     <p class="text-danger">{{ $errors->first('TenPhim') }}</p>
                  </div>
                  <div class="form-group">
                      <label class="text-dark" for="NgayDKChieu">Ngày ĐK chiếu:</label>
                      <input type="date" name="NgayDKChieu" class="form-control form-control-user"  >
                      <p class="text-danger">{{ $errors->first('NgayDKChieu') }}</p>
                  </div>
                  <div class="form-group">
                    <label class="text-dark" for="NgayKetThuc">Ngày kết thúc:</label>
                    <input type="date" name="NgayKetThuc" class="form-control form-control-user"  >
                    <p class="text-danger">{{ $errors->first('NgayKetThuc') }}</p>
                  </div>

                  <div class="form-group">
                    <label class="text-dark" for="DaoDien">Đạo diễn:</label>
                    <input type="text" name="DaoDien" class="form-control form-control-user"  >
                    <p class="text-danger">{{ $errors->first('DaoDien') }}</p>
                 </div>
                 <div class="form-group">
                  <label class="text-dark">Trailer :</label>
                  <input type="text" name="Trailer" class="form-control form-control-user"  >
                  <p class="text-danger">{{ $errors->first('Trailer') }}</p>
                </div>


                  <div class="form-group">
                    <label class="text-dark">Giới hạn tuổi:</label>
                    <select name="GioiHanTuoi" >
                      <option value="20+">20+</option>
                      <option value="18+">18+</option>
                      <option value="16+">16+</option>
                    </select>
                    <p class="text-danger">{{ $errors->first('GioiHanTuoi') }}</p>
                  </div>
                  <div class="form-group">
                    <label class="text-dark">Quốc gia:</label>
                    <input type="text" name="QuocGia" class="form-control form-control-user" >
                    <p class="text-danger">{{ $errors->first('QuocGia') }}</p>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label class="text-dark" for="ThoiLuong">Thời lượng:</label>
                        <input type="number" name="ThoiLuong" class="form-control form-control-user"  >
                        <p class="text-danger">{{ $errors->first('ThoiLuong') }}</p>
                    </div>
                </div>

                  <div class="form-group">
                    <label class="text-dark">Chọn thể loại: </label>
                    <select name="selectLoaiPhim" id="roleLoaiPhim">
                      <option value="">option</option>
                    </select>
                  </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="text-dark" for="GiaPhim">Giá phim:</label>
                      <input type="number" name="GiaPhim" class="form-control form-control-user"  >
                      <p class="text-danger">{{ $errors->first('GiaPhim') }}</p>
                  </div>
                </div>
                
                  <div class="form-group">
                    <label class="text-dark" for="HinhAnh">Hình ảnh:</label><br>
                    <input type="file" name="HinhAnh" alt="Profile Image" onchange="previewFile(this)"  >
                    <img id="previewImage" width="300px" height="200px"  alt="">
                    <p class="text-danger">{{ $errors->first('HinhAnh') }}</p>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label class="text-dark" for="MoTa">Mô tả :</label>
                        {{-- <input type="text" name="MoTa" class="form-control form-control-user"  > --}}
                        <textarea name="MoTa" id="idMoTa" cols="40" rows="10"></textarea>
                        <p class="text-danger">{{ $errors->first('MoTa') }}</p>
                    </div>
                  </div>
                  <button type="submit" id="add-data" class="btn btn-primary">Thêm mới</button>
              </form>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin phim</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="user" id="form-edit" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                  <label class="text-dark" for="TenPhim">Mã phim</label>
                  <input disabled=true type="text" name="id" class="form-control form-control-user" id="id"  >
                
               </div>
                  <div class="form-group">
                     <label class="text-dark" for="TenPhim">Tên phim</label>
                     <input type="text" name="editTenPhim" class="form-control form-control-user" id="tenphim"  >
                     <p class="text-danger">{{ $errors->first('TenPhim') }}</p>
                  </div>
                  <div class="form-group">
                      <label class="text-dark" for="NgayDKChieu">Ngày ĐK chiếu</label>
                      <input type="date" name="editNgayDKChieu" class="form-control form-control-user" id="ngaydkchieu" >
                      <p class="text-danger">{{ $errors->first('NgayDKChieu') }}</p>
                  </div>
                  <div class="form-group">
                    <label class="text-dark" for="NgayKetThuc">Ngày kết thúc</label>
                    <input type="date" name="editNgayKetThuc" class="form-control form-control-user" id="ngayketthuc" >
                    <p class="text-danger">{{ $errors->first('NgayKetThuc') }}</p>
                  </div>

                  <div class="form-group">
                    <label class="text-dark" for="DaoDien">Đạo diễn</label>
                    <input type="text" name="editDaoDien" class="form-control form-control-user" id="daodien" >
                    <p class="text-danger">{{ $errors->first('DaoDien') }}</p>
                 </div>
                 <div class="form-group">
                  <label class="text-dark">Trailer :</label>
                  <input type="text" name="editTrailer" class="form-control form-control-user" id="trailer" >
                  <p class="text-danger">{{ $errors->first('Trailer') }}</p>
                </div>

                  <div class="form-group">
                    <label class="text-dark">Giới hạn tuổi :</label>
                    <select id="gioihantuoi" name="editGioiHanTuoi">
                      <option value="20+">20+</option>
                      <option value="18+">18+</option>
                      <option value="16+">16+</option>
                    </select>
                    <p class="text-danger">{{ $errors->first('GioiHanTuoi') }}</p>
                  </div>
                  <div class="form-group">
                    <label class="text-dark">Quốc gia:</label>
                    <input type="text" name="editQuocGia" class="form-control form-control-user" id="quocgia" >
                    <p class="text-danger">{{ $errors->first('QuocGia') }}</p>
                  </div>

                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <label class="text-dark" for="ThoiLuong">Thời lượng :</label>
                        <input type="number" name="editThoiLuong" class="form-control form-control-user" id="thoiluong" >
                        <p class="text-danger">{{ $errors->first('ThoiLuong') }}</p>
                    </div>
                </div>

                <div class="form-group">
                  <label class="text-dark">Chọn thể loại : </label>
                  <select name="eselectLoaiPhim" id="eroleLoaiPhim">
                    <option value="">option</option>
                  </select>
                </div> 

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="text-dark" for="GiaPhim">Giá phim :</label>
                      <input type="number" name="editGiaPhim" class="form-control form-control-user" id="giaphim" >
                      <p class="text-danger">{{ $errors->first('ThoiLuong') }}</p>
                  </div>
              </div>
                
              <div class="form-group">
                    <label class="text-dark" for="HinhAnh">Hình ảnh :</label><br>
                    <input type="file" name="editHinhAnh" alt="Profile Image" onchange="eimage(this)" id="hinhanh" >
                    <img id="eimage" width="300px" height="200px"  >
                    <p class="text-danger">{{ $errors->first('HinhAnh') }}</p>
              </div>

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="text-dark" for="MoTa">Mô tả :</label>
                    <textarea name="editMoTa" id="editMoTa" cols="40" rows="10"></textarea>
                    <p class="text-danger">{{ $errors->first('MoTa') }}</p>
                </div>
             </div>
                  <button type="submit" id="add-data" class="btn btn-primary">Lưu lại</button>
              </form>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal details -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5  class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết phim</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form class="user" id="form-edit" enctype="multipart/form-data">
             
              <div class="form-group">
                <label class="text-dark" for="TenPhim">Mã phim</label>
                <input disabled=true type="text" name="id" class="form-control form-control-user" id="did"  >
              
             </div>
                <div class="form-group">
                   <label class="text-dark" for="TenPhim">Tên phim</label>
                   <input type="text" name="editTenPhim" class="form-control form-control-user" id="dtenphim"  >
                   <p class="text-danger">{{ $errors->first('TenPhim') }}</p>
                </div>
                <div class="form-group">
                    <label class="text-dark" for="NgayDKChieu">Ngày ĐK chiếu</label>
                    <input type="date" name="editNgayDKChieu" class="form-control form-control-user" id="dngaydkchieu" >
                    <p class="text-danger">{{ $errors->first('NgayDKChieu') }}</p>
                </div>
                <div class="form-group">
                  <label class="text-dark" for="NgayKetThuc">Ngày kết thúc</label>
                  <input type="date" name="editNgayKetThuc" class="form-control form-control-user" id="dngayketthuc" >
                  <p class="text-danger">{{ $errors->first('NgayKetThuc') }}</p>
                </div>

                <div class="form-group">
                  <label class="text-dark" for="DaoDien">Đạo diễn</label>
                  <input type="text" name="editDaoDien" class="form-control form-control-user" id="ddaodien" >
                  <p class="text-danger">{{ $errors->first('DaoDien') }}</p>
               </div>
               <div class="form-group">
                <label class="text-dark" for="DaoDien">Thể loại</label>
                <input type="text" name="editTheLoai" class="form-control form-control-user" id="dtheloai" >
                <p class="text-danger">{{ $errors->first('DaoDien') }}</p>
              </div>
               <div class="form-group">
                <label class="text-dark">Trailer :</label>
                <input type="text" name="editTrailer" class="form-control form-control-user" id="dtrailer" >
                <p class="text-danger">{{ $errors->first('Trailer') }}</p>
              </div>

                <div class="form-group">
                  <label class="text-dark">Giới hạn tuổi :</label>
                  <input type="text" name="editGioiHanTuoi" class="form-control form-control-user" id="dgioihantuoi" >
                  <p class="text-danger">{{ $errors->first('GioiHanTuoi') }}</p>
                </div>
                <div class="form-group">
                  <label class="text-dark">Quốc gia :</label>
                  <input type="text" name="editQuocGia" class="form-control form-control-user" id="dquocgia" >
                  <p class="text-danger">{{ $errors->first('QuocGia') }}</p>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="text-dark" for="ThoiLuong">Thời lượng</label>
                      <input type="number" name="editThoiLuong" class="form-control form-control-user" id="dthoiluong" >
                      <p class="text-danger">{{ $errors->first('ThoiLuong') }}</p>
                  </div>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label class="text-dark" for="GiaPhim">Giá phim</label>
                    <input type="number" name="editGiaPhim" class="form-control form-control-user" id="dgiaphim" >
                    <p class="text-danger">{{ $errors->first('ThoiLuong') }}</p>
                </div>
            </div>
              
            <div class="form-group">
                  <label class="text-dark" for="HinhAnh">Hình ảnh</label><br>
                  <img id="dimage" width="300px" height="200px"  >
                  <p class="text-danger">{{ $errors->first('HinhAnh') }}</p>
            </div>

              <div class="form-group">
                  <label class="text-dark" for="MoTa">Mô tả</label><br>
                   <textarea  id="dmota" cols="40" rows="10"></textarea>
                  <p class="text-danger">{{ $errors->first('MoTa') }}</p>
            </div>
            </form>
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
</div>



<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h2 mb-1 text-center text-primary">QUẢN LÝ PHIM</h1>
    <button onclick="loadLoaiPhim()" data-toggle="modal" data-target="#add" class="btn btn-primary"><i class="fa fa-film" aria-hidden="true"> Thêm phim mới</i></button>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center table-stripped table-hover" id="dataTable" width="100%"
                    cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã Phim</th>
                            <th>Tên phim</th>
                            <th>Đạo diễn</th>
                            <th>Thời lượng</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                  
                    <tbody id="body">
                        @foreach ($phims as $item)
                            <tr id="sid{{$item->id}}">
                                <td>{{ $item->id }}</td>
                                <td>{{$item->TenPhim}}</td>
                                <td>{{$item->DaoDien}}</td>
                                <td>{{$item->ThoiLuong}} Phút</td>
                                <td><img width="100px" height="80px" src={{url('/data/'.$item->HinhAnh)}} alt=""></td>
                                <td>
                                    @php
                                    if($item->TrangThai==1){
                                     echo'Đang chiếu';
                                    }
                                    else{
                                        echo'Đã kết thúc';
                                       }
                                   @endphp
                                </td>
                                 <td>
                                    <a href="javascript:void(0)" data-toggle="modal" onclick="suaPhim({{$item->id}});eloadLoaiPhim({{$item->loaiphim_id}})" data-target="#edit" class="btn btn-info" type="submit">Chỉnh sửa</a>|
                                    <a class="btn btn-info" type="submit" onclick="xemPhim({{$item->id}})">Details</a>
                                    <a href="javascript:void(0)"  class="btn btn-danger" onclick="xoaPhim({{$item->id}})" >Xóa phim</a> 
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{$phims->links()}}
            </div>
        </div>
    </div>

</div>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>



<script>
   function loadLoaiPhim()
  {      
          $('#roleLoaiPhim').empty();
          $.get('/LoaiPhim/get/', function(g){ 
                  var array=JSON.parse(g);  
                  for(var i=0;i<array.length;i++)
                  {
                      $('#roleLoaiPhim').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenLoaiPhim+'</option>');     
                  }
          });   
  }
</script>

<script>
  function eloadLoaiPhim(id)
  {      
        
         $('#eroleLoaiPhim').empty();
         $.get('/LoaiPhim/edit/'+id, function(g)
         {
           $('#eroleLoaiPhim').append('<option value='+g.id+'>'+g.id+': '+g.TenLoaiPhim+'</option>');     
         });

         $.get('/LoaiPhim/get/', function(g){ 
                 var array=JSON.parse(g);  
                 for(var i=0;i<array.length;i++)
                 {
                   if(array[i].loaiphim_id!=id)
                   {
                     $('#eroleLoaiPhim').append('<option value='+array[i].id+'>'+array[i].id+': '+array[i].TenLoaiPhim+'</option>');     
                   }
                     
                 }
         });   
 }
</script>

<script>
  function eimage(input){
      var file= $("input[type=file]").get(0).files[0];
      if(file){
          var reader= new FileReader();
          reader.onload=function(){
              $("#eimage").attr("src",reader.result);
          }
          reader.readAsDataURL(file);
      }
  }
</script>
{{-- Thêm phim --}}
<script>

   $(document).ready(function(){

          $("#form-add").on('submit',function(e){

                  e.preventDefault();
                  e.stopImmediatePropagation();
                  var TenPhim= $("input[name=TenPhim]").val();
                  var NgayDKChieu= $("input[name=NgayDKChieu]").val();
                  var NgayKetThuc= $("input[name=NgayKetThuc]").val();
                  var ThoiLuong= $("input[name=ThoiLuong]").val();
                  var DaoDien= $("input[name=DaoDien]").val();
                  var QuocGia= $("input[name=QuocGia]").val();
                  var loaiphim_id= $('select[name=selectLoaiPhim]').val() 
                  var Trailer= $("input[name=Trailer]").val();
                  var GiaPhim= $("input[name=GiaPhim]").val();
                  var MoTa = document.getElementById("idMoTa").value;
                  var HinhAnh= $("input[name=HinhAnh]").val();
                  var GioiHanTuoi= $("select[name=GioiHanTuoi]").val();
                  var _token= $("input[name=_token]").val();

                  $.ajax({
                        type:'POST',
                        url:"{{route('Phim.add')}}",
                        data:{
                             // $("#form-add").serialize(),
                             TenPhim:TenPhim,
                              NgayDKChieu:NgayDKChieu,
                              NgayKetThuc:NgayKetThuc,
                              DaoDien:DaoDien,
                              Trailer:Trailer,
                              loaiphim_id:loaiphim_id,
                              GioiHanTuoi:GioiHanTuoi,
                              QuocGia:QuocGia,
                              MoTa:MoTa,
                              ThoiLuong:ThoiLuong,
                              HinhAnh:HinhAnh,
                              GiaPhim:GiaPhim,
                              _token:_token,

                        },
                        
                        success:function(response){    
                          var array=JSON.parse(response);               
                          var string="";
                          alert("Thêm thành công");
                          $("#add").modal('hide');
                          for(let i =0; i<array.length;i++)
                          {
                            string+="<tr id='sid"+array[i].id +"'"+">";
                            string+="<td>"+array[i].id+"</td>";
                            string+="<td>"+array[i].TenPhim+"</td>";
                            string+="<td>"+array[i].DaoDien+"</td>";
                            string+="<td>"+array[i].ThoiLuong+"</td>";
                            string+="<td>"+"<img width='100px' height='80px' src='http://localhost:8000/data/"+array[i].HinhAnh+"'></td>";
                            if(array[i].TrangThai==1)
                            {
                                string+="<td>"+"Đang chiếu"+"</td>"
                            }
                            else
                            { 
                                string+="<td>"+"Đã kết thúc"+"</td>"
                            } 
                           
                            string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaPhim("+array[i].id+");eloadLoaiPhim("+array[i].loaiphim_id+")'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                            string+="<a class='btn btn-info'  href='javascript:void(0)'  onclick= 'xemPhim("+array[i].id+")'"+">Details</a>|";
                            string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaPhim("+array[i].id+")'"+">Xóa phim</a>"+"</td></tr>";
                          }
                            // location.reload();
                           $("#form-add").trigger('reset');
                            $(".modal-backdrop").remove();
                            $("#body").html(string);
                        },
                        error: function(error){
                          console.log(TenPhim);
                          alert("Thêm thất bại");
                        }            
                 });
          });  

           
  
 });

</script>


{{-- Xóa thể loại phim --}}
<script>
   function xoaPhim(id)
   {

      if(confirm('Bạn có chắc muốn xóa không'))
      {
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          url:"/Phim/delete/"+id,
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


{{-- Chỉnh sửa  phim --}}

<script>
    function xemPhim(id)
    { 
      $.get('/Phim/details/'+id, function(Phim){  
        $("#did").val(Phim.id); 
        $("#dtenphim").val(Phim.TenPhim);
        $("#ddaodien").val(Phim.DaoDien);
        $("#dthoiluong").val(Phim.ThoiLuong);
        $("#dtrailer").val(Phim.Trailer);      
        $("#dngaydkchieu").val(Phim.NgayDKChieu);
        $("#dngayketthuc").val(Phim.NgayKetThuc);
        $("#dquocgia").val(Phim.QuocGia);
        $("#dmota").val(Phim.MoTa);
        $("#dtheloai").val(Phim.theloais.TenLoaiPhim);
        $("#dgioihantuoi").val(Phim.GioiHanTuoi);
        $("#dgiaphim").val(Phim.GiaPhim);
        $("#dimage").attr("src",Phim.HinhAnh);

        $("#detail").modal("toggle");
      });
    } 

 
    function suaPhim(id)
    { 
      $.get('/Phim/edit/'+id, function(Phim){  
        $("#id").val(Phim.id); 
        $("#tenphim").val(Phim.TenPhim);
        $("#daodien").val(Phim.DaoDien);
        $("#thoiluong").val(Phim.ThoiLuong);
        $("#trailer").val(Phim.Trailer);  
        $("#editMoTa").val(Phim.MoTa);
        $("#ngaydkchieu").val(Phim.NgayDKChieu);
        $("#ngayketthuc").val(Phim.NgayKetThuc);
        $("#quocgia").val(Phim.QuocGia);
        $("#gioihantuoi").val(Phim.GioiHanTuoi);
        $("#giaphim").val(Phim.GiaPhim);
        $("#eimage").attr("src",'http://localhost:8000/data/' + Phim.HinhAnh);
        $("#edit").modal("toggle");
      });
    } 

    $(document).ready(function(){
        $('#form-edit').on('submit',function(e){
                  e.preventDefault();
                  e.stopImmediatePropagation();
                  var id = $("input[name=id]").val();
                  var TenPhim= $("input[name=editTenPhim]").val();
                  var NgayDKChieu= $("input[name=editNgayDKChieu]").val();
                  var NgayKetThuc= $("input[name=editNgayKetThuc]").val();
                  var ThoiLuong= $("input[name=editThoiLuong]").val();
                  var DaoDien= $("input[name=editDaoDien]").val();
                  var QuocGia= $("input[name=editQuocGia]").val();
                  // var Mota= $("input[name=editMoTa]").val();
                  var MoTa = document.getElementById("editMoTa").value;
                  var loaiphim_id= $('select[name=eselectLoaiPhim]').val() 
                  var Trailer= $("input[name=editTrailer]").val();
                  var GiaPhim= $("input[name=editGiaPhim]").val();
                  var HinhAnh= $("input[name=editHinhAnh]").val();
                  var GioiHanTuoi= $("select[name=editGioiHanTuoi]").val();
                  var _token= $("input[name=_token]").val();
            
             $.ajax({
                    type:'POST',
                    url:"/Phim/update/"+id,
                    data: {
                              TenPhim:TenPhim,
                              NgayDKChieu:NgayDKChieu,
                              NgayKetThuc:NgayKetThuc,
                              DaoDien:DaoDien,
                              Trailer:Trailer,
                              GioiHanTuoi:GioiHanTuoi,
                              QuocGia:QuocGia,
                              MoTa:MoTa,
                              loaiphim_id:loaiphim_id,
                              ThoiLuong:ThoiLuong,
                              HinhAnh:HinhAnh,
                              GiaPhim:GiaPhim,
                              _token:_token,
                    },
                    success:function(response){          
                      var array=JSON.parse(response);               
                          var string="";
                          alert("Thêm thành công");
                          $("#edit").modal('hide');
                          for(let i =0; i<array.length;i++)
                          {
                            string+="<tr id='sid"+array[i].id +"'"+">";
                            string+="<td>"+array[i].id+"</td>";
                            string+="<td>"+array[i].TenPhim+"</td>";
                            string+="<td>"+array[i].DaoDien+"</td>";
                            string+="<td>"+array[i].ThoiLuong+"</td>";
                            string+="<td>"+"<img width='100px' height='80px' src='http://localhost:8000/data/"+array[i].HinhAnh+"'></td>";
                            if(array[i].TrangThai==1)
                            {
                                string+="<td>"+"Đang chiếu"+"</td>"
                            }
                            else
                            { 
                                string+="<td>"+"Đã kết thúc"+"</td>"
                            }              
                            string+="<td>"+"<a href='javascript:void(0)' data-toggle='modal' onclick= 'suaPhim("+array[i].id+");eloadLoaiPhim("+array[i].loaiphim_id+")'"+" data-target='#edit' class='btn btn-info' type='submit'>Chỉnh sửa</a>|";
                            string+="<a class='btn btn-info'  href='javascript:void(0)'  onclick= 'xemPhim("+array[i].id+")'"+">Details</a>|";
                            string+="<a class='btn btn-danger'  href='javascript:void(0)'  onclick= 'xoaPhim("+array[i].id+")'"+">Xóa phim</a>"+"</td></tr>";
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



