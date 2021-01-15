<div class="modal fade" id="deleteTaskModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteTask">
                <div class="modal-header">
                    <h4 class="modal-title" id="delete-title" name="title">
                        Xóa chức vụ
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Bạn có muốn xóa chức vụ này không?
                    </p>
                    <p class="text-warning">
                        <small>
                            Hành động không thể hoàn tác
                        </small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input id="task_id" name="MaCV" type="hidden" value="0">
                        <input class="btn btn-default" data-dismiss="modal" type="button" value="Hủy">
                            <button class="btn btn-danger" id="btn-delete" type="button">
                                Xóa chức vụ
                            </button>


                </div>
            </form>
        </div>
    </div>
</div>
