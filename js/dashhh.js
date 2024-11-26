const hamBurger = document.querySelector(".toggle-btn");

hamBurger.addEventListener("click", function () {
  document.querySelector("#sidebar").classList.toggle("expand");
});
document.addEventListener("DOMContentLoaded", () => {
  // ดึง element sidebar ที่มี dropdown
  const authLink = document.getElementById("hover-auth");
  const authDropdown = document.getElementById("auth");

  // เมื่อเมาส์ hover เข้า
  authLink.addEventListener("mouseenter", () => {
      authDropdown.classList.add("show"); // แสดง dropdown
  });

  // เมื่อเมาส์ออก
  authLink.addEventListener("mouseleave", () => {
      setTimeout(() => {
          authDropdown.classList.remove("show"); // ซ่อน dropdown
      }, 200); // เพิ่ม delay เพื่อให้ผู้ใช้งานสามารถ hover menu ได้ทัน
  });
});
