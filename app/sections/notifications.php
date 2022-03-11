<?php 
switch($_GET['event']){
    // CAPSULES
    case 'newCapsule-success':
        $alertText="La cápsula se ha creado correctamente.";
        $alertBadge='success';
        break;
    case 'addCapsule-success':
        $alertText="La cápsula se ha añadido correctamente.";
        $alertBadge='success';
        break;
    case 'addCapsule-fail':
        $alertText="La cápsula no existe.";
        $alertBadge='danger';
        break;
    case 'editCapsule-success':
        $alertText="La cápsula se ha modificado correctamente.";
        $alertBadge='success';
        break;
    case 'rmCapsule-success':
        $alertText="La cápsula se ha eliminado correctamente.";
        $alertBadge='success';
        break;

    // USERS
    case 'pass-error':
        $alertText="Las constraseñas no coinciden.";
        $alertBadge='danger';
        break;
    case 'editUser-success':
        $alertText="Los datos de usuario han sido modificados correctamente.";
        $alertBadge='success';
        break;

    default:
        break;
}
if(isset($_GET['event'])){$alertShow='show';}
?>

<div class="alert alert-<?php echo $alertBadge;?> alert-dismissible fade <?php echo $alertShow;?> mb-0 notificacio" role="alert">
    <?php echo $alertText;?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>