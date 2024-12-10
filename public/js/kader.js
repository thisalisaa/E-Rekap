document.addEventListener('DOMContentLoaded', function() {
    const provinsiSelect = document.getElementById('provinsi_id');
    const kabupatenSelect = document.getElementById('kabupaten_id');
    const kecamatanSelect = document.getElementById('kecamatan_id');
    const kelurahanSelect = document.getElementById('kelurahan_id');

    // Ambil data dari elemen script
    const kabupatenData = JSON.parse(document.getElementById('kabupaten-data').textContent);
    const kecamatanData = JSON.parse(document.getElementById('kecamatan-data').textContent);
    const kelurahanData = JSON.parse(document.getElementById('kelurahan-data').textContent);

    // Menghapus opsi yang ada
    function clearOptions(selectElement) {
        selectElement.innerHTML = '<option value="">Pilih</option>';
    }

    provinsiSelect.addEventListener('change', function() {
        const provinsiId = this.value;
        if (provinsiId) {
            const filteredKabupatens = kabupatenData.filter(kabupaten => kabupaten.provinsi_id === parseInt(provinsiId));
            clearOptions(kabupatenSelect);
            filteredKabupatens.forEach(kabupaten => {
                kabupatenSelect.innerHTML += `<option value="${kabupaten.id}">${kabupaten.nama}</option>`;
            });
            clearOptions(kecamatanSelect);
            clearOptions(kelurahanSelect);
        } else {
            clearOptions(kabupatenSelect);
            clearOptions(kecamatanSelect);
            clearOptions(kelurahanSelect);
        }
    });

    kabupatenSelect.addEventListener('change', function() {
        const kabupatenId = this.value;
        if (kabupatenId) {
            const filteredKecamatans = kecamatanData.filter(kecamatan => kecamatan.kabupaten_id === parseInt(kabupatenId));
            clearOptions(kecamatanSelect);
            filteredKecamatans.forEach(kecamatan => {
                kecamatanSelect.innerHTML += `<option value="${kecamatan.id}">${kecamatan.nama}</option>`;
            });
            clearOptions(kelurahanSelect);
        } else {
            clearOptions(kecamatanSelect);
            clearOptions(kelurahanSelect);
        }
    });

    kecamatanSelect.addEventListener('change', function() {
        const kecamatanId = this.value;
        if (kecamatanId) {
            const filteredKelurahans = kelurahanData.filter(kelurahan => kelurahan.kecamatan_id === parseInt(kecamatanId));
            clearOptions(kelurahanSelect);
            filteredKelurahans.forEach(kelurahan => {
                kelurahanSelect.innerHTML += `<option value="${kelurahan.id}">${kelurahan.nama}</option>`;
            });
        } else {
            clearOptions(kelurahanSelect);
        }
    });
});
