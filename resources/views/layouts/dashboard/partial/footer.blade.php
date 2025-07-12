

<div class="footer">
    <div class="copyright">
        {{-- <p>Copyright © Designed &amp; PBL 2024 by <a href="https://dexignlab.com/" target="_blank">TRPL A</a> 2024</p> --}}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmLogout(event) {
    event.preventDefault();

    Swal.fire({
        title: 'Logout?',
        text: 'Anda yakin ingin keluar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Keluar!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit logout form
            let form = document.getElementById('logout-form');
            if (form) {
                form.submit();
            }
        }
    });
}
</script>


