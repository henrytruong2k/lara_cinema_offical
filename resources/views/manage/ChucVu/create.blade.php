<div class="modal fade" id="addTaskModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmAddTask">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Thêm chức vụ mới
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label>
                            Tên chức vụ
                        </label>
                        <input class="form-control" id="task" name="TenCV" required="" type="text">

                    </div>

                </div>
                <div class="modal-footer">
                    <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                      <button class="btn btn-info" id="btn-add" type="button" value="add">
                           Thêm chức vụ
                      </button>

                </div>
            </form>
        </div>
    </div>
</div>
