$(function() {
  $('form').submit(function() {
      $.ajax({
          type: 'POST',
          url: 'form.php',
          data: { name: $(this).name.value, 
                  message: $(this).message.value }
      });
      return false;
  }); 
})