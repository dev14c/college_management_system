
<!-- Modal -->
<div class="modal fade" id="eventdelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Event</h1>
      </div>
      <div class="modal-body">
        <form action="events_calender.php" method="post">
        <input type="hidden" name="delsubmitted" value="1" >
          <div class="mb-3">
            <label for="eventDate" class="form-label">Event Date</label>
            <input type="date" class="form-control" id="eventDate" name="delDate" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" >Delete Event</button>
      </div>
      </form>
    </div>
  </div>
</div>
