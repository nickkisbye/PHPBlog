<br>
<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/create'); ?>
    <div class="form-group">
        <label>Overskrift</label>
        <input type="text" class="form-control" name="title" placeholder="Skriv overskrift her..">
    </div>
    <div class="form-group">
        <label>Forfatter</label>
        <input type="text" class="form-control" name="author" value="Nick Kisbye Hansen">
    </div>
    <div class="form-group">
        <label>Indlæg</label>
        <textarea id="editor1" type="text" class="form-control" name="body" placeholder="Skriv indlæg her..."></textarea>
    </div>
    <div class="form-group">
    <label>Kategori</label>
        <select name="category_id" class="form-control">
            <?php foreach ($categories as $category) { ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php } ?>
        </select>
    </div>
<div class="form-group">
    <label>Upload billede</label>
    <input type="file" name="userfile" size="20">
</div>
<button type="submit" class="btn btn-primary">Opret</button>

</form>