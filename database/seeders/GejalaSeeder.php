<?php

namespace Database\Seeders;

use App\Models\Gejala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gejalas = collect([
            ['kode' => 'G001', 'nama' => 'Pertumbuhan tinggi badan lambat, tidak sesuai kurva pertumbuhan WHO'],
            ['kode' => 'G002', 'nama' => 'Postur pendek permanen (tinggi badan jauh di bawah standar usia)'],
            ['kode' => 'G003', 'nama' => 'Lingkar kepala bisa lebih kecil dari normal (Mikrosefali), menunjukkan gangguan perkembangan otak'],
            ['kode' => 'G004', 'nama' => 'Wajah tampak lebih tua dari usia sebenarnya (Older Look)'],
            ['kode' => 'G005', 'nama' => 'Perut tampak buncit (terkadang mengindikasikan Kwashiorkor atau malnutrisi protein parah)'],
            ['kode' => 'G006', 'nama' => 'Wajah keriput atau sangat kurus (terkait Marasmus, sering tumpang tindih dengan stunting parah)'],
            ['kode' => 'G007', 'nama' => 'IQ cenderung lebih rendah dari rata-rata anak seusia'],
            ['kode' => 'G008', 'nama' => 'Sulit berkonsentrasi atau rentang perhatian pendek'],
            ['kode' => 'G009', 'nama' => 'Prestasi belajar rendah saat usia sekolah'],
            ['kode' => 'G010', 'nama' => 'Keterlambatan berbicara (verbal)'],
            ['kode' => 'G011', 'nama' => 'Perkembangan motorik kasar dan halus tidak sesuai dengan rata-rata anak seusianya'],
            ['kode' => 'G012', 'nama' => 'Terlambat memegang benda, merespons suara, atau mengikuti gerakan (indikator perkembangan awal)'],
            ['kode' => 'G013', 'nama' => 'Daya tahan tubuh lemah'],
            ['kode' => 'G014', 'nama' => 'Sering terkena infeksi berulang (misalnya, batuk, pilek, ISPA, diare)'],
            ['kode' => 'G015', 'nama' => 'Luka sulit sembuh atau penyembuhan lambat'],
            ['kode' => 'G016', 'nama' => 'Kulit kering, kusam, atau perubahan warna kulit'],
            ['kode' => 'G017', 'nama' => 'Rambut mudah rontok, tampak kusam, atau berubah warna (tanda defisiensi protein)'],
            ['kode' => 'G018', 'nama' => 'Mudah mengantuk atau sering lemas dan tidak aktif bermain'],
            ['kode' => 'G019', 'nama' => 'Anemia (komplikasi umum dari kekurangan gizi kronis)'],
            ['kode' => 'G020', 'nama' => 'Anak sulit makan atau tidak nafsu makan (anoreksia)'],
            ['kode' => 'G021', 'nama' => 'Hanya mau makan jenis makanan tertentu (picky eater), membatasi asupan nutrisi'],
            ['kode' => 'G022', 'nama' => 'Riwayat lahir dengan Berat Badan Lahir Rendah (BBLR)'],
            ['kode' => 'G023', 'nama' => 'Riwayat Intrauterine Growth Restriction (IUGR) saat kehamilan'],
            ['kode' => 'G024', 'nama' => 'Ibu hamil mengalami Kurang Energi Kronis (KEK) atau Anemia'],
            ['kode' => 'G025', 'nama' => 'Jarak kelahiran anak terlalu dekat (kurang dari 2 tahun)'],
            ['kode' => 'G026', 'nama' => 'Kurangnya kunjungan pemeriksaan kehamilan (ANC) yang memadai'],
            ['kode' => 'G027', 'nama' => 'Kurangnya pemberian ASI Eksklusif (0-6 bulan)'],
            ['kode' => 'G028', 'nama' => 'Pemberian Makanan Pendamping ASI (MPASI) yang terlalu dini atau terlalu lambat'],
            ['kode' => 'G029', 'nama' => 'Kualitas gizi MPASI yang tidak memadai (rendah protein dan mikronutrien)'],
            ['kode' => 'G030', 'nama' => 'Asupan yodium yang kurang'],
            ['kode' => 'G031', 'nama' => 'Pola asuh gizi yang buruk (Ibu kurang pemahaman dan kesadaran gizi)'],
            ['kode' => 'G032', 'nama' => 'Anak sering terpapar atau mengonsumsi makanan cepat saji tinggi gula/garam'],
            ['kode' => 'G033', 'nama' => 'Kemiskinan atau ketidakmampuan keluarga menyediakan makanan bergizi'],
            ['kode' => 'G034', 'nama' => 'Tinggal di lingkungan dengan sanitasi yang buruk/tidak layak'],
            ['kode' => 'G035', 'nama' => 'Tidak mendapatkan akses untuk air bersih yang terjamin'],
            ['kode' => 'G036', 'nama' => 'Praktik Buang Air Besar Sembarangan (BABS)'],
            ['kode' => 'G037', 'nama' => 'Anak sering bermain di tanah pertanian atau terpapar pestisida'],
            ['kode' => 'G038', 'nama' => 'Paparan asap rokok atau polusi udara di rumah'],
            ['kode' => 'G039', 'nama' => 'Kepadatan hunian yang tinggi atau ventilasi rumah yang buruk'],
            ['kode' => 'G040', 'nama' => 'Kurangnya praktik kebersihan diri (misalnya, tidak mencuci tangan sebelum makan)'],
            ['kode' => 'G041', 'nama' => 'Adanya kasus penyakit infeksi menular (misalnya, TBC) di lingkungan rumah'],
            ['kode' => 'G042', 'nama' => 'Anak tidak mendapatkan imunisasi/vaksinasi yang lengkap'],
            ['kode' => 'G043', 'nama' => 'Anak pernah menderita penyakit infeksi berat atau kronis (misalnya TBC atau cacingan)'],
            ['kode' => 'G044', 'nama' => 'Anak mengalami Malabsorbsi Makanan (gangguan penyerapan nutrisi)'],
            ['kode' => 'G045', 'nama' => 'Mengalami EED (Environmental Enteric Dysfunction) akibat infeksi kronis usus'],
            ['kode' => 'G046', 'nama' => 'Riwayat penyakit bawaan atau kelainan genetik yang memengaruhi pertumbuhan'],
        ]);

        $gejalas->each(function($gejala){
            Gejala::create($gejala);
        });
    }
}
