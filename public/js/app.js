//import './bootstrap.js'

const deleteConfirm = () => {
    try {
        return Swal.fire({
            icon: 'warning',
            title: 'Are you sure?',
            text: 'Are you sure you want to delete this?',
            confirmButtonText: 'OK',
            showCancelButton: true,
        });
    } catch (error) {
        return confirm('Are you sure you want to delete this?');
    }
}
