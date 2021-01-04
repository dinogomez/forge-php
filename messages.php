<?php
    session_start();
    if(!isset($_SESSION['uid'])){
        session_destroy();
        header('Location: index.php');
    }
    require_once 'view/layouts/header.php';
?>
<?php
    require_once 'view/components/sidebar.php';
?>
<?php
        require_once 'view/components/content/messagesContent.php';
    ?>

<?php
    require_once 'view/layouts/footer.php';
?>