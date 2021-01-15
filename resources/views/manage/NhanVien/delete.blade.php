<div class="modal fade" id="deleteNhanVien">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="frmDeleteNhanVien">


                <div class="modal-header">
                    <h4 class="modal-title" id="delete-title" name="title">
                        Xóa nhân viên
                    </h4>
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Bạn có muốn xóa nhân viên này không?
                    </p>
                    <p class="text-warning">
                        <small>
                            Hành động không thể hoàn tác
                        </small>
                    </p>
                </div>
                <div class="modal-footer">
                    <input id="task_id" name="MaNV" type="hidden" value="0">
                        <input class="btn btn-default" data-dismiss="modal" type="button" value="Hủy">
                            <button class="btn btn-danger" id="btn-delete" type="button">
                                Xóa nhân viên
                            </button>

                </div>
            </form>
        </div>
    </div>
</div>
