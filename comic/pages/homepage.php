
	<div id="list">
		<?php 
			$allComic = getAllcomic($database);
			while($comic = mysqli_fetch_assoc($allComic)){
		?>
				<a <?php makeHref(1, $comic['id'], 1); ?>><?php echo $comic['name']; ?></a><br>
		<?php
			}
		?>
	</div>
	
	<div id="comic">
		<?php $comicPagePath = str_pad($comicPage, 3, '0', STR_PAD_LEFT); ?>
		
		
		<img src="img/<?php echo "$comicPath/$comicPagePath.jpg"; ?>" ></img>
		<br>
		<a <?php makeHref($currentPage['id'], $currentComic['id'], 1); ?>>
			<button id="btnFirst" class="btn btn-default" <?php makeDisabled($comicPage <= 1); ?>>
				第一頁
			</button>
		</a>
		<a <?php makeHref($currentPage['id'], $currentComic['id'], $comicPage - 1); ?>>
			<button id="btnPrev" class="btn btn-default" <?php makeDisabled($comicPage <= 1); ?>>
				上一頁
			</button>
		</a>
		<a <?php makeHref($currentPage['id'], $currentComic['id'], $comicPage + 1); ?>>
			<button id="btnNext" class="btn btn-default" <?php makeDisabled($comicPage >= $comicLength); ?>>
				下一頁
			</button>
		</a>
		<a <?php makeHref($currentPage['id'], $currentComic['id'], $comicLength); ?>>
			<button id="btnLast" class="btn btn-default" <?php makeDisabled($comicPage >= $comicLength); ?>>
				最後頁
			</button>
		</a>
		
		<form>
			<input type="hidden" name="page" value=1></input>
			<label>到第</label>
			<input id="goto" type="text" name="comic" value=<?php echo $comicPage?>></input>
			<label>頁</label>
			
			<input type="submit" value="前往"></input>
		</form>
		
	</div>