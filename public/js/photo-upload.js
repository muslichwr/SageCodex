/**
 * SageCodex Photo Upload Functionality
 * Handles profile photo upload, preview, and delete functionality
 */

document.addEventListener('DOMContentLoaded', () => {
  // Get references to DOM elements
  const uploadPhotoBtn = document.getElementById('upload-photo');
  const deletePhotoBtn = document.getElementById('delete-photo');
  const photoPreview = document.getElementById('photo-preview');
  const hiddenInput = document.getElementById('hidden-input');

  // Handle photo upload button click
  if (uploadPhotoBtn) {
    uploadPhotoBtn.addEventListener('click', () => {
      hiddenInput.click(); // Trigger file input
    });
  }

  // Handle file selection
  if (hiddenInput) {
    hiddenInput.addEventListener('change', (event) => {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        
        reader.onload = (e) => {
          // Display the image preview
          photoPreview.src = e.target.result;
          photoPreview.classList.remove('hidden');
          
          // Show delete button
          deletePhotoBtn.classList.remove('hidden');
        };
        
        reader.readAsDataURL(file);
      }
    });
  }

  // Handle photo deletion
  if (deletePhotoBtn) {
    deletePhotoBtn.addEventListener('click', () => {
      // Clear the file input
      hiddenInput.value = '';
      
      // Hide the preview
      photoPreview.src = '';
      photoPreview.classList.add('hidden');
      
      // Hide delete button
      deletePhotoBtn.classList.add('hidden');
    });
  }
}); 