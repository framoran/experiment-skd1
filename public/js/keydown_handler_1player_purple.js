// Define the key codes for the player
const yellowKey = '/';   // For the blue bee

let yellowPressed = false;

// Function to check if both keys are pressed
function checkKeys() {
  if (yellowPressed ) {
      window.location.href = url; 
  }
}

// Event listener for key presses
document.addEventListener('keydown', function(event) {
  if (event.key === yellowKey) {
    yellowPressed = true;
    console.log('Yellow key pressed');
  }
  checkKeys(); // Check if both keys are pressed after each keydown event
});