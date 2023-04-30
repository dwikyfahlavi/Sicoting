
<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Room Chat</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="<?php echo site_url("Siswa");?>">Dashboard</a></div>
              <div class="breadcrumb-item">Room Chat</div>
            </div>
          </div>
    <div class="section-body">
        <h2 class="section-title">Chat With Siswa</h2>

        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
            <div class="card chat-box card-primary" id="mychatbox2">
                  <div class="card-header">
                  </div>
                  <div class="card-body chat-content">
                      <?php foreach($pesan as $pesann):?>
                        <?php if($pesann['id_user']==$user['id_user']):?>
                            <h6 class="text-primary text-right"><?php echo $pesann['isi_pesan'];?>
                            <br><span class="text-secondary text-right" style="font-size:10px;"><?php echo date('H:i:s d-m-Y', strtotime($pesann['tanggal']));?></span></h6>
                        <?php else:?>
                            <h4 class="text-info text-left"><?php echo $pesann['nama'];?></h4>
                                <h6 class="text-primary text-left"><?php echo $pesann['isi_pesan'];?>
                                <br><span class="text-secondary text-left" style="font-size:10px;"><?php echo date('H:i:s d-m-Y', strtotime($pesann['tanggal']));?></span></h6>
                            <?php endif;?>
                      <?php endforeach;?>
                  </div>
                  <div class="card-footer chat-form">
                    <?php echo form_open('siswa/chat_guru_response',array('id' => 'chat-form2'));?>
                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $user['id_user'];?>">
                    <input type="text" class="form-control" name="isi_pesan" placeholder="Type a message">
                      <button class="btn btn-primary">
                        <i class="far fa-paper-plane"></i>
                      </button>
                      <?php echo form_close();?>
                  </div>
                </div>
            </div>
        </div>
        
    </div>
        </section>
      </div>
