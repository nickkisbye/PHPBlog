<html>
<head>
<title>Nick's Blog</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/assets/css/style.css" type="text/css">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <a class="navbar-brand" href="/">KISBYE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">Forside</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/posts">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/categories">Kategorier</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/om">Projekter</a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right" style="margin-right: 3%;">
            <?php if(!$this->session->userdata('logged_in')) : ?>
            <li><a class="nav-link" href="/users/login">Admin login</a>
            <?php endif; ?>
            <?php if($this->session->userdata('logged_in')) : ?>
           <li><a class="nav-link" href="/posts/create">Opret Indlæg</a>
            <li><a class="nav-link" href="/categories/create">Opret Kategori</a></li>
            <li><a class="nav-link" href="/users/logout">Log ud</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container">

    <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<br><p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<br><p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<br><p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<br><p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<br><p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<br><p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<br><p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<br><p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('category_deleted')): ?>
    <?php echo '<br><p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
<?php endif; ?>