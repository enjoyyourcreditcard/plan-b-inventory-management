const partDeletModal = document.getElementById(
    "part-delete-confirmation-modal"
);

partDeletModal.addEventListener("show.tw.modal", function (event) {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const id = urlParams.get("part_id");
    document.getElementById("part_id_delete").value = id;
});

// $("#modal-confirmation-deactive").on("show.bs.modal", function (event) {

//     // console.log(id);
//     var modal = $(this);
//     modal.find(".modal-footer #user_id").val(id);
// });
