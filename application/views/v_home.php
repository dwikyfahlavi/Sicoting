<?php
defined('BASEPATH') or exit('No direct script access allowed');
include "templates/headercoba.php";
?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container-fluid" data-aos="fade-up">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1>Sistem Pembelajaran Computational Thinking</h1>
        <h2>Belajar memecahkan masalah menggunakan konsep
          Berpikir Komputasi (<em>Computational Thinking</em>) dengan
          tahapan <em>Problem Based Learning</em>.</h2>
        <div><a href="<?php echo site_url('Auth'); ?>" class="btn-get-started scrollto">Mulai</a></div>
      </div>
      <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
        <img src="<?php echo base_url(); ?>assets/img/hero-img.png" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->

<main id="main">
  <!-- ======= Why Us Section ======= -->
  <section id="pbl" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">

      <div class="row">

        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

          <div class="content">
            <h3>PROBLEM BASED LEARNING</strong></h3>
            <p>
              Sebuah model pembelajaran yang melibatkan keaktifan peserta didik untuk selalu berpikir kritis dan selalu terampil dalam menyelesaikan suatu permasalahan. Tahapan pembelajaran Problem Based Learning adalah:
            </p>
          </div>

          <div class="accordion-list">
            <ul>
              <li>
                <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Menjelaskan Orientasi Permasalahan pada Peserta Didik. <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                  <p>
                    Guru akan memberikan penjelasan tentang tujuan pembelajaran serta apersepsi agar peserta didik termotivasi untuk belajar.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Mengorganisasi Peserta Didik dalam Belajar. <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Guru mengorganisir tugas yang akan diberikan pada peserta didik, misalnya penentuan topik, prosedur tugas, dan sebagainya.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Memberikan Bimbingan pada Individu maupun Kelompok. <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Guru membimbing peserta didik agar bisa mendapatkan sumber atau referensi yang sesuai untuk permasalahan yang ditugaskan. Serta menjawab pertanyaan dari peserta didik.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-4" class="collapsed"><span>04</span> Mengembangkan dan Menyajikan Hasil Karya Peserta Didik. <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-4" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Peserta didik dibantu oleh guru dalam mempersiapkan hasil yang akan dikumpulkan.
                  </p>
                </div>
              </li>

              <li>
                <a data-bs-toggle="collapse" data-bs-target="#accordion-list-5" class="collapsed"><span>05</span> Melakukan Analisis dan Evaluasi Proses Pemecahan Masalah <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                <div id="accordion-list-5" class="collapse" data-bs-parent=".accordion-list">
                  <p>
                    Guru melakukan refleksi dan mengevaluasi hasil pekerjaan peserta didik, baik dari sisi proses maupun metode.
                  </p>
                </div>
              </li>

            </ul>
          </div>

        </div>

        <div class="col-lg-4 align-items-stretch order-1 order-lg-2 img" style='background-image: url("<?php echo base_url(); ?>assets/img/features.svg");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
      </div>

    </div>
  </section><!-- End Why Us Section -->

  <!-- ======= Why Us Section ======= -->
  <section id="ct" class="faq">
    <div class="container">

      <div class="row">
        <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
          <div class="section-title">
            <h2>Computational Thinking atau Berpikir Komputasi</h2>
            <p>
              “Computational Thinking is the thought processes involved in formulating problems and their solutions so that the solutions are represented in a form that can be effectively carried out by an information-processing agent” – J. Cunny, L. Synder, and J. M. Wing.
            </p>
          </div>
          <div class="accordion-list">
            <div class="card">
              <div class="card-header">
                <h4>Tahapan Berpikir Komputasi</h4>
              </div>
              <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="dekomposisi-tab" data-toggle="tab" href="#dekomposisi" role="tab" aria-controls="dekomposisi" aria-selected="true">Dekomposisi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="abstraksi-tab" data-toggle="tab" href="#abstraksi" role="tab" aria-controls="abstraksi" aria-selected="false">Abstraksi</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pola-tab" data-toggle="tab" href="#pola" role="tab" aria-controls="pola" aria-selected="false">Pengenalan Pola</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="algoritma-tab" data-toggle="tab" href="#algoritma" role="tab" aria-controls="algoritma" aria-selected="false">Berpikir Algoritma</a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="dekomposisi" role="tabpanel" aria-labelledby="dekomposisi-tab">
                    Dekomposisi adalah sebuah proses memecah masalah atau sistem yang kompleks menjadi bagian-bagian kecil yang lebih mudah dikelola dan lebih mudah dipahami.
                  </div>
                  <div class="tab-pane fade" id="abstraksi" role="tabpanel" aria-labelledby="abstraksi-tab">
                    Abstraksi adalah sebuah proses mengabaikan karakteristik yang tidak diperlukan untuk berkonsentrasi pada informasi/hal yang penting.
                  </div>
                  <div class="tab-pane fade" id="pola" role="tabpanel" aria-labelledby="pola-tab">
                    Pengenalan Pola adalah sebuah proses menganalisis hingga menemukan kesamaan atau pola dalam suatu masalah sehingga dapat membantu dalam memecahkan masalah lain dengan lebih efisien.
                  </div>
                  <div class="tab-pane fade" id="algoritma" role="tabpanel" aria-labelledby="algoritma-tab">
                    Berpikir Algoritma adalah sekumpulan instruksi berisi langkah demi langkah untuk memecahkan masalah. Bentuk umumnya seperti Pseudecode dan Flowchart
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 align-items-stretch order-1 order-lg-2 img" style='background-image: url("<?php echo base_url(); ?>assets/img/features.svg");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
      </div>

    </div>
  </section>
  <!-- End Why Us Section -->


  <!-- ======= Frequently Asked Questions Section ======= -->
  <!-- <section id="ct" class="faq">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Computational Thinking atau Berpikir Komputasi</h2>
        <p>
          “Computational Thinking is the thought processes involved in formulating problems and their solutions so that the solutions are represented in a form that can be effectively carried out by an information-processing agent” – J. Cunny, L. Synder, and J. M. Wing.
        </p>
      </div>

      <div class="accordion-list">
        <div class="card">
          <div class="card-header">
            <h4>Tahapan Berpikir Komputasi</h4>
          </div>
          <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="dekomposisi-tab" data-toggle="tab" href="#dekomposisi" role="tab" aria-controls="dekomposisi" aria-selected="true">Dekomposisi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="abstraksi-tab" data-toggle="tab" href="#abstraksi" role="tab" aria-controls="abstraksi" aria-selected="false">Abstraksi</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pola-tab" data-toggle="tab" href="#pola" role="tab" aria-controls="pola" aria-selected="false">Pengenalan Pola</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="algoritma-tab" data-toggle="tab" href="#algoritma" role="tab" aria-controls="algoritma" aria-selected="false">Berpikir Algoritma</a>
              </li>
            </ul>
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="dekomposisi" role="tabpanel" aria-labelledby="dekomposisi-tab">
                Dekomposisi adalah sebuah proses memecah masalah atau sistem yang kompleks menjadi bagian-bagian kecil yang lebih mudah dikelola dan lebih mudah dipahami.
              </div>
              <div class="tab-pane fade" id="abstraksi" role="tabpanel" aria-labelledby="abstraksi-tab">
                Abstraksi adalah sebuah proses mengabaikan karakteristik yang tidak diperlukan untuk berkonsentrasi pada informasi/hal yang penting.
              </div>
              <div class="tab-pane fade" id="pola" role="tabpanel" aria-labelledby="pola-tab">
                Pengenalan Pola adalah sebuah proses menganalisis hingga menemukan kesamaan atau pola dalam suatu masalah sehingga dapat membantu dalam memecahkan masalah lain dengan lebih efisien.
              </div>
              <div class="tab-pane fade" id="algoritma" role="tabpanel" aria-labelledby="algoritma-tab">
                Berpikir Algoritma adalah sekumpulan instruksi berisi langkah demi langkah untuk memecahkan masalah. Bentuk umumnya seperti Pseudecode dan Flowchart
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
  </section>End Frequently Asked Questions Section -->

  <!-- ======= Services Section ======= -->
  <section id="about" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>About SICOTING</h2>
        <p>SICOTING merupakan sistem pembelajaran <em>computational thinking</em> berbasis website. Dalam website ini, anda akan belajar memecahkan permasalahan dengan tahapan <em>computational thinking</em> yang terdiri dari Dekomposisi, Abstraksi, Pengenalan Pola, dan Berpikir Algoritma. Selain itu, anda akan belajar mengikuti 5 tahapan belajar <em>Problem Based Learning</em>.
          Dalam SICOTING, anda dapat belajar menggunakan media pembelajaran sesuai selera anda seperti:</p>
      </div>

      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box iconbox-blue">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
              </svg>
              <i class="bx bx-video"></i>
            </div>
            <h4>Video</h4>
            <p>Anda dapat belajar menggunakan video pembelajaran yang sudah disediakan oleh Guru sehingga anda akan mempelajari materi yang disampaikan melalui tayangan sebuah video yang ditayangkan.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box iconbox-orange ">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
              </svg>
              <i class="bx bx-file"></i>
            </div>
            <h4>PDF</h4>
            <p>Anda dapat belajar menggunakan dokumen atau PDF yang telah disediakan oleh Guru sehingga anda akan mempelejari materi secara lebih detail dan dapat lebih mudah mencari apa yang akan dipelajari.</p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
          <div class="icon-box iconbox-pink">
            <div class="icon">
              <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
              </svg>
              <i class="bx bx-slideshow"></i>
            </div>
            <h4>Power Point</h4>
            <p>Anda dapat belajar menggunakan slide powerpoint yang telah disediakan oleh guru sehingga anda akan mempelajari materi secara singkat, padat, dan jelas melalui tayangan dalam powerpoint.</p>
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Services Section -->


</main><!-- End #main -->

</main><!-- End #main -->
<?php include "templates/footercoba.php"; ?>