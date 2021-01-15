<!-- Modal add -->
<div class="modal" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  class="modal-title" id="exampleModalLongTitle">Thêm phòng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form id="form-add" >
          @csrf
          <div class="form-group">
                <label class="text-dark" for="TenPhong">Tên phòng</label>
                <input type="text" id="TenPhong" name="TenPhong" class="form-control form-control-user">
                
            </div>
            <div class="form-group">
                <label class="text-dark">Chọn rạp: </label>
                <select name="selectRap" id="roleRap" class="form-control">
                    <option value="">option</option>
                </select>
            </div>
            <button type="submit" id="add-data" class="btn btn-primary">Thêm mới</button>
            
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          
        </div>
        <div class="alert alert-success" style="display: none"></div>
        </div>
        
      </div>
    </div>
  </div>