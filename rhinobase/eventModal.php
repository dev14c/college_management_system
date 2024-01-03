<!-- Modal -->
<div class="modal fade" id="eventModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Event</h1>
      </div>
      <div class="modal-body">
        <form action="events_calender.php" method="post">
        <input type="hidden" name="addsubmitted" value="3" >
          <div class="mb-3">
            <label for="eventName" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="eventName" name="eventName" required>
          </div>
          <div class="mb-3">
            <label for="eventDate" class="form-label">Event Date</label>
            <input type="date" class="form-control" id="eventDate" name="eventDate" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit"  class="btn btn-primary" >Add Event</button>
      </div>
      </form>
    </div>
  </div>
</div>
