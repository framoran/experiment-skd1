// Define the key codes for both players
const purpleKey = '/';   // For the purple bee
const yellowKey = '*'; // For the yellow bee

let purplePressed = false;
let yellowPressed = false;

// Function to check if both keys are pressed
function checkKeys() {
  if (purplePressed && yellowPressed) {
      window.location.href = url; 
  }
}

// Event listener for key presses
document.addEventListener('keydown', function(event) {
  if (event.key === purpleKey) {
    purplePressed = true;
    console.log('Purple key pressed');
  }
  if (event.key === yellowKey) {
    yellowPressed = true;
    console.log('yellow key pressed');
  }

  checkKeys(); // Check if both keys are pressed after each keydown event
});