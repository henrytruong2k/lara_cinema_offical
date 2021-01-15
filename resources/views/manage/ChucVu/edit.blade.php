<div class="modal fade" id="editTaskModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmEditTask">
                <div class="modal-header">
                    <h4 class="modal-title">
                        Sửa chức vụ
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
                    <input id="task_id" name="MaCV" type="hidden" value="0">
                        <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                            <button class="btn btn-info" id="btn-edit" type="button" >
                                Cập nhật
                            </button>


                </div>
            </form>
        </div>
    </div>
</div>
