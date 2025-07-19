

document.getElementById("bugForm")
  .addEventListener("submit", async function (e) {
    e.preventDefault();

    const submitFormData = new FormData(this);
    const formData = Object.fromEntries(submitFormData.entries());

    const response = await fetch("submit.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(formData),
    });

    const result = await response.json();

    const responseMessage = document.getElementById("response");
    responseMessage.innerText = result.message;
    responseMessage.style.display = "block";

    // reset form data after submit form
    this.reset();

    setTimeout(() => {
      responseMessage.style.display = "none";
      responseMessage.innerText = "";
    }, 3000);

    // document.getElementById("response").innerText = result.message;
  });
