
	<div id="work">
	
			<?php
				if (isset($_POST['submitted'])==1){
					$q = "INSERT INTO comics (path, name, length) VALUES('$_POST[path]', '$_POST[name]', '$_POST[length]')";
					$r = mysqli_query($database, $q);
					
					if($r){
						echo '<p>Comic was added!</p>';
					}
					else{
						echo '<p>Comic could not be added because: '.mysqli_error($database).'</p>';
						echo '<p>.$q.</p>';
					}
					$_POST['submitted']=0;
				}
			?>
	
		<div id="divPageList">
			<p>Comic List</p>
			
			<?php 
				$q = "SELECT * FROM comics ORDER BY id";
				$r = mysqli_query($database, $q);
				while($comic = mysqli_fetch_assoc($r)){
					echo $comic['name'].'<br>';
				}
			?>
		</div>
		<div id="divPageForm">		
		
			<form action="index.php?page=3" method="post" role="form">
				<div>
					<label for="name">Name: </label><br>
					<input type="text" name="name" id="name" placeholder="Name"></input>
				</div>
				<br>
				<div>
					<label for="length">Length: </label><br>
					<input type="text" name="length" id="length" placeholder="Length"></input>
				</div>
				<br>
				<div>
					<label for="body">Path: </label><br>
					<input type="text" name="path" id="path" placeholder="Path"></input>
				</div>
				<br>
				<button type="submit">Submit</button>
				<input type="hidden" name="submitted" value="1"></input>
			</form>
		</div>
	</div>