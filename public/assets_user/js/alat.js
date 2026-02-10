document.addEventListener('DOMContentLoaded', function () {

    const btn = document.getElementById('kategoriButton');
    const menu = document.getElementById('kategoriMenu');
    const icon = document.getElementById('kategoriIcon');
    const kategoriText = document.getElementById('kategoriText');
    const items = document.querySelectorAll('.kategori-item');
    const container = document.getElementById('alatContainer');

    // Toggle dropdown
    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        icon.classList.toggle('rotate-180');
    });

    // Klik item dropdown
    items.forEach(item => {
        item.addEventListener('click', e => {
            e.preventDefault();
            const kategori = item.textContent;
            kategoriText.textContent = kategori;
            menu.classList.add('hidden');
            icon.classList.remove('rotate-180');

            // Fetch alat sesuai kategori
            fetch(`/alat/filter?kategori=${kategori}`)
                .then(res => res.text())
                .then(html => {
                    container.innerHTML = html;
                })
                .catch(err => console.error(err));
        });
    });

    // Klik luar dropdown → tutup
    document.addEventListener('click', e => {
        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
            icon.classList.remove('rotate-180');
        }
    });

});