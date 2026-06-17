<footer id="main-footer" class="bg-body-secondary py-5">
    <div class="container row mx-auto">

        {{-- ✅ Tentang Sistem --}}
        <div class="col-md-7">
            <h5 class="fw-bold">SIKARTING</h5>
            <p class="text-secondary mb-2">
                Sistem Pakar Deteksi Dini Stunting berbasis web yang membantu
                mengidentifikasi kemungkinan stunting pada anak menggunakan
                metode <strong>Naïve Bayes</strong> dan <strong>Dempster-Shafer</strong>.
            </p>

            <small class="text-secondary">
                Sistem ini dirancang untuk membantu proses skrining awal sehingga
                dapat mendukung pengambilan keputusan lebih cepat dan tepat.
            </small>
        </div>

        {{-- ✅ Navigasi + Kontak --}}
        <div class="col-md-5">

            <div>
                <h6 class="fw-bold">Kontak</h6>

                <div class="mb-2 text-secondary">
                    <i class="bi bi-house-door-fill"></i>
                    <span class="ms-2">Jl. Bilal Ujung Gg. Dwikunti</span>
                </div>

                <div class="mb-2 text-secondary">
                    <i class="bi bi-envelope-fill"></i>
                    <span class="ms-2">
                        <a href="mailto:ridhoandirawibowo.2002@gmail.com" class="text-decoration-none text-body-secondary">
                            ridhoandirawibowo.2002@gmail.com
                        </a>
                    </span>
                </div>

                <div class="text-secondary">
                    <i class="bi bi-telephone-fill"></i>
                    <span class="ms-2">(+62) 821-8510-0480</span>
                </div>
            </div>

        </div>

    </div>

    {{-- ✅ Footer bawah --}}
    <div class="text-center mt-4">
        <small class="text-secondary">
            © {{ date('Y') }} SIKARTING - Sistem Pakar Deteksi Dini Stunting
        </small>
    </div>
</footer>
