// Define the key codes for the player
const purpleKey = '*';   // For the purple bee

let purplePressed = false;

// Function to check if both keys are pressed
function checkKeys() {
  if (purplePressed ) {
      window.location.href = url; 
  }
}

// Event listener for key presses
document.addEventListener('keydown', function(event) {
  if (event.key === purpleKey) {
    purplePressed = true;
    console.log('Purple key pressed');
  }
  checkKeys(); // Check if both keys are pressed after each keydown event
});