<?php
session_start();
session_unset($_SESSION['nis']);
session_unset($_SESSION['nama']);
?>
<script type="text/javascript">
alert('Terima kasih');
document.location = '';
</script>