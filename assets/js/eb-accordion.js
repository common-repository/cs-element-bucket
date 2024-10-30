document.addEventListener("DOMContentLoaded", function () {
  const accordionButtons = document.querySelectorAll(".eb-accordion-button");

  accordionButtons.forEach((button) => {
    button.addEventListener("click", function () {
      const target = document.querySelector(
        button.getAttribute("data-eb-target")
      );

      // If the clicked accordion is already open, close it
      if (target.classList.contains("open")) {
        closeAccordion(target);

        console.log("already open");
      } else {
        console.log("other open");

        // Close any currently open accordion items
        const openAccordion = document.querySelector(
          ".eb-accordion-collapse.open"
        );
        if (openAccordion && openAccordion !== target) {
          closeAccordion(openAccordion);
        }

        // Open the clicked accordion
        openAccordionItem(target);
      }
    });
  });

  // Function to close accordion
  function closeAccordion(target) {
    target.style.maxHeight = 0;
    target.style.overflow = "hidden";
    target.classList.remove("open");
  }

  // Function to open accordion
  function openAccordionItem(target) {
    target.classList.add("open");
    target.style.maxHeight = target.scrollHeight + "px";
    target.style.overflow = "auto";
  }
});
