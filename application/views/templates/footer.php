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
<script>
    var ip = document.getElementById('ip');
    var add_more_ip = document.getElementById('add_more_ip');
    var remove_ip = document.getElementById('remove_ip');

    add_more_ip.onclick = function() {
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
    
</script>


<!-- General JS Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="<?= base_url(); ?>/assets/js/stisla.js"></script>

<!-- JS Libraies -->

<!-- Template JS File -->
<script src="<?= base_url(); ?>/assets/js/scripts.js"></script>
<script src="<?= base_url(); ?>/assets/js/custom.js"></script>

<!-- Page Specific JS File -->
</body>

</html>