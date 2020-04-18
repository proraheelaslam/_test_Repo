<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="confirmDelete" class="modal fade" style="display: none;">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Confirm Delete</h4>
        </div>
        <div class="modal-body"> Are you sure you want to delete? </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default btn-loading" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-warning btn-loading" data-dismiss="modal" id="btn-delete"> Confirm</button>
        </div>
    </div>
    </div>
</div>
<script>
    $('#confirmDelete').on('hidden.bs.modal', function () {
        $('.btn-loading').button('reset');
    });
</script>