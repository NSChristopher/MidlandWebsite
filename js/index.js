form.addEventListener('submit', (e) => {
  e.preventDefault();

  const formData = new FormData(e.target);

  const {isDataValid, statusMessage} = validateForm();

  if (!isDataValid) {
    document.getElementById('status').innerHTML = statusMessage;
    return;
  }

  fetch('mail.php', {
    method: 'POST',
    body: formData
  })
  .then((response) => {
    response.json();
  })
  .then((response) => {
    if (response.code) {
      // If mail was sent successfully, reset the form;
      const values = document.querySelectorAll('.form-control');
      values.forEach( value => {
        value.textContent = '';
      });

      document.getElementById('status').innerHTML = `<p class="note note-success">${response.message}</p>`;
      setTimeout(()=> {
        document.getElementById('status').innerHTML = '';
      }, 2000)
    } else {
      document.getElementById('status').innerHTML = `<p class="note note-danger">${response.message}</p>`;
    }
  })
  .catch((err) => {
    document.getElementById('status').innerHTML = `<p class="note note-danger">An unexpected error occured. Please try again</p>`;
  });
});