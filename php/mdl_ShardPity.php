<!-- Modal -->
<div class="modal fade" id="modalPity" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-black-2 text-light">
        <h5 class="modal-title" id="exampleModalLabel">Shard Mercy System</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <h2 class="h6 mb-1 text-primary">Shar Summoning Chances</h2>

        <div class="form-check form-check-inline form-switch mb-2">
          <input class="form-check-input" type="checkbox" id="cbx_x2">
          <label class="form-check-label" for="cbx_x2">Event x2 (for all shards)</label>
        </div>

        <div class="table-responsive">
          <table class="table table-sm table-bordered border-dark">
            <thead>
              <tr class="bg-black-2 text-light">
                <td scope="col"><small>Shard Type</small></td>
                <td scope="col"><small>Common</small></td>
                <td scope="col"><small>Uncommon</small></td>
                <td scope="col"><small>Rare</small></td>
                <td scope="col"><small>Epic</small></td>
                <td scope="col"><small>Legendary</small></td>
              </tr>
            </thead>
            <tbody>
              <tr class="table-light">
                <td scope="row">Ancient</td>
                <td>-</td>
                <td>-</td>
                <td id="td_ancient_r">91.5%</td>
                <td id="td_ancient_e">8%</td>
                <td id="td_ancient_l">0.5%</td>
              </tr>
              <tr class="table-light">
                <td scope="row">Void</td>
                <td>-</td>
                <td>-</td>
                <td id="td_void_r">91.5%</td>
                <td id="td_void_e">8%</td>
                <td id="td_void_l">0.5%</td>
              </tr>
              <tr class="table-light">
                <td scope="row">Sacred</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td id="td_sacred_e">94%</td>
                <td id="td_sacred_l">6%</td>
              </tr>
            </tbody>
          </table>
        </div>
        <h2 class="h6 mb-2 mt-3 text-primary">Mercy System</h2>
        <div class="table-responsive">
          <table class="table table-sm table-bordered border-dark">
            <thead>
              <tr class="bg-black-2 text-light">
                <td scope="col"><small>Shard Type</small></td>
                <td scope="col"><small>Rarity</small></td>
                <td scope="col"><small>Mercy system Activation</small></td>
                <td scope="col"><small>Chance Increase (per Shard)</small></td>
              </tr>
            </thead>
            <tbody>
              <tr class="table-light">
                <td scope="row">Ancient, Void</td>
                <td>Epic</td>
                <td>After 20 Summons without Epic</td>
                <td>+2%</td>
              </tr>
              <tr class="table-light">
                <td scope="row">Ancient, Void</td>
                <td>Legendary</td>
                <td>After 200 Summons without Legendary</td>
                <td>+5%</td>
              </tr>
              <tr class="table-light">
                <td scope="row">Sacred</td>
                <td>Legendary</td>
                <td>After 200 Summons without Legendary</td>
                <td>+2%</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>