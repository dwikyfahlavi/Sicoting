<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; 2022
    </div>
    <div class="footer-right">
        SIKOTING
    </div>
</footer>
</div>
</div>
<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script>
    var ip = document.getElementById('ip');
    var add_more_ip = document.getElementById('add_more_ip');
    var remove_ip = document.getElementById('remove_ip');

    add_more_ip.onclick = function() {
        console.log("ini console");
        var newField = document.createElement('input');
        newField.setAttribute('type', 'text');
        newField.setAttribute('name', 'ip[]');
        newField.setAttribute('class', 'form-control');
        newField.setAttribute('size', 50);
        newField.setAttribute('placeholder', 'No. IP');
        var mybr = document.createElement('br');
        ip.appendChild(mybr);
        ip.appendChild(newField);
    }

    remove_ip.onclick = function() {
        var input_tags = ip.getElementsByTagName('input');
        var mybr = ip.getElementsByTagName('br');
        if (input_tags.length > 1) {
            ip.removeChild(input_tags[(input_tags.length) - 1]);
            ip.removeChild(mybr[(mybr.length) - 1]);
        }
    }

    var indikator = document.getElementById('indikator');
    var add_more_indikator = document.getElementById('add_more_indikator');
    var remove_indikator = document.getElementById('remove_indikator');
    var modal = document.getElementById('modal_body');
    var submit = document.getElementById('memek');

    add_more_indikator.onclick = function() {
        var newField = document.createElement('input');
        newField.setAttribute('type', 'text');
        newField.setAttribute('name', 'indikatorpencapaian[]');
        newField.setAttribute('class', 'form-control');
        newField.setAttribute('size', 50);
        newField.setAttribute('placeholder', 'Indikator Pencapaian');
        var mybr = document.createElement('br');
        indikator.appendChild(mybr);
        indikator.appendChild(newField);
    }

    remove_indikator.onclick = function() {
        var input_tags = indikator.getElementsByTagName('input');
        var mybr = indikator.getElementsByTagName('br');
        if (input_tags.length > 1) {
            indikator.removeChild(input_tags[(input_tags.length) - 1]);
            indikator.removeChild(mybr[(mybr.length) - 1]);
        }
    }





    function getDetail(id, jenis_sub_soal, title) {
        $.ajax({
            url: "<?php echo base_url(); ?>guru/getSubSoal",
            data: {
                id: id,
                jenis_sub_soal: jenis_sub_soal
            },
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                $('#title').html(title + " Details"); //hold the response in id and show on popup
                $('#jenis_sub_soal').html(response.jenis_sub_soal); //hold the response in id and show on popup
                $('#jenis_jawaban').html(response.jenis_jawaban);
                $('#bobot').html(response.bobot);
                $('#jawaban_benar').html(response.jawaban_benar);
                $('#soal_sub_latihan').html(response.soal_sub_latihan);
                $('#file_soal').html(response.file_soal);
                $('#show_modal').modal({
                    backdrop: 'static',
                    keyboard: true,
                    show: true
                });

            }
        });
    };

    function tambahSoal(id, jenis_sub_soal, title) {
        index = 0;
        $('#newTesModal').modal({
            backdrop: 'static',
            keyboard: true,
            show: true
        });
        // Initially hide all forms except the first one
        $("#form2, #form3, #form4, #form5").hide();
        $("#jawabanADecom, #jawabanBDecom, #jawabanCDecom, #jawabanDDecom, #jawabanEDecom").hide();
        $("#jawabanADecomId, #jawabanBDecomId, #jawabanCDecomId, #jawabanDDecomId, #jawabanEDecomId, #jawabanBenar1Decom, #jawabanBenar2Decom, #jawabanBenarDecomId, #jawabanBenar3Decom,#jawabanBenar3DecomId").hide();

        $("#jawabanAAbstrak, #jawabanBAbstrak, #jawabanCAbstrak, #jawabanDAbstrak, #jawabanEAbstrak").hide();
        $("#jawabanAAbstrakId, #jawabanBAbstrakId, #jawabanCAbstrakId, #jawabanDAbstrakId, #jawabanEAbstrakId, #jawabanBenar1Abstrak, #jawabanBenar2Abstrak, #jawabanBenarAbstrakId, #jawabanBenar3Abstrak").hide();

        $("#jawabanAPola, #jawabanBPola, #jawabanCPola, #jawabanDPola, #jawabanEPola").hide();
        $("#jawabanAPolaId, #jawabanBPolaId, #jawabanCPolaId, #jawabanDPolaId, #jawabanEPolaId, #jawabanBenar1Pola, #jawabanBenar2Pola, #jawabanBenarPolaId, #jawabanBenar3Pola").hide();
        $("#jawabanAAlgo, #jawabanBAlgo, #jawabanCAlgo, #jawabanDAlgo, #jawabanEAlgo").hide();
        $("#jawabanAAlgoId, #jawabanBAlgoId, #jawabanCAlgoId, #jawabanDAlgoId, #jawabanEAlgoId, #jawabanBenar1Algo, #jawabanBenar2Algo, #jawabanBenarAlgoId, #jawabanBenar3Algo").hide();


        $("#nextBtn").click(function() {
            if (index == 0) {
                $("#form1").hide();
                $("#form2").show();
                index += 1;
            } else if (index == 1) {
                $("#form2").hide();
                $("#form3").show();
                index += 1;
            } else if (index == 2) {
                $("#form3").hide();
                $("#form4").show();
                index += 1;
            } else if (index == 3) {
                $("#form4").hide();
                $("#form5").show();
                index += 1;
            }
        });

        $("#backBtn").click(function() {
            if (index == 1) {
                $("#form2").hide();
                $("#form1").show();
                index -= 1;
                jenisJawabanDecom
            } else if (index == 2) {
                $("#form3").hide();
                $("#form2").show();
                index -= 1;
            } else if (index == 3) {
                $("#form4").hide();
                $("#form3").show();
                index -= 1;
            } else if (index == 4) {
                $("#form5").hide();
                $("#form4").show();
                index -= 1;
            }

        });

        $("#jenisJawabanDecom").change(function() {
            if ($(this).val() == "3") {
                $("#jawabanADecom, #jawabanBDecom, #jawabanCDecom, #jawabanDDecom, #jawabanEDecom").hide();
                $("#jawabanADecomId, #jawabanBDecomId, #jawabanCDecomId, #jawabanDDecomId, #jawabanEDecomId, #jawabanBenar1Decom, #jawabanBenar3Decom,#jawabanBenar3DecomId").hide();
                $("#jawabanBenar2Decom, #jawabanBenarDecomId").show();
            } else if ($(this).val() == "2") {
                $("#jawabanADecom, #jawabanBDecom, #jawabanCDecom, #jawabanDDecom, #jawabanEDecom").show();
                $("#jawabanADecomId, #jawabanBDecomId, #jawabanCDecomId, #jawabanDDecomId, #jawabanEDecomId").show();
                $("#jawabanBenar2Decom, #jawabanBenar1Decom, #jawabanBenarDecomId ").hide();
                $("#jawabanBenar3Decom, #jawabanBenar3DecomId").show();
            } else {
                $("#jawabanADecom, #jawabanBDecom, #jawabanCDecom, #jawabanDDecom, #jawabanEDecom").show();
                $("#jawabanADecomId, #jawabanBDecomId, #jawabanCDecomId, #jawabanDDecomId, #jawabanEDecomId").show();
                $("#jawabanBenar2Decom, #jawabanBenar3Decom, #jawabanBenar3DecomId").hide();
                $("#jawabanBenar1Decom, #jawabanBenarDecomId").show();
            }

        });

        $("#jenisJawabanAbstrak").change(function() {
            if ($(this).val() == "3") {
                $("#jawabanAAbstrak, #jawabanBAbstrak, #jawabanCAbstrak, #jawabanDAbstrak, #jawabanEAbstrak").hide();
                $("#jawabanAAbstrakId, #jawabanBAbstrakId, #jawabanCAbstrakId, #jawabanDAbstrakId, #jawabanEAbstrakId, #jawabanBenar1Abstrak, #jawabanBenar3Abstrak,#jawabanBenar3AbstrakId").hide();
                $("#jawabanBenar2Abstrak, #jawabanBenarAbstrakId").show();
            } else if ($(this).val() == "2") {
                $("#jawabanAAbstrak, #jawabanBAbstrak, #jawabanCAbstrak, #jawabanDAbstrak, #jawabanEAbstrak").show();
                $("#jawabanAAbstrakId, #jawabanBAbstrakId, #jawabanCAbstrakId, #jawabanDAbstrakId, #jawabanEAbstrakId").show();
                $("#jawabanBenar2Abstrak, #jawabanBenar1Abstrak, #jawabanBenarAbstrakId ").hide();
                $("#jawabanBenar3Abstrak, #jawabanBenar3AbstrakId").show();
            } else {
                $("#jawabanAAbstrak, #jawabanBAbstrak, #jawabanCAbstrak, #jawabanDAbstrak, #jawabanEAbstrak").show();
                $("#jawabanAAbstrakId, #jawabanBAbstrakId, #jawabanCAbstrakId, #jawabanDAbstrakId, #jawabanEAbstrakId").show();
                $("#jawabanBenar2Abstrak, #jawabanBenar3Abstrak, #jawabanBenar3AbstrakId").hide();
                $("#jawabanBenar1Abstrak, #jawabanBenarAbstrakId").show();
            }

        });
        $("#jenisJawabanPola").change(function() {
            if ($(this).val() == "3") {
                $("#jawabanAPola, #jawabanBPola, #jawabanCPola, #jawabanDPola, #jawabanEPola").hide();
                $("#jawabanAPolaId, #jawabanBPolaId, #jawabanCPolaId, #jawabanDPolaId, #jawabanEPolaId, #jawabanBenar1Pola, #jawabanBenar3Pola,#jawabanBenar3PolaId").hide();
                $("#jawabanBenar2Pola, #jawabanBenarPolaId").show();
            } else if ($(this).val() == "2") {
                $("#jawabanAPola, #jawabanBPola, #jawabanCPola, #jawabanDPola, #jawabanEPola").show();
                $("#jawabanAPolaId, #jawabanBPolaId, #jawabanCPolaId, #jawabanDPolaId, #jawabanEPolaId").show();
                $("#jawabanBenar2Pola, #jawabanBenar1Pola").hide();
                $("#jawabanBenar3Pola, #jawabanBenar3PolaId, #jawabanBenarPolaId").show();
            } else {
                $("#jawabanAPola, #jawabanBPola, #jawabanCPola, #jawabanDPola, #jawabanEPola").show();
                $("#jawabanAPolaId, #jawabanBPolaId, #jawabanCPolaId, #jawabanDPolaId, #jawabanEPolaId").show();
                $("#jawabanBenar2Pola, #jawabanBenar3Pola, #jawabanBenar3PolaId").hide();
                $("#jawabanBenar1Pola, #jawabanBenarPolaId").show();
            }

        });

        $("#jenisJawabanAlgo").change(function() {

            $("#jawabanAAlgo, #jawabanBAlgo, #jawabanCAlgo, #jawabanDAlgo, #jawabanEAlgo").show();
            $("#jawabanAAlgoId, #jawabanBAlgoId, #jawabanCAlgoId, #jawabanDAlgoId, #jawabanEAlgoId").show();
            $("#jawabanBenar2Algo, #jawabanBenar3Algo, #jawabanBenar3AlgoId").hide();
            $("#jawabanBenar1Algo, #jawabanBenarAlgoId").show();

        });

        // Form 1 submit event
        $("#form1").on("submit", function(event) {
            event.preventDefault();
            // Check form for completion
            if (formIsValid()) {
                // Trigger next button click event
                $("#nextBtn").click();
            }
        });
    };

    document.getElementById('jenisJawaban').addEventListener('change', function() {
        console.log(this.value);
    })
</script>
<script>
    document.getElementById('detail_media').addEventListener('change', function() {
        fetch("<?= base_url('Siswa/detail_media/' . $data->id_materi . '/') ?>" + this.value, {
                method: 'GET',
            }).then((response) => response.text())
            .then((data) => {
                document.getElementById('pakai_media').innerHTML = data
            })
    })
</script>




<script src="<?= base_url(); ?>/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
<script src="<?= base_url(); ?>/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>

</html>