<?php $this->layout('layoutTeam', ['title' => 'Team']) ?>

<?php $this->start('main_content') ?>

<!-- Contact team de manière individuelle-->
<h1><i class="fa fa-users" aria-hidden="true"></i></h1>
<div class="row">
  <div class="col-xs-10 col-md-2">
    <div class="thumbnail">
      <img src="<?= $this->assetUrl('img/avatar/Anastasia.jpg') ?>" alt="avatar-team" class="img-circle" height="100px" width="100px">
      <div class="caption">
        <h3>Anastasia Nikokosheva Oudin</h3>
        <p></p>
        <p><a href="#" class="btn btn-primary" role="button">Me contacter</a> </p>
      </div>
    </div>
  </div>
  <div class="col-xs-10 col-md-2">
    <div class="thumbnail">
      <img src="<?= $this->assetUrl('img/avatar/Damien.jpg') ?>" alt="avatar-team" class="img-circle" height="100px" width="100px">
      <div class="caption">
        <h3>Damien Machado</h3>
        <p></p>
        <p><a href="#" class="btn btn-primary" role="button">Me contacter</a> </p>
      </div>
    </div>
  </div>
  <div class="col-xs-10 col-md-2">
    <div class="thumbnail">
      <img src="<?= $this->assetUrl('img/avatar/Myriam.jpg') ?>" alt="avatar-team" class="img-circle" height="100px" width="100px">
      <div class="caption">
        <h3>Myriam Khalfi Bugnazet</h3>
        <p></p>
        <p><a href="#" class="btn btn-primary" role="button">Me contacter</a> </p>
      </div>
    </div>
  </div>
  <div class="col-xs-10 col-md-2">
    <div class="thumbnail">
      <img src="<?= $this->assetUrl('img/avatar/Baptiste.jpg') ?>" alt="avatar-team" class="img-circle" height="100px" width="100px">
      <div class="caption">
        <h3>Baptiste Cousin</h3>
        <p></p>
        <p><a href="#" class="btn btn-primary" role="button">Me contacter</a> </p>
      </div>
    </div>
  </div>
  <div class="col-xs-10 col-md-2">
    <div class="thumbnail">
      <img src="<?= $this->assetUrl('img/avatar/Noé.jpg') ?>" alt="avatar-team" class="img-circle" height="100px" width="100px">
      <div class="caption">
        <h3> Noé Champigny</h3>
        <p></p>
        <p><a href="#" class="btn btn-primary" role="button">Me contacter</a></p>
      </div>
    </div>
  </div>
</div>

<a href="<?= $this->url('default_home') ?>"><i class="fa fa-home fa-3x" aria-hidden="true">Retour Accueil</i></a>

<?php $this->stop('main_content') ?>
