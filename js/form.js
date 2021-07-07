  $(document).ready(function() {
      $("form").submit(function(event) {
      $(".form-group").removeClass("has-error");
      $(".help-block").remove();

      var formData = {
        name: $("#name").val(),
        business: $("#business").val(),
        email: $("#email").val(),
        volume: $("#volume").val(),
        message: $("#message").val(),
      };

      $.ajax({
        type: "POST",
        url: "send_and_sanitize.php",
        data: formData,
        dataType: "json",
        encode: true,
      }).done(function(data) {
          console.log(data);

          $("form").html(
            '<div class="alert alert-success">yo ' + data.success + "</div>"
          );

          if (!data.success) {
            if (data.errors.name_msg) {
              $("#name-group").addClass("has-error");
              $("#name-group").prepend(
                '<div class="help-block text-danger">' + data.errors.name_msg + "</div>"
              );
            }

            if (data.errors.business_msg) {
              $("#business-group").addClass("has-error");
              $("#business-group").prepend(
                '<div class="help-block text-danger">' + data.errors.business_msg + "</div>"
              );
            }

            if (data.errors.email_msg) {
              $("#email-group").addClass("has-error");
              $("#email-group").prepend(
                '<div class="help-block text-danger">' + data.errors.email_msg + "</div>"
              );
            }

            if (data.errors.subject_msg) {
              $("#subject-group").addClass("has-error");
              $("#subject-group").prepend(
                '<div class="help-block text-danger">' + data.errors.subject_msg + "</div>"
              );
            }

            if (data.errors.message_msg) {
              $("#message-group").addClass("has-error");
              $("#message-group").prepend(
                '<div class="help-block text-danger">' + data.errors.message_msg + "</div>"
              );
            }
            if (data.msg) {
              $("#form").addClass("has-error");
              $("#form").prepend(
                '<div class="help-block text-danger">' + data.errors.message_msg + "</div>"
              );
            }
          }
          }); event.preventDefault();
      });
  });