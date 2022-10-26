$('#master-user').on('click', '.edit-user-modal', function (event) {
    // Data Variables
    const button = $(event);
    const id = button.data("id");
    const name = button.data("name");
    const email = button.data("email");
    const password = button.data("password");
    const role = button.data("role");
    const regional = button.data("regional");
    const warehouseId = button.data("warehouseid");
    const warehouse = button.data("warehouse");
    const nik = button.data("nik");
    const telepon = button.data("notelp");

    // Print HTML
    $('#input-user-id').val(id);
    $('#input-user-name').val(name);
    $('#input-user-email').val(email);
    $('#input-user-role').val(role);
    $('#input-user-regional').val(regional);
    $('#input-user-warehouse-id').val(warehouseId);
    $('#input-user-nik').val(nik);
    $('#input-user-telepon').val(telepon);
    
});