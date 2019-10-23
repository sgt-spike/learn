<!DOCTYPE html>
 <html lang="en">
<head>
   <title>Learning Front-End Web Design</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="css/style.css">
 </head>
<body>
	<h1>Learning Web Development</h1>
  <form action="php/handle_form.php" method="post">
    <p>Name: 
      <select name="title" id="title" required>
        <option value="Mr.">Mr.</option>
        <option value="Mrs.">Mrs.</option>
        <option value="Ms.">Ms.</option>
      </select>
      <input type="text" name="name" id="name" required>
    </p>
    <p>Email:
      <input type="email" name="email" id="email" size="20" required>
    </p>
    <p>Response: This is...
      <input type="radio" name="response" id="excellent" value="excellent"> Excellent
      <input type="radio" name="response" id="okay" value="okay"> Okay
      <input type="radio" name="response" id="boring" value="boring"> Boring
    </p>
    <p>
      Comments: <textarea name="comments" id="comments" cols="30" rows="3" required></textarea>
    </p>
    <input type="submit" value="Send My Feedback">
  </form>
</body>
</html> 