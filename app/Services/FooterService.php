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
            'twitter' => [
                'platform' =>  $twitterFooter->platform,
                'nama_halaman' => $twitterFooter->nama_halaman,
                'link_url' => $twitterFooter->link_url
            ],

        ]

    }
}

?>