<!-- Edit -->
<div class="modal fade" id="refresh_data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Refresh Data</b></h4>
                <p>It will refresh data and the computation.</p>
            </div>
            <form class="form-horizontal" method="POST" action="hectare_refresh.php">
                <input type="hidden" value="test" name="testId">
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-success btn-flat" name="refresh"><i class="fa fa-refresh"></i> Refresh</button>
            </form>
        </div>
    </div>
</div>
</div>