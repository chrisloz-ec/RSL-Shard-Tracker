<!-- Modal -->
<div class="modal fade" id="modalEditopening" tabindex="-1" aria-labelledby="EditOpeningModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-black-2 text-light">
        <h5 class="modal-title" id="EditOpeningModalLabel">Edit Current Opening</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" id="formCurrentOpening">
        <div class="modal-body">
          <h2 class="h6 mb-1 text-primary">Manual editing of current aperture</h2>
          <hr class="dropdown-divider">
          <span class="badge bg-light text-start text-muted text-wrap fw-light fst-italic lh-sm">Edit the open shard count if necessary (for example if you accidentally hit the open button on a shard or if you opened x10 shards and got a legendary champion in the middle of the open, in this way a more exact percentage is obtained).</span>
          <input type="hidden" class="form-control" id="InputUserOpening">
          <input type="hidden" class="form-control" id="InputShardOpening">
          <div class="form-floating mb-3 mt-3">
            <input type="number" class="form-control" id="InputOpening" min="0" required>
            <label for="InputOpening">Current Opening</label>
          </div>
        </div>
        <div class="modal-footer">
          <button id="btnCloseEditOpening" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="update_shard" class="btn btn-dark bg-black-2" type="button">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>