function diplayMessage(type, message){
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 5000,
        showLoading: true
    });
    if(type === 'warning') {
        Toast.fire({
            icon: 'warning',
            title: 'Sucesso!' ,
            text: 'teste'
        });
    }
    if(type === 'error') {
        Toast.fire({
            icon: 'error',
            title: message
        });
    }
    if(type === 'success') {
        Toast.fire({
            icon: 'success',
            title: "Sucesso",
            text: message,
        });

    }
    if(type === 'info') {
        Toast.fire({
            icon: 'info',
            title: message
        });
    }
}

function displayLoader() {

}
onPageReady();