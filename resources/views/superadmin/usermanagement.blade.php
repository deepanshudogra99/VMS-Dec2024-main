<x-starthtml></x-starthtml>
<x-header></x-header>
@include('navigation-menu')
@livewire('super-admin.user-management')
<!-- <script>
  // Listen for the 'statusUpdated' event emitted by Livewire
  Livewire.on('statusUpdated', () => {
    // You can either reload the entire page or update specific parts of the page
    location.reload();
  });
</script> -->

<x-footer></x-footer>
<x-endhtml></x-endhtml>