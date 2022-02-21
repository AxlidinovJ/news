<?php
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

$this->title = "Dashbord";
$this->params['breadcrumbs'][] = $this->title;

?>

<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$categoryCount?> ta</h3>
                <p>Kategoriya</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?=Url::to(['category/index'])?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <h3><?=$newsCount?> ta</h3>
                <p>Yangilik</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?=Url::to(['news/index'])?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
           <!-- ddsas -->
          </section>
          <section class="col-lg-5 connectedSortable">
           <!-- kmklm -->
          </section>
        </div>
      </div>
    </section>