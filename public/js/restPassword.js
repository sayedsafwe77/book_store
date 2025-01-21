const inputs = document.querySelectorAll(".input_container input");

window.onload = () => {
  inputs[0].focus();
};

inputs.forEach((input, index) => {
  input.addEventListener("input", () => {
    if (input.value.length > 0 && index < inputs.length - 1) {
      inputs[index + 1].focus();
    }
  });

  input.addEventListener("keydown", (e) => {
    if (e.key === "Backspace" && input.value.length === 0 && index > 0) {
      inputs[index - 1].focus();
    }
  });
});