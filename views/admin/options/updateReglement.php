<?php foreach ($updateReglement as $key => $value): ?>

<?php endforeach; ?>

<?php
	$page = new page();
	
	$id=1;

	$tab=$page->getOneBy(['id'=>$id]);

	$id=$page->setId(1);

	if(isset($_POST['valider'])&& isset($_POST['title'])&&isset($_POST['contenu']))
	{			
		$page->setContenu($_POST['contenu']);			
		$page->setTitle($_POST['title']);
		$page->save();
	}


?>

<form name="inscription" method="post" action="" >
	<label>
		<h5>Mentions Légales</h5> 
	</label>

	<label>
		<h5>titre</h5> 
		<input type="text" name="title" value="<?php echo $tab['title']; ?>"/>
	</label>

	<textarea id="editor1" name="contenu">
		<?php echo $tab['contenu'];?>
	</textarea>
	<script type="text/javascript">
		window.onload = function()
		{
			CKEDITOR.replace( 'editor1' );
		};
	</script>

	<?php  html_entity_decode(($tab['contenu']), ENT_QUOTES, "UTF-8"); ?>
	<input type="submit" name="valider" value="valider"/>
</form>
