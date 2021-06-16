<?php

require dirname(__FILE__) . '/PHPMailer/src/PHPMailer.php';
require dirname(__FILE__) . '/PHPMailer/src/SMTP.php';
require dirname(__FILE__) . '/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * 测试邮箱配置
 *
 * @package Comment2Mail
 * @author  Hoe
 * @link    https://www.hoehub.com
 */
class Comment2Mail_Action extends Typecho_Widget implements Widget_Interface_Do
{

    public function __construct($request, $response, $params = null)
    {
        parent::__construct($request, $response, $params);
        if (!Typecho_Widget::widget('Widget_User')->pass('administrator', true)) {
            throw new Typecho_Exception(_t('Forbidden'), 403);
        }
    }

    /**
     * 测试方法
     */
    public function action()
    {
        try {
            $STMPHost     = isset($_GET['STMPHost'])     ? $_GET['STMPHost']     : '';
            $SMTPUserName = isset($_GET['SMTPUserName']) ? $_GET['SMTPUserName'] : '';
            $SMTPPassword = isset($_GET['SMTPPassword']) ? $_GET['SMTPPassword'] : '';
            $SMTPSecure   = isset($_GET['SMTPSecure'])   ? $_GET['SMTPSecure']   : '';
            $SMTPPort     = isset($_GET['SMTPPort'])     ? $_GET['SMTPPort']     : '';
            $fromMail     = isset($_GET['fromMail'])     ? $_GET['fromMail']     : '';
            $fromName     = isset($_GET['fromName'])     ? $_GET['fromName']     : '';

            // Server settings
            $mail = new PHPMailer(true);
            $mail->CharSet = PHPMailer::CHARSET_UTF8;
            $mail->Encoding = PHPMailer::ENCODING_BASE64;
            $mail->isSMTP();
            $mail->Host = $STMPHost; // SMTP 服务地址
            $mail->SMTPAuth = true; // 开启认证
            $mail->Username = $SMTPUserName; // SMTP 用户名
            $mail->Password = $SMTPPassword; // SMTP 密码
            $mail->SMTPSecure = $SMTPSecure; // SMTP 加密类型
            $mail->Port = $SMTPPort; // SMTP 端口

            $mail->setFrom($fromMail, $fromName);
            $mail->addAddress($fromMail, $fromName); // 发件人

            $mail->Subject = '来自Comment2Mail的测试邮件';

            $mail->isHTML(); // 邮件为HTML格式
            // 邮件内容
            $mail->Body = '测试';
            $mail->send();
            exit('成功！');
        } catch (Exception $e) {
            echo "<b>失败，请检查配置项~</b><br>";
            exit($e);
        }
    }
}
