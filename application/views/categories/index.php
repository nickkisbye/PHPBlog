<br>
<h2><?= $title; ?></h2>
<br>
<div class="list-group">
        <li class="list-group-item list-group-item-action active">
            Kategorier
        </li>

<?php foreach ($categories as $category) { ?>
    <li class="list-group-item list-group-item-action "><a href="<?php echo site_url('./categories/posts/'.$category['id']); ?>"><?php echo $category['name']; ?></a>

            <?php if($this->session->userdata('logged_in')) : ?>
            <?php echo form_open('/categories/delete/'.$category['id']); ?>
            <input type="submit" value="Slet" class="btn btn-danger float-right">
            </form>
        <?php endif; ?>

        </li>
<?php } ?>

</div>

