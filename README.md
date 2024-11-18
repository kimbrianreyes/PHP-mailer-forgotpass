Put your credentials in null spaces here:
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = '';
        $mail->Password = '';
        $mail->SMTPSecured = 'ssl';
        $mail->Port = 587;
        $mail->setFrom('');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject='Forgot Password Request';
        $mail->Body='Verification code: '. $code;
        $mail->send();


Also, config your google account about email SSL. it has 16 digits code.
