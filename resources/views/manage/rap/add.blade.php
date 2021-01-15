<!-- Modal add -->
<div class="modal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">Thêm rạp</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="form-add" >
            @csrf
            <div class="form-group">
                <label class="text-dark" for="TenPhong">Tên rạp</label>
                <input type="text" id="TenRạp" name="TenRap" class="form-control form-control-user">
            </div>
            <div class="form-group">
                <label class="text-dark" for="DiaChi">Địa chỉ</label>
                <input type="text" id="DiaChi" name="DiaChi" class="form-control form-control-user">
            </div>
            <div class="form-group">
                <label class="text-dark" for="SDT">SĐT</label>
                <input type="text" id="SDT" name="SDT" class="form-control form-control-user">
            </div>
            
        
            <div class="modal-footer">
                <button type="submit" id="add-data" class="btn btn-primary">Thêm mới</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </form>
        <div class="alert alert-success" style="display: none"></div>
        </div>
        
      </div>
    </div>
  </div>