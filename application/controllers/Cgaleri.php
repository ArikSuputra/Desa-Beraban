<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cgaleri extends CI_Controller
{

    public function index()
    {
        $access_token = 'IGQWRQYUk1YndOU2Nyd1Q0RnZAMMzhSMm5EbGZAoRnVfdU1SZA3ZA4c2FoaUh1ODNtNTIzOTJiYk54TTJkYlhBS3BIUVZAxTU1FanBoNUNDQUhQZAlVhY0tlY1F2MW1tbE52b200dmhmS3pFRmxMYkVQY05Pb3ltVHg5djAZD';
        $api_url = 'https://graph.instagram.com/me/media?fields=id,caption,media_type,media_url,permalink,timestamp,username,count=8&access_token=' . $access_token;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        if (isset($data['data'])) {
            $posts = $data['data'];
            // Ambil hanya 8 postingan terbaru
            $posts = array_slice($posts, 0, 8);
        } else {
            $posts = [];
        }

        $data['title'] = 'Galeri';
        $this->load->view('header', $data);
        $this->load->view('Galeri/index', ['posts' => $posts]);
        $this->load->view('footer');
    }
}

/* End of file Cgaleri.php */
