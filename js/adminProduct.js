document.addEventListener("DOMContentLoaded", function () {
  const addBtn = document.getElementById("add-btn");
  const addModal = document.getElementById("addModal");
  var closeBtn = document.getElementById("close-btn");

  addBtn.addEventListener("click", () => {
    addModal.style.display = "block";
  });
  
  closeBtn.addEventListener('click', () => {
    editModal.style.display = 'none';
  });

});



