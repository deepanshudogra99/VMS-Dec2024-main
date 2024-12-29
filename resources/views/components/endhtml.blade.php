<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Include Popper.js and Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


<script>
  $(document).ready(function () {
    $('#state-list').on('change', function () {
      var idState = this.value;
      //alert(idState);
      $('#district-list').html('');
      $.ajax({
        url: "{{ url('get-districts') }}",
        type: "POST",
        data: {
          state_id: idState,
          //alert(state_id),
          _token: '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function (result) {
          $('#district-list').html('<option value="">Select District</option>');
          $.each(result.districts, function (key, value) {
            $('#district-list').append('<option value="' + value.districtcode + '">' + value.districtname + '</option>');
          })
        }
      });
    });
  });
</script>

@livewireScripts
</body>

</html>