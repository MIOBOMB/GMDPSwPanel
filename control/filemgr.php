<?php require_once '!chkpass.php';

if (!isset($_GET['username']) && !isset($_GET['password']))
header('Location: ./');
?>
<head>
    <script>
function recent(dir) {

    document.getElementById('back').setAttribute('onclick', 'recent("..")');
    document.getElementById('drop').setAttribute('onclick', 'drop("'+dir+'")');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'findFiles.php<?php echo '?username='.$_GET['username'].'&password='.$_GET['password']?>&dir=' + dir, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status >= 200 && xhr.status < 300) {
                var place = document.getElementById('place');
                place.innerHTML = '';
                place.insertAdjacentHTML('beforeend', xhr.responseText);
                var text = document.getElementById('pos');
                text.innerHTML = '';
                text.insertAdjacentHTML('beforeend', dir + ' ');
            }
        }
    };

    xhr.send();
}

function drop(dir) {
    var lastSlashIndex = dir.lastIndexOf('/');
    var next = dir.substring(0, lastSlashIndex);
    recent(next);
}

function opel(dir) {

    document.getElementById('back').setAttribute('onclick', 'recent("..")');
    document.getElementById('drop').setAttribute('onclick', 'drop("'+dir+'")');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'editFile.php<?php echo '?username='.$_GET['username'].'&password='.$_GET['password']?>&dir=' + dir, true);

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status >= 200 && xhr.status < 300) {
                var place = document.getElementById('place');
                place.innerHTML = '';
                place.insertAdjacentHTML('beforeend', xhr.responseText);
                var text = document.getElementById('pos');
                text.innerHTML = '';
                text.insertAdjacentHTML('beforeend', dir + ' ');
            }
        }
    };

  xhr.send();
}

    </script>
</head>
    <button onclick="location.href='./control.php<?php echo'?username='.$_GET['username'].'&password='.$_GET['password']?>'">Go to control panel</button>
    <div style="height:32px">
        <p id="pos">..</p>
    </div>
    <button id="back" onclick="recent('..')">Main folder</button><br>
    <button id="drop" onclick="drop('..')">go up</button><br>
<div align="left">
    <table>
        <tbody id="place">
            <tr>
                <th>File</th>
                <th>Size</th>
            </tr>
        </tbody>
    </table>
    <script>recent('..')</script>
</div>
