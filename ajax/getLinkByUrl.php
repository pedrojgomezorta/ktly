<?php include './../autoloader.php'; ?>
<?php
if (filter_var($_POST['url'], FILTER_VALIDATE_URL)) {
    sleep(1);
    $ktly = new Ktly($_POST['url']);
    echo '
    <h3>Tu shortcut ha sido creado.</h3>
    <h1>
        <a href="" target="_blank" id="ktly_url">'.$ktly->generateUrl().'</a>
        <button type="button" class="form-control btn btn-ktly" onclick="copyToClipboard()" id="copy_button" title="Copiar al portapapeles">
            <i class="fa fa-copy"></i>
        </button>
    </h1> 
    ';
}else{
    echo "<h3>URL no válida.</h3>";
}
?>