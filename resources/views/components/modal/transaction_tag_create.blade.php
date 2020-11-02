<!-- Source Create Modal -->
@php
$_elementId = "transactionTagCreateModal_transactionId_" . $transactionId;
$_formId = "transactionTagCreateModalForm_transactionId_" . $transactionId;
@endphp
<div class="modal fade text-light" id="{{ $_elementId }}" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-dark border border-dark">
        <h5 class="modal-title" id="exampleModalLabel">Attach Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-secondary">
        <form id="{{ $_formId }}" method="POST" action="/transaction/create/tag">
            @csrf

            <input type="hidden" name="transaction_id" value="{{ $transactionId }}" />
            @include('components.select.tag')
        </form>
      </div>
      <div class="modal-footer bg-dark border border-dark">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button onclick="document.getElementById('{{ $_formId }}').submit()" type="button" class="btn btn-primary">Attach</button>
      </div>
    </div>
  </div>
</div>
