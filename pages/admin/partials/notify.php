<div class="alert alert-warning alert-dismissible fade show" role="alert">
<strong><?php echo $notification ?></strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<script>
window.setTimeout(function() {
  $(".alert").fadeTo(500, 0).slideUp(500, function()
  {
    $(this).remove();
  });
}, 4000);
</script>
