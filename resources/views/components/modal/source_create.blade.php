<!-- Source Create Modal -->
<div class="modal fade text-light" id="sourceCreateModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark border border-dark">
        <h5 class="modal-title" id="exampleModalLabel">Create Transaction Source</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary">
        <form id="sourceCreateModalForm" method="POST" action="/user/sources">
            @csrf

            <div class='form-group'>
                <label>Source Name</label>
                <input autofocus required class="form-control" type="text" name="source_name" placeholder="Examples: Qdoba, Walmart.." />
            </div>
        </form>
      </div>
      <div class="modal-footer bg-dark border border-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="document.getElementById('sourceCreateModalForm').submit()" type="button" class="btn btn-primary">Create</button>
      </div>
    </div>
  </div>
</div>
