<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        // Home Page
        $this->migrator->add('page.home_meta_title', null);
        $this->migrator->add('page.home_meta_description', null);
        $this->migrator->add('page.home_meta_keywords', null);
        $this->migrator->add('page.home_meta_image', null);
        $this->migrator->add('page.home_title_banner', 'Pilihan Andalan Buat Dapur Impian');
        $this->migrator->add('page.home_title_product', 'Pilihan Produk Quantum Solusi Efisien Dapur Anda');
        $this->migrator->add('page.home_title_why', 'Kenapa Memilih Quantum?');
        $this->migrator->add('page.home_title_testimonial', 'Kata Mereka tentang Quantum');
        $this->migrator->add('page.home_title_article', 'Artikel Terbaru untuk Dapur Anda');
        $this->migrator->add('page.home_title_banner_bottom', 'Wujudkan Dapur Idaman Mulai dari Quantum');
        $this->migrator->add('page.home_description_banner', 'Wujudkan dapur idaman dengan performa teruji kompor Quantum.');
        $this->migrator->add('page.home_description_product', 'Quantum hadirkan kompor, selang, dan regulator gas dengan desain modern dan telah teruji performanya.');
        $this->migrator->add('page.home_description_why', 'Inovasi Quantum hadir jadi andalan untuk tiap kebutuhan dapur Anda');
        $this->migrator->add('page.home_description_banner_bottom', 'Rasakan performa unggul produk Quantum di dapurmu');
        $this->migrator->add('page.home_banner', []);
        $this->migrator->add('page.home_why_choose_us', [ [ 'image' => '', 'title' => 'Produk Indonesia', 'description' => 'Teknologi inovatif Quantum membantu mengurangi konsumsi gas, sehingga lebih efisien dan ramah di kantong.' ], [ 'image' => '', 'title' => 'Harga Terjangkau', 'description' => 'Kualitas tinggi tidak harus mahal. Produk Quantum hadir dengan harga yang pas untuk semua kalangan.' ], [ 'image' => '', 'title' => 'Aman Digunakan', 'description' => 'Dilengkapi fitur keselamatan canggih yang dirancang khusus untuk melindungi Anda dan keluarga saat memasak.' ], [ 'image' => '', 'title' => 'Awet & Tahan Lama', 'description' => 'Quantum terus berinovasi untuk selalu menghasilkan produk yang mampu menghemat konsumsi gas hingga 30%.' ] ]);
        $this->migrator->add('page.home_testimonials', [ [ 'age' => 35, 'name' => 'Hanna', 'origin' => 'Jakarta', 'testimonial' => 'Kompor gas Quantum ini life saver banget! Nggak cuma hemat gas, desainnya juga simple dan modern. Bikin dapur jadi elegan. Recommended pokoknya!' ], [ 'age' => 55, 'name' => 'Danang', 'origin' => 'Jakarta', 'testimonial' => 'Saya puas jadi distributor Quantum selama hampir 6 tahun. Produknya berkualitas tinggi, penjualannya stabil, dan jadi pilihan utama banyak orang.' ] ]);

        // About Page
        $this->migrator->add('page.about_meta_title', null);
        $this->migrator->add('page.about_meta_description', null);
        $this->migrator->add('page.about_meta_keywords', null);
        $this->migrator->add('page.about_meta_image', null);

        // Product Page
        $this->migrator->add('page.product_meta_title', null);
        $this->migrator->add('page.product_meta_description', null);
        $this->migrator->add('page.product_meta_keywords', null);
        $this->migrator->add('page.product_meta_image', null);

        // Distributor Page
        $this->migrator->add('page.distributor_meta_title', null);
        $this->migrator->add('page.distributor_meta_description', null);
        $this->migrator->add('page.distributor_meta_keywords', null);
        $this->migrator->add('page.distributor_meta_image', null);

        // Catalog Page
        $this->migrator->add('page.catalog_meta_title', null);
        $this->migrator->add('page.catalog_meta_description', null);
        $this->migrator->add('page.catalog_meta_keywords', null);
        $this->migrator->add('page.catalog_meta_image', null);

        // News and Event (Articles) Page
        $this->migrator->add('page.news_meta_title', null);
        $this->migrator->add('page.news_meta_description', null);
        $this->migrator->add('page.news_meta_keywords', null);
        $this->migrator->add('page.news_meta_image', null);

        // Recipe Page
        $this->migrator->add('page.recipe_meta_title', null);
        $this->migrator->add('page.recipe_meta_description', null);
        $this->migrator->add('page.recipe_meta_keywords', null);
        $this->migrator->add('page.recipe_meta_image', null);

        // Customer Service Page
        $this->migrator->add('page.cs_meta_title', null);
        $this->migrator->add('page.cs_meta_description', null);
        $this->migrator->add('page.cs_meta_keywords', null);
        $this->migrator->add('page.cs_meta_image', null);
        $this->migrator->add('page.cs_title', 'Layanan Pelanggan Quantum');
        $this->migrator->add('page.cs_title_support', 'Semua Solusi dalam Satu Layanan');
        $this->migrator->add('page.cs_title_guidance', 'Edukasi dan Panduan');
        $this->migrator->add('page.cs_title_video', 'Tutorial Penggunaan Produk');
        $this->migrator->add('page.cs_description', 'Dukungan menyeluruh untuk pengalaman Anda bersama Quantum yang optimal.');
        $this->migrator->add('page.cs_description_support', 'Dapatkan akses bantuan resmi untuk setiap kebutuhan Anda.');
        $this->migrator->add('page.cs_description_guidance', 'Temukan panduan penggunaan produk Quantum Anda di sini.');
        $this->migrator->add('page.cs_description_video', 'Semua yang perlu Anda tahu dalam penggunaan produk Quantum.');
        $this->migrator->add('page.cs_support', []);


        // Guarantee Information Page
        $this->migrator->add('page.guarantee_meta_title', null);
        $this->migrator->add('page.guarantee_meta_description', null);
        $this->migrator->add('page.guarantee_meta_keywords', null);
        $this->migrator->add('page.guarantee_meta_image', null);

        // Service Center Page
        $this->migrator->add('page.sc_meta_title', null);
        $this->migrator->add('page.sc_meta_description', null);
        $this->migrator->add('page.sc_meta_keywords', null);
        $this->migrator->add('page.sc_meta_image', null);
        $this->migrator->add('page.sc_title', 'Jaringan Service Produk Quantum');
        $this->migrator->add('page.sc_description', 'Dapatkan layanan perbaikan produk Quantum di pusat service resmi dan mitra terpercaya.');

        // FAQ Page
        $this->migrator->add('page.faq_meta_title', null);
        $this->migrator->add('page.faq_meta_description', null);
        $this->migrator->add('page.faq_meta_keywords', null);
        $this->migrator->add('page.faq_meta_image', null);
        $this->migrator->add('page.faq_title', 'Butuh Bantuan, Bu?');
        $this->migrator->add('page.faq_description', 'Kami rangkum pertanyaan yang sering muncul supaya Ibu lebih tenang dan nyaman.');
        $this->migrator->add('page.faq_sub_title_product', 'Sub Question Produk');
        $this->migrator->add('page.faq_sub_title_purchase', 'Sub Question Pembelian');
        $this->migrator->add('page.faq_sub_title_guarantee', 'Sub Question Garansi');
        $this->migrator->add('page.faq_product', [ [ 'answer' => 'Produk kami menggunakan material berkualitas tinggi yang tahan lama dan desain ergonomis yang telah melalui riset mendalam untuk memastikan kenyamanan maksimal bagi pengguna dalam jangka panjang.', 'question' => 'Apa keunggulan utama dari produk ini dibandingkan kompetitor?' ], [ 'answer' => 'Ya, kami menyediakan berbagai variasi warna dan ukuran yang dapat Anda pilih di halaman detail produk sesuai dengan preferensi dan kebutuhan Anda.', 'question' => 'Apakah produk ini tersedia dalam berbagai pilihan warna atau ukuran?' ], [ 'answer' => 'Cukup bersihkan produk secara berkala dengan kain lembap dan hindari paparan sinar matahari langsung atau cairan kimia keras untuk menjaga kualitas materialnya.', 'question' => 'Bagaimana cara perawatan produk agar tetap awet?' ] ]);
        $this->migrator->add('page.faq_purchase', [ [ 'answer' => 'Kami menerima berbagai metode pembayaran mulai dari transfer bank (VA), kartu kredit, hingga pembayaran melalui e-wallet populer seperti GoPay, OVO, dan Dana.', 'question' => 'Apa saja metode pembayaran yang tersedia?' ], [ 'answer' => 'Proses verifikasi pesanan dilakukan dalam 1x24 jam. Untuk pengiriman reguler, estimasi sampai adalah 2-4 hari kerja tergantung lokasi pengiriman Anda.', 'question' => 'Berapa lama waktu pengiriman setelah saya melakukan pemesanan?' ], [ 'answer' => 'Pembatalan hanya dapat dilakukan jika status pesanan belum masuk ke tahap pengemasan/pengiriman. Silakan hubungi Customer Service kami sesegera mungkin jika ada perubahan.', 'question' => 'Apakah saya bisa membatalkan pesanan yang sudah dibayar?' ] ]);
        $this->migrator->add('page.faq_guarantee', [ [ 'answer' => 'Setiap pembelian produk mendapatkan garansi resmi selama 12 bulan (1 tahun) sejak tanggal pembelian yang tertera pada invoice.', 'question' => 'Berapa lama masa garansi yang diberikan untuk produk ini?' ], [ 'answer' => 'Garansi mencakup kerusakan manufaktur (cacat produksi) dan kegagalan fungsi komponen utama dalam penggunaan normal. Garansi tidak berlaku untuk kerusakan akibat kelalaian pengguna (jatuh, terkena air, dsb).', 'question' => 'Apa saja kerusakan yang ditanggung oleh garansi?' ], [ 'answer' => 'Anda cukup menghubungi tim dukungan kami dengan melampirkan foto/video kerusakan serta bukti pembelian (invoice). Kami akan memandu proses perbaikan atau penggantian unit baru.', 'question' => 'Bagaimana prosedur klaim garansi jika terjadi kerusakan?' ] ]);

        // Contact Page
        $this->migrator->add('page.contact_meta_title', null);
        $this->migrator->add('page.contact_meta_description', null);
        $this->migrator->add('page.contact_meta_keywords', null);
        $this->migrator->add('page.contact_meta_image', null);
        $this->migrator->add('page.contact_title', 'Kontak Resmi');
        $this->migrator->add('page.contact_title_service', 'Service Center Quantum');
        $this->migrator->add('page.contact_description', 'Hubungi Kontak Resmi Quantum untuk berbagai layanan bantuan dan keperluan Anda seputar produk');
        $this->migrator->add('page.contact_description_service', 'Pusat Servis Resmi Quantum yang profesional dan terpercaya siap membantu Anda untuk berbagai layanan seputar produk');
        $this->migrator->add('page.contact_cc_number', '0800-1-503-508');
        $this->migrator->add('page.contact_cc_operational', [ [ 'to_day' => 'Jumat', 'to_hour' => '20:00', 'from_day' => 'Senin', 'timezone' => 'WIB', 'from_hour' => '07:00' ] ]);
        $this->migrator->add('page.contact_cc_information', 'Hubungi langsung tim layanan pelanggan Quantum untuk mendapatkan informasi, bantuan teknis, atau konsultasi seputar produk.');
        $this->migrator->add('page.contact_wa_number', '0812-988-10000');
        $this->migrator->add('page.contact_wa_operational', [ [ 'to_day' => 'Jumat', 'to_hour' => '20:00', 'from_day' => 'Senin', 'timezone' => 'WIB', 'from_hour' => '07:00' ] ]);
        $this->migrator->add('page.contact_wa_information', 'Tanya seputar produk dan garansi di Live Chat WhatsApp');
        $this->migrator->add('page.contact_email', 'service.center@quantumssm.co.id');
        $this->migrator->add('page.contact_email_operational', [ [ 'to_day' => 'Jumat', 'to_hour' => '20:00', 'from_day' => 'Senin', 'timezone' => 'WIB', 'from_hour' => '07:00' ] ]);
        $this->migrator->add('page.contact_email_information', 'Kirim pertanyaan Anda untuk bantuan seputar produk Quantum.');
        $this->migrator->add('page.contact_office_image', '');
        $this->migrator->add('page.contact_office_name', 'Quantum Office Tower');
        $this->migrator->add('page.contact_office_address', 'Gedung Office 8 Jl. Senopati no 8B Level 18A Senayan, Keb. Baru, Jakarta 12190');
        $this->migrator->add('page.contact_office_operational', [ [ 'to_day' => 'Jumat', 'to_hour' => '20:00', 'from_day' => 'Senin', 'timezone' => 'WIB', 'from_hour' => '07:00' ] ]);
        $this->migrator->add('page.contact_office_information', 'Pusat operasional resmi yang mendukung inovasi dan layanan Quantum.');
        $this->migrator->add('page.contact_office_map', 'https://maps.app.goo.gl/rYqz5N4nyps4ds4E7');
        $this->migrator->add('page.contact_socmed_operational', [ [ 'to_day' => 'Jumat', 'to_hour' => '20:00', 'from_day' => 'Senin', 'timezone' => 'WIB', 'from_hour' => '07:00' ] ]);
        $this->migrator->add('page.contact_socmed_information', 'Akun resmi Quantum untuk update produk, promo, dan tips menarik.');
        $this->migrator->add('page.contact_socmed_tiktok', 'https://www.tiktok.com/@quantum_indonesia');
        $this->migrator->add('page.contact_socmed_linkedin', 'https://www.linkedin.com/company/quantum-home-appliances');
        $this->migrator->add('page.contact_socmed_youtube', 'https://www.youtube.com/@quantumindonesia');
        $this->migrator->add('page.contact_socmed_instagram', 'https://www.instagram.com/quantum_indonesia');
        $this->migrator->add('page.contact_socmed_facebook', 'https://www.facebook.com/QuantumIDN');

        // Education & Guidance Page
        $this->migrator->add('page.guidance_meta_title', null);
        $this->migrator->add('page.guidance_meta_description', null);
        $this->migrator->add('page.guidance_meta_keywords', null);
        $this->migrator->add('page.guidance_meta_image', null);
        $this->migrator->add('page.guidance_title', 'Edukasi dan Panduan');
        $this->migrator->add('page.guidance_title_article', 'Jelajahi Dunia Quantum: Edukasi & Panduan Produk');
        $this->migrator->add('page.guidance_description', 'Temukan tips terbaik memakai produk Quantum untuk pengalaman memasak yang lebih efisien');
        $this->migrator->add('page.guidance_description_article', 'Temukan tips seputar produk Quantum untuk pengalaman memasak lebih efisien');

        // Video & Tutorial Page
        $this->migrator->add('page.video_meta_title', null);
        $this->migrator->add('page.video_meta_description', null);
        $this->migrator->add('page.video_meta_keywords', null);
        $this->migrator->add('page.video_meta_image', null);
        $this->migrator->add('page.video_title', 'Tutorial Penggunaan Produk');
        $this->migrator->add('page.video_description', 'Rasakan performa produk Quantum yang optimal dengan video tutorial resmi.');

        // Terms & Conditions Page
        $this->migrator->add('page.tnc_meta_title', null);
        $this->migrator->add('page.tnc_meta_description', null);
        $this->migrator->add('page.tnc_meta_keywords', null);
        $this->migrator->add('page.tnc_meta_image', null);
        $this->migrator->add('page.tnc_title', 'Syarat & Ketentuan Penggunaan');
        $this->migrator->add('page.tnc_updated_date', '2025-07-25');
        $this->migrator->add('page.tnc_content', '<p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p><ol start=\"1\"><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p></li></ol><p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>');

        // Privacy Policy Page
        $this->migrator->add('page.pp_meta_title', null);
        $this->migrator->add('page.pp_meta_description', null);
        $this->migrator->add('page.pp_meta_keywords', null);
        $this->migrator->add('page.pp_meta_image', null);
        $this->migrator->add('page.pp_title', 'Kebijakan Privasi');
        $this->migrator->add('page.pp_title_cookie', 'Penggunaan Cookies');
        $this->migrator->add('page.pp_updated_date', '2025-07-25');
        $this->migrator->add('page.pp_updated_date_cookie', '2025-07-25');
        $this->migrator->add('page.pp_content', '<p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p><ol start=\"1\"><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p></li></ol><p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>');
        $this->migrator->add('page.pp_content_cookie', '<p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p><ol start=\"1\"><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.<br><br></p></li><li><p><strong>Headline</strong><br>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p></li></ol><p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>');
    }
};
