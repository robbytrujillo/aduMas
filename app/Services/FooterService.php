<?php 

namespace App\Services;
// Tambahkan model Footer
use App\Models\Footer;

class FooterService {
    public static function getFooterData() {
        // Logika untuk mendapatkan data footer
        $facebookFooter = Footer::where('platform', 'Facebook')->first();
        $twitterFooter = Footer::where('platform', 'Twitter')->first();
        $instagramFooter = Footer::where('platform', 'Instagram')->first();
        $whatsappFooter = Footer::where('platform', 'Whatsapp')->first();
        $emailFooter = Footer::where('platform', 'Email')->first();
        $phoneFooter = Footer::where('platform', 'Phone')->first();
        $addressFooter = Footer::where('platform', 'Address')->first();
        $faqsFooter = Footer::where('platform', 'Faqs')->first();
        $privacyFooter = Footer::where('platform', 'Privacy')->first();

        // Structur Data
        $footerData = [
            'facebook' => [
                'platform' =>  $facebookFooter->platform,
                'nama_halaman' => $facebookFooter->nama_halaman,
                'link_url' => $facebookFooter->link_url
            ],
            'twitter' => [
                'platform' =>  $twitterFooter->platform,
                'nama_halaman' => $twitterFooter->nama_halaman,
                'link_url' => $twitterFooter->link_url
            ],
            'instagram' => [
                'platform' =>  $instagramFooter->platform,
                'nama_halaman' => $instagramFooter->nama_halaman,
                'link_url' => $instagramFooter->link_url
            ],
            'whatsapp' => [
                'platform' =>  $whatsappFooter->platform,
                'nama_halaman' => $whatsappFooter->nama_halaman,
                'link_url' => $whatsappFooter->link_url
            ],
            'email' => [
                'platform' =>  $emailFooter->platform,
                'nama_halaman' => $emailFooter->nama_halaman,
                'link_url' => $emailFooter->link_url
            ],
            'phone' => [
                'platform' =>  $phoneFooter->platform,
                'nama_halaman' => $phoneFooter->nama_halaman,
                'link_url' => $phoneFooter->link_url
            ],
            'address' => [
                'platform' =>  $addressFooter->platform,
                'nama_halaman' => $addressFooter->nama_halaman,
                'link_url' => $addressFooter->link_url
            ],
            'faqs' => [
                'platform' =>  $faqsFooter->platform,
                'nama_halaman' => $faqsFooter->nama_halaman,
                'link_url' => $faqsFooter->link_url
            ],
            'privacy' => [
                'platform' =>  $privacyFooter->platform,
                'nama_halaman' => $privacyFooter->nama_halaman,
                'link_url' => $privacyFooter->link_url
            ],

        ];

        return $footerData;

    }
}

?>