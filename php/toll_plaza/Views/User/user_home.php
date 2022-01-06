<?php if(@$ins_res) { echo "<script>alert('Inserted...')</script>"; } ?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<center>
	<h1>User</h1>
	<a href="<?= site_url().'/Login/logout' ?>">Logout</a><br>
	<form method="post">
		<table border="2">
			<tr>
				<th>Vehicle No:</th>
				<td><input type="text" name="txtvno"></td>
			</tr>
			<tr>
				<th>Vehicle Type:</th>
				<td>
					<select name="vtype" id="type">
						<?php if(@$vtypes) { foreach ($vtypes as $v) { ?>
							<option value="<?= $v->vehicle_type ?>"><?= $v->vehicle_type ?></option>
						<?php } } ?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Fare</th>
				<td>
					<input type="radio" name="r1" value="Single">Single
					<input type="radio" name="r1" value="Double">Double
				</td>
			</tr>
			<tr>
				<th>Amount</th>
				<td>
					<input type="text" name="txtamt" required="" id='amt'>
				</td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="submit" value="Confirm"></td>
			</tr>
		</table>
	</form>
</center>
<div id="result"></div>
</body>
<script type="text/javascript">
	$(document).ready(function(){  
      $('input[type="radio"]').click(function(){
           var fare = $(this).val();
           var type = $('#type').val();  

           $.ajax({  
                url:"<?php echo site_url('index.php/User/get_amount/') ?>" + fare + '/' + type,  
                dataType: 'json',
                method:"GET",  
                //data:{sfare:fare,stype:type},  
                success:function(data){
                //alert('dgd')  ;
                     //$('#result').html(data[0].rate); 
                     //json =
                     /*for(var i=0;i<data.length;i++)
                     {
                     	alert(data[i].rate);	
                     } */
                     //alert(data.length);
                    var parsed =  JSON.parse(JSON.stringify(data));
            		$.each(parsed, function (key, val) {
                		//alert( val.rate );                    
                		$('#amt').val(val.rate);
            		}); 
                },error: function (error) {
    alert('error; ' + error);
    $('#result').html(error);
} 
           });  
      });  
 });  
</script>
</html>