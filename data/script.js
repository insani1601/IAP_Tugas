// Fungsi untuk menampilkan semua menu
function tampilkanSemuaMenu() {
    console.log('Memanggil tampilkanSemuaMenu()');

    $.getJSON('data/pizza.json', function (data) {
        let menu = data.menu;
        let content = '';

        $.each(menu, function (i, data) {
            content += '<div class="col-md-4">' +
                '<div class="card mb-3">' +
                    '<img src="img/menu/' + data.gambar + '" class="card-img-top">' +
                    '<div class="card-body">' +
                        '<h5 class="card-title">' + data.nama + '</h5>' +
                        '<p class="card-text">' + data.deskripsi + '</p>' +
                        '<h5 class="card-title">Rp. ' + data.harga + '</h5>' +
                        '<a href="#" class="btn btn-primary">Pesan Sekarang</a>' +
                    '</div>' +
                '</div>' +
            '</div>';
        });


        $('#daftar-menu').html(content);
    });
}

// Tampilkan semua menu saat halaman pertama dibuka
tampilkanSemuaMenu();

// Event klik kategori menu
$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active');
    $(this).addClass('active');

    let kategori = $(this).text().trim().toLowerCase();
    $('h1').html(kategori.charAt(0).toUpperCase() + kategori.slice(1));

    if (kategori === 'all menu') {
        tampilkanSemuaMenu();
        return;
    }

    // Ambil data json berdasarkan kategori
    $.getJSON('data/pizza.json', function (data) {
        let menu = data.menu;
        let content = '';

        $.each(menu, function (i, data) {
            if (data.kategori === kategori) {
                content += '<div class="col-md-4">' +
                    '<div class="card mb-3">' +
                        '<img src="img/menu/' + data.gambar + '" class="card-img-top">' +
                        '<div class="card-body">' +
                            '<h5 class="card-title">' + data.nama + '</h5>' +
                            '<p class="card-text">' + data.deskripsi + '</p>' +
                            '<h5 class="card-title">Rp. ' + data.harga + '</h5>' +
                            '<a href="#" class="btn btn-primary">Pesan Sekarang</a>' +
                        '</div>' +
                    '</div>' +
                '</div>';
            }
        });

        $('#daftar-menu').html(content);
    });
});