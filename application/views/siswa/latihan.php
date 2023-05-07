<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
        </div>
        

        <?php 
        $index = 1;
        $check = false;
        foreach ($latihan as $m) : ?>
       <div class="section-body">
            <div class="row">
                <div class="col-20 col-md col-lg">
                    <div class="card">
                        <div class="card-header">
                            <h4 style="width: 99%;">Latihan <?= $index ?></h4>
                            <?php foreach ($hasil as $h) : 
                                if(in_array($m['id_latihan'],$h)){?>
                                    <img src='<?= site_url(); ?>/assets/img/yes.png' style='width:30px;height:30px;'>  
                                <?php  
                                $check = true;
                                break;
                                }else{
                                    $check = false;
                                    
                                }
                            endforeach; ?>
                           <?php if(!$check){?>
                                <img src='<?= site_url(); ?>/assets/img/remove.png' style='width:30px;height:30px;'>
                            <?php }?>
                        </div>
                        <div class="card-body">
                            <?= $m['soal'] ?>
                        </div>
                           <?php if(!$check){ ?>
                                <div class="card-footer text-left">
                                    <a href="<?= site_url('siswa/latihanSiswa'. '/'. $m['id_latihan'] . '/'. $idsubmateri); ?>"><button class="btn btn-primary">Kerjakan</button></a>
                                </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </section>
        
        <?php 
        $index ++;
        endforeach ?>
    </section>
</div>