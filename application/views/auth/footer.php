<script src="js/app.js"></script>
<script>
    <?php if ($this->session->flashdata('message')): ?>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= $this->session->flashdata('message'); ?>',
            showConfirmButton: true,
            timer: 10000
        });
    <?php endif; ?>
    <?php if ($this->session->flashdata('message-error')): ?>
        Swal.fire({
            icon: 'error',
            title: '404 Ups!',
            text: '<?= $this->session->flashdata('message-error'); ?>',
            showConfirmButton: true,
            timer: 10000
        });
    <?php endif; ?>
</script>

</body>

</html>