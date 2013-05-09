<html>
	<head>
		<title><?= $page_title ?></title>
		<script type="application/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script type="application/javascript">
			$(document).ready(function(){
				$('#lookup').click(function(e){
					e.preventDefault();
					// $('#queryForm').submit();
					var query = $('#query').val();
					var location = $('#location').val();
				    $.ajax({
				        type: "POST",
				        url: "index.php/main/query",
				        data: "query="+query+"&location="+location,
				        success: function(data){
				            $('#result').html(data);
				        },
				        error: function(){alert('Error: Please, try again later');}
				    });
				});
			});
		</script>
	</head>
	<body>
		<p id="errorArea" style="color:red;"></p>
		<div>
			<table>
			<?php echo form_open('main/query',array('id' => 'queryForm')); ?>
				<tr>
					<td>Search:</td>
					<td><input type="text" id="query" name="query" /></td>
				</tr>
				<tr>
					<td>Location:</td>
					<td>
						<input type="text" id="location" name="location" value="Autocomplete"/>
					</td>
				</tr>
				<tr>
					<td><input id="lookup" type="submit" value="Lookup"/></td>
					<td><input type="button" id="Cancel" name="Cancel" value="Cancel"/></td>
				</tr>
			<?php echo form_close(); ?>
			</table>
		</div>
		<div id="result">
			
		</div>
	</body>
</html>