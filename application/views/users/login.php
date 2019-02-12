<br>
<?php echo form_open('users/login'); ?>
<div class="card text-white bg-primary mb-3 mx-auto" style="max-width: 20rem; text-align: center;">
    <div class="card-header"><?php echo $title; ?></div>
    <div class="card-body">
        <h4 class="card-title"><div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Brugernavn" required autofocus />
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Kodeord" required autofocus />
            </div>
        </h4>
        <p class="card-text"><button type="submit" class="btn btn-outline-success btn-block">Log ind</button></p>
    </div>
</div>
<?php echo form_close(); ?>