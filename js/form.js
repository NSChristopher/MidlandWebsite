  $(document).ready(function() {
      $("form").submit(function(event) {
      $(".form-group").removeClass("has-error");
      $(".help-block").remove();

      var formData = {
        name: $("#name").val(),
        email: $("#email").val(),
        subject: $("#subject").val(),
        message: $("#message").val(),
      };

      $.ajax({
        type: "POST",
        url: "services/sendAndSanitize.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function(data) {
          console.log(data);

          $("#name-group").addClass("has-error");
          $("#name-group").prepend(
            '<div class="help-block text-danger"> hello' + data.name + "</div>"
          );

          if (!data.success) {
            if (data.errors.name) {
              $("#name-group").addClass("has-error");
              $("#name-group").prepend(
                '<div class="help-block text-danger">' + data.errors.name + "</div>"
              );
            }

            if (data.errors.email) {
              $("#email-group").addClass("has-error");
              $("#email-group").prepend(
                '<div class="help-block text-danger">' + data.errors.email + "</div>"
              );
            }

            if (data.errors.subject) {
              $("#subject-group").addClass("has-error");
              $("#subject-group").prepend(
                '<div class="help-block text-danger">' + data.errors.subject + "</div>"
              );
            }

            if (data.errors.message) {
              $("#message-group").addClass("has-error");
              $("#message-group").prepend(
                '<div class="help-block text-danger">' + data.errors.message + "</div>"
              );
            }
            } else {
              $("form").html(
                '<div class="alert alert-success">' + data.message + "</div>"
              );
            }
          }); event.preventDefault();
      });
  });