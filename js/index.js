<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

/* attach a submit handler to the form */
$("#contact-form").submit(function(event) {

  /* stop form from submitting normally */
  event.preventDefault();

  /* get the action attribute from the <form action=""> element */
  var $form = $(this),
    url = $form.attr('action');

  /* Send the data using post with element id name and name2*/
  var posting = $.post(url, {
    name: $('#name').val(),
    email: $('#email').val(),
    subject: $('#subject').val(),
    message: $('#message').val()
  });

  /* Alerts the results */
  posting.done(function(data) {
    $('#result').text('success');
  });
  posting.fail(function() {
    $('#result').text('failed');
  });
});