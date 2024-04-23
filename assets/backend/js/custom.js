$(function(){
	$(".my-tables").DataTable();
});

function forUpdateUser(id,username,role,nama){
    $('#update-username').val(username);
    $('#update-id').val(id);
    $('#update-role').val(role);
    $('#update-nama').val(nama);
}

function forDeleteUser(id){
    $('#delete-id').val(id);
}

function forDeleteArtikel(id){
    $('#delete-id').val(id);
}
function forDeleteAgenda(id){
    $('#delete-id').val(id);
}

function forDeleteSlider(id){
    $('#delete-id').val(id);
}

function forUpdateSlider(id,judul,deskripsi){
    $('#update-id').val(id);
    $('#update-judul').val(judul);
    $('#update-deskripsi').val(deskripsi);
}

function forDeleteGaleri(id){
    $('#delete-id').val(id);
}

function forUpdateGaleri(id,judul){
    $('#update-id').val(id);
    $('#update-judul').val(judul);
}
