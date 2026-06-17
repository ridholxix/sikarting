@csrf

<div class="container">

    {{-- 🔹 Judul --}}
    <h3 class="mb-3">Diagnosa</h3>
    <hr>

    @error('user_gejala')
        <div class="alert alert-warning alert-dismissible fade show">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @enderror

    {{-- 🔍 Search + Actions --}}
    <div class="d-flex justify-content-between mb-3">

        <input type="text" id="searchGejala" class="form-control w-50" placeholder="Cari gejala...">

        <div>
            <div>
                <button type="button" id="btnSelectAll" class="btn btn-sm btn-outline-primary me-2" onclick="selectAll()">
                    Select All
                </button>

                <button type="button" id="btnClear" class="btn btn-sm btn-outline-secondary me-2 d-none" onclick="clearAll()">
                    Clear
                </button>

                <span class="badge bg-primary">
                    Dipilih: <span id="count">0</span>
                </span>
            </div>
        </div>

    </div>

    {{-- 📦 LIST GEJALA --}}
    <div class="border rounded" style="max-height: 400px; overflow-y: auto;">

        @forelse ($gejalas as $index => $gejala)
            <div class="gejala-row gejala-item d-flex align-items-center px-3 py-2
                        {{ $index % 2 == 0 ? 'bg-light' : 'bg-white' }}">

                {{-- hidden checkbox --}}
                <input
                    type="checkbox"
                    name="user_gejala[]"
                    value="{{ $gejala->id }}"
                    class="d-none gejala-checkbox"
                >

                {{-- nomor --}}
                <div style="width: 40px;">
                    {{ $index + 1 }}
                </div>

                {{-- kode --}}
                <div style="width: 100px;" class="fw-bold text-primary">
                    {{ $gejala->kode }}
                </div>

                {{-- nama --}}
                <div>
                    {{ $gejala->nama }}
                </div>

            </div>
        @empty
            <div class="p-3 text-muted">Belum ada data...</div>
        @endforelse

    </div>

    {{-- 🚀 submit --}}
    <div class="text-end mt-4">
        <button class="btn btn-primary px-4">
            Proses Diagnosa
        </button>
    </div>

</div>

{{-- ✅ STYLE --}}
<style>
    .gejala-row {
        cursor: pointer;
        transition: all 0.15s ease;
    }

    .gejala-row:hover {
        background-color: #e2e6ea;
    }

    .gejala-row.active {
        background-color: #cfe2ff !important;
        border-left: 4px solid #0d6efd;
    }
</style>

{{-- ✅ SCRIPT --}}
<script>
    const rows = document.querySelectorAll(".gejala-row");
    const counter = document.getElementById("count");
    const search = document.getElementById("searchGejala");

    const btnSelectAll = document.getElementById("btnSelectAll");
    const btnClear = document.getElementById("btnClear");

    // ✅ klik row
    rows.forEach(row => {
        row.addEventListener("click", function () {
            let checkbox = this.querySelector(".gejala-checkbox");

            checkbox.checked = !checkbox.checked;
            this.classList.toggle("active", checkbox.checked);

            updateUI();
        });
    });

    // ✅ update semua UI
    function updateUI() {
        let totalChecked = document.querySelectorAll(".gejala-checkbox:checked").length;
        let totalAll = rows.length;

        // update counter
        counter.innerText = totalChecked;

        // ✅ tampilkan clear kalau ada pilihan
        if (totalChecked > 0) {
            btnClear.classList.remove("d-none");
        } else {
            btnClear.classList.add("d-none");
        }

        // ✅ sembunyikan select all kalau semua dipilih
        if (totalChecked === totalAll) {
            btnSelectAll.classList.add("d-none");
        } else {
            btnSelectAll.classList.remove("d-none");
        }
    }

    // ✅ select all
    function selectAll() {
        rows.forEach(row => {
            let checkbox = row.querySelector(".gejala-checkbox");
            checkbox.checked = true;
            row.classList.add("active");
        });

        updateUI();
    }

    // ✅ clear all
    function clearAll() {
        rows.forEach(row => {
            let checkbox = row.querySelector(".gejala-checkbox");
            checkbox.checked = false;
            row.classList.remove("active");
        });

        updateUI();
    }

    // ✅ search tetap
    search.addEventListener("keyup", function () {
        let keyword = this.value.toLowerCase();

        document.querySelectorAll(".gejala-item").forEach(item => {
            let text = item.innerText.toLowerCase();
            const isMatch = text.includes(keyword);
            item.classList.toggle('d-flex', isMatch);
            item.classList.toggle('d-none', !isMatch);
        });
    });

</script>
