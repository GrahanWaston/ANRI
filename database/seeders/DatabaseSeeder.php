<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Layanan;
use App\Models\MenuStatis;
use App\Models\ProfilInstansi;
use App\Models\Section4;
use App\Models\Slideshow;
use App\Models\SubMenu;
use App\Models\User;
use App\Models\Website;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        MenuStatis::create([
            'name' => 'Beranda'
        ]);

        MenuStatis::create([
            'name' => 'Profil'
        ]);

        MenuStatis::create([
            'name' => 'Diklat'
        ]);

        MenuStatis::create([
            'name' => 'LMS Kring ANRI',
            'url' => 'https://kelasdaring.anri.go.id/'
        ]);

        MenuStatis::create([
            'name' => 'Pengaduan'
        ]);

        MenuStatis::create([
            'name' => 'Publikasi'
        ]);

        MenuStatis::create([
            'name' => 'Prasarana dan Sarana'
        ]);

        MenuStatis::create([
            'name' => 'FAQ'
        ]);

        MenuStatis::create([
            'name' => 'Kontak Kami'
        ]);

        SubMenu::create([
            'name' => 'Sejarah Pusdiklat',
            'menu_id' => '2'
        ]);

        SubMenu::create([
            'name' => 'Visi dan Misi',
            'menu_id' => '2'
        ]);

        SubMenu::create([
            'name' => 'Tugas dan Fungsi',
            'menu_id' => '2'
        ]);

        SubMenu::create([
            'name' => 'Struktur Organisasi',
            'menu_id' => '2'
        ]);

        SubMenu::create([
            'name' => 'Sumber Daya Manusia',
            'menu_id' => '2'
        ]);

        SubMenu::create([
            'name' => 'Maklumat Layanan',
            'menu_id' => '2'
        ]);

        SubMenu::create([
            'name' => 'Kalendar Diklat',
            'menu_id' => '3'
        ]);

        SubMenu::create([
            'name' => 'Program Diklat',
            'menu_id' => '3'
        ]);

        SubMenu::create([
            'name' => 'WBS ANRI',
            'menu_id' => '5',
            'url' => 'https://wbs.anri.go.id/'
        ]);

        SubMenu::create([
            'name' => 'Gratifikasi ANRI',
            'menu_id' => '5',
            'url' => 'https://wbs.anri.go.id/'
        ]);

        SubMenu::create([
            'name' => 'Lapor',
            'menu_id' => '5',
            'url' => 'https://www.lapor.go.id/'
        ]);

        SubMenu::create([
            'name' => 'La-Simak',
            'menu_id' => '5',
            'url' => 'https://s28a7n9v56m.typeform.com/to/nZkAV64z?typeform-source=sandbox.jmc.co.id'
        ]);

        SubMenu::create([
            'name' => 'Artikel',
            'menu_id' => '6'
        ]);

        SubMenu::create([
            'name' => 'Berita',
            'menu_id' => '6'
        ]);

        SubMenu::create([
            'name' => 'Infografis',
            'menu_id' => '6'
        ]);

        SubMenu::create([
            'name' => 'Pengumuman',
            'menu_id' => '6'
        ]);

        SubMenu::create([
            'name' => 'JDIH',
            'menu_id' => '6',
            'url' => 'https://jdih.anri.go.id/'
        ]);

        SubMenu::create([
            'name' => 'PPID',
            'menu_id' => '6',
            'url' => 'https://eppid.anri.go.id/'
        ]);

        // SubMenu::create([
        //     'name' => 'Program Diklat',
        //     'menu_id' => '2'
        // ]);

        // SubMenu::create([
        //     'name' => 'Program Diklat',
        //     'menu_id' => '2'
        // ]);

        User::create([
            'name' => 'Grahan Aditiya Waston',
            'username' => "grahanwaston",
            'role' => "admin",
            'status' => "1",
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Denok Vina Wardhani',
            'username' => "Devina",
            'role' => "operator",
            'status' => "1",
            'password' => bcrypt('12345678')
        ]);

        Slideshow::create([
            'judul' => 'PROGRAM DIKLAT',
            'deskripsi' => 'Program diklat yang disediakan oleh Arsip Nasional RI',
            'tautan' => 'https://anri.go.id',
            'image_dekstop' => 'img/YpbjWRRclhqsCk9PcQsfYs48apxd60WijRxi2uka.jpg',
            "image_mobile" => 'img/pXt6qmzM88VN0lOUa74s7XDckjkR7OMOQZWfRc9Y.jpg'
        ]);

        Slideshow::create([
            'judul' => 'PUSDIKLAT KEARSIPAN',
            'deskripsi' => 'Melaksanakan pendidikan dan pelatihan agar tercipta sumber daya manusia yang berkualitas',
            'tautan' => 'https://pusdiklat.anri.go.id/eregistrasi/pages/nmdiklat/',
            'image_dekstop' => 'img/Ad5Ngt6tJN6JdD4Fu7x4qQlHXTSlxcZTrMPqllik.jpg',
            "image_mobile" => 'img/n8vQmrv3qwdKHgPzrXwHBfKP0qaiTxAJTgylRmwJ.jpg'
        ]);

        Layanan::create([
            'nama' => 'Kalender Diklat',
            'url' => 'https://anri.go.id/publikasi/berita/kalender-diklat-kearsipan-biaya-pnbp-yang-diselenggarakan-pusdiklat-kearsipan-anri',
            'deskripsi' => 'Jadwal Diklat yang akan dilaksanakan oleh Arsip Nasional Republik Indonesia'
        ]);

        Layanan::create([
            'nama' => 'Program Diklat',
            'url' => 'https://pusdiklat.anri.go.id/eregistrasi/pages/nmdiklat/',
            'deskripsi' => 'Program DIklat yang di sediakan oleh Arsip Nasional Republik Indonesia'
        ]);

        Layanan::create([
            'nama' => 'LMS Kring ANRI',
            'url' => 'https://kelasdaring.anri.go.id',
            'deskripsi' => 'Jadwal Diklat yang akan dilaksanakan oleh Arsip Nasional Republik Indonesia'
        ]);

        Website::create([
            'nama_website' => 'Pusdiklat Kearsipan ANRI',
            'alamat' => 'Jl. Ir. H. Djuanda No. 62, Kota Bogor, 16122',
            'no_telfon' => '0251-8322331',
            'no_whatsapp' => '0812-1170-0300 (Chat Only)',
            'email_pertama' => 'pusdiklat@anri.go.id',
            'email_kedua' => 'pusdiklat.anri@gmail.com',
            'maps' => '<iframe class="w-100 mb-n2" style="height: 450px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15853.383919453185!2d106.7955159!3d-6.603857!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x446fe796b884d774!2sPusdiklat%20Kearsipan%20Arsip%20Nasional%20RI!5e0!3m2!1sid!2sid!4v1668394788095!5m2!1sid!2sid" frameborder="0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
            'facebook' => 'https://www.facebook.com/ArsipNasionalRI?_rdc=1&_rdr',
            'twitter' => 'https://twitter.com/arsipnasionalri',
            'instagram' => 'https://www.instagram.com/arsipnasionalri/',
            'youtube' => 'https://www.youtube.com/channel/UCA-t7dKXcI8s-KciGOC9byA',
            'url_youtube' => '<iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/-ZgalcNS1iI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>',
        ]);

        Section4::create([
            'diskripsi' => '<h2 class="section-title bg-white text-start text-primary pe-3">TES SECTION 4</h2>
            <h1 class="mb-4 fw-bold">Kelas Testing bersama Kearsipan Nasional RI</h1>
            <p>Berbagai macam kegiatan pelatihan daring yang kami disediakan oleh Arsip Nasional RI</p>
            <h2 class="mb-4 fw-bold">Mengapa harus Kami ?</h2>
            <ol>
            <li>Diklat Kearsipan diikuti ribuan arsiparis dan SDM Kearsipan seluruh Indonesia</li>
            <li>Pusdiklat Kearsipan menjadi Lembaga Pelatihan Pemerintah Terakreditasi Tahun 2021-2023</li>
            <li>Fasilitator dan Pengajar di Pusdiklat Kearsipan telah mengikuti Training of Trainer (TOT) Kearsipan</li>
            </ol>
            <p>&nbsp;</p>',
            'tautan' => 'anri.go.id',
            'image' => 'img/D1aNJJLyS1nxKnSpjih4285egrF0dZGvtb35RQvM.jpg'
        ]);

        DB::table('link')->insert([
            'nama' => 'Diorama ANRI',
            'url' => 'https://diorama.anri.go.id/',
        ]);

        DB::table('link')->insert([
            'nama' => 'Website ANRI',
            'url' => 'https://anri.go.id/',
        ]);

        DB::table('link')->insert([
            'nama' => 'Jurnal Kearsipan ANRI',
            'url' => 'https://jurnalkearsipan.anri.go.id/index.php/ojs',
        ]);

        ProfilInstansi::create([
            'deskripsi' => 'Sejarah'
        ]);

        ProfilInstansi::create([
            'deskripsi' => 'Visi dan Misi'
        ]);

        ProfilInstansi::create([
            'deskripsi' => 'Tugas dan Fungsi'
        ]);

        ProfilInstansi::create([
            'deskripsi' => 'Struktur Organiasi'
        ]);

        ProfilInstansi::create([
            'deskripsi' => 'Sumber Daya Manusia'
        ]);

        ProfilInstansi::create([
            'deskripsi' => 'Maklumat Layanan'
        ]);

        Category::create([
            'category' => 'Berita'
        ]);

        Category::create([
            'category' => 'Infografis'
        ]);

        Category::create([
            'category' => 'Artikel'
        ]);

        Category::create([
            'category' => 'Pengumuman'
        ]);
    }
}
