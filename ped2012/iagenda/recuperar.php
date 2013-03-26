<?php
include_once("PHPMailer/class.phpmailer.php");
include_once("PHPMailer/class.smtp.php");

function gmailMessage($userid, $to, $nameTo) {
    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;

    $mail->Username = 'djay.control@gmail.com';
    $mail->Password = '!DJayControl#';

    $mail->From = 'djay.control@gmail.com';
    $mail->FromName = 'WebSite iAgenda';

    $mail->Subject = "Recuperar Password";

    $message = <<<EOT
<p>Caro $nameTo,</p>
<p>voc&ecirc; (ou algu&eacute;m em seu nome), solicitou a recupera&ccedil;&atilde;o da sua password.</p>
<p>Por favor visite o seguinte <a href="http://aulasped.local/ped2012/iagenda/recuperar.php?id=$userid">link</a>,</p>
<p>e proceda &agrave; cria&ccedil;&atilde;o de uma nova password!<p>
<p>Se o link acima n&atilde;o funcionar, por favor introduza o seguinte c&oacute;digo: <b>$userid</b></p>
<p>Obrigado.</p>
EOT;

    $mail->MsgHTML($message);

    $mail->AddReplyTo('djay.control@gmail.com');

    $mail->AddAddress($to, $nameTo);

    $mail->IsHTML(true);


    if (!$mail->Send()) {
        return "Não consegui enviar o email -> Mailer Error: " . $mail->ErrorInfo;
    } else {
        return "Foi enviado email com instruções para mudar a password!";
    }
}

$status = "";

if (isset($_REQUEST['id']) || $_REQUEST['id'] != "") {
    $db = mysql_connect("127.0.0.1", "root", "") or die("Não foi possível ligar à BD!!!");

    if (!mysql_selectdb("iagenda", $db)) {
        echo 'Não consegui seleccionar a BD!';
        exit;
    }

    $query = "SELECT * FROM utilizador WHERE id='" . $_REQUEST['id'] . "'";

    $rs = mysql_query($query, $db);

    if (mysql_fetch_row($rs)) {
        mysql_close($db);
        ?>
        <form action="recuperar.php" method="POST">
            <table align="center">
                <tr>
                    <td>Nova Password:</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Confirmar:</td>
                    <td><input type="password" name="rpassword"></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="id" value="<?php echo $_REQUEST['id']; ?>">
                        <input type="hidden" name="dopasschange" value="now">
                    </td>
                    <td><input type="submit" value="Alterar Password"></td>
                </tr>
            </table>
        </form>

        <?php
    } else {
        mysql_close($db);
        $status = "Dados inválidos. Não consegui efectuar o reset da password!!!";
        header("Location: contacto.php?status=" . $status);
    }
}

if (isset($_REQUEST['do']) && $_REQUEST['do'] == "now") {
    if ($_REQUEST['username'] == "" || $_REQUEST['email'] == "") {
        $status = "Os campos não podem estar vazios!!!!";
        header("Location: contacto.php?status=" . $status);
    }

    $db = mysql_connect("127.0.0.1", "root", "") or die("Não foi possível ligar à BD!!!");

    if (!mysql_selectdb("iagenda", $db)) {
        echo 'Não consegui seleccionar a BD!';
        exit;
    }

    $query = "SELECT * FROM utilizador WHERE username='" . $_REQUEST['username'] . "' AND email = '" . $_REQUEST['email'] . "'";

    $rs = mysql_query($query, $db);

    if (mysql_fetch_row($rs)) {
        mysql_close($db);

        // utilizador existe

        $status = gmailMessage(mysql_result($rs, 0, 'id'), mysql_result($rs, 0, 'email'), mysql_result($rs, 0, 'username'));

        header("Location: contacto.php?status=" . $status);
    } else {
        mysql_close($db);
        $status = "Nao existe esse utilizador!";
        header("Location: contacto.php?status=" . $status);
    }
}

if (isset($_REQUEST['dopasschange']) && $_REQUEST['dopasschange'] == "now") {
    if ($_REQUEST['password'] == "" || $_REQUEST['rpassword'] == "") {
        $status = "As passwords devem estar preenchidas!";
        header("Location: contacto.php?status=" . $status);
    } else {
        if ($_REQUEST['password'] != $_REQUEST['rpassword']) {
            $status = "As passwords devem ser iguais!";
            header("Location: contacto.php?status=" . $status);
        } else {

            $db = mysql_connect("127.0.0.1", "root", "") or die("Não foi possível ligar à BD!!!");

            if (!mysql_selectdb("iagenda", $db)) {
                echo 'Não consegui seleccionar a BD!';
                exit;
            }

            $query = "UPDATE utilizador SET password='" . md5($_REQUEST['password']) . "' WHERE id = '" . $_REQUEST['id'] . "'";

            if(mysql_query($query, $db))
            {
                $status = "Password alterada com sucesso!";
                mysql_close($db);
                header("Location: contacto.php?status=" . $status);
            } else
            {
                $status = "Erro ao alterar a password!";
                mysql_close($db);
                header("Location: contacto.php?status=" . $status);
            }

        }
    }
}
?>
