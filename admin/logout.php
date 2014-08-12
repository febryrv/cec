<?php
session_start();
session_unset();
session_destroy();
?>
<script type="text/javascript">
alert('terima kasih');
document.location = 'login.php'
</script>