// Tanggal kembali otomatis
function hitungTanggalKembali() {
    let tanggalBerangkat = $('#tgl_berangkat').val();
    let lama = parseInt($('#lama').val());

    if (tanggalBerangkat !== '' && !isNaN(lama)) {
        let tanggalKembali = new Date(tanggalBerangkat);
        tanggalKembali.setDate(tanggalKembali.getDate() + lama - 1);

        let formattedTanggalKembali = tanggalKembali.toISOString().slice(0, 10);
        $('#tgl_kembali').val(formattedTanggalKembali);
    } else {
        $('#tgl_kembali').val('');
    }
}

$('#lama').on('change', hitungTanggalKembali);
$('#tgl_berangkat').on('change', hitungTanggalKembali);

// Tujuan yang menyesuaikan jenis perdin
$('#jenis_perdin_id').on('change', function() {
    let jenisPerdinId = $('#jenis_perdin_id').val();

    $('#tujuan_id').empty();
    $('#tujuan_id').append('<option value="">Pilih Tujuan</option>');

    $('#tujuan_lain_id').empty();
    $('#tujuan_lain_id').append('<option value="">Pilih Tujuan Lain</option>');

    $('#kabupaten_id').empty();
    $('#kabupaten_id').append('<option value="">Pilih Tujuan</option>');

    $('#kabupaten_lain_id').empty();
    $('#kabupaten_lain_id').append('<option value="">Pilih Tujuan</option>');

    $.ajax({
        url: '/get-tujuan/' + jenisPerdinId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $.each(data, function(key, value) {
                $('#tujuan_id').append('<option value="' + value.id + '">' + value.nama + '</option>');
                $('#tujuan_lain_id').append('<option value="' + value.id + '">' + value.nama + '</option>');
            });
        }
    });
});

// Kabupaten yang menyesuaikan wilayah
$('#tujuan_id').on('change', function() {
    let tujuanId = $('#tujuan_id').val();

    $('#kabupaten_id').empty();
    $('#kabupaten_id').append('<option value="">Pilih Tujuan</option>');

    $.ajax({
        url: '/get-kabupaten/' + tujuanId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $.each(data, function(key, value) {
                $('#kabupaten_id').append('<option value="' + value.id + '">' + value.nama + '</option>');
            });
        }
    });
});

// Kabupaten yang menyesuaikan wilayah
$('#tujuan_lain_id').on('change', function() {
    let tujuanId = $('#tujuan_lain_id').val();

    $('#kabupaten_lain_id').empty();
    $('#kabupaten_lain_id').append('<option value="">Pilih Tujuan</option>');

    $.ajax({
        url: '/get-kabupaten/' + tujuanId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            $.each(data, function(key, value) {
                $('#kabupaten_lain_id').append('<option value="' + value.id + '">' + value.nama + '</option>');
            });
        }
    });
});

// Pilih pegawai
let selectedPegawai = [];

function addPegawaiDiperintah() {
    let pegawaiDiperintahSelect = $('#pegawai_diperintah_id');
    let selectedOption = pegawaiDiperintahSelect.find(':selected');
    let pegawaiId = selectedOption.val();
    let pegawaiNama = selectedOption.text();
    let tujuanId = $('#tujuan_id').val();

    selectedPegawai = selectedPegawai.filter(pegawai => pegawai.keterangan !== 'Pegawai yang ditugaskan');

    if (tujuanId && pegawaiId) {
        if (!selectedPegawai.find(pegawai => pegawai.id === pegawaiId)) {
            getPegawaiInfo(tujuanId, pegawaiId, function(dataPegawai) {
                selectedPegawai.push({
                    id: pegawaiId,
                    nama: pegawaiNama,
                    nip: dataPegawai.nip,
                    jabatan: dataPegawai.jabatan,
                    uang_harian: dataPegawai.uang_harian,
                    keterangan: 'Pegawai yang ditugaskan'
                });
                updatePegawaiList();
                updateSelectedPegawaiInput();
            });
        }
    }
}

function addPegawaiMengikuti() {
    let pegawaiSelect = $('#pegawai_mengikuti_id');
    let selectedOption = pegawaiSelect.find(':selected');
    let pegawaiId = selectedOption.val();
    let pegawaiNama = selectedOption.text();
    let tujuanId = $('#tujuan_id').val();

    if (tujuanId && pegawaiId) {
        if (!selectedPegawai.find(pegawai => pegawai.id === pegawaiId)) {
            getPegawaiInfo(tujuanId, pegawaiId, function(dataPegawai) {
                selectedPegawai.push({
                    id: pegawaiId,
                    nama: pegawaiNama,
                    nip: dataPegawai.nip,
                    jabatan: dataPegawai.jabatan,
                    uang_harian: dataPegawai.uang_harian,
                    keterangan: 'Pegawai sebagai pengikut'
                });
                updatePegawaiList();
                updateSelectedPegawaiInput();

                pegawaiSelect.val(null).trigger('change');
            });
        } else {
            pegawaiSelect.val(null).trigger('change');
        }
    }
}

function getPegawaiInfo(tujuanId, pegawaiId, callback) {
    $.ajax({
        url: `/get-pegawai-info/${tujuanId}/${pegawaiId}`,
        success: function(data) {
            callback(data.data_pegawai);
        },
    });
}

function removePegawaiFromSelected(pegawaiId) {
    selectedPegawai = selectedPegawai.filter(pegawai => pegawai.id != pegawaiId);
    updatePegawaiList();
    updateSelectedPegawaiInput();
}

function updateSelectedPegawaiInput() {
    let selectedPegawaiInput = $('#selected_pegawais');
    selectedPegawaiInput.val(selectedPegawai.map(pegawai => pegawai.id).join(','));
}

function updatePegawaiList() {
    let pegawaiList = $('#pegawai-list');
    pegawaiList.empty();

    selectedPegawai.forEach((pegawai, index) => {
        let row = `
        <tr>
        <td>${index + 1}</td>
        <td>${pegawai.nama}</td>
        <td>${pegawai.nip}</td>
        <td>${pegawai.jabatan}</td>
        <td>${formatToRupiah(pegawai.uang_harian)}</td>
        <td>${pegawai.keterangan}</td>
        <td>
        <button type="button" class="btn btn-danger btn-sm btn-hapus-pegawai" onclick="removePegawaiFromSelected('${pegawai.id}')">Hapus</button>
        </td>
        </tr>
        `;
        pegawaiList.append(row);
    });

    calculateTotal();
}

$(document).ready(function() {
    selectedPegawai = [...selected_pegawai];

    if (selectedPegawai) {
        $('#pegawai_diperintah_id').prop('disabled', false);
        $('#pegawai_mengikuti_id').prop('disabled', false);

        updatePegawaiList();
        updateSelectedPegawaiInput();
    }
});


$('#pegawai_diperintah_id').on('change', addPegawaiDiperintah);
$('#pegawai_mengikuti_id').on('change', addPegawaiMengikuti);

function resetSelectedEmployees() {
    $('#pegawai_diperintah_id').val('');
    $('#pegawai_mengikuti_id').val('');
    selectedPegawai = [];
    updatePegawaiList();
    updateSelectedPegawaiInput();
}

$('#jenis_perdin_id').on('change', function() {
    resetSelectedEmployees();
});
$('#tujuan_id').on('change', function() {
    resetSelectedEmployees();

    if ($('#tujuan_id').val() !== '') {
        $('#pegawai_diperintah_id').prop('disabled', false);
        $('#pegawai_mengikuti_id').prop('disabled', false);
    } else {
        $('#pegawai_diperintah_id').prop('disabled', true);
        $('#pegawai_mengikuti_id').prop('disabled', true);
    }
});

function formatToRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR'
    }).format(angka);
}

function calculateTotal() {
    let totalUangHarian = 0;

    selectedPegawai.forEach(pegawai => {
        totalUangHarian += pegawai.uang_harian;
    });

    let tfootRow = `
    <tr>
    <th colspan="4">Total:</th>
    <td colspan="4">${formatToRupiah(totalUangHarian)}</td>
    </tr>
    `;

    $('#pegawai-total').html(tfootRow);
}