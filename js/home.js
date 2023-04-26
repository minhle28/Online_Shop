document.addEventListener("DOMContentLoaded", function () {
  //Sign In and Register Popup
  const loginBtn = document.getElementById("loginBtn");
  const loginModal = document.getElementById("loginModal");
  const closeBtn = document.querySelector(".close");

  loginBtn.addEventListener("click", () => {
    loginModal.style.display = "block";
  });

  closeBtn.addEventListener("click", () => {
    loginModal.style.display = "none";
  });

  window.addEventListener("click", (event) => {
    if (event.target === loginModal) {
      loginModal.style.display = "none";
    }
  });
});
