<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="dataTime" tabindex="-1" role="dialog" aria-labelledby="dataTimeLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dataTimeLabel">Fecha y hora</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-row">
          <div class="col-md-4 mb-3">
            <label for="validationCustom01">Fecha</label>
            <input type="time" id="appt" name="appt" class="form-control">

            <input type="datetime-local" class="form-control" id="validationCustom01" placeholder="First name" >
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom02">Hora</label>
            <select class="custom-select" id="inputGroupSelect01">
              <option selected>Choose...</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationCustom02">Minuto</label>
            <select class="custom-select" id="inputGroupSelect01">
              <option selected>Choose...</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
        </div>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>