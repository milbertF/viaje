// List of valid paths (match these to the actual paths in your project structure)
const validPaths = [
  "/viaje/fareRate.php", // Example path: adjust according to your directory structure
  "/viaje/home.php",
  "/viaje/contact.php",
  "/viaje/about.php",
];

// Get the current path from the URL
const currentPath = window.location.pathname;

// Log the current path for debugging
console.log("Current Path:", currentPath);

// Check if the current path is in the list of valid paths
const isValidPath = validPaths.some((validPath) =>
  currentPath.endsWith(validPath)
);

if (!isValidPath) {
  // Redirect to 404 page if the path is invalid
  console.log("Invalid Path:", currentPath);
  window.location.href = "../../404/404.html"; // Replace with the correct path to your 404 page
} else {
  console.log("Valid Path:", currentPath);
}
