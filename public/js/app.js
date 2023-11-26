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


const editRole = (user) => {
    user = JSON.parse(user);
    
    let html = `<form method="get" action="/admin/users/role/edit"><input hidden name="id" value="${user.id}"/><select class="form-select" id="role" name="role"><option value="customer" ${ user.role == 'customer'? "selected" : "" }>Customer</option><option value="seller" ${ user.role == 'seller'? "selected" : "" }>Seller</option><option value="admin" ${ user.role == 'admin'? "selected" : "" }>Admin</option></select><br><button class="btn btn-dark">Edit</button></form>`;

    try {
        return Swal.fire({
            icon: 'warning',
            title: 'Edit Role',
            html: html,
            showConfirmButton: false,
        });
    } catch (error) {
        return alert('Error while editing role');
    }
}
