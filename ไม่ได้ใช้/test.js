// ฟังก์ชันสำหรับการเปิดและปิด panel หลัก
function setupAccordion(buttonClass, panelClass) {
  const buttons = document.querySelectorAll(`.${buttonClass}`);

  buttons.forEach(button => {
    button.addEventListener("click", () => {
      const panel = button.nextElementSibling;

      if (panel.classList.contains("open")) {
        // ปิด panel
        panel.style.maxHeight = `${panel.scrollHeight}px`;
        setTimeout(() => {
          panel.style.maxHeight = "0"; // ปิด panel โดยการตั้ง max-height เป็น 0
        }, 10);
        panel.classList.remove("open");

        // ปิด sub-panel ภายใน panel หลัก
        const subPanels = panel.querySelectorAll(".sub-panel");
        subPanels.forEach(subPanel => {
          subPanel.style.maxHeight = `${subPanel.scrollHeight}px`;
          setTimeout(() => {
            subPanel.style.maxHeight = "0";
          }, 10);
          subPanel.classList.remove("open");
        });
      } else {
        // เปิด panel
        panel.style.maxHeight = `${panel.scrollHeight}px`; // ตั้งค่า max-height ตามเนื้อหาภายใน
        setTimeout(() => {
          panel.style.maxHeight = "5000px"; // ใช้ค่าประมาณสูงสุดที่คาดไว้
        }, 10);
        panel.classList.add("open");
      }

      // ปิด panel อื่นในกลุ่มเดียวกัน
      buttons.forEach(otherButton => {
        if (otherButton !== button) {
          const otherPanel = otherButton.nextElementSibling;
          if (otherPanel.classList.contains("open")) {
            otherPanel.style.maxHeight = `${otherPanel.scrollHeight}px`;
            setTimeout(() => {
              otherPanel.style.maxHeight = "0";
            }, 10);
            otherPanel.classList.remove("open");

            // ปิด sub-panel ภายใน panel อื่นที่ถูกปิด
            const otherSubPanels = otherPanel.querySelectorAll(".sub-panel");
            otherSubPanels.forEach(subPanel => {
              subPanel.style.maxHeight = `${subPanel.scrollHeight}px`;
              setTimeout(() => {
                subPanel.style.maxHeight = "0";
              }, 10);
              subPanel.classList.remove("open");
            });
          }
        }
      });
    });
  });
}

// ฟังก์ชันสำหรับการเปิดและปิด sub-panel
function setupSubAccordion(buttonClass, panelClass) {
  const subButtons = document.querySelectorAll(`.${buttonClass}`);

  subButtons.forEach(subButton => {
    subButton.addEventListener("click", () => {
      const subPanel = subButton.nextElementSibling;

      if (subPanel.classList.contains("open")) {
        subPanel.style.maxHeight = `${subPanel.scrollHeight}px`;
        setTimeout(() => {
          subPanel.style.maxHeight = "0"; // ปิด sub-panel โดยการตั้ง max-height เป็น 0
        }, 10);
        subPanel.classList.remove("open");
      } else {
        subPanel.style.maxHeight = `${subPanel.scrollHeight}px`; // ตั้งค่า max-height ตามเนื้อหาภายใน
        setTimeout(() => {
          subPanel.style.maxHeight = "5000px"; // ใช้ค่าประมาณสูงสุดที่คาดไว้
        }, 10);
        subPanel.classList.add("open");
      }

      updateParentPanel(subPanel);
    });
  });
}

// ฟังก์ชันสำหรับอัพเดต panel หลักเมื่อ sub-panel เปิด
function updateParentPanel(subPanel) {
  const parentPanel = subPanel.closest(".panel");
  if (parentPanel) {
    parentPanel.style.maxHeight = `${parentPanel.scrollHeight}px`;
    setTimeout(() => {
      parentPanel.style.maxHeight = "5000px"; // ใช้ค่าประมาณสูงสุดที่คาดไว้
    }, 10);
  }
}

// เรียกใช้งานฟังก์ชันเมื่อ DOM โหลดเสร็จ
document.addEventListener("DOMContentLoaded", () => {
  setupAccordion("accordion", "panel");
  setupSubAccordion("sub-accordion", "sub-panel");
});
