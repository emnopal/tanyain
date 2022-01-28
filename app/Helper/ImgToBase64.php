<?php

namespace App\Helper;

class ImgToBase64
{
    public static function convert($isi)
    {
        $content = $isi;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/upload/" . time() . $item . '.png';
            $path = public_path() . $image_name;
            file_put_contents($path, $imgeData);

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        //        $post = Post::create([
//            'title' => $request->title,
//            'body' => $content
//        ]);
//
//        dd($post->toArray());
        return $dom->saveHTML();
    }
}
