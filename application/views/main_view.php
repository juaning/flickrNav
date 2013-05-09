<html>
	<head>
		<title><?= $page_title ?></title>
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
		<script type="application/javascript">
			$(document).ready(function(){
				$( "#city" ).autocomplete({
				  source: function( request, response ) {
					$.ajax({
					  url: "http://ws.geonames.org/searchJSON",
					  dataType: "jsonp",
					  data: {
						featureClass: "P",
						style: "full",
						maxRows: 12,
						name_startsWith: request.term
					  },
					  success: function( data ) {
						response( $.map( data.geonames, function( item ) {
						  return {
							label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
							value: item.name + ", " + item.countryName
							,lat: item.lat
							,lon: item.lng
						  }
						}));
					  }
					});
				  },
				  minLength: 2,
				  select: function( event, ui ) {
				  	$('#city').val(ui.value);
				  	$('#lat').val(ui.item.lat);
				  	$('#lon').val(ui.item.lon);
				  },
				  open: function() {
					$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
				  },
				  close: function() {
					$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
				  }
				});
				$('#lookup').click(function(e){
					e.preventDefault();
					var query = $('#query').val();
					var lat = escape($('#lat').val());
				  	var lon = escape($('#lon').val());
				  	var dataToSend = "query="+query+"&lon="+lon+'&lat='+lat;
				    $.ajax({
				        type: "POST",
				        // dataType: 'json',
				        url: "index.php/main/query",
				        data: dataToSend,
				        success: function(data){
				        	var decod = ($.parseJSON(data)).results;
				        	$('#img_view_tb').html('<tr>');
				        	var table = $('#img_view_tb > tbody:last');
				        	decod.forEach(function(item,i){
				        		if((i%5 == 0) && i>0) {table.append('</tr><tr>'); console.log('new line');}
				        		table.append('<td><img src="'+item.url+'"/></td>');
				        		console.log('stuffing');
				        		// endTr = '';
				        	})
				        	table.append('</tr>');
				            // $('#result').html(data);
				        },
				        error: function(){alert('Error: Please, try again later');}
				    });
				});
			});
		</script>
		<style>
			.ui-autocomplete-loading {
				background: white right center no-repeat;
			}
			#city { width: 25em; }
		</style>
	</head>
	<body>
		<p id="errorArea" style="color:red;"></p>
		<div>
			<table>
			<?php echo form_open('main/query',array('id' => 'queryForm')); ?>
				<tr>
					<td>Search:</td>
					<td><input type="text" id="query" name="query" /></td>
					<input type="hidden" id="lat" name="lat" value=""/>
					  <input type="hidden" id="lon" name="lon" value=""/>
				</tr>
				<tr>
					<div class="ui-widget">
					  <label for="city">Location: </label>
					  <input id="city" />
					 </div>
				</tr>
				<tr>
					<td><input id="lookup" type="submit" value="Lookup"/></td>
					<td><input type="button" id="Cancel" name="Cancel" value="Cancel"/></td>
				</tr>
			<?php echo form_close(); ?>
			</table>
		</div>
		<div id="result">
			<table id="img_view_tb"><tr><td></td></tr></table>
		</div>
	</body>
</html>