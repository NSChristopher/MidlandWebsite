$(function () {

  $('form').on('submit', function (e) {

    e.preventDefault();

    $.ajax({
      type: 'post',
      url: 'form.php',
      data: $('form').serialize(),
      success: function () {
        alert('form was submitted');
      }
    });

  });

});