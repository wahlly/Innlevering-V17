<html>
<head>
</head>
<body>
<form action="submit.php"  method="post">
Name: <input name="name" id="name" type="text" /><br />
Email: <input name="email" id="email" type="text" /><br />
Phone Number: <input name="phone" id="phone" type="text" /><br />
<input type="button" id="searchForm" onclick="SubmitForm();" value="Send" />
</form>
<script>
 function SubmitForm() {
 var name = $("#name").val();
 var email = $("#email").val();
 var phone = $("#phone").val();
 $.post("submit.php", { name: name, email: email, phone: phone },
 function(data) {
 alert("Data Loaded: " + data);
 });
 }
 </script>
 <h3>
 <?php
 echo $_POST['name']."<br />";
 echo $_POST['email']."<br />";
 echo $_POST['phone']."<br />";
 echo "All Data Submitted Sucessfully!"
 ?>
</h3>
</body>
</html>
