<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5  class="modal-title" id="exampleModalLongTitle">Chỉnh sửa rạp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  id="form-edit">
        <div class="modal-body">
            @csrf
            <div class="form-group">
              <label class="text-dark">Mã rạp</label>
              <input disabled=true type="text" id="MaRap" name="id" class="form-control form-control-user" >
              {{-- <p class="text-danger">{{ $errors->first('MaPhong') }}</p> --}}
            </div>
            <div class="form-group">
              <label class="text-dark">Tên rạp</label>
              <input type="text" id="eTenRap" name="eTenRap" class="form-control form-control-user" >
              {{-- <p class="text-danger">{{ $errors->first('TenPhong') }}</p> --}}
            </div>
            <div class="form-group">
              <label class="text-dark">Địa chỉ</label>
              <input type="text" id="eDiaChi" name="eDiaChi" class="form-control form-control-user" >
              {{-- <p class="text-danger">{{ $errors->first('TenPhong') }}</p> --}}
            </div>
            <div class="form-group">
              <label class="text-dark">SĐT</label>
              <input type="text" id="eSDT" name="eSDT" class="form-control form-control-user" >
              {{-- <p class="text-danger">{{ $errors->first('TenPhong') }}</p> --}}
            </div>
              
        
        </div>
        <div class="modal-footer">
          <button type="submit" id="edit-data" class="btn btn-primary">Lưu lại</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        </div>
      </form>
    </div>
  </div>
</div>