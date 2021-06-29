$("#submit").click(function(e){
  
  jQuery.post("form.php", {
  
  name:$("#name").val(),
  email:$("#email").val(),
  subject:$("#subject").val(),
  message:$("#message").val(),
  
  
  },  function(data, textStatus){
  
  if( data == 1)
  {
  alert("Mail not sent");
  e.preventDefault(); 
  }
  else
  {
  alert("Mail sent");
  e.preventDefault(); 
  }
  
  });
  
  });