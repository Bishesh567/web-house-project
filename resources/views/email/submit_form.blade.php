<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moonstone Ptv.lt</title>
</head>
<body>
    <div style="border-top-left-radius: 3px; border-top-right-radius: 3px; padding: 10px 15px; background-color: #428bca; border-color: #428bca; color: #fff" class="v1panel-heading">
        You Have Mail Recieved from Moonstone Ptv.Lt
         </div>
         
    <table>
    <tr><td> Name: {{ $name }}</td></tr> 
    <tr> <td> Email: {{ $email }} </td> </tr>
    </table>   <br> <br>
       <div class="billto" style="width:100%;">
          Message: {{ $body_message }}
       </div>
   <div>
    <br>
    <b>Regards</b> <br>
    Moonstone Ptv.Lt
   </div>
</body>
</html>