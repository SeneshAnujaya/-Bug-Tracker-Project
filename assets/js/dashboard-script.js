document.addEventListener("DOMContentLoaded", function () {
  const statusFilter = document.getElementById("statusFilter");
  const priorityFilter = document.getElementById("priorityFilter");
  const rows = document.querySelectorAll("#bugsTable > tr");

  function filterTable() {
    const status = statusFilter.value;
    const priority = priorityFilter.value;

    rows.forEach((row) => {
      const rowStatus = row.dataset.status;
      const rowPriority = row.dataset.priority;

      const statusMatch = !status || rowStatus === status;
      const priorityMatch = !priority || rowPriority === priority;

      row.style.display = statusMatch && priorityMatch ? "" : "none";
    });
  }

  statusFilter.addEventListener("change", filterTable);
  priorityFilter.addEventListener("change", filterTable);
});
