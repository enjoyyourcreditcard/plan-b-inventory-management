// ==================================  Modal Bagian Transaksi Requester ==================================
// modal new request
$('#btn-newReq').on('click', function (){
    const modalNewRequest = tailwind.Modal.getInstance(document.querySelector("#modal-new-request"));
    modalNewRequest.show();
});

$('#btn-cancel-newReq').on('click', function (){
    const closeModalReq = tailwind.Modal.getInstance(document.querySelector("#modal-new-request"));
    closeModalReq.hide();
});

$('#btn-change-warehouse').on('click', function (){
    const modal = tailwind.Modal.getInstance(document.querySelector("#modal-change-warehouse"));
    modal.show();
});

$('#btn-cancel-change-warehouse').on('click', function (){
    const modal = tailwind.Modal.getInstance(document.querySelector("#modal-change-warehouse"));
    modal.hide();
});

$('#btn-save-warehouse').on('click', function (){
    const modal = tailwind.Modal.getInstance(document.querySelector("#modal-change-warehouse-confirmation"));
    modal.show();
});

$('#btn-cancel-save-warehouse').on('click', function (){
    const modal = tailwind.Modal.getInstance(document.querySelector("#modal-change-warehouse-confirmation"));
    modal.hide();
});

$('#btn-submit-newReq').on('click', function (){
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#modal-request-submit-confirmation"));
    modalSubmitNewRequest.show();
});

$('#close-modal-approv').on('click', function (){
    const closeModalApprov = tailwind.Modal.getInstance(document.querySelector("#modal-request-submit-confirmation"));
    closeModalApprov.hide();
});

$('.btn-check').on('click', function (){
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#non-sn"));
    modalSubmitNewRequest.show();
});

$('.btn-upload-sn').on('click', function (){
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#upload"));
    modalSubmitNewRequest.show();
});

$('#btn-bulk').on('click', function (){
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#importExcel"));
    modalSubmitNewRequest.show();
});

$('#btn-cancel-bulk').on('click', function (){
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#importExcel"));
    modalSubmitNewRequest.hide();
});

$('#btn-pieces').on('click', function (){
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#inputSn"));
    modalSubmitNewRequest.show();
});

$('#btn-cancel-pieces').on('click', function () {
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#inputSn"));
    modalSubmitNewRequest.hide();
});

$('#btn-return').on('click', function () {
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#modal-return-confirmation"));
    modalSubmitNewRequest.show();
});

$('#btn-cancel-return').on('click', function () {
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#modal-return-confirmation"));
    modalSubmitNewRequest.hide();
});

$('.btn-return-upload-sn').on('click', function () {
    const modal = tailwind.Modal.getInstance(document.querySelector("#upload-return"));
    modal.show();
});

$('.btn-return-check').on('click', function () {
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#non-sn"));
    modalSubmitNewRequest.show();
});

$('#btn-return-pieces').on('click', function () {
    const modal = tailwind.Modal.getInstance(document.querySelector("#inputSnReturn"));
    modal.show();
});

$('#btn-return-bulk').on('click', function () {
    const modalSubmitNewRequest = tailwind.Modal.getInstance(document.querySelector("#importExcelReturn"));
    modalSubmitNewRequest.show();
});
// ==================================  End Modal Bagian Transaksi Requester ==================================

// ================================== Inbound PO ==================================
$('#btn-confirmation').on('click', function (){
    const modalConfirmation = tailwind.Modal.getInstance(document.querySelector("#modal-confirmation"));
    modalConfirmation.show();
});

$('#btn-cancel-confirmation').on('click', function (){
    const modalConfirmation = tailwind.Modal.getInstance(document.querySelector("#modal-confirmation"));
    modalConfirmation.hide();
});
// ==================================  End Inbound PO ==================================

// ==================================  Modal Bagian Transaksi Warehouse ==================================
$('#btn-uploadSn').on('click', function() {
    const upload = tailwind.Modal.getInstance(document.querySelector("#upload"));
    upload.show();
});

$('.pieces').on('click', function(){
    const inputSn = tailwind.Modal.getInstance(document.querySelector("#inputSn"));
    inputSn.show()
});

$('.bulk').on('click', function(){
    const importExcel = tailwind.Modal.getInstance(document.querySelector("#importExcel"));
    importExcel.show()
});

$('#btn-approvGudang').on('click', function(){
    const approvGudang = tailwind.Modal.getInstance(document.querySelector("#modal-submit"));
    approvGudang.show()
});

$('#btn-uploadNonSn').on('click', function(){
    const uploadnonsn = tailwind.Modal.getInstance(document.querySelector("#non-sn"));
    uploadnonsn.show()
});

$('#btn-reqReturn').on('click', function(){
    const reqReturn = tailwind.Modal.getInstance(document.querySelector("#modal-return-confirmation"));
    reqReturn.show()
});
// ==================================  End Modal Bagian Transaksi Warehouse ==================================

// ==================================  Modal Bagian Transfer ==================================
$('#btn-newTransfer').on('click', function(){
    const newTransfer = tailwind.Modal.getInstance(document.querySelector("#modal-new-transfer"));
    newTransfer.show()
});

$('#btn-submitTransfer').on('click', function(){
    const submitTransfer = tailwind.Modal.getInstance(document.querySelector("#modal-request-submit-confirmation"));
    submitTransfer.show()
});

$('#close-modal-transfer').on('click', function(){
    const closeModalTransfer = tailwind.Modal.getInstance(document.querySelector("#modal-request-submit-confirmation"));
    closeModalTransfer.hide()
});
// ==================================  End Modal Bagian Transfer ==================================

// ================================== Modal Bagian Transaksi Return Warehouse ==================================
$('#btn-uploadReturn').on('click', function(){
    const uploadReturn = tailwind.Modal.getInstance(document.querySelector("#modal-request-submit-confirmation"));
    uploadReturn.show()
});
//
$('#btn-non-sn-return').on('click', function(){
    const uploadNonSnReturn = tailwind.Modal.getInstance(document.querySelector("#non-sn-return"));
    uploadNonSnReturn.show()
});

$('#btn-return-pieces').on('click', function(){
    const returnPieces = tailwind.Modal.getInstance(document.querySelector("#inputSnReturn"));
    returnPieces.show()
});

$('#btn-return-excel').on('click', function(){
    const returnExcel = tailwind.Modal.getInstance(document.querySelector("#importExcelReturn"));
    returnExcel.show()
});
// ================================== End Modal Bagian Transaksi Return Warehouse ==================================
$('#btn-user-pickup').on('click', function(){
    const userPickup = tailwind.Modal.getInstance(document.querySelector("#add-name-pickup"));
    userPickup.show()
});

$('#btn-re-approv').on('click', function(){
    const reApprov = tailwind.Modal.getInstance(document.querySelector("#modal-re-approv"));
    reApprov.show()
});
