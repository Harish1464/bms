<!-- Modal -->
<div class="modal fade" id="viewClientModal" tabindex="-1" aria-labelledby="viewClientModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-center" id="viewClientModalLabel">Client Detail</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <p><b>Name : </b><span id="client_name">Ram</span></p>
      <p><b>Email :  </b><span id="client_email">Ram</span></p> 
      <p><b>Phone :  </b><span id="client_phone">Ram</span></p> 
      <p><b>Address :  </b><span id="client_address">Ram</span></p> 
      <p><b>Gender :  </b><span id="client_gender">Ram</span></p> 
      <p><b>DOB :  </b><span id="client_dob">Ram</span></p> 
      <p><b>Nationality :  </b><span id="client_nationality">Ram</span></p> 
      <p><b>Education Background :  </b><span id="client_education">Ram</span></p> 
      <p><b>Mode of Contact : </b><span id="client_contact_mode">Ram</span></p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"> Ok </button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
  <script>
    $(document).ready( function(){
      $('.view-btn').on('click', function(){

          $("#viewClientModal").modal('show');
          $tr = $(this).closest('tr');
          var data = $tr.children('td').map(function(){
            return $(this).text();
          }).get();
          // console.log(data);
          $("#client_name").text(data[1]);
          $("#client_email").text(data[2]);
          $("#client_phone").text(data[3]);
          $("#client_address").text(data[4]);
          $("#client_gender").text(data[5]);
          $("#client_dob").text(data[6]);
          $("#client_nationality").text(data[7]);
          $("#client_education").text(data[8]);
          $("#client_contact_mode").text(data[9]);
      });
    });
  </script>
@endpush