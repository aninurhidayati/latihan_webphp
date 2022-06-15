let nama = "ANi";
document.write(nama);
console.log(nama);
/**ini jquery */
$("#btnsimpan").click(function () {
  let email = $("#email").val();
  if (email == "") {
    alert("Email Wajib diisi!!");
  } else {
    $("#ModalKonfirmasi").modal("show");
  }
});
$("#btnyes").click(function () {
  $("#formkoresponden").attr("action", "korespondenCtrl.php");
  $("#formkoresponden").submit();
});
$("#btnreset").click(function () {
  alert("hallooo");
});
/**ini javascript */
// document.getElementById("btnreset").onclick = function () {
//   alert("hallooo");
// };
