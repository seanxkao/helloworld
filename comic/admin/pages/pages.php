
	<div id="work">
	
			<?php
				if (isset($_POST['submitted'])==1){
					$title	= mysqli_real_escape_string($database, $_POST['title']);
					$header = mysqli_real_escape_string($database, $_POST['header']);
					$body	= mysqli_real_escape_string($database, $_POST['body']);
					$path	= mysqli_real_escape_string($database, $_POST['title']);
					$q = "INSERT INTO pages (title, header, body, path, userid) VALUES('$title', '$header', '$body', '$path', '$_POST[user]')";
					$r = mysqli_query($database, $q);
					
					if($r){
						echo '<p>Page was added!</p>';
					}
					else{
						echo '<p>Page could not be added because: '.mysqli_error($database).'</p>';
						echo '<p>.$q.</p>';
					}
					$_POST['submitted']=0;
				}
			?>
	
		<div id="divPageList">
			<p>Page List</p>
			
			<?php 
				$q = "SELECT * FROM pages ORDER BY title ASC";
				$r = mysqli_query($database, $q);
				while($page = mysqli_fetch_assoc($r)){
					echo $page['title'].'<br>';
				}
			?>
		</div>
		<div id="divPageForm">		
		
			<form action="index.php?page=2" method="post" role="form">
				<div>
					<label for="title">Title: </label><br>
					<input type="text" name="title" id="title" placeholder="Title"></input>
				</div>
				<br>
				<div>
					<label for="header">Header: </label><br>
					<input type="text" name="header" id="header" placeholder="Header"></input>
				</div>
				<br>
				<div>
					<label for="body">Body: </label><br>
					<textarea name="body" id="body" rows="8" placeholder="Body"></textarea>
				</div>
				<br>
				<div>
					<label for="body">Path: </label><br>
					<input type="text" name="path" id="path" placeholder="Path"></input>
				</div>
				<br>
				<div>
					<label for="user">User: </label><br>
					<select name="user" id="user">
						<option value=0>No user</option>
						<?php
							$allUser = getAllUser($database);
							while ($user = mysqli_fetch_assoc($allUser)){
						?>
							<option 
								value=<?php echo $user['id']; ?>
								<?php if ($user['id'] == $currentUser['id']){ echo 'selected'; }?>
							>
								<?php echo $user['first'].' '.$user['last']; ?>
							</option>
						<?php
							}
						?>
					</select>
				</div>
				<br>
				<button type="submit">Submit</button>
				<input type="hidden" name="submitted" value="1"></input>
			</form>
		</div>
	</div>