@extends('layout')
@section('content')

<
<div class="card o-hidden border-0 shadow-lg my-5">
  <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="col">
          {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
          <div class="col-lg-6">
              <div class="p-5">
                  <div class="text-center">
                      <h1 class="text-primary">THÊM THỂ LOẠI PHIM MỚI</h1>
                  </div>
             
                  <form id="user-form" class="user" method="POST" action="{{url('/LoaiPhim/create')}}">
                  
                      <div class="form-group">
                         <label class="text-dark" for="TenLoaiPhim">Tên thể loại </label>
                         <input type="text" name="TenLoaiPhim" class="form-control form-control-user" id="exampleFirstName"  placeholder="Hành động">
                         <p class="text-danger">{{ $errors->first('TenLoaiPhim') }}</p>
                      </div>
                      <button id="add-data" class="btn btn-primary btn-user btn-block">Thêm mới</button>
                  </form>
                  <hr>
              </div>
          </div>
      </div>
  </div>
</div>

<script>
    $(document).ready(function()
      {
          $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
          });
        //   $("#add_data").submit(function()
        //   {
        //       $('#user-form')[0].reset();
        //       $('#form-output').html('');
        //       $('#button_action').val('insert');
        //       $('#action').val('Add');
        //       console.log("click thanh cong");
  
        //   });
  
          $("#user-form").on('submit',function(e)
          {
              e.stopImmediatePropagation();
              e.preventDefault();     
              var form_data=$(this).serialize();
             
  
  
              var name=$('#name').val();
              var fullname=$('#fullname').val();
              var address=$('#address').val();
              var password=$('#pass').val();
              var email=$('#email').val();
              var button_action=$('#button_action').val();
  
              var phone=$('#phone').val();
  
              var _token   = $('meta[name="csrf-token"]').attr('content');
              $.ajax({
                  url:"{{route('user.add')}}",
                  method:"POST",
                  // contentType: "application/json",
                  dataType:"JSON",
                  // contentType: "application/json; charset=utf-8",
                  data:{
                  Fullname:fullname,
                  Name:name,
                  Address:address,
                  Password:password,
                  Phone:phone,
                  Email:email,
                  button_action:button_action,
                  _token:_token
                  },
                  success:function(data)
                  {
                      console.log(data.error);
                      if(data.error.length>0)
                      {
                          error_html="";
                           for(var count =0;count<data.error.length;count++)
                          {
                              error_html+=
                              '<div class="alert alert-danger fade show" role="alert">'+
                                data.error[count]+
                                 ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">'+
                                   ' <span aria-hidden="true">&times;</span>'+
                                   '</button>'+
                                '</div>'
  
                          }
                          console.log(error_html);
                          $('#form-output').html(error_html);
                      }
                      else
                      {
  
                      }
                          //  $('#form-output').html(data.success);
                          // $('#user-form')[0].reset();
                          // $('#action').val('Add');
                      // for(var count =0;count<data.error.length;count++)
                      //     {
                      //         error_html+='<div class="alert alert-danger">'obj.error[count]+'</div>';
                      //          console.log(error_html);
                      //     }
                      //     $('#form-output').html(error_html);
  
                      // var obj = JSON.parse(data.code);
  
                      // if(obj.error.length>0)
                      // {
                      //     var error_html="";
                      //     for(var count =0;count<obj.error.length;count++)
                      //     {
                      //         error_html+='<div class="alert alert-danger">'obj.error[count]+'</div>';
                      //     }
                      //     $('#form-output').html(error_html);
                      // }
                      // else
                      // {
                      //     $('#form-output').html(obj.success);
                      //     $('#user-form')[0].reset();
                      //     $('#action').val('Add');
                      // }
                  },
                  error:function(jqXhr,textStatus,errorThrown)
                  {
                      console.log("thất bại"+errorThrown);
                  }
              });
          });
          $('.ad_button-delete').click(function(e)
          {
              var a=$(this).attr('data-index');
              console.log("click vao xoa thanh cong"+a);
              $.ajax({
                  url:"{{route('user.delete')}}",
                  method:"GET",
                  dataType:"JSON",
                  data:{
                      id:a
                  },success:function(data)
                  {
                      console.log("Thanh cong");
                  },
                  error:function(jqXhr,textStatus,errorThrown)
                  {
                      console.log("that bai");
                  }
              });
          });
      });
  </script>
  
@endsection
