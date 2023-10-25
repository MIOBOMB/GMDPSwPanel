<?php session_start();
error_reporting(E_ALL);

if (!isset($_GET['username']) && !isset($_GET['password']))
header('Location: ./');

require_once '!chkpass.php';

include '../config/connection.php';
include '../config/dailyChests.php';
include '../config/discord.php';
include '../config/reuploadAcc.php';
include '../config/security.php';
include '../config/topArtists.php';

$cbtn = '<button style="position:absolute;right:20px;top:20px" id="buttondrop" onclick="closepopup()">close</button>';

$gdpsreq = '?username='.$_GET['username'].'&password='.$_GET['password'];

$lastid1 = 1;
$lastid2 = 1;
$lastid3 = 1;
$lastid4 = 1;
$lastid5 = 1;

?>
<!DOCTYPE html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
</head>
<script>
    function teleport() {
        location.href = './';
    }

    function hide() {
        document.getElementById("controlp").style.display = "none";
        document.getElementById("controlb").style.display = "block";
        document.getElementById("controlm").style.marginLeft = "0";
    }

    function show() {
        document.getElementById("controlp").style.display = "block";
        document.getElementById("controlb").style.display = "none";
        document.getElementById("controlm").style.marginLeft = "240px";
    }

    function drop() {
        var elements = document.getElementsByClassName("lifk");
        for (var a = 0; a < elements.length; a++) {
            elements[a].className = "lifd";
        }
    }

    function dropBtn() {
        var elements = document.getElementsByClassName("empp");
        for (var a = 0; a < elements.length; a++) {
            elements[a].className = "empt";
        }
    }


    function connpgp() {
        drop();
        dropBtn();
        var element = document.getElementById("connphp");
        element.className = "lifk";
        document.querySelector('button[onclick="connpgp()"]').classList.toggle('empp');
    }

    function secupgp() {
        drop();
        dropBtn();
        var element = document.getElementById("secuphp");
        element.className = "lifk";
        document.querySelector('button[onclick="secupgp()"]').classList.toggle('empp');
    }

    function dailypgp() {
        drop();
        dropBtn();
        var element = document.getElementById("dailyphp");
        element.className = "lifk";
        document.querySelector('button[onclick="dailypgp()"]').classList.toggle('empp');
    }

    function mysqlaccs() {
        drop();
        dropBtn();
        var element = document.getElementById("mysqlaccs");
        element.className = "lifk";
        document.querySelector('button[onclick="mysqlaccs()"]').classList.toggle('empp');
    }

    function mysqllvls() {
        drop();
        dropBtn();
        var element = document.getElementById("mysqllvls");
        element.className = "lifk";
        document.querySelector('button[onclick="mysqllvls()"]').classList.toggle('empp');
    }

    function mysqlrols() {
        drop();
        dropBtn();
        var element = document.getElementById("mysqlrols");
        element.className = "lifk";
        document.querySelector('button[onclick="mysqlrols()"]').classList.toggle('empp');
    }

    function mysqlmaps() {
        drop();
        dropBtn();
        var element = document.getElementById("mysqlmaps");
        element.className = "lifk";
        document.querySelector('button[onclick="mysqlmaps()"]').classList.toggle('empp');
    }

    function mysqlgaus() {
        drop();
        dropBtn();
        var element = document.getElementById("mysqlgaus");
        element.className = "lifk";
        document.querySelector('button[onclick="mysqlgaus()"]').classList.toggle('empp');
    }

    function mysqlsong() {
        drop();
        dropBtn();
        var element = document.getElementById("mysqlsong");
        element.className = "lifk";
        document.querySelector('button[onclick="mysqlsong()"]').classList.toggle('empp');
    }

    function othrpgp() {
        drop();
        dropBtn();
        var element = document.getElementById("othrphp");
        element.className = "lifk";
        document.querySelector('button[onclick="othrpgp()"]').classList.toggle('empp');
    }

    function mysqlques() {
        drop();
        dropBtn();
        var element = document.getElementById("mysqlques");
        element.className = "lifk";
        document.querySelector('button[onclick="mysqlques()"]').classList.toggle('empp');
    }

    function about() {
        document.getElementById("about").style.display = 'block';
        document.querySelector('button[onclick="about()"]').classList.remove('empt');
        document.querySelector('button[onclick="about()"]').classList.toggle('empp');
    }

    function unabout() {
        document.getElementById("about").style.display = 'none';
        document.querySelector('button[onclick="about()"]').classList.remove('empp');
        document.querySelector('button[onclick="about()"]').classList.toggle('empt');
    }



    function sendconnpgp() {
        var dbuser = document.getElementById("dbuser").value;
        var dbpass = document.getElementById("dbpass").value;
        var dbname = document.getElementById("dbname").value;
        var data =
        'dbuser=' + encodeURIComponent(dbuser) +
        '&dbpass=' + encodeURIComponent(dbpass) +
        '&dbname=' + encodeURIComponent(dbname);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'connphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);
    }

    function sendsecupgp() {
        var gjpchk = document.getElementById("gjpchk").checked.toString();
        var lvlupl = document.getElementById("lvlupl").checked.toString();
        var autoacc = document.getElementById("autoacc").checked.toString();
        var captcha = document.getElementById("captcha").checked.toString();
        var sitekey = document.getElementById("sitekey").value;
        var secretkey = document.getElementById("secretkey").value;
        var data =
        'gjpchk=' + encodeURIComponent(gjpchk) +
        '&lvlupl=' + encodeURIComponent(lvlupl) +
        '&autoacc=' + encodeURIComponent(autoacc) +
        '&captcha=' + encodeURIComponent(captcha) +
        '&sitekey=' + encodeURIComponent(sitekey) +
        '&secretkey=' + encodeURIComponent(secretkey);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'secuphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);
    }

    function senddailypgp() {
        var chest1minOrbs = document.getElementById("chest1minOrbs").value;
        var chest1maxOrbs = document.getElementById("chest1maxOrbs").value;
        var chest1minDiamonds = document.getElementById("chest1minDiamonds").value;
        var chest1maxDiamonds = document.getElementById("chest1maxDiamonds").value;
        var chest1minKeys = document.getElementById("chest1minKeys").value;
        var chest1maxKeys = document.getElementById("chest1maxKeys").value;
        var chest1wait = document.getElementById("chest1wait").value;

        var chest1items = '';
        if (document.getElementById("chest11").checked) {chest1items += '1';}
        if (document.getElementById("chest12").checked) {chest1items += '2';}
        if (document.getElementById("chest13").checked) {chest1items += '3';}
        if (document.getElementById("chest14").checked) {chest1items += '4';}
        if (document.getElementById("chest15").checked) {chest1items += '5';}
        if (document.getElementById("chest16").checked) {chest1items += '6';}

        var chest2minOrbs = document.getElementById("chest2minOrbs").value;
        var chest2maxOrbs = document.getElementById("chest2maxOrbs").value;
        var chest2minDiamonds = document.getElementById("chest2minDiamonds").value;
        var chest2maxDiamonds = document.getElementById("chest2maxDiamonds").value;
        var chest2minKeys = document.getElementById("chest2minKeys").value;
        var chest2maxKeys = document.getElementById("chest2maxKeys").value;
        var chest2wait = document.getElementById("chest2wait").value;

        var chest2items = '';
        if (document.getElementById("chest21").checked) {chest2items += '1';}
        if (document.getElementById("chest22").checked) {chest2items += '2';}
        if (document.getElementById("chest23").checked) {chest2items += '3';}
        if (document.getElementById("chest24").checked) {chest2items += '4';}
        if (document.getElementById("chest25").checked) {chest2items += '5';}
        if (document.getElementById("chest26").checked) {chest2items += '6';}

        var data =
        'chest1minOrbs=' + encodeURIComponent(chest1minOrbs) +
        '&chest1maxOrbs=' + encodeURIComponent(chest1maxOrbs) +
        '&chest1minDiamonds=' + encodeURIComponent(chest1minDiamonds) +
        '&chest1maxDiamonds=' + encodeURIComponent(chest1maxDiamonds) +
        '&chest1minKeys=' + encodeURIComponent(chest1minKeys) +
        '&chest1maxKeys=' + encodeURIComponent(chest1maxKeys) +
        '&chest1items=' + encodeURIComponent(chest1items) +
        '&chest1wait=' + encodeURIComponent(chest1wait) +
        
        '&chest2minOrbs=' + encodeURIComponent(chest2minOrbs) +
        '&chest2maxOrbs=' + encodeURIComponent(chest2maxOrbs) +
        '&chest2minDiamonds=' + encodeURIComponent(chest2minDiamonds) +
        '&chest2maxDiamonds=' + encodeURIComponent(chest2maxDiamonds) +
        '&chest2minKeys=' + encodeURIComponent(chest2minKeys) +
        '&chest2maxKeys=' + encodeURIComponent(chest2maxKeys) +
        '&chest2items=' + encodeURIComponent(chest2items) +
        '&chest2wait=' + encodeURIComponent(chest2wait);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'dailyphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);
    }

    function sendartistpgp() {
        var artistp = document.getElementById("artists").checked;
        var artist;
        if (artistp) {
            artist = '1';
        } else {
            artist = '0';
        }
        var data = 'artist=' + encodeURIComponent(artist);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'artistphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);
    }

    function sendraccpgp() {
        var uid = document.getElementById("raccuid").value;
        var aid = document.getElementById("raccaid").value;
        var data = 'uid=' + encodeURIComponent(uid) +
        '&aid=' + encodeURIComponent(aid);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'raccphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);
    }

    function senddiscpgp() {
        var disc = document.getElementById("disc").checked.toString();
        var botsecret = document.getElementById("botsecret").value;
        var bottoken = document.getElementById("bottoken").value;
        var data =
        'disc=' + encodeURIComponent(disc) +
        '&botsecret=' + encodeURIComponent(botsecret) +
        '&bottoken=' + encodeURIComponent(bottoken);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'discphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);
    }


    function getacc(value) {
        document.getElementById('buttonsend').value = value;
        document.getElementById('editacc').style.display = 'block';
    }

    function editacc(accid) {
        document.getElementById('editacc').style.display = 'none';
        var password = document.getElementById("editaccid").value;
        var data = 'password=' + encodeURIComponent(password) +
        '&accid=' + encodeURIComponent(accid);
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'passphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);
    }

    function deletelvlpre(value) {
        document.getElementById('buttonsend2').value = value;
        document.getElementById('dellvl').style.display = 'block';
    }

    function deletelvl(lvlid) {
        document.getElementById('dellvl').style.display = 'none';
        var data = 'lvlid=' + encodeURIComponent(lvlid);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'lvlphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('lvl' + lvlid).remove();
            }
        }

        xhr.send(data);
    }

    function ratelvlpre(value) {
        document.getElementById('buttonsend3').value = value;
        document.getElementById('ratelvl').style.display = 'flex';
    }

    function ratelvl(lvlid) {
        document.getElementById('ratelvl').style.display = 'none';
        var ratetype = document.querySelector('input[name="ratetype"]:checked').value
        var ratediff = document.querySelector('input[name="ratediff"]:checked').value

        if (document.getElementById('coinset').checked) {
            var coins = 1;
        } else {
            var coins = 0;
        }

        var data = 'lvlid=' + encodeURIComponent(lvlid) +
        '&ratetype=' + encodeURIComponent(ratetype) +
        '&ratediff=' + encodeURIComponent(ratediff) +
        '&coins=' + encodeURIComponent(coins);
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'lvlphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send(data);
    }

    function changelvlpre(value) {
        document.getElementById('buttonsend4').value = value;
        document.getElementById('changelvl').style.display = 'block';
    }

    function changelvl(lvlid) {
        document.getElementById('changelvl').style.display = 'none';
        var lvlname = document.getElementById("levelnames").value;
        var data = 'lvlid=' + encodeURIComponent(lvlid) +
        '&lvlname=' + encodeURIComponent(lvlname);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'lvlchphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('lvn' + lvlid).textContent = lvlname;
            }
        }

        xhr.send(data);
    }

    function roleasspre() {
        document.getElementById('role').style.display = 'block';
    }

    function roleass(lastid) {
        document.getElementById('role').style.display = 'none';
        document.getElementById('buttonsend7').setAttribute('onclick', 'role(' + (parseInt(lastid) + 1) + ')');
        var roleid = document.getElementById('roleid').value;
        var roleaccid = document.getElementById('roleaccid').value;
        var data = 'assid=' + encodeURIComponent(lastid) +
        '&roleid=' + encodeURIComponent(roleid) +
        '&accid=' + encodeURIComponent(roleaccid);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'rolephp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('tableroleass').insertAdjacentHTML('beforeend', 
                '<tr id="ass' + lastid + '"><td>'+ lastid +'</td><td>' + roleid + '</td><td>' + roleaccid + '</td><td><button onclick="unrolepre('+ lastid + ')">Remove</button></td></tr>'
                );
            }
        }

        xhr.send(data);
    }

    function unrolepre(value) {
        document.getElementById('buttonsend6').value = value;
        document.getElementById('unrole').style.display = 'block';
    }

    function unrole(assid) {
        document.getElementById('unrole').style.display = 'none';
        var data = 'assid=' + encodeURIComponent(assid);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'unrolephp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('ass' + assid).remove();
            }
        }

        xhr.send(data);
    }

    function rolenewpre() {
        document.getElementById('rolenew').style.display = 'block';
    }

    function rolenew(lastid) {
        var lastid2 = parseInt(lastid) + 1;
        document.getElementById('rolenew').style.display = 'none';
        document.getElementById('buttonsend8').setAttribute('onclick', 'rolenew(' + lastid2 + ')');
        var priority = document.getElementById('prioritynew').value;
        var rolename = document.getElementById('rolenewname').value;
        var data = 'roleid=' + encodeURIComponent(lastid) +
        '&priority=' + encodeURIComponent(priority) +
        '&rolename=' + encodeURIComponent(rolename);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'rolenewphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('tableroles').insertAdjacentHTML('beforeend', 
                '<tr id="role' + lastid + '"><td>'+ rolename +'</td><td>' + lastid + '</td><td>' + priority + '</td><td><button onclick="unrolenewpre(' + lastid + ')">Remove</button></td><td><button onclick="editrolepre(' + lastid + ')">Edit permissions</button></td></tr>'
                );
            }
        }

        xhr.send(data);
    }

    function unrolenewpre(value) {
        document.getElementById('buttonsend9').value = value;
        document.getElementById('unrolenew').style.display = 'block';
    }

    function unrolenew(roleid) {
        document.getElementById('unrolenew').style.display = 'none';
        var data = 'roleid=' + encodeURIComponent(roleid);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'unrolenewphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('role' + roleid).remove();
            }
        }

        xhr.send(data);
    }

    function mappackpre(value) {
        document.getElementById('buttonsend10').value = value;
        document.getElementById('mappack').style.display = 'flex';
    }

    function mappack(packid) {
        document.getElementById('mappack').style.display = 'none';
        var
        packname = document.getElementById('mappackname').value;
        packlvl1 = document.getElementById('mappacklvl1').value;
        packlvl2 = document.getElementById('mappacklvl2').value;
        packlvl3 = document.getElementById('mappacklvl3').value;
        packstars = document.getElementById('mappackstars').value;
        packcoins = document.getElementById('mappackcoins').value;
        packcol1 = document.getElementById('mappackcol1').value;
        packcol2 = document.getElementById('mappackcol2').value;
        packdiff = document.querySelector('input[name="packdiff"]:checked').value;

        if (packstars > 10) {
            packstars = 10;
        }

        if (packcoins > 2) {
            packcoins = 2;
        }

        var data = 
        'packid=' + encodeURIComponent(packid) +
        '&packname=' + encodeURIComponent(packname) +
        '&packlvl=' + encodeURIComponent(packlvl1) +
        ',' + encodeURIComponent(packlvl2) +
        ',' + encodeURIComponent(packlvl3) +
        '&packstars=' + encodeURIComponent(packstars) +
        '&packcoins=' + encodeURIComponent(packcoins) +
        '&packcol1=' + encodeURIComponent(packcol1) +
        '&packcol2=' + encodeURIComponent(packcol2) +
        '&packdiff=' + encodeURIComponent(packdiff);
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'mappackphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('tablepacks').insertAdjacentHTML('beforeend', 
                '<tr id="pack'+packid+'"><td>'+packname+'</td><td>'+packid+'</td><td>'+packlvl1+','+packlvl2+','+packlvl3+'</td><td>'+packstars+'</td><td>'+packcoins+'</td><td>'+packdiff+'</td><td>'+packcol1+'</td><td>'+packcol2+'</td><td><button onclick="unmappackpre('+packid+')">Remove</button></td><td><button onclick="mappackeditpre('+packid+')">Edit</button></td></tr>'
                );
            }
        }

        xhr.send(data);
    }

    function unmappackpre(value) {
        document.getElementById('buttonsend11').value = value;
        document.getElementById('unmappack').style.display = 'block';
    }

    function unmappack(packid) {
        document.getElementById('unmappack').style.display = 'none';
        
        var data = 'packid=' + encodeURIComponent(packid);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'unmappackphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('pack' + packid).remove();
            }
        }

        xhr.send(data);
    }

    function gaunpre(value) {
        document.getElementById('gaun').style.display = 'flex';
    }

    function gaun() {
        document.getElementById('gaun').style.display = 'none';
        var 
        gaunid = document.getElementById('gaunid').value;
        gaunlvl1 = document.getElementById('gaunlvl1').value;
        gaunlvl2 = document.getElementById('gaunlvl2').value;
        gaunlvl3 = document.getElementById('gaunlvl3').value;
        gaunlvl4 = document.getElementById('gaunlvl4').value;
        gaunlvl5 = document.getElementById('gaunlvl5').value;

        var data = 'gaunid=' + encodeURIComponent(gaunid) +
        '&gaunlvl1=' + encodeURIComponent(gaunlvl1) +
        '&gaunlvl2=' + encodeURIComponent(gaunlvl2) +
        '&gaunlvl3=' + encodeURIComponent(gaunlvl3) +
        '&gaunlvl4=' + encodeURIComponent(gaunlvl4) +
        '&gaunlvl5=' + encodeURIComponent(gaunlvl5);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'gaunphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('tablegauns').insertAdjacentHTML('beforeend', 
                '<tr id="gaun'+gaunid+'"><td>'+gaunid+'</td><td>'+gaunlvl1+'</td><td>'+gaunlvl2+'</td><td>'+gaunlvl3+'</td><td>'+gaunlvl4+'</td><td>'+gaunlvl5+'</td><td><button onclick="ungaunpre('+gaunid+')">Remove</button></td><td><button onclick="gauneditpre('+gaunid+')">Edit</button></td></tr>'
                );
            }
        }

        xhr.send(data);
    }

    function ungaunpre(value) {
        document.getElementById('buttonsend13').value = value;
        document.getElementById('ungaun').style.display = 'block';
    }

    function ungaun(gaunid) {
        document.getElementById('ungaun').style.display = 'none';
        var data = 'gaunid=' + encodeURIComponent(gaunid);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'ungaunphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('gaun' + gaunid).remove();
            }
        }

        xhr.send(data);
    }

    function mappackeditpre(value) {
        document.getElementById('buttonsend14').value = value;
        document.getElementById('mappackedit').style.display = 'flex';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'editpackprephp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('packid=' + value);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                var resp = JSON.parse(xhr.responseText);

                document.getElementById('emappackname').value = resp[0];
                document.getElementById('emappacklvl1').value = resp[1];
                document.getElementById('emappacklvl2').value = resp[2];
                document.getElementById('emappacklvl3').value = resp[3];
                document.getElementById('emappackstars').value = resp[4];
                document.getElementById('emappackcoins').value = resp[5];
                document.getElementById('emappackcol1').value = resp[7];
                document.getElementById('emappackcol2').value = resp[8];

                var elements = document.getElementsByName('epackdiff');

                for (var i = 0; i < elements.length; i++) {
                    var element = elements[i];
                    if (element.value === resp[6]) {
                        element.checked = true;
                        break;
                    }
                }
            }
        }
    }

    function mappackedit(packid) {
        document.getElementById('mappackedit').style.display = 'none';
        var
        packname = document.getElementById('emappackname').value;
        packlvl1 = document.getElementById('emappacklvl1').value;
        packlvl2 = document.getElementById('emappacklvl2').value;
        packlvl3 = document.getElementById('emappacklvl3').value;
        packstars = document.getElementById('emappackstars').value;
        packcoins = document.getElementById('emappackcoins').value;
        packcol1 = document.getElementById('emappackcol1').value;
        packcol2 = document.getElementById('emappackcol2').value;
        packdiff = document.querySelector('input[name="epackdiff"]:checked').value;

        if (packstars > 10) {
            packstars = 10;
        }

        if (packcoins > 2) {
            packcoins = 2;
        }

        var data = 
        'packid=' + encodeURIComponent(packid) +
        '&packname=' + encodeURIComponent(packname) +
        '&packlvl=' + encodeURIComponent(packlvl1) +
        ',' + encodeURIComponent(packlvl2) +
        ',' + encodeURIComponent(packlvl3) +
        '&packstars=' + encodeURIComponent(packstars) +
        '&packcoins=' + encodeURIComponent(packcoins) +
        '&packcol1=' + encodeURIComponent(packcol1) +
        '&packcol2=' + encodeURIComponent(packcol2) +
        '&packdiff=' + encodeURIComponent(packdiff);
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'editpackphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('pack' + packid).innerHTML = '<td>'+packname+'</td><td>'+packid+'</td><td>'+packlvl1+','+packlvl2+','+packlvl3+'</td><td>'+packstars+'</td><td>'+packcoins+'</td><td>'+packdiff+'</td><td>'+packcol1+'</td><td>'+packcol2+'</td><td><button onclick="unmappackpre('+packid+')">Remove</button></td><td><button onclick="mappackeditpre('+packid+')">Edit</button></td>';
            }
        }

        xhr.send(data);
    }

    function gauneditpre(value) {
        document.getElementById('gaunedit').style.display = 'flex';
        document.getElementById('buttonsend15').value = value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'editgaunprephp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('gaunid=' + value);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                var resp = JSON.parse(xhr.responseText);

                document.getElementById('egaunid').value = resp[0];
                document.getElementById('egaunlvl1').value = resp[1];
                document.getElementById('egaunlvl2').value = resp[2];
                document.getElementById('egaunlvl3').value = resp[3];
                document.getElementById('egaunlvl4').value = resp[4];
                document.getElementById('egaunlvl5').value = resp[5];
            }
        }
    }

    function gaunedit(gaunidold) {
        document.getElementById('gaunedit').style.display = 'none';
        var 
        gaunid = document.getElementById('egaunid').value;
        gaunlvl1 = document.getElementById('egaunlvl1').value;
        gaunlvl2 = document.getElementById('egaunlvl2').value;
        gaunlvl3 = document.getElementById('egaunlvl3').value;
        gaunlvl4 = document.getElementById('egaunlvl4').value;
        gaunlvl5 = document.getElementById('egaunlvl5').value;

        var data = 'gaunidold=' + encodeURIComponent(gaunidold) +
        '&gaunid=' + encodeURIComponent(gaunid) +
        '&gaunlvl1=' + encodeURIComponent(gaunlvl1) +
        '&gaunlvl2=' + encodeURIComponent(gaunlvl2) +
        '&gaunlvl3=' + encodeURIComponent(gaunlvl3) +
        '&gaunlvl4=' + encodeURIComponent(gaunlvl4) +
        '&gaunlvl5=' + encodeURIComponent(gaunlvl5);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'editgaunphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('gaun' + gaunidold).innerHTML = '<tr id="gaun'+gaunid+'"><td>'+gaunid+'</td><td>'+gaunlvl1+'</td><td>'+gaunlvl2+'</td><td>'+gaunlvl3+'</td><td>'+gaunlvl4+'</td><td>'+gaunlvl5+'</td><td><button onclick="ungaunpre('+gaunid+')">Remove</button></td><td><button onclick="gauneditpre('+gaunid+')">Edit</button></td></tr>';
            }
        }

        xhr.send(data);
    }

    function songpre() {
        document.getElementById('song').style.display = 'block';
    }

    function song() {
        document.getElementById('song').style.display = 'none';
        var songlink = document.getElementById('songlink').value;

        var data = 'songlink=' + encodeURIComponent(songlink);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'songaddphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('tablesongs').insertAdjacentHTML('beforeend', xhr.responseText);
            }
        }

        xhr.send(data);
    }

    function unsongpre(value) {
        document.getElementById('buttonsend16').value = value;
        document.getElementById('unsong').style.display = 'block';
    }

    function unsong(songid) {
        document.getElementById('unsong').style.display = 'none';
        var data = 'songid=' + encodeURIComponent(songid);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'songdelphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('song' + songid).remove();
            }
        }

        xhr.send(data);
    }

    function banacc(accid) {
        var data = 'accid=' + encodeURIComponent(accid);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'banphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('akk' + accid).setAttribute('onclick', 'unbanacc(' + accid + ')');
                document.getElementById('akk' + accid).innerText = 'Not active';
            }
        }

        xhr.send(data);
    }

    function unbanacc(accid) {
        var data = 'accid=' + encodeURIComponent(accid);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'unbanphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('akk' + accid).setAttribute('onclick', 'banacc(' + accid + ')');
                document.getElementById('akk' + accid).innerText = 'Active';
            }
        }

        xhr.send(data);
    }

    function editrolepre(value) {
        document.getElementById('editrole').style.display = 'block';
        document.getElementById('buttonsend18').value = value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'editroleprephp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('roleid=' + value);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                var resp = JSON.parse(xhr.responseText);

                document.getElementById('erolename').value = resp[0];
                document.getElementById('epriority').value = resp[1];
                document.getElementById('emodipCategory').value = resp[2];
                document.getElementById('eisDefault').checked = Boolean(resp[3]);
                document.getElementById('ecommentColor').value = resp[4];
                document.getElementById('emodBadgeLevel').value = resp[5];
                document.getElementById('eprofilecommandDiscord').checked = Boolean(resp[6]);
                document.getElementById('eactionRateDemon').checked = Boolean(resp[7]);
                document.getElementById('eactionRateStars').checked = Boolean(resp[8]);
                document.getElementById('eactionRateDifficulty').checked = Boolean(resp[9]);
                document.getElementById('eactionSuggestRating').checked = Boolean(resp[10]);
                document.getElementById('eactionDeleteComment').checked = Boolean(resp[11]);
                document.getElementById('etoolLeaderboardsban').checked = Boolean(resp[12]);
                document.getElementById('etoolPackcreate').checked = Boolean(resp[13]);
                document.getElementById('etoolQuestsCreate').checked = Boolean(resp[14]);
                document.getElementById('etoolModactions').checked = Boolean(resp[15]);
                document.getElementById('etoolSuggestlist').checked = Boolean(resp[16]);

                document.getElementById('ecommandRate').checked = Boolean(resp[17]);
                document.getElementById('ecommandFeature').checked = Boolean(resp[18]);
                document.getElementById('ecommandEpic').checked = Boolean(resp[19]);
                document.getElementById('ecommandUnepic').checked = Boolean(resp[20]);
                document.getElementById('ecommandVerifycoins').checked = Boolean(resp[21]);
                document.getElementById('ecommandDaily').checked = Boolean(resp[22]);
                document.getElementById('ecommandWeekly').checked = Boolean(resp[23]);
                document.getElementById('ecommandDelete').checked = Boolean(resp[24]);
                document.getElementById('ecommandSetacc').checked = Boolean(resp[25]);
                document.getElementById('ecommandRenameOwn').checked = Boolean(resp[26]);
                document.getElementById('ecommandRenameAll').checked = Boolean(resp[27]);
                document.getElementById('ecommandPassOwn').checked = Boolean(resp[28]);
                document.getElementById('ecommandPassAll').checked = Boolean(resp[29]);
                document.getElementById('ecommandDescriptionOwn').checked = Boolean(resp[30]);
                document.getElementById('ecommandDescriptionAll').checked = Boolean(resp[31]);
                document.getElementById('ecommandPublicOwn').checked = Boolean(resp[32]);
                document.getElementById('ecommandPublicAll').checked = Boolean(resp[33]);
                document.getElementById('ecommandUnlistOwn').checked = Boolean(resp[34]);
                document.getElementById('ecommandUnlistAll').checked = Boolean(resp[35]);
                document.getElementById('ecommandSharecpOwn').checked = Boolean(resp[36]);
                document.getElementById('ecommandSharecpAll').checked = Boolean(resp[37]);
                document.getElementById('ecommandSongOwn').checked = Boolean(resp[38]);
                document.getElementById('ecommandSongAll').checked = Boolean(resp[39]);
                document.getElementById('eprofilecommandDiscord').checked = Boolean(resp[40]);
            }
        }
    }

    function editrole(roleid) {
        document.getElementById('editrole').style.display = 'none';
        var 
        rolename = document.getElementById('erolename').value;
        priority = document.getElementById('epriority').value;
        modipCategory = document.getElementById('emodipCategory').value;
        isDefault = document.getElementById('eisDefault').checked;
        if (isDefault) {isDefault = '1'} else {isDefault = '0'}
        commentColor = document.getElementById('ecommentColor').value;
        modBadgeLevel = document.getElementById('emodBadgeLevel').value;
        profilecommandDiscord = document.getElementById('eprofilecommandDiscord').checked;
        if (profilecommandDiscord) {profilecommandDiscord = '1'} else {profilecommandDiscord = '0'}
        actionRateDemon = document.getElementById('eactionRateDemon').checked;
        if (actionRateDemon) {actionRateDemon = '1'} else {actionRateDemon = '0'}
        actionRateStars = document.getElementById('eactionRateStars').checked;
        if (actionRateStars) {actionRateStars = '1'} else {actionRateStars = '0'}
        actionRateDifficulty = document.getElementById('eactionRateDifficulty').checked;
        if (actionRateDifficulty) {actionRateDifficulty = '1'} else {actionRateDifficulty = '0'}
        actionSuggestRating = document.getElementById('eactionSuggestRating').checked;
        if (actionSuggestRating) {actionSuggestRating = '1'} else {actionSuggestRating = '0'}
        actionDeleteComment = document.getElementById('eactionDeleteComment').checked;
        if (actionDeleteComment) {actionDeleteComment = '1'} else {actionDeleteComment = '0'}
        toolLeaderboardsban = document.getElementById('etoolLeaderboardsban').checked;
        if (toolLeaderboardsban) {toolLeaderboardsban = '1'} else {toolLeaderboardsban = '0'}
        toolPackcreate = document.getElementById('etoolPackcreate').checked;
        if (toolPackcreate) {toolPackcreate = '1'} else {toolPackcreate = '0'}
        toolQuestsCreate = document.getElementById('etoolQuestsCreate').checked;
        if (toolQuestsCreate) {toolQuestsCreate = '1'} else {toolQuestsCreate = '0'}
        toolModactions = document.getElementById('etoolModactions').checked;
        if (toolModactions) {toolModactions = '1'} else {toolModactions = '0'}
        toolSuggestlist = document.getElementById('etoolSuggestlist').checked;
        if (toolSuggestlist) {toolSuggestlist = '1'} else {toolSuggestlist = '0'}

        commandRate = document.getElementById('ecommandRate').checked;
        if (commandRate) {commandRate = '1'} else {commandRate = '0'}
        commandFeature = document.getElementById('ecommandFeature').checked;
        if (commandFeature) {commandFeature = '1'} else {commandFeature = '0'}
        commandEpic = document.getElementById('ecommandEpic').checked;
        if (commandEpic) {commandEpic = '1'} else {commandEpic = '0'}
        commandUnepic = document.getElementById('ecommandUnepic').checked;
        if (commandUnepic) {commandUnepic = '1'} else {commandUnepic = '0'}
        commandVerifycoins = document.getElementById('ecommandVerifycoins').checked;
        if (commandVerifycoins) {commandVerifycoins = '1'} else {commandVerifycoins = '0'}
        commandDaily = document.getElementById('ecommandDaily').checked;
        if (commandDaily) {commandDaily = '1'} else {commandDaily = '0'}
        commandWeekly = document.getElementById('ecommandWeekly').checked;
        if (commandWeekly) {commandWeekly = '1'} else {commandWeekly = '0'}
        commandDelete = document.getElementById('ecommandDelete').checked;
        if (commandDelete) {commandDelete = '1'} else {commandDelete = '0'}
        commandSetacc = document.getElementById('ecommandSetacc').checked;
        if (commandSetacc) {commandSetacc = '1'} else {commandSetacc = '0'}
        commandRenameOwn = document.getElementById('ecommandRenameOwn').checked;
        if (commandRenameOwn) {commandRenameOwn = '1'} else {commandRenameOwn = '0'}
        commandRenameAll = document.getElementById('ecommandRenameAll').checked;
        if (commandRenameAll) {commandRenameAll = '1'} else {commandRenameAll = '0'}
        commandPassOwn = document.getElementById('ecommandPassOwn').checked;
        if (commandPassOwn) {commandPassOwn = '1'} else {commandPassOwn = '0'}
        commandPassAll = document.getElementById('ecommandPassAll').checked;
        if (commandPassAll) {commandPassAll = '1'} else {commandPassAll = '0'}
        commandDescriptionOwn = document.getElementById('ecommandDescriptionOwn').checked;
        if (commandDescriptionOwn) {commandDescriptionOwn = '1'} else {commandDescriptionOwn = '0'}
        commandDescriptionAll = document.getElementById('ecommandDescriptionAll').checked;
        if (commandDescriptionAll) {commandDescriptionAll = '1'} else {commandDescriptionAll = '0'}
        commandPublicOwn = document.getElementById('ecommandPublicOwn').checked;
        if (commandPublicOwn) {commandPublicOwn = '1'} else {commandPublicOwn = '0'}
        commandPublicAll = document.getElementById('ecommandPublicAll').checked;
        if (commandPublicAll) {commandPublicAll = '1'} else {commandPublicAll = '0'}
        commandUnlistOwn = document.getElementById('ecommandUnlistOwn').checked;
        if (commandUnlistOwn) {commandUnlistOwn = '1'} else {commandUnlistOwn = '0'}
        commandUnlistAll = document.getElementById('ecommandUnlistAll').checked;
        if (commandUnlistAll) {commandUnlistAll = '1'} else {commandUnlistAll = '0'}
        commandSharecpOwn = document.getElementById('ecommandSharecpOwn').checked;
        if (commandSharecpOwn) {commandSharecpOwn = '1'} else {commandSharecpOwn = '0'}
        commandSharecpAll = document.getElementById('ecommandSharecpAll').checked;
        if (commandSharecpAll) {commandSharecpAll = '1'} else {commandSharecpAll = '0'}
        commandSongOwn = document.getElementById('ecommandSongOwn').checked;
        if (commandSongOwn) {commandSongOwn = '1'} else {commandSongOwn = '0'}
        commandSongAll = document.getElementById('ecommandSongAll').checked;
        if (commandSongAll) {commandSongAll = '1'} else {commandSongAll = '0'}
        profilecommandDiscord = document.getElementById('eprofilecommandDiscord').checked;
        if (profilecommandDiscord) {profilecommandDiscord = '1'} else {profilecommandDiscord = '0'}
        
        var data = 'roleid=' + encodeURIComponent(roleid) +
        '&roleName=' + encodeURIComponent(rolename) +
        '&priority=' + encodeURIComponent(priority) +
        '&modipCategory=' + encodeURIComponent(modipCategory) +
        '&isDefault=' + encodeURIComponent(isDefault) +
        '&commentColor=' + encodeURIComponent(commentColor) +
        '&modBadgeLevel=' + encodeURIComponent(modBadgeLevel) +
        '&profilecommandDiscord=' + encodeURIComponent(profilecommandDiscord) +
        '&actionRateDemon=' + encodeURIComponent(actionRateDemon) +
        '&actionRateStars=' + encodeURIComponent(actionRateStars) +
        '&actionRateDifficulty=' + encodeURIComponent(actionRateDifficulty) +
        '&actionSuggestRating=' + encodeURIComponent(actionSuggestRating) +
        '&actionDeleteComment=' + encodeURIComponent(actionDeleteComment) +
        '&toolLeaderboardsban=' + encodeURIComponent(toolLeaderboardsban) +
        '&toolPackcreate=' + encodeURIComponent(toolPackcreate) +
        '&toolQuestsCreate=' + encodeURIComponent(toolQuestsCreate) +
        '&toolModactions=' + encodeURIComponent(toolModactions) +
        '&toolSuggestlist=' + encodeURIComponent(toolSuggestlist) +

        '&commandRate=' + encodeURIComponent(commandRate) +
        '&commandFeature=' + encodeURIComponent(commandFeature) +
        '&commandEpic=' + encodeURIComponent(commandEpic) +
        '&commandUnepic=' + encodeURIComponent(commandUnepic) +
        '&commandVerifycoins=' + encodeURIComponent(commandVerifycoins) +
        '&commandDaily=' + encodeURIComponent(commandDaily) +
        '&commandWeekly=' + encodeURIComponent(commandWeekly) +
        '&commandDelete=' + encodeURIComponent(commandDelete) +
        '&commandSetacc=' + encodeURIComponent(commandSetacc) +
        '&commandRenameOwn=' + encodeURIComponent(commandRenameOwn) +
        '&commandRenameAll=' + encodeURIComponent(commandRenameAll) +
        '&commandPassOwn=' + encodeURIComponent(commandPassOwn) +
        '&commandPassAll=' + encodeURIComponent(commandPassAll) +
        '&commandDescriptionOwn=' + encodeURIComponent(commandDescriptionOwn) +
        '&commandDescriptionAll=' + encodeURIComponent(commandDescriptionAll) +
        '&commandPublicOwn=' + encodeURIComponent(commandPublicOwn) +
        '&commandPublicAll=' + encodeURIComponent(commandPublicAll) +
        '&commandUnlistOwn=' + encodeURIComponent(commandUnlistOwn) +
        '&commandUnlistAll=' + encodeURIComponent(commandUnlistAll) +
        '&commandSharecpOwn=' + encodeURIComponent(commandSharecpOwn) +
        '&commandSharecpAll=' + encodeURIComponent(commandSharecpAll) +
        '&commandSongOwn=' + encodeURIComponent(commandSongOwn) +
        '&commandSongAll=' + encodeURIComponent(commandSongAll) +
        '&profilecommandDiscord=' + encodeURIComponent(profilecommandDiscord);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'editrolephp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('role' + roleid).innerHTML = '<tr id=role'+roleid+'><td>'+rolename+'</td><td>'+roleid+'</td><td>'+priority+'</td><td><button onclick="unrolenewpre('+roleid+')">Remove</button></td><td><button onclick="editrolepre('+roleid+')">Edit</button></td>';
            }
        }

        xhr.send(data);
    }

    function unquespre(value) {
        document.getElementById('buttonsend19').value = value;
        document.getElementById('unques').style.display = 'block';
    }

    function unques(quesid) {
        document.getElementById('unques').style.display = 'none';
        var data = 'quesid=' + encodeURIComponent(quesid);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'quesdelphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                document.getElementById('ques' + quesid).remove();
            }
        }

        xhr.send(data);
    }

    function quespre(value) {
        document.getElementById('ques').style.display = 'flex';
    }

    function ques(quesid) {
        document.getElementById('ques').style.display = 'none';
        var questname = document.getElementById('questname').value;
        quescoll = document.querySelector('input[name="quescoll"]:checked').value
        questamount = document.getElementById('questamount').value;
        questreward = document.getElementById('questreward').value;

        var data = 'questid=' + encodeURIComponent(quesid) +
        '&questtype=' + encodeURIComponent(quescoll) +
        '&questamount=' + encodeURIComponent(questamount) +
        '&questreward=' + encodeURIComponent(questreward) +
        '&questname=' + encodeURIComponent(questname);
        document.getElementById('buttonsend20').setAttribute('onclick', 'ques(' + (parseInt(quesid) + 1) + ')');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'quesphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                if (quescoll == 1) {var type = 'Orbs';};
                if (quescoll == 2) {var type = 'Coins';};
                if (quescoll == 3) {var type = 'Stars';};
                document.getElementById('tablequests').insertAdjacentHTML('beforeend', '<tr id="ques'+quesid+'"><td>'+questname+'</td><td>'+quesid+'</td><td>'+questamount+'</td><td>'+type+'</td><td>'+questreward+'</td><td><button onclick=unquespre("'+quesid+'")>Delete</button></td><td><button onclick=editquespre("'+quesid+'")>Edit</button></td></tr>');
            }
        }

        xhr.send(data);
    }

    function editquespre(value) {
        document.getElementById('editques').style.display = 'flex';
        document.getElementById('buttonsend21').value = value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'editquesprephp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('quesid=' + value);

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                var resp = JSON.parse(xhr.responseText);

                if (resp[1] == 1) {document.getElementById('equesOrbs').checked = true;};
                if (resp[1] == 2) {document.getElementById('equesCoins').checked = true;};
                if (resp[1] == 3) {document.getElementById('equesStar').checked = true;};

                equestname = document.getElementById('equestname').value = resp[4];
                equestamount = document.getElementById('equestamount').value = resp[2];
                equestreward = document.getElementById('equestreward').value = resp[3];
            }
        }
}

    function editques(quesid) {
        document.getElementById('editques').style.display = 'none';

        var questname = document.getElementById('equestname').value;
        quescoll = document.querySelector('input[name="equescoll"]:checked').value
        questamount = document.getElementById('equestamount').value;
        questreward = document.getElementById('equestreward').value;

        var data = 'questid=' + encodeURIComponent(quesid) +
        '&questtype=' + encodeURIComponent(quescoll) +
        '&questamount=' + encodeURIComponent(questamount) +
        '&questreward=' + encodeURIComponent(questreward) +
        '&questname=' + encodeURIComponent(questname);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'editquesphp.php<?php echo $gdpsreq?>', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == '-229') {return teleport();}
                if (quescoll == 1) {var typeC = 'Orbs';};
                if (quescoll == 2) {var typeC = 'Coins';};
                if (quescoll == 3) {var typeC = 'Stars';};

                document.getElementById('ques' + quesid).innerHTML = 
'<tr id="ques'+quesid+'"><td>'+questname+'</td><td>'+quesid+'</td><td>'+questamount+'</td><td>'+typeC+'</td><td>'+questreward+'</td><td><button onclick=unquespre("'+quesid+'")>Delete</button></td><td><button onclick=editquespre("'+quesid+'")>Edit</button></td></tr>';
            }
        }

        xhr.send(data);
    }


    var audioElements = {};

function playSound(sid, link) {
    var audio = new Audio(link);
    audio.play();
    var audioCh = document.getElementById(sid);
    audioCh.setAttribute('onclick', `stopSound('${sid}')`);
    audioCh.textContent = 'Stop';

    audioElements[sid] = audio;
    audio.addEventListener("ended", function() {
        stopSound(sid);
    });
}

function stopSound(sid) {
    var audio = audioElements[sid];
    if (audio) {
        audio.pause();
        audio.currentTime = 0;
    }
    var audioCh = document.getElementById(sid);
    audioCh.setAttribute('onclick', `playSound('${sid}', '${audio.src}')`);
    audioCh.textContent = 'Play';
}

    function closepopup() {
        document.getElementById('editacc').style.display = 'none';
        document.getElementById('dellvl').style.display = 'none';
        document.getElementById('ratelvl').style.display = 'none';
        document.getElementById('changelvl').style.display = 'none';
        document.getElementById('changeaut').style.display = 'none';
        document.getElementById('unrole').style.display = 'none';
        document.getElementById('role').style.display = 'none';
        document.getElementById('rolenew').style.display = 'none';
        document.getElementById('unrolenew').style.display = 'none';
        document.getElementById('mappack').style.display = 'none';
        document.getElementById('unmappack').style.display = 'none';
        document.getElementById('gaun').style.display = 'none';
        document.getElementById('ungaun').style.display = 'none';
        document.getElementById('mappackedit').style.display = 'none';
        document.getElementById('gaunedit').style.display = 'none';
        document.getElementById('song').style.display = 'none';
        document.getElementById('unsong').style.display = 'none';
        document.getElementById('song').style.display = 'none';
        document.getElementById('editrole').style.display = 'none';
        document.getElementById('unques').style.display = 'none';
        document.getElementById('ques').style.display = 'none';
    }


</script>
<style>
body{width:100vw
    ;height:100vh
    ;max-width:100vw
    ;max-height:100vh
    ;margin:0
    ;font-family: Arial}
.lift{padding:4px
    ;margin:4px}
.lifk{height:90vh
    ;width:100%}
.lifd{display:none}
.jopup{
    width:300px
    ;height:140px
    ;padding:80px 50px
    ;background-color:#f1f1f1
    ;position:absolute
    ;top:50%
    ;left:50%
    ;transform:translate(-50%,-50%)
    ;border:1px solid #ccc
    ;display:none
    ;z-index:10000
}
.empt{background-color:rgba(0,0,0,0)
    ;border:none
    ;font-size:16px
}
.empp{background-color:rgba(0,0,0,0)
    ;border:none
    ;border:solid black
    ;border-width:0
    ;border-left-width:2px
    ;font-size:16px
}
.jopu{position:absolute
;top:0
;left:50%
;transform:translate(-50%,-50%)}
</style>

<button onclick="show()" style="display:none;position:fixed;z-index:9999" id="controlb">show</button>

<div id="controlp" style="height:100vh;width:220px;padding:0 10px;background-color:#ddd;position:fixed;top:0;border:solid black;border-width:0;border-right-width:2px">
    <div>
        <h1>Control panel</h1>
        <button onclick="hide()">hide</button>
        <div class="lift">
            <button class="empp" onclick="connpgp()">Edit connection.php</button>
        </div>
        <div class="lift">
            <button class="empt" onclick="dailypgp()">Edit dailyChests.php</button>
        </div>
        <div class="lift">
            <button class="empt" onclick="secupgp()">Edit security.php</button>
        </div>
        <div class="lift">
            <button class="empt" onclick="othrpgp()">Other options</button>
        </div>
        <div class="lift">
            <button class="empt" onclick="mysqlaccs()">Accounts management</button>
        </div>
        <div class="lift">
            <button class="empt" onclick="mysqllvls()">Levels management</button>
        </div>
        <div class="lift">
            <button class="empt" onclick="mysqlrols()">Roles management</button>
        </div>
        <div class="lift">
            <button class="empt" onclick="mysqlmaps()">Map packs management</button>
        </div>
        <div class="lift">
            <button class="empt" onclick="mysqlgaus()">Gauntlets management</button>
        </div>
        <div class="lift">
            <button class="empt" onclick="mysqlsong()">Songs management</button>
        </div>
        <div class="lift">
            <button class="empt" onclick="mysqlques()">Quests management</button>
        </div><br><br>
        <div>
            <button class="empt" onclick="about()" style="position:fixed;left:18px">About</button>
            <button class="empt" onclick="teleport()" style="position:fixed;left:90px">Logout</button>
        </div>
    </div>
</div>

<div id="controlm" style="margin-left:240px;padding-left:10px;position:absolute;top:0;max-height:100vh">
    
    <h1>Leiborist</h1>
    <div id="connphp" class="lifk">
        <h2>connection.php</h2>
        <label>Database user: </label><input type="text" id="dbuser" value="<?php echo $username?>"><br><br>
        <label>Database password: </label><input type="text" id="dbpass" value="<?php echo $password?>"><br><br>
        <label>Database name: </label><input type="text" id="dbname" value="<?php echo $dbname?>"><br><br>
        <button onclick="sendconnpgp()">Set values</button>
        <p>DO NOT EDIT VALUES UNLESS YOU KNOW WHAT YOU ARE DOING</p>
    </div>
    <div id="dailyphp" class="lifd">
        <h2>dailyChests.php</h2>
        <div style="display:inline-block;padding-right:12px">
            <h2 style="margin:0;padding:16px 0">Small chest</h2>
            <label>Min orbs count: </label><br><input type="text" id="chest1minOrbs" value="<?php echo $chest1minOrbs?>"><br><br>
            <label>Max orbs count: </label><br><input type="text" id="chest1maxOrbs" value="<?php echo $chest1maxOrbs?>"><br><br>
            <label>Min diamonds count: </label><br><input type="text" id="chest1minDiamonds" value="<?php echo $chest1minDiamonds?>"><br><br>
            <label>Max diamonds count: </label><br><input type="text" id="chest1maxDiamonds" value="<?php echo $chest1maxDiamonds?>"><br><br>
            <label>Min keys count: </label><br><input type="text" id="chest1minKeys" value="<?php echo $chest1minKeys?>"><br><br>
            <label>Max keys count: </label><br><input type="text" id="chest1maxKeys" value="<?php echo $chest1maxKeys?>"><br><br>
            <label>Chest wait time (in seconds): </label><br><input type="text" id="chest1wait" value="<?php echo $chest1wait?>"><br><br>
            <label>Items:</label><br>
            <label>fire shards:</label><input type="checkbox" id="chest11"<?php if(in_array(1, $chest1items))echo' checked'?>><br>
            <label>ice shards:</label><input type="checkbox" id="chest12"<?php if(in_array(2, $chest1items))echo' checked'?>><br>
            <label>poison shards:</label><input type="checkbox" id="chest13"<?php if(in_array(3, $chest1items))echo' checked'?>><br>
            <label>shadow shards:</label><input type="checkbox" id="chest14"<?php if(in_array(4, $chest1items))echo' checked'?>><br>
            <label>lava shards:</label><input type="checkbox" id="chest15"<?php if(in_array(5, $chest1items))echo' checked'?>><br>
            <label>keys:</label><input type="checkbox" id="chest16"<?php if(in_array(6, $chest1items))echo' checked'?>><br>
        </div>
        <div style="display:inline-block;padding-right:12px">
            <h2 style="margin:0;padding:16px 0">Big chest</h2>
            <label>Min orbs count: </label><br><input type="text" id="chest2minOrbs" value="<?php echo $chest2minOrbs?>"><br><br>
            <label>Max orbs count: </label><br><input type="text" id="chest2maxOrbs" value="<?php echo $chest2maxOrbs?>"><br><br>
            <label>Min diamonds count: </label><br><input type="text" id="chest2minDiamonds" value="<?php echo $chest2minDiamonds?>"><br><br>
            <label>Max diamonds count: </label><br><input type="text" id="chest2maxDiamonds" value="<?php echo $chest2maxDiamonds?>"><br><br>
            <label>Min keys count: </label><br><input type="text" id="chest2minKeys" value="<?php echo $chest2minKeys?>"><br><br>
            <label>Max keys count: </label><br><input type="text" id="chest2maxKeys" value="<?php echo $chest2maxKeys?>"><br><br>
            <label>Chest wait time (in seconds): </label><br><input type="text" id="chest2wait" value="<?php echo $chest2wait?>"><br><br>
            <label>Items:</label><br>
            <label>fire shards:</label><input type="checkbox" id="chest21"<?php if(in_array(1, $chest2items))echo' checked'?>><br>
            <label>ice shards:</label><input type="checkbox" id="chest22"<?php if(in_array(2, $chest2items))echo' checked'?>><br>
            <label>poison shards:</label><input type="checkbox" id="chest23"<?php if(in_array(3, $chest2items))echo' checked'?>><br>
            <label>shadow shards:</label><input type="checkbox" id="chest24"<?php if(in_array(4, $chest2items))echo' checked'?>><br>
            <label>lava shards:</label><input type="checkbox" id="chest25"<?php if(in_array(5, $chest2items))echo' checked'?>><br>
            <label>keys:</label><input type="checkbox" id="chest26"<?php if(in_array(6, $chest2items))echo' checked'?>><br>
        </div>
        <br><button onclick="senddailypgp()">Set values</button>
    </div>
    <div id="secuphp" class="lifd">
        <h2>security.php</h2>
        <label>GJP Check type: </label><input type="checkbox" id="gjpchk"<?php if($sessionGrants === true)echo' checked'?>><br>
        <p style="margin:0">0 - each request to the server is checked, 1 - the entire server is checked once per hour</p><br>
        <label>Unregistered users can upload levels: </label><input type="checkbox" id="lvlupl"<?php if($unregisteredSubmissions === true)echo' checked'?>><br><br>
        <label>Autoactivate accounts: </label><input type="checkbox" id="autoacc"<?php if($preactivateAccounts === true)echo' checked'?>><br><br>
        <label>Enable hCaptcha: </label><input type="checkbox" id="captcha"<?php if($enableCaptcha === true)echo' checked'?>><br><br>

        <label>hCaptcha siteKey: </label><input type="text" id="sitekey" value="<?php echo $hCaptchaKey?>"><br><br>
        <label>hCaptcha secretKey: </label><input type="text" id="secretkey" value="<?php echo $hCaptchaSecret?>"><br><br>
        <button onclick="sendsecupgp()">Set values</button>
    </div>
    <div id="othrphp" class="lifd">
        <h2>Other</h2>

        <h3>Top artists</h3>
        <label>Top artists: </label><input type="checkbox" id="artists"<?php if($redirect === 1)echo' checked'?>><br>
        <p>0 - check most used songs on this server, 1 - ask GD servers</p>
        <button onclick="sendartistpgp()">Set values</button><br><br>

        <h3>Account for reuploads</h3>
        <label>User ID: </label><input type="text" id="raccuid" value="<?php echo $reupUID?>"><br>
        <label>Account ID: </label><input type="text" id="raccaid" value="<?php echo $reupAID?>"><br>
        <button onclick="sendraccpgp()">Set values</button><br><br>

        <h3>Discord integration</h3>
        <label>Is enabled: </label><input type="checkbox" id="disc"<?php if($discordEnabled === true)echo' checked'?>><br>
        <label>secret: </label><input type="text" id="botsecret" value="<?php echo $secret?>"><br>
        <label>Bot Token: </label><input type="text" id="bottoken" value="<?php echo $bottoken?>"><br>
        <button onclick="senddiscpgp()">Set values</button><br><br>

        <h3>File Manager</h3>
        <button onclick="location.href = './filemgr.php<?php echo $gdpsreq?>'">File manager</button><br><br>
    </div>
    <div id="mysqlaccs" class="lifd">
        <h2>Accounts management</h2><?php
$result = $db->query('SELECT * FROM `accounts`');
$data = $result->fetchAll(PDO::FETCH_OBJ);

echo '<table>';
echo '<tr>
    <th>User Name</th>
    <th>AccID</th>
    <th>Change Password</th>
    <th>Activated</th>
    </tr>';
foreach ($data as $obj) {
    
    if ($obj->isActive == 1) {
        $ban = '<button id="akk'.$obj->accountID.'" onclick="banacc('.$obj->accountID.')">Active</button>';
    } else {
        $ban = '<button id="akk'.$obj->accountID.'" onclick="unbanacc('.$obj->accountID.')">Not active</button>';
    }
    
    echo '<tr>
    <td>'.$obj->userName.'</td>
    <td>'.$obj->accountID.'</td>
    <td><button onclick="getacc('.$obj->accountID.')">Click to change</button></td>
    <td>'.$ban.'</td>
    </tr>';
}
echo '</table>';

?>
    </div>
    <div id="mysqllvls" class="lifd">
        <h2>Levels management</h2><?php
$result = $db->query('SELECT * FROM `levels`');
$data = $result->fetchAll(PDO::FETCH_OBJ);

echo '<table>';
echo '<tr>
    <th>Level name</th>
    <th>LvlID</th>
    <th>Author</th>
    <th>Delete level</th>
    <th>Change name</th>
    <th>Rate level</th>
    </tr>';
foreach ($data as $obj) {
    echo '<tr id="lvl'.$obj->levelID.'">
    <td id="lvn'.$obj->levelID.'">'.$obj->levelName.'</td>
    <td id="lvls'.$obj->levelID.'">'.$obj->levelID.'</td>
    <td id="aut'.$obj->levelID.'">'.$obj->userName.'</td>
    <td><button onclick="deletelvlpre(\''.$obj->levelID.'\')">Delete level</button></td>
    <td><button onclick="changelvlpre(\''.$obj->levelID.'\')">Rename</button></td>
    <td><button onclick="ratelvlpre(\''.$obj->levelID.'\')">Rate level</button></td>
    </tr>';
}
echo '</table>';

?>
    </div>
    <div id="mysqlrols" class="lifd">
        <h2>Roles management</h2>
        <h3>Created roles</h3><?php
$result = $db->query('SELECT * FROM `roles`');
$data = $result->fetchAll(PDO::FETCH_OBJ);

echo '<table id="tableroles"';
echo '<tr>
    <th>Role name</th>
    <th>RoleID</th>
    <th>Priority</th>
    <th>Remove role</th>
    <th>Edit role</th>
    </tr>';
foreach ($data as $obj) {
    echo '<tr id="role'.$obj->roleID.'">
    <td>'.$obj->roleName.'</td>
    <td>'.$obj->roleID.'</td>
    <td>'.$obj->priority.'</td>
    <td><button onclick="unrolenewpre('.$obj->roleID.')">Remove</button></td>
    <td><button onclick="editrolepre('.$obj->roleID.')">Edit permissions</button></td>
    </tr>';
    $lastid2 = $obj->roleID + 1;
}

echo '</table>
<button onclick="rolenewpre()">Add role</button>
<h3>Assigned roles</h3>';

$result = $db->query('SELECT * FROM `roleassign`');
$data = $result->fetchAll(PDO::FETCH_OBJ);

echo '<table id="tableroleass">';
echo '<tr>
    <th>AssignID</th>
    <th>RoleID</th>
    <th>AccountID</th>
    <th>Remove role</th>
    </tr>';
foreach ($data as $obj) {
    echo '<tr id="ass'.$obj->assignID.'">
    <td>'.$obj->assignID.'</td>
    <td>'.$obj->roleID.'</td>
    <td>'.$obj->accountID.'</td>
    <td><button onclick="unrolepre('.$obj->assignID.')">Remove</button></td>
    </tr>';
    $lastid1 = $obj->assignID + 1;
}
echo '</table>';
?>
        <button onclick="roleasspre()">Add perms</button>
    </div>
    <div id="mysqlmaps" class="lifd">
        <h2>Map packs management</h2><?php
$result = $db->query('SELECT * FROM `mappacks`');
$data = $result->fetchAll(PDO::FETCH_OBJ);

echo '<table id="tablepacks">';
echo '<tr>
    <th>Map pack name</th>
    <th>ID</th>
    <th>Levels (id\'s)</th>
    <th>Stars</th>
    <th>Coins</th>
    <th>Difficulty</th>
    <th>Line color</th>
    <th>Title color</th>
    <th>Remove</th>
    <th>Edit</th>
    </tr>';
foreach ($data as $obj) {
    echo '<tr id="pack'.$obj->ID.'">
    <td>'.$obj->name.'</td>
    <td>'.$obj->ID.'</td>
    <td>'.$obj->levels.'</td>
    <td>'.$obj->stars.'</td>
    <td>'.$obj->coins.'</td>
    <td>'.$obj->difficulty.'</td>
    <td>'.$obj->rgbcolors.'</td>
    <td>'.$obj->colors2.'</td>
    <td><button onclick="unmappackpre('.$obj->ID.')">Remove</button></td>
    <td><button onclick="mappackeditpre('.$obj->ID.')">Edit</button></td>
    </tr>';
    $lastid3 = $obj->ID + 1;
}
echo '</table>';
echo '<button onclick="mappackpre()">Add map pack</button>';

?>
    </div>
    <div id="mysqlgaus" class="lifd">
        <h2>Gauntlets management</h2><?php
$result = $db->query('SELECT * FROM `gauntlets`');
$data = $result->fetchAll(PDO::FETCH_OBJ);

echo '<table id="tablegauns">';
echo '<tr>
    <th>ID</th>
    <th>Level 1</th>
    <th>Level 2</th>
    <th>Level 3</th>
    <th>Level 4</th>
    <th>Level 5</th>
    <th>Remove</th>
    <th>Edit</th>
    </tr>';
foreach ($data as $obj) {
    echo '<tr id="gaun'.$obj->ID.'">
    <td>'.$obj->ID.'</td>
    <td>'.$obj->level1.'</td>
    <td>'.$obj->level2.'</td>
    <td>'.$obj->level3.'</td>
    <td>'.$obj->level4.'</td>
    <td>'.$obj->level5.'</td>
    <td><button onclick="ungaunpre('.$obj->ID.')">Remove</button></td>
    <td><button onclick="gauneditpre('.$obj->ID.')">Edit</button></td>
    </tr>';
    $lastid4 = $obj->ID + 1;
}
echo '</table>';
echo '<button onclick="gaunpre()">Add gauntlet</button>';

?>
    </div>
    <div id="mysqlsong" class="lifd">
        <h2>Songs management</h2><?php
$result = $db->query('SELECT * FROM `songs`');
$data = $result->fetchAll(PDO::FETCH_OBJ);

echo '<table id="tablesongs">';
echo '<tr>
    <th>Name</th>
    <th>ID</th>
    <th>Author Name</th>
    <th>Remove</th>
    <th>Listen</th>
    </tr>';
foreach ($data as $obj) {
    $strink = $obj->name;
    if (strlen($strink) > 25) {
        $strink = substr($strink, 0, 25).'...';
    }
    echo '<tr id="song'.$obj->ID.'">
    <td>'.$strink.'</td>
    <td>'.$obj->ID.'</td>
    <td>'.$obj->authorName.'</td>
    <td><button onclick="unsongpre('.$obj->ID.')">Remove</button></td>
    <td><button onclick="playSound(\'nong'.$obj->ID.'\', \''.$obj->download.'\')" id="nong'.$obj->ID.'">Play</button></td>
    </tr>';
}
echo '</table>';
echo '<button onclick="songpre()">Add song</button>';

?>
    </div>
    <div id="mysqlques" class="lifd">
        <h2>Gauntlets management</h2><?php
$result = $db->query('SELECT * FROM `quests`');
$data = $result->fetchAll(PDO::FETCH_OBJ);

echo '<table id="tablequests">';
echo '<tr>
    <th>Name</th>
    <th>ID</th>
    <th>Need</th>
    <th>type</th>
    <th>Diamonds</th>
    <th>Delete quest</th>
    <th>Edit quest</th>
    </tr>';
foreach ($data as $obj) {
    
    switch ($obj->type) {
        case 1:
            $type = 'Orbs';
            break;
        case 2:
            $type = 'Coins';
            break;
        case 3:
            $type = 'Stars';
            break;
    }
    
    echo '<tr id="ques'.$obj->ID.'">
    <td>'.$obj->name.'</td>
    <td>'.$obj->ID.'</td>
    <td>'.$obj->amount.'</td>
    <td>'.$type.'</td>
    <td>'.$obj->reward.'</td>
    <td><button onclick=unquespre("'.$obj->ID.'")>Delete</button></td>
    <td><button onclick=editquespre("'.$obj->ID.'")>Edit</button></td>
    </tr>';
    $lastid5 = $obj->ID + 1;
}
echo '</table>';
echo '<button onclick="quespre()">Add quest</button>';

?>
    </div>
    
</div>







<div align="center" id="editacc" class="jopup">
    <h2 class="jopu">Edit password</h2>
    <?php echo $cbtn?>
    <label>Password: </label><br>
    <input type="text" id="editaccid"><br><br>
    <button id="buttonsend" onclick="editacc(this.value)" value="0">Send value</button>
</div>

<div align="center" id="dellvl" class="jopup">
    <h2 class="jopu">Delete level</h2>
    <?php echo $cbtn?>
    <label>You really want delete this lvl?</label><br>
    <button id="buttonsend2" onclick="deletelvl(this.value)" value="0">Delete</button>
</div>

<div align="center" id="ratelvl" class="jopup" style="height:300px">
    <h2 class="jopu">Rate level</h2>
    <?php echo $cbtn?>
    <div style="display:inline-block;position:absolute;left:80px">
        <label>Unrate</label>      <input type="radio" name="ratetype" value="0"><br>
        <label>Rate</label>        <input type="radio" name="ratetype" value="1"><br>
        <label>Feature</label>     <input type="radio" name="ratetype" value="2"><br>
        <label>Epic</label>        <input type="radio" name="ratetype" value="3"><br><br>
        <label>Verify coins</label><input type="checkbox" id="coinset"><br><br>
    </div>
    <div style="display:inline-block;position:absolute;right:80px">
        <label>Auto</label>         <input type="radio" name="ratediff" value="00"><br>
        <label>Easy</label>         <input type="radio" name="ratediff" value="10"><br>
        <label>Normal</label>       <input type="radio" name="ratediff" value="20"><br>
        <label>Hard</label>         <input type="radio" name="ratediff" value="30"><br>
        <label>Hard</label>         <input type="radio" name="ratediff" value="34"><br>
        <label>Harder</label>       <input type="radio" name="ratediff" value="40"><br>
        <label>Harder</label>       <input type="radio" name="ratediff" value="44"><br>
        <label>Insane</label>       <input type="radio" name="ratediff" value="50"><br>
        <label>Insane</label>       <input type="radio" name="ratediff" value="54"><br>
        <label>Easy demon</label>   <input type="radio" name="ratediff" value="60"><br>
        <label>Medium demon</label> <input type="radio" name="ratediff" value="64"><br>
        <label>Hard demon</label>   <input type="radio" name="ratediff" value="70"><br>
        <label>Insane demon</label> <input type="radio" name="ratediff" value="74"><br>
        <label>Extreme demon</label><input type="radio" name="ratediff" value="80"><br>
    </div><br><br><br><br><br><br><br><br>
    <button id="buttonsend3" style="position:absolute;bottom:30px;left:50%;transform:translate(-50%,0);" onclick="ratelvl(this.value)" value="0">Set values</button>
</div>

<div align="center" id="changelvl" class="jopup">
    <h2 class="jopu" style="width:300px">Change level name</h2>
    <?php echo $cbtn?>
    <label>New level name:</label><br>
    <input type="text" id="levelnames">
    <button id="buttonsend4" onclick="changelvl(this.value)" value="0">Change</button>
</div>

<div align="center" id="changeaut" class="jopup">
    <h2 class="jopu">Change author</h2>
    <?php echo $cbtn?>
    <label>New author name:</label><br>
    <input type="text" id="authornames">
    <button id="buttonsend5" onclick="changeaut(this.value)" value="0">Change</button>
</div>

<div align="center" id="unrole" class="jopup">
    <h2 class="jopu">Delete perms</h2>
    <?php echo $cbtn?>
    <label>You really want delete account permissions?</label><br>
    <button id="buttonsend6" onclick="unrole(this.value)" value="0">Delete</button>
</div>

<div align="center" id="role" class="jopup">
    <h2 class="jopu">Add perms</h2>
    <?php echo $cbtn?>
    <label>Role ID: </label><br>
    <input type="text" id="roleid"><br><br>
    <label>Account ID: </label><br>
    <input type="text" id="roleaccid"><br><br>
    <button id="buttonsend7" onclick="roleass(<?php echo $lastid1?>)">Add perms</button>
</div>

<div align="center" id="rolenew" class="jopup">
    <h2 class="jopu">Add role</h2>
    <?php echo $cbtn?>
    <label>Role Name: </label><br>
    <input type="text" id="rolenewname"><br><br>
    <label>Priority: </label><br>
    <input type="text" id="prioritynew"><br><br>
    <button id="buttonsend8" onclick="rolenew(<?php echo $lastid2?>)">Add perms</button>
</div>

<div align="center" id="unrolenew" class="jopup">
    <h2 class="jopu">Delete role</h2>
    <?php echo $cbtn?>
    <label>You really want delete this role?</label><br>
    <button id="buttonsend9" onclick="unrolenew(this.value)" value="0">Delete</button>
</div>

<div align="center" id="mappack" class="jopup" style="height:300px">
    <h2 class="jopu">Add map pack</h2>
    <?php echo $cbtn?>
    <div align="left" style="display:inline-block;width:30%;margin-right:3%">
        <label>Map pack Name: </label><br>
        <input type="text" style="width:80px" id="mappackname"><br><br>
        <label>Level 1 ID: </label><br>
        <input type="text" style="width:80px" id="mappacklvl1"><br><br>
        <label>Level 2 ID: </label><br>
        <input type="text" style="width:80px" id="mappacklvl2"><br><br>
        <label>Level 3 ID: </label><br>
        <input type="text" style="width:80px" id="mappacklvl3"><br><br>
    </div>
    <div align="left" style="display:inline-block;width:30%;margin-right:3%">
        <label>Stars reward (max 10): </label><br>
        <input type="text" style="width:80px" id="mappackstars"><br><br>
        <label>Coins reward (max 2): </label><br>
        <input type="text" style="width:80px" id="mappackcoins"><br><br>
        <label>Line Color (R,G,B): </label><br>
        <input type="text" style="width:80px" id="mappackcol1"><br><br>
        <label>Title Color (R,G,B): </label><br>
        <input type="text" style="width:80px" id="mappackcol2"><br><br>
    </div>
    <div align="left" style="display:inline-block;width:30%;margin-right:3%">
        <label>Difficulty:</label><br>
        <label>Auto</label>  <input type="radio" name="packdiff" value="0"><br>
        <label>Easy</label>  <input type="radio" name="packdiff" value="1"><br>
        <label>Normal</label><input type="radio" name="packdiff" value="2"><br>
        <label>Hard</label>  <input type="radio" name="packdiff" value="3"><br>
        <label>Harder</label><input type="radio" name="packdiff" value="4"><br>
        <label>Insane</label><input type="radio" name="packdiff" value="5"><br>
        <label>Demon</label> <input type="radio" name="packdiff" value="6"><br>
    </div>
    <button id="buttonsend10" style="position:absolute;bottom:30px;left:50%;transform:translate(-50%,0);" onclick="mappack(<?php echo $lastid3?>)">Add map pack</button>
</div>

<div align="center" id="unmappack" class="jopup">
    <h2 class="jopu">Delete map pack</h2>
    <?php echo $cbtn?>
    <label>You really want delete this map pack?</label><br>
    <button id="buttonsend11" onclick="unmappack(this.value)" value="0">Delete</button>
</div>

<div align="center" id="gaun" class="jopup">
    <h2 class="jopu">Add gauntlet</h2>
    <?php echo $cbtn?>
    <div align="left" style="display:inline-block;width:50%">
        <label>Gauntlet ID: </label><br>
        <input type="text" style="width:80px" id="gaunid"><br><br>
        <label>Level 1: </label><br>
        <input type="text" style="width:80px" id="gaunlvl1"><br><br>
        <label>Level 2: </label><br>
        <input type="text" style="width:80px" id="gaunlvl2"><br><br>
    </div>
    <div align="left" style="display:inline-block;width:50%">
        <label>Level 3: </label><br>
        <input type="text" style="width:80px" id="gaunlvl3"><br><br>
        <label>Level 4: </label><br>
        <input type="text" style="width:80px" id="gaunlvl4"><br><br>
        <label>Level 5: </label><br>
        <input type="text" style="width:80px" id="gaunlvl5"><br><br>
    </div>
    <button id="buttonsend12" style="position:absolute;bottom:30px;left:50%;transform:translate(-50%,0);" onclick="gaun()">Add gauntlet</button>
</div>

<div align="center" id="ungaun" class="jopup">
    <h2 class="jopu">Delete gauntlet</h2>
    <?php echo $cbtn?>
    <label>You really want delete this gauntlet?</label><br>
    <button id="buttonsend13" onclick="ungaun(this.value)" value="0">Delete</button>
</div>

<div align="center" id="mappackedit" class="jopup" style="height:300px">
    <h2 class="jopu">Edit map pack</h2>
    <?php echo $cbtn?>
    <div align="left" style="display:inline-block;width:30%;margin-right:3%">
        <label>Map pack Name: </label><br>
        <input type="text" style="width:80px" id="emappackname"><br><br>
        <label>Level 1 ID: </label><br>
        <input type="text" style="width:80px" id="emappacklvl1"><br><br>
        <label>Level 3 ID: </label><br>
        <input type="text" style="width:80px" id="emappacklvl2"><br><br>
        <label>Level 3 ID: </label><br>
        <input type="text" style="width:80px" id="emappacklvl3"><br><br>
    </div>
    <div align="left" style="display:inline-block;width:30%;margin-right:3%">
        <label>Stars reward (max 10): </label><br>
        <input type="text" style="width:80px" id="emappackstars"><br><br>
        <label>Coins reward (max 2): </label><br>
        <input type="text" style="width:80px" id="emappackcoins"><br><br>
        <label>Line Color (R,G,B): </label><br>
        <input type="text" style="width:80px" id="emappackcol1"><br><br>
        <label>Title Color (R,G,B): </label><br>
        <input type="text" style="width:80px" id="emappackcol2"><br><br>
    </div>
    <div align="left" style="display:inline-block;width:30%;margin-right:3%">
        <label>Difficulty:</label><br>
        <label>Auto</label>  <input type="radio" name="epackdiff" value="0"><br>
        <label>Easy</label>  <input type="radio" name="epackdiff" value="1"><br>
        <label>Normal</label><input type="radio" name="epackdiff" value="2"><br>
        <label>Hard</label>  <input type="radio" name="epackdiff" value="3"><br>
        <label>Harder</label><input type="radio" name="epackdiff" value="4"><br>
        <label>Insane</label><input type="radio" name="epackdiff" value="5"><br>
        <label>Demon</label> <input type="radio" name="epackdiff" value="6"><br>
    </div>
    <button id="buttonsend14" style="position:absolute;bottom:30px;left:50%;transform:translate(-50%,0);" onclick="mappackedit(this.value)">Edit map pack</button>
</div>

<div align="center" id="gaunedit" class="jopup">
    <h2 class="jopu">Add gauntlet</h2>
    <?php echo $cbtn?>
    <div align="left" style="display:inline-block;width:50%">
        <label>Gauntlet ID: </label><br>
        <input type="text" style="width:80px" id="egaunid"><br><br>
        <label>Level 1: </label><br>
        <input type="text" style="width:80px" id="egaunlvl1"><br><br>
        <label>Level 2: </label><br>
        <input type="text" style="width:80px" id="egaunlvl2"><br><br>
    </div>
    <div align="left" style="display:inline-block;width:50%">
        <label>Level 3: </label><br>
        <input type="text" style="width:80px" id="egaunlvl3"><br><br>
        <label>Level 4: </label><br>
        <input type="text" style="width:80px" id="egaunlvl4"><br><br>
        <label>Level 5: </label><br>
        <input type="text" style="width:80px" id="egaunlvl5"><br><br>
    </div>
    <button id="buttonsend15" style="position:absolute;bottom:30px;left:50%;transform:translate(-50%,0);" onclick="gaunedit(this.value)">Edit gauntlet</button>
</div>

<div align="center" id="unsong" class="jopup">
    <h2 class="jopu">Delete song</h2>
    <?php echo $cbtn?>
    <label>You really want delete this song?</label><br>
    <button id="buttonsend16" onclick="unsong(this.value)" value="0">Delete</button>
</div>

<div align="center" id="song" class="jopup">
    <h2 class="jopu">Add song</h2>
    <?php echo $cbtn?>
    <label>Direct Link: </label><br>
    <input type="text" id="songlink"><br><br>
    <button id="buttonsend17" onclick="song()">Add sond</button>
</div>

<div align="center" id="editrole" class="jopup" style="height:360px">
    <h2 class="jopu">Edit role</h2>
    <?php echo $cbtn?>
    <label>Role Name: </label><br>
    <input type="text" id="erolename"><br>
    <label>Priority: </label><br>
    <input type="text" id="epriority"><br>
    <label>Comments text color: </label><br>
    <input type="text" id="ecommentColor"><br>
    <label>Default role: </label>
    <input type="checkbox" id="eisDefault"><br>
    <label>Takeable (help->req): </label>
    <input type="checkbox" id="eactionSuggestRating"><br>
    <h3 style="margin:0">Permissions</h3>
    <div align="left" style="overflow-y:scroll;height:200px;background-color:#e1e1e1">
        <h2 style="margin:0">In-game actions:</h2>
        <label>Rate Demon: </label>
        <input type="checkbox" id="eactionRateDemon"><br>
        <label>Rate Stars: </label>
        <input type="checkbox" id="eactionRateStars"><br>
        <label>Rate Difficulty: </label>
        <input type="checkbox" id="eactionRateDifficulty"><br>
        <label>Delete Comments: </label>
        <input type="checkbox" id="eactionDeleteComment"><br>
        <h2 style="margin:0">Tools panel:</h2>
        <label>toolLeaderboardsban: </label>
        <input type="checkbox" id="etoolLeaderboardsban"><br>
        <label>toolPackcreate: </label>
        <input type="checkbox" id="etoolPackcreate"><br>
        <label>toolQuestsCreate: </label>
        <input type="checkbox" id="etoolQuestsCreate"><br>
        <label>toolModactions: </label>
        <input type="checkbox" id="etoolModactions"><br>
        <label>toolSuggestlist: </label>

        <h2 style="margin:0">Comments commands:</h2>
        <label>commandRate: </label>
        <input type="checkbox" id="ecommandRate"><br>
        <label>commandFeature: </label>
        <input type="checkbox" id="ecommandFeature"><br>
        <label>commandEpic: </label>
        <input type="checkbox" id="ecommandEpic"><br>
        <label>commandUnepic: </label>
        <input type="checkbox" id="ecommandUnepic"><br>
        <label>commandVerifycoins: </label>
        <input type="checkbox" id="ecommandVerifycoins"><br>
        <label>commandDaily: </label>
        <input type="checkbox" id="ecommandDaily"><br>
        <label>commandWeekly: </label>
        <input type="checkbox" id="ecommandWeekly"><br>
        <label>commandDelete: </label>
        <input type="checkbox" id="ecommandDelete"><br>
        <label>commandSetacc: </label>
        <input type="checkbox" id="ecommandSetacc"><br>
        <label>commandRenameOwn: </label>
        <input type="checkbox" id="ecommandRenameOwn"><br>
        <label>commandRenameAll: </label>
        <input type="checkbox" id="ecommandRenameAll"><br>
        <label>commandPassOwn: </label>
        <input type="checkbox" id="ecommandPassOwn"><br>
        <label>commandPassAll: </label>
        <input type="checkbox" id="ecommandPassAll"><br>
        <label>commandDescriptionOwn: </label>
        <input type="checkbox" id="ecommandDescriptionOwn"><br>
        <label>commandDescriptionAll: </label>
        <input type="checkbox" id="ecommandDescriptionAll"><br>
        <label>commandPublicOwn: </label>
        <input type="checkbox" id="ecommandPublicOwn"><br>
        <label>commandPublicAll: </label>
        <input type="checkbox" id="ecommandPublicAll"><br>
        <label>commandUnlistOwn: </label>
        <input type="checkbox" id="ecommandUnlistOwn"><br>
        <label>commandUnlistAll: </label>
        <input type="checkbox" id="ecommandUnlistAll"><br>
        <label>commandSharecpOwn: </label>
        <input type="checkbox" id="ecommandSharecpOwn"><br>
        <label>commandSharecpAll: </label>
        <input type="checkbox" id="ecommandSharecpAll"><br>
        <label>commandSongOwn: </label>
        <input type="checkbox" id="ecommandSongOwn"><br>
        <label>commandSongAll: </label>
        <input type="checkbox" id="ecommandSongAll"><br>
        <label>toolSuggestlist: </label>
        <input type="checkbox" id="etoolSuggestlist"><br>

        <h2 style="margin:0">Other:</h2>
        <label>profilecommandDiscord: </label>
        <input type="checkbox" id="eprofilecommandDiscord"><br>
        <label>modipCategory: </label><br>
        <input type="text" id="emodipCategory"><br><br>
        <label>modBadgeLevel: </label><br>
        <input type="text" id="emodBadgeLevel"><br><br>
    </div><br>
    <button id="buttonsend18" onclick="editrole(this.value)">Edit perms</button>
</div>

<div align="center" id="unques" class="jopup">
    <h2 class="jopu">Delete quest</h2>
    <?php echo $cbtn?>
    <label>You really want delete this quest?</label><br>
    <button id="buttonsend19" onclick="unques(this.value)" value="0">Delete</button>
</div>

<div align="center" id="ques" class="jopup">
    <h2 class="jopu">Create quest</h2>
    <?php echo $cbtn?>
    <div style="display:inline-block;width:50%">
        <label>Quest Name: </label><br>
        <input type="text" id="questname"><br><br>
        <label>Quest collect type: </label><br>
	    <label>Orbs: </label><input type="radio" name="quescoll" id="quesOrbs" value="1"><br>
    	<label>Coins: </label><input type="radio" name="quescoll" id="quesCoins" value="2"><br>
	    <label>Star: </label><input type="radio" name="quescoll" id="quesStar" value="3"><br>
	</div>
	<div style="display:inline-block;width:50%">
        <label>Quest amount: </label><br>
        <input type="text" id="questamount" style="width:100px"><br><br>
        <label>Quest reward: </label><br>
        <input type="text" id="questreward" style="width:100px">
    </div>
    <button id="buttonsend20" style="position:absolute;bottom:30px;left:50%;transform:translate(-50%,0);" onclick="ques(<?php echo $lastid5?>)">Create</button>
</div>

<div align="center" id="editques" class="jopup">
    <h2 class="jopu">Edit quest</h2>
    <?php echo $cbtn?>
    <div style="display:inline-block;width:50%">
        <label>Quest Name: </label><br>
        <input type="text" id="equestname"><br><br>
        <label>Quest collect type: </label><br>
	    <label>Orbs: </label><input type="radio" name="equescoll" id="equesOrbs" value="1"><br>
    	<label>Coins: </label><input type="radio" name="equescoll" id="equesCoins" value="2"><br>
	    <label>Star: </label><input type="radio" name="equescoll" id="equesStar" value="3"><br>
	</div>
	<div style="display:inline-block;width:50%">
        <label>Quest amount: </label><br>
        <input type="text" id="equestamount" style="width:100px"><br><br>
        <label>Quest reward: </label><br>
        <input type="text" id="equestreward" style="width:100px">
    </div>
    <button id="buttonsend21" style="position:absolute;bottom:30px;left:50%;transform:translate(-50%,0);" onclick="editques(this.value)">Edit</button>
</div>

<div align="center" id="about" class="jopup">
    <h2 class="jopu" style="width:300px">About GDPS Panel</h2>
    <button style="position:absolute;right:20px;top:20px" id="buttondrop" onclick="unabout()">close</button>
    <p>GMDps control panel ver 0.90.1.0</p>
    <p>Created by MIOBOMB (100% of code!)</p>
    <p>Published by GDPS Helper</p>
</div>