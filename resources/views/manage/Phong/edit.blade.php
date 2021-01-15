<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5  class="modal-title" id="exampleModalLongTitle">Chỉnh sửa phòng</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  id="form-edit">
          @csrf
          <div class="form-group">
            <label class="text-dark">Mã phòng</label>
            <input disabled=true type="text" id="MaPhong" name="MaPhong" class="form-control form-control-user" >
            <p class="text-danger">{{ $errors->first('MaPhong') }}</p>
          </div>
          <div class="form-group">
            <label class="text-dark">Tên phòng</label>
            <input type="text" id="eTenPhong" name="eTenPhong" class="form-control form-control-user" >
            <p class="text-danger">{{ $errors->first('TenPhong') }}</p>
          </div>
            <div class="form-group">
            <label class="text-dark">Chọn rạp: </label>
              <select name="eselectRap" id="eroleRap" class="form-control">
                <option value="">option</option>
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