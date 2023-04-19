<html>
	<head>
		<title>My form</title>
	</head>
	<body>
		<form method="POST" action="submitForm_submitted.php">
			<table>
				<tr>
					<td>
						My name is: 
					</td>
					<td>
						<input type="text" name="tName">
					</td>
				</tr>
				<tr>
					<td>
						My favourite movie is: 
					</td>
					<td>
						<input type="text" name = "tMovie">
					</td>
				</tr>
				<tr>
					<td>
						My degree is: 
					</td>
					<td>
						<select name = "sDegree">
							<option>Bachelor</option>
							<option>Masters</option>
							<option>PhD</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>
						Gender: 
					</td>
					<td>
						<Input type = 'Radio' Name ='gender' value= 'male'>Male
						<Input type = 'Radio' Name ='gender' value= 'female'>Female
					</td>
				</tr>
				<tr>
					<td>
						My favourite unit(s) *multiselect: 
					</td>
					<td>
						<select name="msunit[]" multiple="multiple" size="2">
							<option value="Poti">Poti</option>
							<option value="IP">IP</option>
						</select>
						<br>
					</td>
				</tr>
				<tr>
					<td>
						<input type= "submit" name="goButton" value ="submit">
					</td>
				</tr>
			</table>			
		</form>	
	</body>
</html>	