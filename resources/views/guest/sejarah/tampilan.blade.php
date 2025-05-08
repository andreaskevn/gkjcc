@extends('layouts.guest')

@section('content')
    <section class="relative bg-cover bg-center h-96 text-white flex items-center justify-center"
        style="background-image: url('{{ asset('images/header.png') }}')">
        <div class="absolute inset-0" style="background-color: rgba(13, 13, 13, 0.5);"></div>
        <div class="relative text-center z-10">
            <h1 class="text-6xl font-bold">Sejarah</h1>
        </div>
    </section>

    <section class="py-12 px-4 md:px-16 bg-white">
        <p class="max-w-5xl mx-auto mb-8 leading-relaxed text-justify text-gray-800">
            Sejarah GKJ Condongcatur berawal dari berdirinya <strong>Pepanthan Karangasem GKJ Ambarrukma</strong>. Warga
            jemaat <i>pepanthan</i>
            yang semula berjumlah 9 keluarga—terdiri dari 12 warga dewasa dan 16 warga anak—terus berkembang. Karena itu,
            <strong>Majelis GKJ Ambarrukma</strong> pun memutuskan untuk membeli tanah milik <strong>keluarga
                Djojosumarto</strong> di Dusun Karangasem guna
            membangun tempat ibadah bagi warga pepanthan. Pembangunan tempat ibadah tersebut dimulai pada tahun 1969 dan
            mulai digunakan untuk kali pertama pada <strong>Ibadah Minggu, 11 April 1971</strong>.
        </p>
        <div class="max-w-5xl mx-auto space-y-4">
            @php
                $sejarah = [
                    'Tahun 1976 - 1980' => [
                        'text' => 'Pada tahun 1976, Perumnas Condongcatur yang terletak di sebelah selatan Dusun Karangasem mulai dibangun. Dua tahun kemudian, yakni pada tahun 1978, Perumnas Condongcatur selesai dibangun dan mulai dihuni. Di antara warga perumnas ternyata terdapat tidak kurang <b>52 keluarga Kristen</b> yang dari beragam denominasi gereja. Termasuk di antaranya adalah keluarga <b>Pdt. Em. Probowiyono</b>.<br>
                        <br>
                        Berkat pelayanan <b>Pdt. Em. Probowiyono</b>, tidak sedikit di antara keluarga-keluarga Kristen tersebut yang kemudian bergabung dan beribadah di Pepanthan Karangasem. Dampaknya, Ibadah Minggu di Pepanthan Karangasem yang semula dilaksanakan satu kali harus dilaksanakan dua kali, yakni pukul 06.30 dan 08.30.<br>
                        <br> 
                        Tiada dinyana, pihak Perum Perumnas ternyata menyediakan lahan bagi tempat ibadah, termasuk juga gereja, di lingkungan Perumnas Condongcatur. Tepatnya di Jalan Wijayakusuma. Menyikapi perkembangan ini, Majelis GKJ Ambarrukma segera membentuk <b>Panitia Pembangunan Gereja</b>, yang mulai melaksanakan pembangunan pada tanggal <b>30 Maret 1981</b>.',
                        'images' => [
                            [
                                'src' => 'images/sejarah/pepanthankarangasem.jpg',
                                'caption' =>
                                    'Gedung Pepanthan Karangasem sebelum difungsikan sebagai SMPK/SMAK Condongcatur',
                            ],
                            [
                                'src' => 'images/sejarah/pdtprobowiyono.jpg',
                                'caption' => 'Pdt. Em. Probowiyono, tokoh penting dalam awal pelayanan',
                            ],
                        ],
                    ],
                    'Tahun 1980 - 1990' => [
                        'text' => 'Selanjutnya, dalam sebuah rapat yang diselenggarakan pada tanggal 18 Juni 1981, Majelis Pepanthan Karangasem memutuskan untuk <b>memindahkan tempat ibadah dari Dusun Karangasem ke Condongcatur</b>. Perpindahan ini ditandai dengan penyelenggaraan <b>ibadah perdana di tempat ibadah Condongcatur pada 5 Juli 1981</b>. Sejak saat itulah nama <b>Pepanthan Karangasem berubah menjadi Pepanthan Condongcatur</b>.<br>
                        <br>
                        Tiga tahun kemudian, yakni pada 5 Juli 1984, Pepanthan Condongcatur didewasakan menjadi GKJ Condongcatur. Ketika itu jumlah warga jemaat GKJ Condongcatur adalah 348 jiwa, yang terdiri dari 85 kepala keluarga, 181 warga dewasa, dan 167 warga anak.<br>
                        <br> 
                        Di antara warga jemaat GKJ Condongcatur memang terdapat tiga orang yang berjabatan gerejawi sebagai pendeta, yakni <b>Pdt. Em. Probowiyono, Pdt. Harsoyo, dan Pdt. Djaka Soetapa</b>. Kendati demikian, Pdt. Purwanto Rahmat, selaku pendeta konsulen menganjurkan bahwa seyogianya GKJ Condongcatur memiliki pendeta jemaat sendiri.<br>
                        <br>
                        Mencermati anjuran tersebut, Majelis GKJ Condongcatur pun segera melaksanakan pemanggilan pendeta. Salah satu bakal calon pendeta yang dipanggil ketika itu adalah Sdr. Djunarso Kartika Hadi, yang pada akhirnya terpilih menjadi calon pendeta melalui pemilihan yang dilaksanakan pada Ibadah Minggu, 15 November 1987. Setelah melalui serangkaian tahapan pembimbingan dan masa vikariat, bertepatan dengan hari ulang tahun kelima GKJ Condongcatur, yakni pada 5 Juli 1989, <b>Sdr. Djunarso Kartika</b> Hadi ditahbiskan sebagai pendeta jemaat pertama GKJ Condongcatur.<br>
                        <br>
                        Seiring dengan munculnya beberapa perumahan baru—seperti Perumnas Minomartani, Perumahan Jambusari Indah, serta Perumahan Candi Gebang Permai—jumlah warga jemaat GKJ Condongcatur pun terus bertambah. Perkembangan jumlah warga jemaat ini melatarbelakangi didirikannya Pepanthan Minomartani GKJ Condongcatur pada 22 Mei 1988, yang kemudian didewasakan menjadi GKJ Minomartani pada 28 Juli 2002.',
                        'images' => [
                            [
                                'src' => 'images/sejarah/pembangunangereja.jpg',
                                'caption' =>
                                    'Masa Pembangunan Gereja GKJ Condongcatur',
                            ],
                            [
                                'src' => 'images/sejarah/penahbisanpdtdjunarso.jpg',
                                'caption' => 'Penahbisan Pdt. Djunarso pada 5 Juli 1989',
                            ],
                            [
                                'src' => 'images/sejarah/pdtpurwantorahmad.jpg',
                                'caption' => 'Pdt. Purwanto Rahmad ketika pertemuan dengan para majelis GKJ Condongcatur',
                            ],
                        ],
                    ],
                    'Era 2000-an' => [
                        'text' => 'Dalam rangka memfasilitasi pelayanan kepada warga jemaat yang terus berkembang baik secara kuantitas maupun kualitas, dilaksanakanlah renovasi kompleks gedung gereja GKJ Condongcatur. Renovasi tersebut selesai pada tahun 2015 dan GKJ Condongcatur pun telah memiliki kompleks gedung gereja yang semakin representatif—ruang ibadah yang semakin lapang dan gedung tiga lantai yang dilengkapi dengan ruang konsistori, kantor gereja, ruang-ruang serbaguna, juga rumah tinggal pekarya gereja.<br>
                        <br>
                        Sejatinya, sejak tahun 2000, Majelis GKJ Condongcatur telah merencanakan untuk memulai proses pemanggilan pendeta jemaat kedua pada tahun 2017, yakni lima tahun sebelum Pdt. Djunarso Kartika Hadi memasuki masa emeritus. Ternyata proses tersebut berlangsung lebih cepat. Pada tahun 2015, <b>Sdr. Risang Anggoro Elliarso</b> bersedia menjadi tenaga wiyata bakti sejak 01 Juni 2015. Selanjutnya, Sdr. Risang Anggoro Elliarso terpilih sebagai calon pendeta dalam pemilihan yang dilaksanakan pada Ibadah Minggu, 11 Desember 2016. Akhirnya, setelah melalui serangkaian tahapan pembimbingan dan masa vikariat, bertepatan dengan hari ulang tahun ke-34 GKJ Condongcatur, yakni pada 5 Juli 2018, Sdr. Risang Anggoro Elliarso pun ditahbiskan sebagai pendeta jemaat kedua GKJ Condongcatur.',
                        'images' => [
                            [
                                'src' => 'images/sejarah/ibadahemeritasi.jpg',
                                'caption' => 'Ibadah Emeritasi',
                            ],
                            [
                                'src' => 'images/sejarah/penahbisanpdtrisang.jpg',
                                'caption' =>
                                    'Penahbisan Pdt. Risang Anggoro Elliarso',
                            ],
                        ],
                    ],
                ];
            @endphp

            @foreach ($sejarah as $tahun => $data)
                <div x-data="{ open: false }" class="border rounded-lg shadow-md mb-6 overflow-hidden">
                    <button @click="open = !open"
                        class="w-full flex justify-between items-center p-4 bg-gray-50 hover:bg-gray-100 transition-colors rounded-t-lg focus:outline-none">
                        <span class="text-xl font-bold text-gray-800">{{ $tahun }}</span>
                        <svg :class="{ 'rotate-180': open }"
                            class="w-5 h-5 transform transition-transform duration-200 text-gray-700" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="bg-white transition-all duration-300">
                        <div class="p-6">
                            <div class="flex flex-col md:flex-row md:items-start gap-6">
                                <div class="order-1 md:order-2 md:w-2/3 text-gray-900 space-y-4">
                                    <p class="text-justify leading-relaxed">{!! $data['text'] !!}</p>
                                </div>

                                <div class="order-2 md:order-1 md:w-1/3 flex flex-col space-y-10">
                                    @foreach ($data['images'] as $img)
                                        <figure>
                                            <img src="{{ asset($img['src']) }}" alt="Sejarah {{ $tahun }}"
                                                class="w-full h-48 object-cover rounded-lg shadow-sm">
                                            <figcaption class="text-sm text-gray-600 italic mt-1">{{ $img['caption'] }}
                                            </figcaption>
                                        </figure>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </section>

    {{-- <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script> --}}
@endsection
