// Define the key codes for both players
const blueKey = '/';   // For the blue bee
const orangeKey = '*'; // For the orange bee

let bluePressed = false;
let orangePressed = false;

// Function to check if both keys are pressed
function checkKeys() {
  if (bluePressed && orangePressed) {
      window.location.href = url; 
  }
}

// Event listener for key presses
document.addEventListener('keydown', function(event) {
  if (event.key === blueKey) {
    bluePressed = true;
    console.log('Blue key pressed');
  }
  if (event.key === orangeKey) {
    orangePressed = true;
    console.log('Orange key pressed');
  }

  checkKeys(); // Check if both keys are pressed after each keydown event
});