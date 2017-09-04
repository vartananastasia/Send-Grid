<?php

namespace SendGrid;


/**
 * Class Client
 * @package SendGrid
 */
class Client
{

    /**
     * Client constructor.
     * @param $key
     * @param $test
     * @param string $to
     * @param string $to_name
     * @param string $from
     * @param string $from_name
     * @param string $title
     * @param string $body
     */
    public function __construct($key, $test, $to = '', $to_name = '', $from = '', $from_name = '', $title = '', $body = '')
    {
        if ($test){
            $to = 'test@test.ru';
            $to_name = 'Nastia';
            $from = 'support@test.com';
            $from_name = 'support';
            $title = 'Заголовок';
            $body = '<html><p>Текст соощения</p></html>';
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"personalizations\":[{\"to\":[{\"email\":\"{$to}\",\"name\":\"{$to_name}\"}],\"subject\":\"{$title}\"}],\"from\":{\"email\":\"{$from}\",\"name\":\"{$from_name}\"},\"reply_to\":{\"email\":\"{$from}\",\"name\":\"{$from_name}\"},\"subject\":\"{$title}\",\"content\":[{\"type\":\"text/html\",\"value\":\"{$body}\"}]}",
            CURLOPT_HTTPHEADER => array(
                "authorization: Bearer {$key}",
                "content-type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        return $err ?: $response;
    }
}
