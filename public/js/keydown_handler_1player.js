// Define the key codes for both players
const blueKey = '/';   // For the blue bee

let bluePressed = false;

// Function to check if both keys are pressed
function checkKeys() {
  if (bluePressed ) {
      window.location.href = url; 
  }
}

// Event listener for key presses
document.addEventListener('keydown', function(event) {
  if (event.key === blueKey) {
    bluePressed = true;
    console.log('Blue key pressed');
  }
  checkKeys(); // Check if both keys are pressed after each keydown event
});